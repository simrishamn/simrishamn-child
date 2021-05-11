<?php
namespace Simrishamn\Theme;

class WordpressAdminConfig
{
    public function __construct()
    {
        $this->disableSiteHealthStatus();
    }

    private function disableSiteHealthStatus() {
        add_filter( 'wp_fatal_error_handler_enabled', '__return_false' );
        add_action( 'wp_dashboard_setup', function () {
            remove_meta_box( 'dashboard_site_health', 'dashboard', 'normal' );
        });
        add_action( 'admin_menu', function () {
            remove_submenu_page( 'tools.php','site-health.php' );
        });
    }
}
