@extends('templates.master')

@section('content')
    @if (is_active_sidebar('content-area'))
        <section id="main-content" class="creamy creamy-border-bottom gutter-xl gutter-vertical sidebar-content-area">
            <div class="container">
                <div class="grid">
                    @php dynamic_sidebar('content-area'); @endphp
                </div>
            </div>
        </section>
    @endif
@stop
