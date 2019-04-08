@if (is_active_sidebar('bottom-sidebar'))
    <div class="sidebar-bottom-fullwidth">
        @php dynamic_sidebar('bottom-sidebar'); @endphp
    </div>
@endif

<div class="footer-container">
<section class="color-bars">
    <div class="color-1"></div>
    <div class="color-2"></div>
    <div class="color-3"></div>
    <div class="color-4"></div>
</section>
<footer class="main-footer hidden-print {{ get_field('scroll_elevator_enabled', 'option') ? 'scroll-elevator-toggle' : '' }}">
    <div class="container">

        @if (get_field('footer_logotype_vertical_position', 'option') == 'bottom')
        <div class="grid">
            <div class="grid-sm-12">
                <nav>
                    <ul class="nav nav-help nav-horizontal">
                        {!!
                            wp_nav_menu(array(
                                'theme_location' => 'help-menu',
                                'container' => false,
                                'container_class' => 'menu-{menu-slug}-container',
                                'container_id' => '',
                                'menu_class' => '',
                                'menu_id' => 'help-menu-top',
                                'echo' => false,
                                'before' => '',
                                'after' => '',
                                'link_before' => '',
                                'link_after' => '',
                                'items_wrap' => '%3$s',
                                'depth' => 1,
                                'fallback_cb' => '__return_false'
                            ));
                        !!}
                    </ul>
                </nav>
            </div>
        </div>
        @endif

        <div class="grid">
            <div class="{{ get_field('footer_signature_show', 'option') ? 'grid-md-10' : 'grid-md-12' }}">
                <nav class="{{ !get_field('footer_signature_show', 'option') ? 'pull-right' : '' }}">
                    <ul class="nav nav-help nav-horizontal">
                        {!!
                            wp_nav_menu(array(
                            'theme_location' => 'help-menu',
                            'container' => false,
                            'container_class' => 'menu-{menu-slug}-container',
                            'container_id' => '',
                            'menu_class' => '',
                            'menu_id' => 'help-menu-top',
                            'echo' => false,
                            'before' => '',
                            'after' => '',
                            'link_before' => '',
                            'link_after' => '',
                            'items_wrap' => '%3$s',
                            'depth' => 1,
                            'fallback_cb' => '__return_false'
                            ));
                        !!}
                    </ul>
                </nav>
		    </div>
        </div>

        {{-- ## Footer widget area begin ## --}}
        <div class="grid sidebar-footer-area">

            @if ($footerData['columns'] == 4)
                @include('partials.footer.four-columns')
            @else
                @include('partials.footer.three-columns')
            @endif

        </div>

    </div>

</div>


<script type="text/javascript">
// Script som integrerar siteimprove

/*<![CDATA[*/
(function() {
var sz = document.createElement('script'); sz.type = 'text/javascript'; sz.async = true;
sz.src = '//siteimproveanalytics.com/js/siteanalyze_7828.js';
var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(sz, s);
})();
/*]]>*/
</script>

</footer>
</div>
