@extends('templates.master')

@section('content')
<div class="container main-container">
    @include('partials.breadcrumbs')
    <div class="grid {{ implode(' ', apply_filters('Municipio/Page/MainGrid/Classes', wp_get_post_parent_id(get_the_id()) != 0 ? array('no-margin-top') : array())) }}">
        <div class="grid-md-12 grid-print-12" id="readspeaker-read">
            <article class="clearfix">
                <h1>Webbkarta</h1>
                <ul class="page-hierarchy">
                    @foreach ($pages as $page)
                        <li>
                            <a href="{{ $page["uri"] }}">{{ $page["title"] }}</a>
                            @if ($page["has_sub_pages"])
                                @include('partials.sub-page-list')
                            @endif
                        </li>
                    @endforeach
                </ul>
                @include('partials.accessibility-menu')
            </article>
            <div class="hidden-xs hidden-sm hidden-md hidden-print">
                @include('partials.page-footer')
            </div>
        </div>
    </div>
</div>
@stop
