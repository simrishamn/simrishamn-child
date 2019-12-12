<ul>
    @foreach ($page["sub_pages"] as $page)
        <li><a href="{{ $page["uri"] }}">{{ $page["title"] }}</a></li>
        @if ($page["has_sub_pages"])
            @include('partials.sub-page-list')
        @endif
    @endforeach
</ul>
