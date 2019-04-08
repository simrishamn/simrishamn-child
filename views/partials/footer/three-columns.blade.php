{{-- ## Logotype begin ## --}}
@if (get_field('footer_logotype_vertical_position', 'option') == 'top' || !get_field('footer_logotype_vertical_position', 'option'))
    @if (get_field('footer_logotype', 'option') != 'hide')
        <div class="logo-container">
            {!! municipio_get_logotype('standard') !!}
        </div>
    @endif
@endif

{{-- ## Contact fields ## --}}
<div class="grid-lg-5">
    <h3>{{ $footerData['contact']['label'] }}</h3>
    <div class="grid">
        @foreach($footerData['contact'] as $item)
            @if(is_array($item))
                <div class="grid-lg-6 contact-box">
                    <h4>{{ $item['label'] }}</h4>
                    @if(is_array($item['value']))
                        @foreach($item['value'] as $subitem)
                            @if($subitem['link'])
                                <a href="{{ $subitem['link']['url'] }}" target="{{ $subitem['link']['target'] }}">{{ $subitem['link']['title'] }}</a>
                                <br />
                            @elseif($subitem['row'])
                                <p>{{ $subitem['row'] }}</p>
                            @endif
                        @endforeach
                    @elseif($item['type'] == 'email')
                        <a href="mailto:{{ $item['value'] }}">{{ $item['value'] }}</a>
                    @else
                        {{ $item['value'] }}
                    @endif
                </div>
            @endif
        @endforeach
    </div>
</div>

{{-- ## Link fields ## --}}
<div class="grid-lg-4">
    <h3>{{ $footerData['links']['label'] }}</h3>
    <div class="grid">
        @foreach($footerData['links'] as $item)
            @if(!is_string($item) && is_array($item['value']))
                <div class="grid-lg-6 contact-box">
                    <h4>{{ $item['label'] }}</h4>
                    @if(is_array($item['value']))
                        @foreach($item['value'] as $subitem)
                            @if($subitem['link'])
                                <a href="{{ $subitem['link']['url'] }}" target="{{ $subitem['link']['target'] }}">{{ $subitem['link']['title'] }}</a>
                                <br />
                            @elseif($subitem['row'])
                                <p>{{ $subitem['row'] }}</p>
                            @endif
                        @endforeach
                    @else
                        {{ $item['value'] }}
                    @endif
                </div>
            @endif
        @endforeach
    </div>

    {{-- ## Social icons ## --}}
    @if (have_rows('footer_icons_repeater', 'option'))
    <div class="grid social-box">
        <h3>{{ __('Follow us in social media', 'simrishamn') }}</h3>
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
</div>
