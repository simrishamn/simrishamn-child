@if (is_active_sidebar('bottom-sidebar'))
  <div class="sidebar-bottom-fullwidth">
    <?php dynamic_sidebar('bottom-sidebar'); ?>
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
                
            {{-- ## Footer header begin ## --}}
        @if (get_field('footer_logotype_vertical_position', 'option') == 'top' || !get_field('footer_logotype_vertical_position', 'option'))
		  @if (get_field('footer_logotype', 'option') != 'hide')
		  <div class="grid-lg-3">
		    {!! municipio_get_logotype(get_field('footer_logotype', 'option'), false, true, false, false) !!}
		    </div>
		  @endif 
		  @endif
          <div class="grid-lg-6">
          <h3> {{ $footerData['contact']['label'] }} </h3>
          <div class="grid">
          @foreach($footerData['contact'] as $item)
              @if(!is_string($item))
              <div class="grid-lg-6 contact-box">
                <h4> {{ $item['label'] }} </h4>
                @if(is_array($item['value']))
					@foreach($item['value'] as $subitem)
					    @if($subitem['link'])
						<a href="{{ $subitem['link']['url'] }}"
						   target="{{ $subitem['link']['target'] }}">
						    {{ $subitem['link']['title'] }}
						</a>
					    </br>
					    @elseif($subitem['row'])
					    <p> {{ $subitem['row'] }} </p>
					    @endif
					@endforeach
				    @else
					{{ $item['value'] }}
				    @endif
				    </div>
                    @endif
                    
            @endforeach
            </div>
            </div>
            <div class="grid-lg-3">
            <h3> {{ $footerData['links']['label'] }} </h3>
            <div class="grid-lg-6 contact-box">
            @foreach($footerData['links'] as $item)
                @if(!is_string($item))
                <div class="contact-box">
                    <h4> {{ $item['label'] }} </h4>
                    @if(is_array($item['value']))
					@foreach($item['value'] as $subitem)
					    @if($subitem['link'])
						<a href="{{ $subitem['link']['url'] }}"
						   target="{{ $subitem['link']['target'] }}">
						    {{ $subitem['link']['title'] }}
						</a>
					    </br>
					    @elseif($subitem['row'])
					    <p> {{ $subitem['row'] }} </p>
					    @endif
					@endforeach
				    @else
					{{ $item['value'] }}
				    @endif
				    </div>
                    @endif
            @endforeach
            </div>
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
</div>
