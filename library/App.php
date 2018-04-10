<?php
namespace Simrishamn;

class App
{
    public function __construct()
    {
        new \Simrishamn\Theme\Customizer();
        new \Simrishamn\Theme\Enqueue();
        new \Simrishamn\Theme\Language();
        new \Simrishamn\Theme\Template();
    }
}
