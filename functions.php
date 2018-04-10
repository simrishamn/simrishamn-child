<?php

define('SIMRISHAMN_PATH', get_stylesheet_directory() . '/');
define('CUSTOM_MODULES_PATH', SIMRISHAMN_PATH . 'custom-modules/');
define('G_RECAPTCHA_KEY', '');
define('G_RECAPTCHA_SECRET', '');

//Include vendor files
if (file_exists(dirname(ABSPATH) . '/vendor/autoload.php')) {
    include_once dirname(ABSPATH) . '/vendor/autoload.php';
}

require_once SIMRISHAMN_PATH . 'library/Vendor/Psr4ClassLoader.php';
$loader = new SIMRISHAMN\Vendor\Psr4ClassLoader();
$loader->addPrefix('Simrishamn', SIMRISHAMN_PATH . 'library');
$loader->addPrefix('Simrishamn', SIMRISHAMN_PATH . 'source/php/');
$loader->register();

require_once 'library/admin-bar.php';

if (function_exists('modularity_register_module') && defined('CUSTOM_MODULES_PATH')) {
    foreach (glob(CUSTOM_MODULES_PATH . "*") as $module) {
        modularity_register_module($module, basename($module));
    }
}

add_filter( 'theme_page_templates', 'filter_theme_page_templates', 20, 3);
function filter_theme_page_templates($templates) {
    unset($templates['one-page.blade.php']);
    return $templates;
};

new Simrishamn\App();
