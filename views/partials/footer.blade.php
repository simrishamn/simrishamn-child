@if (is_active_sidebar('bottom-sidebar'))
  <?php dynamic_sidebar('bottom-sidebar'); ?>
@endif

<!--
     fixme: i don't know if it's worth putting too much work into this
     color bar above the footer, but i'm sure it can be done much better.

     The SASS for this is in 'layout/footer.scss'.
-->
<section class="color-bars">
  <div style="background-color: #44711B;"></div>
  <div style="background-color: #F2943F;"></div>
  <div style="background-color: #036AB3;"></div>
  <div style="background-color: #E20714;"></div>
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

            {{-- ## Footer header befin ## --}}
            @if (get_field('footer_logotype_vertical_position', 'option') == 'top' || !get_field('footer_logotype_vertical_position', 'option'))
              <div class="grid">
		<div class="grid-md-12">
		  @if (get_field('footer_logotype', 'option') != 'hide')
		    {!! municipio_get_logotype(get_field('footer_logotype', 'option'), false, true, false, false) !!}
		  @endif

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
                @endif
                {{-- ## Footer header end ## --}}

                {{-- ## Footer widget area begin ## --}}
                <div class="grid sidebar-footer-area">
		  <div class="grid-lg-4">
		    <div class="contact-box">
		      <h4>Telefonnummer</h4>
		      <p>0414-81 90 00</p>
		    </div>

		    <div class="contact-box">
		      <h4>E-post</h4>
		      <p>simrishamns.kommun@simrishamn.se</p>
		    </div>

		    <div class="contact-box">
		      <h4>Öppettider</h4>
		      <p>Måndag-Fredag kl. 08.00-16.30</p>
		    </div>
		  </div>

		  <div class="grid-lg-4">
		    <div class="contact-box">
		      <h4>Postadress</h4>
		      <p>Simrishamns kommun, 272 80 Simrishamn</p>
		    </div>

		    <div class="contact-box">
		      <h4>Besöksadress</h4>
		      <p>Stadshuset, Stortorget, Simrishamn</p>
		    </div>

		    <div class="contact-box">
		      <h4>Om Webbplatsen</h4>
		      <p>A-Ö</p>
		      <p>Webbkarta</p>
		    </div>
		  </div>
		  <div class="grid-lg-4">
		    <div class="contact-box">
		      <h4>Länkar</h4>
		      <p>Turism</p>
		      <p>Bibliotek</p>
		      <p>Marincentrum.se</p>
		      <p>Österlensmuseum.se</p>
		    </div>
		  </div>
                </div>
                {{-- ## Footer widget area end ## --}}

                {{-- ## Footer header begin ## --}}

                {{-- ## Footer header end ## --}}
            </div>

            {{-- ## Footer signature ## --}}

        </div>
    </div>

    {{-- ## Social icons ## --}}
    @if (have_rows('footer_icons_repeater', 'option'))
    <div class="container">
        <div class="grid">
            <div class="grid-xs-12">
                <ul class="icons-list">
                    @foreach(get_field('footer_icons_repeater', 'option') as $link)
                        <li>
                            <a href="{{ $link['link_url'] }}" target="_blank" class="link-item-light">
                                {!! $link['link_icon'] !!}

                                @if (isset($link['link_title']))
                                <span class="sr-only">{{ $link['link_title'] }}</span>
                                @endif
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    @endif
</footer>
