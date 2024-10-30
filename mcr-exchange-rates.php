<?php
/**
    Plugin Name: Currency/cryptocurrency exchange rates widget
    Plugin URI: https://mconvert.net/exchange-rates-widget
    Description: Simple and powerful currency exchange rates widget for your website or blog.
    Version: 0.1
    Author: mconvert
    Author URI: https://mconvert.net
    License: GPLv2 or later
    Text Domain: mcсr_exchange_rates_widget
*/

/*
    Load functions
*/
require_once 'includes/functions.php';
require_once 'includes/languages.php';

/*
    Init widget
*/
add_action('widgets_init', function () {
    register_widget('mcсr_exchange_rates_widget');
});

/*
    Shortcode
*/
function callback_mcсr_exchange_rates_widget($atts, $content = null)
{
    $_lg = mcсr_return_language_detected();

    extract(shortcode_atts(array(
        'size_width' => '100%',
        'base' => 'EUR',
        'curr' => 'USD,GBP,AUD,CNY,JPY,RUB',
        'theme' => 'blue',
        'lang' => $_lg,
        'type' => 1,
        'amount' => 100,
        'ssl' => 1,
    ), $atts, 'mcсr_exchange_rates'));

    $lang = (empty($lg)) ? $_lg : ((in_array($lang, array_keys(mcсr_return_list_languages()))) ? $lang : 'en');
    $base = (empty($fm)) ? 'EUR' : $base;
    $curr = (empty($curr)) ? 'USD,GBP,AUD,CNY,JPY,RUB' : $curr;

    $height = (90 + (count(explode(',', $curr)) * 37));
    $params = array(
      'base' => $base,
      'curr' => $curr,
      'theme' => $theme,
      'lang' => $lang,
      'type' => $type,
      'amount' => $amount,
      'ssl' => $ssl,
    );

    $language = mcсr_widget_language($lg);

    $output = mcсr_return_iframe($params, $size_width, $height, 1, $language['title']);

    return $output;
}

add_shortcode('mcсr_exchange_rates', 'callback_mcсr_exchange_rates_widget');

/*
    Class of widget
*/
class mcсr_exchange_rates_widget extends WP_Widget
{
    /*
        Register widget with WordPress.
    */
    public function __construct()
    {
        parent::__construct(
            'mcсr_exchange_rates_widget',
            esc_html__('Currency/cryptocurrency exchange rates widget', 'mcсr_exchange_rates_widget'),
            array(
                'description' => esc_html__('Displays an exchange rates online.', 'mcсr_exchange_rates_widget'),
            )
        );
    }

    /*
        Update the widget settings.
    */
    public function update($new_instance, $old_instance)
    {
        $currency_list = mcсr_return_currency_list();

        $instance = $old_instance;

        $instance['base'] = sanitize_text_field($new_instance['base']);
        $instance['curr'] = sanitize_text_field($new_instance['curr']);
        $instance['lang'] = sanitize_text_field($new_instance['lang']);
        $instance['theme'] = sanitize_text_field($new_instance['theme']);
        $instance['type'] = sanitize_text_field($new_instance['type']);
        $instance['amount'] = sanitize_text_field($new_instance['amount']);
        $instance['title'] = sanitize_text_field($new_instance['title']);
        $instance['signature'] = sanitize_text_field($new_instance['signature']);
        $instance['size_width'] = sanitize_text_field($new_instance['size_width']);
        $instance['currency_name'] = (2 == $new_instance['type']) ? $new_instance['base'] : $currency_list[$new_instance['base']];
	    $instance['ssl'] = sanitize_text_field($new_instance['ssl']);

        return $instance;
    }

    /*
        Update the widget settings.
        Make use of the get_field_id() and get_field_name() function when creating your form elements. This handles the confusing stuff.
    */
    public function form($instance)
    {
        /*
            Default widget settings
        */
        $defaults = array(
            'currency_name' => 'Euro',
            'title' => $this->_lang('title'),
            'size_width' => '100%',
            'signature' => 1,
            'base' => 'EUR',
            'curr' => 'USD,GBP,AUD,CNY,JPY,RUB',
            'lang' => mcсr_return_language_detected(),
            'theme' => 'blue',
            'type' => 1,
            'amount' => 100,
            'ssl' => 1,
        );

        if (empty($instance)) {
            $instance = $defaults;
        }

        $currency_list = mcсr_return_currency_list();

        $fm = sanitize_text_field($instance['base']);
        $to = sanitize_text_field($instance['curr']);
        $lg = sanitize_text_field($instance['lang']);
        $st = sanitize_text_field($instance['theme']);
        $cd = sanitize_text_field($instance['type']);
        $am = sanitize_text_field($instance['amount']);
        $title = sanitize_text_field($instance['title']);
        $signature = sanitize_text_field($instance['signature']);
        $size_width = sanitize_text_field($instance['size_width']);
	    $ssl = sanitize_text_field($instance['ssl']);

        echo '<p><label for="',$this->get_field_id('title'),'">',$this->_lang('heading'),':',
             '<input id="',$this->get_field_id('title'),'" type="text" name="',$this->get_field_name('title'),'" value="',$title,'" style="width:100%"></label></p>';

        echo '<p><label for="',$this->get_field_id('base'),'">',$this->_lang('base_currency'),':',
             '<select id="',$this->get_field_id('base'),'" name="',$this->get_field_name('base'),'" style="width:100%">',
             mcсr_print_select_options($fm, $currency_list, true),
             '</select></label></p>';

        echo '<p><label for="',$this->get_field_id('curr'),'"><a href="https://mconvert.net/world-currencies" target="_blank">',$this->_lang('сodes_currencies'),'</a> <small>(',$this->_lang('сodes_currencies_open'),')</small>:',
             '<input id="',$this->get_field_id('curr'),'" type="text" name="',$this->get_field_name('curr'),'" value="',$to,'" style="width:100%"></label></p>';

        echo '<p><label for="',$this->get_field_id('amount'),'">',$this->_lang('amount'),':',
             '<input id="',$this->get_field_id('amount'),'" type="text" name="',$this->get_field_name('amount'),'" value="',$am,'" style="width:100%"></label></p>';

        echo '<p><label for="',$this->get_field_id('lang'),'">',$this->_lang('language'),':',
             '<select id="',$this->get_field_id('lang'),'" name="',$this->get_field_name('lang'),'" style="width:100%">',
             mcсr_print_select_options($lg, mcсr_return_list_languages()),
             '</select></label></p>';


        echo '<p><label for="',$this->get_field_id('theme'),'">',$this->_lang('theme'),':',
             '<select id="',$this->get_field_id('theme'),'" name="',$this->get_field_name('theme'),'" style="width:100%">',
             mcсr_print_select_options($st, $this->_lang('themes')),
             '</select></label></p>';

        echo '<p><label for="',$this->get_field_id('size_width'),'">',$this->_lang('size_width'),':',
             '<select id="',$this->get_field_id('size_width'),'" name="',$this->get_field_name('size_width'),'" style="width:100%">',
             mcсr_print_select_options($size_width, $this->_lang('sizes')),
             '</select></label></p>';

        echo '<p><label for="',$this->get_field_id('type'),'">',
             '<input type="checkbox" ',checked($cd, 2),' id="',$this->get_field_id('type'),'" name="',$this->get_field_name('type'),'" value="2">',
             $this->_lang('currency_code'),
             '</label></p>';

        echo '<p><label for="',$this->get_field_id('signature'),'">',
             '<input type="checkbox" ',checked($signature, 1),' id="',$this->get_field_id('signature'),'" name="',$this->get_field_name('signature'),'" value="1">',
             $this->_lang('signature'),
             '</label></p>';

	    echo '<p><label for="',$this->get_field_id('ssl'),'">',
	    '<input type="checkbox" ',checked($ssl, 2),' id="',$this->get_field_id('ssl'),'" name="',$this->get_field_name('ssl'),'" value="2">',
	    $this->_lang('ssl'),
	    '</label></p>';

        $widget_params = array(
            'lang' => $lg,
            'base' => $fm,
            'curr' => $to,
            'theme' => $st,
            'type' => $cd != '' ? $cd : 1,
            'amount' => $am,
            'ssl' => $ssl != '' ? $ssl : 1,
        );

        echo '<hr>',
             '<div><h3>',$this->_lang('preview'),'</h3>',
             $this->_output_widget($widget_params, $size_width),
             '</div>';

        $short_attrs = '';
        foreach ($widget_params as $key => $value) {
            $short_attrs .= $key.'="'.$value.'" ';
        }

        echo '<hr>',
             '<div><h3>',$this->_lang('generated_shortcode'),'</h3>',
             '<textarea onclick="this.select()" style="width:100%;height:80px;">[mcсr_exchange_rates ',trim($short_attrs),'][/mcсr_exchange_rates]</textarea></div>',
             '<hr>';
    }

    /*
        Output widget
    */
    public function widget($args, $instance)
    {
        // Register style
        wp_register_style('mcr-exchange-rates-widget', plugin_dir_url(__FILE__).'assets/frontend.css');
        wp_enqueue_style('mcr-exchange-rates-widget', plugin_dir_url(__FILE__).'assets/frontend.css');

        // Get values
        extract($args);

        $currency_list = mcсr_return_currency_list();

        $lg = sanitize_text_field($instance['lang']);
        $fm = sanitize_text_field($instance['base']);
        $to = sanitize_text_field($instance['curr']);
        $st = sanitize_text_field($instance['theme']);
        $cd = sanitize_text_field($instance['type']);
        $am = sanitize_text_field($instance['amount']);
        $title = sanitize_text_field($instance['title']);
        $signature = sanitize_text_field($instance['signature']);
        $size_width = sanitize_text_field($instance['size_width']);
	    $ssl = sanitize_text_field($instance['ssl']);


        echo $args['before_widget'];

        // Title
        echo $args['before_title'].$title.$args['after_title'];

        // Load language
        $language = mcсr_widget_language($lg);

        // Output
        echo $this->_output_widget(array(
            'lang' => $lg,
            'base' => $fm,
            'curr' => $to,
            'theme' => $st,
            'type' => $cd,
            'amount' => $am,
            'ssl' => $ssl,
        ), $size_width, $signature, $language['title']);

        echo $args['after_widget'];
    }

    /*
        Output widget
    */
    private function _output_widget($params, $width, $signature = null, $text = null)
    {
        $height = (90 + (count(explode(',', $params['curr'])) * 37));
        $output = mcсr_return_iframe($params, $width, $height, $signature, $text);

        return $output;
    }

    /*
        Load languages text
    */
    private function _lang($value)
    {
        $_mcсr_widget_language = mcсr_widget_language(mcсr_return_language_detected());

        return $_mcсr_widget_language[$value];
    }
}
