<?php
namespace Simrishamn;

class App
{
    public function __construct()
    {
        new \Simrishamn\Theme\Enqueue();
    }
}
