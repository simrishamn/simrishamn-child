<?php

class CustomModuleHelper
{
    
    const DOMAIN        = 'simrishamn';
    const MODULE_FOLDER = SIMRISHAMN_PATH . '/custom-modules/';
    
    /**
     * Initialize the Module
     *
     * @param string $object Current Class object
     * @return object The module settings
     */
    public static function setModule ($object) : object
    {
        
        if (!$object)
            throw new \Exception('No object was found.');
        
        $obj = new stdClass;
        
        $obj->moduleName    = self::moduleName($object);
        
        $obj->slug          = self::kebabcase($obj->moduleName);
        $obj->fields        = self::fields($obj->moduleName);
        
        $obj->nameSingular  = self::translate($object->nameSingular);
        $obj->namePlural    = self::translate($object->namePlural);
        $obj->description   = self::translate($object->description);
        
        return $obj;
        
    }
    
    /**
     * Current Class name
     *
     * @param string $object Current Class object
     * @return string The module name
     */
    public static function moduleName ($object) : string
    {
        
        return (new \ReflectionClass($object))->getShortName();
        
    }
    
    /**
     * Creates a slugified kebabcase string
     *
     * @param string $string The string to be converted
     * @return string The converted string
     */
    public static function kebabcase ($string) : string
    {
        
        $string = strip_tags($string);
        
        $string = preg_replace('~[^\pL\d]+~u', '-', $string);
        
        setlocale(LC_ALL, 'sv_SE.utf8');
        
        $string = iconv('utf-8', 'us-ascii//TRANSLIT', $string);

        $string = preg_replace('~[^-\w]+~', '', $string);

        $string = trim($string, '-');

        $string = preg_replace('~-+~', '-', $string);
        
        $string = preg_replace(['/([a-z\d])([A-Z])/', '/([^-])([A-Z][a-z])/'], '$1-$2', $string);
        
        $string = strtolower($string);

        if (empty($string))
            throw new \Exception('No slug was set.');
        
        return $string;
        
    }
    
    /**
     * Translate via WordPress __() function
     *
     * @param string $string The string to be translated
     * @return string The translated string
     */
    public static function translate ($string) : string
    {
        
        return __($string, self::DOMAIN);
        
    }
    
    /**
     * The full url to the fields php-file
     *
     * @param string $moduleName Current module name
     * @param mixed $customModuleName Set custom filename, always prefixed with mod-
     * @return string The php-file url
     */
    public static function fields ($moduleName, $customModuleModName = false) : string
    {
        
        if($customModuleModName)
            $moduleModName = $customModuleModName;
        else
            $moduleModName = self::kebabcase($moduleName);
        
        return self::MODULE_FOLDER . $moduleName . '/acf/php/mod-' . $moduleModName . '.php';
        
    }
    
    /**
     * Module classes
     *
     * @param array $classes Desired classes to set
     * @param object $object Current Class object
     * @return string The classes in a string
     */
    public static function classes ($classes, $object) : string
    {
        
        return implode(' ', apply_filters('Modularity/Module/Classes', $classes, $object->post_type, $object->args));
        
    }
    
}