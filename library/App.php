<?php
namespace Simrishamn;

class App
{
    public function __construct()
    {
        new \Simrishamn\Theme\Enqueue();
        new \Simrishamn\Theme\CustomizerFeatures();
        new \Simrishamn\Theme\Language();
        new \Simrishamn\Theme\Template();
    }
}
