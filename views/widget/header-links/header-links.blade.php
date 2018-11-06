@if (is_array($links) && !empty($links))
@extends('widget.header-widget')
    @section('widget')
        <ul class="c-navbar c-navbar--header-widget-links {{$themeClass}}">
            @foreach ($links as $link)
                @if ($link['acf_fc_layout'] == 'search_trigger')
                    {{ ${$link['attributes'] = ' id="nav-search"'} }}
                @endif
                <li class="c-navbar__item">
                    @if (isset($link['template']) && $link['template'])
                        @include($link['template'])
                    @else
                        @if (isset($link['url']))
                            <a class="{{$link['classes']}}" {!!$link['attributes']!!} href="{{$link['url']}}" aria-label="{{$link['text']}}">
                                @if (isset($link['beforeText'])){!! $link['beforeText'] !!}@endif
                                @if (isset($link['hide_text']) && $link['hide_text'])<span class="hidden">@endif
                                    {{$link['text']}}
                                @if (isset($link['hide_text']) && $link['hide_text'])</span>@endif
                                @if (isset($link['afterText'])){!! $link['beforeText'] !!}@endif
                            </a>
                        @endif
                    @endif
                </li>
            @endforeach
        </ul>
    @stop
@endif
