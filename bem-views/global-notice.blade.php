@extends('templates.master')
@section('content')

<div class="container main-container">
    @include('partials.breadcrumbs')

    <div class="grid {{ implode(' ', apply_filters('Municipio/Page/MainGrid/Classes', wp_get_post_parent_id(get_the_id()) != 0 ? array('no-margin-top') : array())) }}">
        <div class="grid-md-12 grid-print-12" id="readspeaker-read">

            @if($notice['active'])
		<article class="clearfix">
		    <h1>Krismeddelande</h1>
		    <h5>{{ $notice['title'] }}</h5>

		    {!! $notice['text'] !!}

		    @include('partials.accessibility-menu')
		</article>
            @endif
        </div>
    </div>

    <div class="grid">
        <div class="grid-sm-12">
            @include('partials.page-footer')
        </div>
    </div>
</div>
@stop
