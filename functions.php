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

// Clean global namespace.
unset($vendor);

// Run app class.
new Simrishamn\Theme\Application();
