<div class="grid news-grid">
    @if (!$hideTitle && !empty($post_title))
        <div class="block-title"> <h1> {{ $post_title }} </h1> </div>
    @endif
    <div class="grid-md-6">
        <a href="{{ get_permalink($featured[0]->ID) }}"
           class="box box-post-brick news-grid-featured">
            <div class="box-image"
                 style="background-image:url({{ $featured[0]->thumbnail }});">
                <div class="box-stripe">
                    {{ $featured[0]->category }}
                </div>
                <img src="{{ $featured[0]->thumbnail }}"
                     alt="{{ $featured[0]->post_title }}">
                <div class="grid-item-content">
                    <h6 class="">{{ $featured[0]->post_title }}</h6>
                    {{ $featured[0]->post_excerpt }}
                </div>
            </div>
        </a>
    </div>
    <div class="grid-md-6">
        <div class="grid">
            @foreach($items as $item)
                <div class="grid-md-6">
                    <a href="{{ get_permalink($item->ID) }}"
                       class="box box-post-brick" style="">
                        <div class="box-image"
                             style="background-image:url({{ $item->thumbnail }});">
                            <div class="box-stripe">
                                {{ $item->category }}
                            </div>
                            <img src="{{ $item->thumbnail }}"
                                 alt="{{ $item->post_title }}">
                            <div class="grid-item-content">
                                <h6>{{ $item->post_title }}</h6>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
            <div class="grid-md-6">
                <div class="box box-post-brick index-content title-{{$content_color}}">
                    <div class="brick-container">
                        <p>
                            Klicka på Visa mer för att komma till Nyhetsarkivet!
                        </p>
                        <div>
                            <a class="btn btn-plain" href="{{ get_post_type_archive_link( 'post' ) }}">
                                Visa mer
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
