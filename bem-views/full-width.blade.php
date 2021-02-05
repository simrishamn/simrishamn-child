@extends('templates.master')

@section('content')
    <div class="container main-container section-page">
        <div class="grid {{ implode(' ', apply_filters(
                            'Municipio/Page/MainGrid/Classes',
                            wp_get_post_parent_id(get_the_id()) != 0 ? array('no-margin-top') : array()))
                         }}">

            @include('partials.breadcrumbs')
            @include('partials.sidebar-left')

            <div class="grid-md-8 grid-print-12" id="readspeaker-read">
                <div class="content">
                @while(have_posts())
                        {!! the_post() !!}
                        <h1>{{ the_title() }}</h1>
                    @endwhile
                </div>

                @if (is_active_sidebar('content-area'))
                    <div class="grid sidebar-content-area sidebar-content-area-bottom">
                        @php dynamic_sidebar('content-area'); @endphp
                    </div>
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
