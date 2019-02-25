<?php

define('SIMRISHAMN_PATH', get_stylesheet_directory());

$vendor = realpath(dirname(ABSPATH) . '/vendor');

// Include vendor files.
if (file_exists("$vendor/autoload.php")) {
    include_once "$vendor/autoload.php";
}

// FIXME: Kirki must be loaded manually.
if (file_exists("$vendor/aristath/kirki/kirki.php")) {
    include_once "$vendor/aristath/kirki/kirki.php";
}

// Initialize class loader.
require_once SIMRISHAMN_PATH . '/library/Vendor/Psr4ClassLoader.php';
$loader = new SIMRISHAMN\Vendor\Psr4ClassLoader();
$loader->addPrefix('Simrishamn', SIMRISHAMN_PATH . '/library');
$loader->register();

// Clean global namespace.
unset($vendor);
unset($loader);

// Run app class.
new Simrishamn\Theme\Application();
