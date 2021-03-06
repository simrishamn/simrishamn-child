@php
    $title = apply_filters('Municipio/pageTitle', wp_title('|', false, 'right') . get_bloginfo('name'));
@endphp
<!DOCTYPE html>
<html {!! $languageAttributes !!}>
    <head>
        <meta property="og:title" content="{!! $title !!}" />
        <meta property="og:type" content="website" />
        <meta property="og:url" content="{{ the_permalink() }}" />
        @if(has_post_thumbnail())
            <meta property="og:image" content="{{ get_the_post_thumbnail_url() }}" />
        @endif
        <meta http-equiv="X-UA-Compatible" content="IE=EDGE">

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

        <title>{{ $title }}</title>

        <link rel="apple-touch-icon" sizes="152x152" href="{{ get_stylesheet_directory_uri() }}/assets/images/favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ get_stylesheet_directory_uri() }}/assets/images/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ get_stylesheet_directory_uri() }}/assets/images/favicon/favicon-16x16.png">
        <link rel="manifest" href="{{ get_stylesheet_directory_uri() }}/assets/docs/site.webmanifest">
        <link rel="mask-icon" href="{{ get_stylesheet_directory_uri() }}/assets/images/favicon/safari-pinned-tab.svg" color="#0069b4">
        <meta name="msapplication-config" content="{{ get_stylesheet_directory_uri() }}/assets/docs/browserconfig.xml">
        <meta name="msapplication-TileColor" content="#0069b4">
        <meta name="theme-color" content="#0069b4">

        <meta name="description" content="{{ bloginfo('description') }}" />
        <meta name="pubdate" content="{{ the_time('Y-m-d') }}">
        <meta name="moddate" content="{{ the_modified_time('Y-m-d') }}">

        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="format-detection" content="telephone=yes">
        <meta name="HandheldFriendly" content="true" />
        @if (defined('GOOGLE_SITE_VERIFICATION'))
            <meta name="google-site-verification" content="{{ GOOGLE_SITE_VERIFICATION }}" />
        @endif
        <script>
            var ajaxurl = '{!! apply_filters('Municipio/ajax_url_in_head', admin_url('admin-ajax.php')) !!}';
        </script>

        <!--[if lt IE 9]>
            <script type="text/javascript">
            document.createElement('header');
            document.createElement('nav');
            document.createElement('section');
            document.createElement('article');
            document.createElement('aside');
            document.createElement('footer');
            document.createElement('hgroup');
            </script>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <![endif]-->

        {!! wp_head() !!}
    </head>
    <body class="{{ $bodyClass }} {!! body_class('no-js') !!}">
        <!--[if lt IE 9]>
            <div class="notice info browserupgrade">
            <div class="container">
            <div class="grid-table grid-va-middle">
            <div class="grid-fit-content">
            <i class="fa fa-plug"></i>
            </div>
            <div class="grid-auto">
            <strong>Du använder en gammal webbläsare.</strong> För att hemsidan ska fungera så bra som möjligt bör du byta till en modernare webbläsare. På <a href="http://browsehappy.com">browsehappy.com</a> kan du få hjälp att hitta en ny modern webbläsare.
            </div>
            </div>
            </div>
            </div>
        <![endif]-->
        <div id="wrapper">

        {{-- Site header --}}
        @section('header')
            @if (isset($headerLayout['template']))
                @includeIf('partials.header.' . $headerLayout['template'])
            @endif
        @show

        @include('partials.translate-modal')

        <main class="clearfix main-content" role="main" id="main-content">
            @yield('content')

            @if (is_active_sidebar('content-area-bottom'))
            @if(is_front_page())
                <section class="gutter-xl gutter-vertical sidebar-content-area-bottom clear-below">
            @else
                <section class="gutter-xl gutter-vertical sidebar-content-area-bottom">
            @endif
                <div class="grid" id="content-area-bottom">
                    @php dynamic_sidebar('content-area-bottom'); @endphp
                </div>
            </section>
            @endif
        </main>

            @include('partials.footer')

            @if (isset($fab['menu']))
                @include('partials.fixed-action-bar')
            @endif

            @include('partials.vertical-menu')

        </div>
        @if(get_field('scroll_elevator'))
        <div class="sticky-scroll-elevator">
            <a href="#main-content">
            <i></i>
            <span>Till toppen</span>
            </a>
        </div>
        @endif

        {!! wp_footer() !!}

    </body>
</html>
