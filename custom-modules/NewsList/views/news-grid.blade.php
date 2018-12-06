<div class="grid news-grid">
    @if (!$hideTitle && !empty($post_title))
        <div class="block-title"> <h1> {{ $post_title }} </h1> </div>
    @endif
    <div class="grid-md-6">
        <a href="{{ get_permalink($featured[0]->ID) }}"
           class="box box-post-brick news-grid-featured">
            <div class="box-image"
                 style="background-image:url({{ get_the_post_thumbnail_url(
                                                $featured[0]->ID,
                                                'large'
                                                )}});">
                <div class="box-stripe">
                    {{ $featured[0]->category }}
                </div>
                <div class="grid-item-content">
                    <h6 class="">{{ $featured[0]->post_title }}</h6>
                    <p class="post-excerpt-container">
                    {{ $featured[0]->post_excerpt }}
                    </p>
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
                             style="background-image:url({{ get_the_post_thumbnail_url(
                                                            $item->ID,
                                                            'large'
                                                            )}});">
                            <div class="box-stripe">
                                {{ $item->category }}
                            </div>
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
                        <div class="call-to-action">
                            <p>
                                Klicka på visa mer för att komma till nyhetsarkivet!
                            </p>
                        </div>
                        <div class="news-archive-button">
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
