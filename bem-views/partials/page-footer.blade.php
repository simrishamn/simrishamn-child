@php do_action('customer-feedback'); @endphp

<footer class="page-footer">
    <div class="grid">
	@if($hideTimestamps)
	    <div class="grid-xs-12 grid-md-12 footer-print-container">
		@include('partials.print-button')
            </div>
	@else
	    <div class="grid-xs-12 grid-md-7 timestamps-container">
		@include('partials.timestamps')
            </div>
	    <div class="grid-xs-12 grid-md-5 footer-print-container">
		@include('partials.print-button')
            </div>
	@endif

        @if (get_field('post_show_share', get_the_id()) !== false && get_field('page_show_share', 'option') !== false)
        <div class="grid-xs-12 share-page-container">
            <div class="box box-border gutter gutter-horizontal no-margin hidden-print">
                <div class="gutter gutter-vertical gutter-sm">
                    <div class="grid grid-table grid-va-middle no-margin no-padding">
                        <div class="grid-md-8">
                            <i class="pricon pricon-share pricon-lg" style="margin-right:5px;"></i> <strong>{{ __('Share the page', 'municipio') }}:</strong> {{ the_title() }}
                        </div>
                        <div class="grid-md-4 text-right-md text-right-lg">
                            @include('partials.social-share')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</footer>
