<?php

namespace Simrishamn\Theme;

class Modularity
{
    private $path = SIMRISHAMN_PATH . '/custom-modules';

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
        switch (\Modularity\Helper\Post::getPostTemplate()) {
            case "front-page":
                array_push(
                    $enabledModules,
                    'mod-colored-index',
                    'mod-linklist',
                    'mod-inlay-index',
                    'mod-image',
                    'mod-slider',
                    'mod-video',
                    'mod-action-card',
                    'mod-news-list',
                    'mod-inlaylist',
                    'mod-contacts',
                    'mod-posts'
                );
                break;
            case "full-width.blade.php":
                array_push(
                    $enabledModules,
                    'mod-image',
                    'mod-colored-index',
                    'mod-contacts',
                    'mod-linklist',
                    'mod-news-list',
                    'mod-inlay-index',
                    'mod-index'
                );
                break;
            case "page":
                array_push(
                    $enabledModules,
                    'mod-contacts',
                    'mod-colored-index',
                    'mod-inlaylist',
                    'mod-image',
                    'mod-slider',
                    'mod-video',
                    'mod-form',
                    'mod-iframe',
                    'mod-fileslist',
                    'mod-inlay-index',
                    'mod-posts',
                    'mod-table',
                    'mod-index'
                );
                break;
            case "single":
                array_push(
                    $enabledModules,
                    'mod-contacts',
                    'mod-inlaylist',
                    'mod-news-list',
                    'mod-fileslist',
                    'mod-posts'
                );
                break;
            case "archive-post":
                array_push(
                    $enabledModules,
                    'mod-wpwidget'
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
            case "mod-table":
                if ($template == 'page') {
                    unset(
                        $sidebarIncompatibilities['content-area']
                    );
                }
                break;
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
            case "mod-index":
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
            case "mod-inlaylist":
                if ($template == 'page') {
                    unset($sidebarIncompatibilities['right-sidebar']);
                    unset($sidebarIncompatibilities['content-area']);
                } elseif ($template == 'front-page') {
                    unset($sidebarIncompatibilities['bottom-sidebar']);
                } elseif ($template == 'single') {
                    unset($sidebarIncompatibilities['content-area']);
                }
                break;
            case "mod-linklist":
                unset($sidebarIncompatibilities['content-area']);
                if ($template == 'front-page') {
                    unset($sidebarIncompatibilities['content-area']);
                }
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
                } elseif ($template == 'full-width.blade.php') {
                    unset($sidebarIncompatibilities['slider-area']);
                }
                break;
            case "mod-video":
                if ($template == 'page') {
                    unset($sidebarIncompatibilities['content-area-top']);
                } elseif ($template == 'full-width.blade.php') {
                    unset($sidebarIncompatibilities['slider-area']);
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
            case "mod-posts":
                if ($template == 'page') {
                    unset($sidebarIncompatibilities['content-area']);
                } elseif ($template == 'single') {
                    unset($sidebarIncompatibilities['right-sidebar']);
                }
                break;
            case "mod-news-list":
                if ($template == 'full-width.blade.php') {
                    unset($sidebarIncompatibilities['bottom-sidebar']);
                } elseif ($template == 'single') {
                    unset($sidebarIncompatibilities['content-area']);
                } elseif ($template == 'front-page') {
                    unset($sidebarIncompatibilities['content-area']);
                }
                break;
            case "mod-inlay-index":
                if ($template == 'page') {
                    unset($sidebarIncompatibilities['right-sidebar']);
                } elseif ($template == 'full-width.blade.php') {
                    unset($sidebarIncompatibilities['content-area']);
                } elseif ($template == 'front-page') {
                    unset($sidebarIncompatibilities['content-area-top']);
                }
                break;
            case "mod-actioncard":
                if ($template == 'front-page') {
                    unset($sidebarIncompatibilities['content-area-top']);
                }
                break;
            case "mod-wpwidget":
                if ($template == 'archive-post') {
                    unset($sidebarIncompatibilities['right-sidebar']);
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
        foreach (glob($this->path . '/*') as $module) {
            modularity_register_module($module, basename($module));
        }
    }
}
