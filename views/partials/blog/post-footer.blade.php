<footer class="post-footer">
    @if (get_field('post_show_share', get_the_id()) !== false && get_field('page_show_share', 'option') !== false && is_single())
        <div class="grid">
            <div class="grid-xs-12 grid-md-7">
                @if (get_field('post_show_author', get_the_id()) !== false)
                    @include('partials.timestamps')
                @endif
                
                @if (!empty(municipio_post_taxonomies_to_display(get_the_id())))
                    <div class="taxonomies-container">
                        @foreach (municipio_post_taxonomies_to_display(get_the_id()) as $taxonomy => $terms)
                            @include('partials.blog.post-terms')
                        @endforeach
                    </div>
                @endif
            </div>
            <div class="grid-xs-12 grid-md-5 footer-print-container">
                @include('partials.print-button')
            </div>
            <div class="grid-xs-12 share-page-container">
                <div class="box box-border gutter gutter-horizontal no-margin">
                    <div class="gutter gutter-vertical gutter-sm">
                        <div class="grid grid-table grid-va-middle no-margin no-padding">
                            <div class="grid-md-8">
                                <i class="pricon pricon-share pricon-lg" style="margin-right:5px;"></i>
                                <strong><?php _e('Share the page', 'municipio'); ?>:</strong> {{ the_title() }}
                            </div>
                            <div class="grid-md-4 text-right-md text-right-lg">
                                @include('partials.social-share')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

</footer>
