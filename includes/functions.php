<?php

function mcсr_return_list_languages()
{
    return array(
        'en' => 'English', 
        'ru' => 'Русский', 
        'uk' => 'Украинский',
        'de' => 'Deutsch',
        'es' => 'Español',
        'fr' => 'Français',
        'cn' => '中国',
    );
}

function mcсr_return_language_detected()
{
    $sl = substr(get_bloginfo('language'), 0, 2);

    return (in_array($sl, array_keys(mcсr_return_list_languages()))) ? $sl : 'en';
}

function mcсr_return_currency_list()
{
    $contents = file_get_contents(plugin_dir_path(__FILE__).'data/currencies_'.mcсr_return_language_detected().'.json');

    return json_decode($contents, true);
}

function mcсr_return_iframe($params, $width, $height, $signature = null, $text = null)
{

    $target_url = strtolower('https://'.$params['base'].(('en' != $params['lang']) ? '.'.$params['lang'] : '').'.mconvert.net');

    $params['base'] = strtolower( $params['base'] );
	$params['curr'] = strtolower( $params['curr'] );

	if( $params['type'] == '' ){
		$params['type'] = '1';
	}

    if( $params['lang'] == 'uk') {
        $params['lang'] = "ua";
    }

    $url = 'https://mconvert.net/get-exchange-rates-widget?'.http_build_query($params);
    $output = '<iframe src="'.$url.'" height="'.$height.'" width="'.$width.'" frameborder="0" scrolling="no" class="mcr-iframe" name="mcr-exchange-rates-widget"></iframe>';
    if ($signature) {
        $output .= '<p>'.(($text) ? $text.': ' : '').'<a href="'.$target_url.'" target="_blank" class="mcr-base-currency-link">'.$params['base'].'</a></p>';
    }

    return $output;
}

function mcсr_print_timezone_list($code, $arr)
{
    $output_string = '';
    foreach ($arr as $v) {
        $output_string .= '<option value="'.$v[0].'"'.(($code == $v[0]) ? ' selected' : '').'>'.$v[1].'</option>'.PHP_EOL;
    }

    echo $output_string;
}

function mcсr_print_select_options($code, $arr, $o = false)
{
    $output_string = '';
    foreach ($arr as $k => $v) {
        $output_string .= '<option value="'.$k.'"'.(($code == $k) ? ' selected' : '').'>'.((true === $o) ? $k.' - '.$v : $v).'</option>'.PHP_EOL;
    }

    echo $output_string;
}
