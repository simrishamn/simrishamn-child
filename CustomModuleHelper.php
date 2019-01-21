<?php

class CustomModuleHelper
{
    
    static function slugify ($string) : string
    {
        
        $string = strip_tags($string);
        
        $string = preg_replace('~[^\pL\d]+~u', '-', $string);
        
        setlocale(LC_ALL, 'sv_SE.utf8');
        
        $string = iconv('utf-8', 'us-ascii//TRANSLIT', $string);

        $string = preg_replace('~[^-\w]+~', '', $string);

        $string = trim($string, '-');

        $string = preg_replace('~-+~', '-', $string);

        $string = strtolower($string);

        if (empty($string))
            throw new \Exception('No slug was set.');
        
        return $string;
        
    }
    
    static function translate ($string, $domain) : string
    {
        
        return __($string, $domain);
        
    }
    
}