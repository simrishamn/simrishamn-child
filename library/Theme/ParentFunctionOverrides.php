<?php
namespace Simrishamn\Theme;

class ParentFunctionOverrides
{
    public function __construct()
    {
        require_once dirname(__DIR__) . '/themeOverrides/municipio_get_logotype.php';
    }
}
