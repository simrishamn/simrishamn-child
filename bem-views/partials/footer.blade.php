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

            @if ($footerData['presentedBy'])
                <div class="presented-by">
                    <small>{{ $footerData['presentedBy'] }}</small>
                </div>
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


<style>

      /* The Modal (background) */
      .modal1 {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        padding-top: 100px; /* Location of the box */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
      }
      main.clearfix.main-content {
    position: relative;
    z-index: 0;
}
      /* Modal Content */
      .modal-content1 {
        background-color: #fefefe;
        margin: auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
      }

      /* The Close Button */
      .close1 {
        color: #aaaaaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
      }

      .close1:hover,
      .close1:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
      }
      select.goog-te-combo {
    padding: 5px !important;
    display: inline-block;
    width: auto;
    background-color: #ffff!important;
    border: 1px solid !important;
    box-shadow: none;
}

    </style>




    <script>
      // Get the modal
      var modal = document.getElementById("myModal1");

      // Get the button that opens the modal
      var btn = document.getElementById("myBtn");

      // Get the <span> element that closes the modal
      var span = document.getElementsByClassName("close1")[0];

      // When the user clicks the button, open the modal
      btn.onclick = function() {
        modal.style.display = "block";
      }

      // When the user clicks on <span> (x), close the modal
      span.onclick = function() {
        modal.style.display = "none";
      }

      // When the user clicks anywhere outside of the modal, close it
      window.onclick = function(event) {
        if (event.target == modal) {
          modal.style.display = "none";
        }
      }
    </script>



</footer>
</div>
