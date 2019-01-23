<?php

define('SIMRISHAMN_PATH', get_stylesheet_directory());

// Initialize class loader.
require_once SIMRISHAMN_PATH . '/library/Vendor/Psr4ClassLoader.php';
$loader = new SIMRISHAMN\Vendor\Psr4ClassLoader();
$loader->addPrefix('Simrishamn', SIMRISHAMN_PATH . '/library');
$loader->register();

// Include CustomModuleHelper
require_once SIMRISHAMN_PATH . '/CustomModuleHelper.php';

// Run app class.
new Simrishamn\App();