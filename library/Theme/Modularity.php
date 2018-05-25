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

        add_filter(
            'Modularity/Editor/SidebarIncompability',
            array($this, 'moduleIncompatibility'),
            20,
            2
        );
        add_action('edit_form_top', function ($post) {
            \Modularity\ModuleManager::$enabled = $this->modulePageRestriction();
        }, 10);

        $this->load();
    }

    public function modulePageRestriction()
    {
        $enabledModules = array();
        switch(\Modularity\Helper\Post::getPostTemplate()) {
        case "front-page":
            array_push(
                $enabledModules,
                'mod-colored-index',
                'mod-linklist',
                'mod-inlay-index',
                'mod-image',
                'mod-slider',
                'mod-action-card',
                'mod-news-list'
            );
            break;
        case "full-width.blade.php":
            array_push(
                $enabledModules,
                'mod-image',
                'mod-colored-index',
                'mod-contacts',
                'mod-linklist',
                'mod-news-list'
            );
            break;
        case "page":
            array_push(
                $enabledModules,
                'mod-contacts',
                'mod-colored-index',
                'mod-linklist',
                'mod-image',
                'mod-slider',
                'mod-form',
                'mod-iframe',
                'mod-fileslist'
            );
            break;
        case "single":
            array_push(
                $enabledModules,
                'mod-contacts',
                'mod-contacts-fixed',
                'mod-linklist',
                'mod-news-list',
                'mod-fileslist'
            );
            break;
        }
        return $enabledModules;
    }

    public function moduleIncompatibility($moduleSpecification, $modulePostType)
    {
        $template = \Modularity\Helper\Post::getPostTemplate();
        $sidebarIncompatibilities = array(
            "right-sidebar" => true,
            "content-area-top" => true,
            "content-area" => true,
            "bottom-sidebar" => true,
            "slider-area" => true
        );

        switch ($modulePostType) {
        case "mod-colored-index":
            if ($template == 'page') {
                unset(
                    $sidebarIncompatibilities['right-sidebar'],
                    $sidebarIncompatibilities['content-area']
                );
            } elseif ($template =='full-width.blade.php') {
                unset($sidebarIncompatibilities['content-area']);
            }
            break;
        case "mod-contacts":
            if ($template == 'page' || $template == 'single') {
                unset($sidebarIncompatibilities['right-sidebar']);
            } elseif ($template =='full-width.blade.php') {
                unset($sidebarIncompatibilities['content-area']);
            }
            break;
        case "mod-linklist":
            if ($template == 'page') {
                unset($sidebarIncompatibilities['right-sidebar']);
            }
            unset($sidebarIncompatibilities['content-area']);
            break;
        case "mod-image":
            if ($template == 'page') {
                unset($sidebarIncompatibilities['content-area-top']);
            } elseif ($template =='full-width.blade.php') {
                unset($sidebarIncompatibilities['slider-area']);
            }
            break;
        case "mod-slider":
            if ($template == 'page') {
                unset($sidebarIncompatibilities['content-area-top']);
            }
            break;
        case "mod-form":
            if ($template == 'page') {
                unset($sidebarIncompatibilities['content-area']);
            }
            break;
        case "mod-iframe":
            if ($template == 'page') {
                unset($sidebarIncompatibilities['content-area']);
            }
            break;
        case "mod-fileslist":
            if ($template == 'page' || $template == 'single') {
                unset($sidebarIncompatibilities['content-area']);
            }
            break;
        case "mod-posts-expand":
            if ($template == 'page') {
                unset($sidebarIncompatibilities['content-area']);
            }
            break;
        case "mod-news-list":
            if ($template == 'full-width.blade.php') {
                unset($sidebarIncompatibilities['bottom-sidebar']);
            } elseif ($template == 'single') {
                unset($sidebarIncompatibilities['right-sidebar']);
            }
            break;
        case "mod-contacts-fixed":
            if ($template == 'page' || $template == 'single') {
                unset($sidebarIncompatibilities['right-sidebar']);
            } elseif ($template == 'full-width.blade.php') {
                unset($sidebarIncompatibilities['content-area']);
            }
            break;
        }

        $moduleSpecification['sidebar_incompability'] = array_keys($sidebarIncompatibilities);
        if ($template == 'front-page') {
            $moduleSpecification['sidebar_incompability'] = array();
        }
        return $moduleSpecification;
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
