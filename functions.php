<?php

define('(#theme_namespace_caps#)_PATH', get_stylesheet_directory() . '/');

//Include vendor files
if (file_exists(dirname(ABSPATH) . '/vendor/autoload.php')) {
    require_once dirname(ABSPATH) . '/vendor/autoload.php';
}

require_once (#theme_namespace_caps#)_PATH . 'library/Vendor/Psr4ClassLoader.php';
$loader = new (#theme_namespace_caps#)\Vendor\Psr4ClassLoader();
$loader->addPrefix('(#theme_namespace#)', (#theme_namespace_caps#)_PATH . 'library');
$loader->addPrefix('(#theme_namespace#)', (#theme_namespace_caps#)_PATH . 'source/php/');
$loader->register();

new (#theme_namespace#)\App();
