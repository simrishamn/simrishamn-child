<?php

define('SIMRISHAMN_PATH', get_stylesheet_directory());

// Include vendor files.
if (file_exists(dirname(ABSPATH) . '/vendor/autoload.php')) {
    include_once dirname(ABSPATH) . '/vendor/autoload.php';
}

// Initialize class loader.
require_once SIMRISHAMN_PATH . '/library/Vendor/Psr4ClassLoader.php';
$loader = new SIMRISHAMN\Vendor\Psr4ClassLoader();
$loader->addPrefix('Simrishamn', SIMRISHAMN_PATH . '/library');
$loader->register();

// Run app class.
new Simrishamn\App();
