<?php

namespace Simrishamn\Theme;

class Modularity
{
    private $_path = SIMRISHAMN_PATH . '/custom-modules';

    /**
     * Constructor.
     */
    public function __construct()
    {
        if (!$this->isActive()) {
            return;
        }

        $this->load();
    }

    /**
     * Checks if Modularity is active.
     *
     * @return bool
     */
    public function isActive()
    {
        return function_exists('modularity_register_module');
    }

    /**
     * Loads modularity modules.
     *
     * @return void
     */
    public function load()
    {
        foreach (glob($this->_path . '/*') as $module) {
            modularity_register_module($module, basename($module));
        }
    }
}
