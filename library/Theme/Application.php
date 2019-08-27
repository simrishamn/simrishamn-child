<?php
namespace Simrishamn\Theme;

class Application
{
    public function __construct()
    {
        new AdminBar();
        new Customizer();
        new DefaultModules();
        new Enqueue();
        new Language();
        new AcfFields();
        new Modularity();
        new Style();
        new Template();
        new TinyMCE();
        new GlobalNotice();
        new Recaptcha();
    }
}
