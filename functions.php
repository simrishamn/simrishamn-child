<?php

define('SIMRISHAMN_PATH', get_stylesheet_directory() . '/');
define('CUSTOM_MODULES_PATH', SIMRISHAMN_PATH . 'custom-modules/');

define('DEV_MODE', true);

//Include vendor files
if (file_exists(dirname(ABSPATH) . '/vendor/autoload.php')) {
    include_once dirname(ABSPATH) . '/vendor/autoload.php';
}

require_once SIMRISHAMN_PATH . 'library/Vendor/Psr4ClassLoader.php';
$loader = new SIMRISHAMN\Vendor\Psr4ClassLoader();
$loader->addPrefix('Simrishamn', SIMRISHAMN_PATH . 'library');
$loader->addPrefix('Simrishamn', SIMRISHAMN_PATH . 'source/php/');
$loader->register();

if (defined('CUSTOM_MODULES_PATH')) {
    foreach (glob(CUSTOM_MODULES_PATH . "*") as $module) {
        modularity_register_module(
            $module,
            basename($module)
        );
    }
}
new Simrishamn\App();
