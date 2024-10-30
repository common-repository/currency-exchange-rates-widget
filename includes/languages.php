<?php

function mcсr_widget_language($lg)
{
    $lang = array();

    if ('en' == $lg) {
        $lang['preview'] = 'Preview';
        $lang['title'] = 'Exchange Rate';
        $lang['heading'] = 'Heading';
        $lang['base_currency'] = 'Base currency';
        $lang['сodes_currencies'] = 'Codes of currencies';
        $lang['сodes_currencies_open'] = 'new window will open';
        $lang['amount'] = 'Amount';
        $lang['language'] = 'Language';
        $lang['timezone'] = 'Timezone';
        $lang['theme'] = 'Theme';
        $lang['size_width'] = 'Size (width)';
        $lang['currency_code'] = 'Currency code';
        $lang['signature'] = 'Signed at bottom of widget';
        $lang['sizes']['100%'] = 'Auto size';
        $lang['generated_shortcode'] = 'Generated shortcode';
        // Themes
        $lang['themes']['darkblue'] = 'Dark blue';
        $lang['themes']['green'] = 'Green';
        $lang['themes']['blue'] = 'Blue';
        $lang['themes']['yellow'] = 'Yellow';
        $lang['themes']['red'] = 'Red';
        $lang['themes']['gray'] = 'Gray';
    } elseif ('ru' == $lg) {
        $lang['preview'] = 'Превью';
        $lang['title'] = 'Курс валют';
        $lang['heading'] = 'Заголовок';
        $lang['base_currency'] = 'Основная валюта';
        $lang['сodes_currencies'] = 'Коды валют';
        $lang['сodes_currencies_open'] = 'откроется в новом окне';
        $lang['amount'] = 'Сумма';
        $lang['language'] = 'Язык';
        $lang['timezone'] = 'Часовой пояс';
        $lang['theme'] = 'Цветовое оформление';
        $lang['size_width'] = 'Размер (ширина)';
        $lang['currency_code'] = 'Только коды валют';
        $lang['signature'] = 'Подпись внизу виджета';
        $lang['sizes']['100%'] = 'Авто размер';
        $lang['generated_shortcode'] = 'Шорткод для страниц';
        // Themes
        $lang['themes']['darkblue'] = 'Синий';
        $lang['themes']['green'] = 'Зеленый';
        $lang['themes']['blue'] = 'Голубой';
        $lang['themes']['yellow'] = 'Желтый';
        $lang['themes']['red'] = 'Красный';
        $lang['themes']['gray'] = 'Серый';
    } elseif ('uk' == $lg) {
        $lang['preview'] = "Прев'ю";
        $lang['title'] = 'Курс валют';
        $lang['heading'] = 'Заголовок';
        $lang['base_currency'] = 'Основна валюта';
        $lang['сodes_currencies'] = 'Коды валют';
        $lang['сodes_currencies_open'] = 'відкриється в новому вікні';
        $lang['amount'] = 'Сума';
        $lang['language'] = 'Мова';
        $lang['theme'] = 'Кольорове оформлення';
        $lang['size_width'] = 'Розмір (ширина)';
        $lang['currency_code'] = 'Тільки коди валют';
        $lang['signature'] = 'Підпис внизу віджету';
        $lang['sizes']['100%'] = 'Авто розмір';
        $lang['generated_shortcode'] = 'Шорткод для сторінок';
        // Themes
        $lang['themes']['darkblue'] = 'Синій';
        $lang['themes']['green'] = 'Зелений';
        $lang['themes']['blue'] = 'Блакитний';
        $lang['themes']['yellow'] = 'Жовтий';
        $lang['themes']['red'] = 'Червоний';
        $lang['themes']['gray'] = 'Сірий';
    } elseif ('fr' == $lg) {
        $lang['preview'] = 'Aperçu';
        $lang['title'] = 'Taux de change';
        $lang['heading'] = 'Titre';
        $lang['base_currency'] = 'Devise de base';
        $lang['сodes_currencies'] = 'Codes de devises';
        $lang['сodes_currencies_open'] = 'nouvelle fenêtre s\'ouvrira';
        $lang['amount'] = 'Montant';
        $lang['language'] = 'La langue';
        $lang['timezone'] = 'Fuseau horaire';
        $lang['theme'] = 'Thème';
        $lang['size_width'] = 'Taille (largeur)';
        $lang['currency_code'] = 'Code de devise';
        $lang['signature'] = 'Signé en bas';
        $lang['sizes']['100%'] = 'Taille automatique';
        $lang['generated_shortcode'] = 'Généré Shortcode';
        // Themes
        $lang['themes']['darkblue'] = 'Bleu foncé';
        $lang['themes']['green'] = 'Vert';
        $lang['themes']['blue'] = 'Bleu';
        $lang['themes']['yellow'] = 'Jaune';
        $lang['themes']['red'] = 'Rouge';
        $lang['themes']['gray'] = 'Gris';
    } elseif ('es' == $lg) {
        $lang['preview'] = 'Avance';
        $lang['title'] = 'Tipo de cambio';
        $lang['heading'] = 'Título';
        $lang['base_currency'] = 'Moneda base';
        $lang['сodes_currencies'] = 'Códigos de monedas';
        $lang['сodes_currencies_open'] = 'se abrirá una nueva ventana';
        $lang['amount'] = 'Cantidad';
        $lang['language'] = 'Idioma';
        $lang['timezone'] = 'Zona horaria';
        $lang['theme'] = 'Tema';
        $lang['size_width'] = 'Tamaño (ancho)';
        $lang['currency_code'] = 'Código de moneda';
        $lang['signature'] = 'Firmado en la parte inferior';
        $lang['sizes']['100%'] = 'Tamaño automático';
        $lang['generated_shortcode'] = 'Código abreviado generado';
        // Themes
        $lang['themes']['darkblue'] = 'Azul oscuro';
        $lang['themes']['green'] = 'Verde';
        $lang['themes']['blue'] = 'Azul';
        $lang['themes']['yellow'] = 'Amarillo';
        $lang['themes']['red'] = 'Rojo';
        $lang['themes']['gray'] = 'Gris';
    } elseif ('de' == $lg) {
        $lang['preview'] = 'Vorschau';
        $lang['title'] = 'Wechselkurs';
        $lang['heading'] = 'Überschrift';
        $lang['base_currency'] = 'Hauptwährung';
        $lang['сodes_currencies'] = 'Codes von währungen';
        $lang['сodes_currencies_open'] = 'neues fenster wird geöffnet';
        $lang['amount'] = 'Menge';
        $lang['language'] = 'Sprache';
        $lang['timezone'] = 'Zeitzone';
        $lang['theme'] = 'Thema';
        $lang['size_width'] = 'Größe (Breite)';
        $lang['currency_code'] = 'Währungscode';
        $lang['signature'] = 'Unten signiert';
        $lang['sizes']['100%'] = 'Automatische skalierung';
        $lang['generated_shortcode'] = 'Generierter kurzwahlcode';
        // Themes
        $lang['themes']['darkblue'] = 'Dunkelblau';
        $lang['themes']['green'] = 'Grün';
        $lang['themes']['blue'] = 'Blau';
        $lang['themes']['yellow'] = 'Gelb';
        $lang['themes']['red'] = 'Rot';
        $lang['themes']['gray'] = 'Grau';
    } elseif ('cn' == $lg) {
        $lang['preview'] = '预习';
        $lang['title'] = '汇率';
        $lang['heading'] = '标题';
        $lang['base_currency'] = '基础货币';
        $lang['сodes_currencies'] = '货币代码';
        $lang['сodes_currencies_open'] = '新窗口将打开';
        $lang['amount'] = '量';
        $lang['language'] = '语言';
        $lang['timezone'] = '时区';
        $lang['theme'] = '颜色';
        $lang['size_width'] = '大小（宽度）';
        $lang['currency_code'] = '货币代码';
        $lang['signature'] = '在底部签名';
        $lang['sizes']['100%'] = '自动尺寸';
        $lang['generated_shortcode'] = '生成的简码';
        // Themes
        $lang['themes']['darkblue'] = '深蓝';
        $lang['themes']['green'] = '绿色';
        $lang['themes']['blue'] = '蓝色';
        $lang['themes']['yellow'] = '黄色';
        $lang['themes']['red'] = '红';
        $lang['themes']['gray'] = '灰色';
    }

	$lang['ssl'] = 'SSL';

    $lang['sizes']['200px'] = '200px';
    $lang['sizes']['300px'] = '300px';

    return $lang;
}
