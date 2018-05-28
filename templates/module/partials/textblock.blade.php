<span class="text-block
	     {{ isset($slide['textblock_position']) &&
		$slide['textblock_position'] == 'center' ? 'text-block-center' : '' }}
	     {{ isset($slide['textblock_title']) &&
		strlen($slide['textblock_title']) > 0 ||
		isset($slide['textblock_content']) &&
		strlen($slide['textblock_content']) > 0  ? '' : 'text-block-transparent' }}">
    @if (is_front_page())
	<div class="">
	    <img src="http://dev.simrishamn.se/wp-content/uploads/2018/05/sim_text_white_backed-1368x416.png"
		 alt=""
		 class="block-level image-responsive"/>
	</div>
    @endif
    <span>
        @if (isset($slide['textblock_title']) && strlen($slide['textblock_title']) > 0)
            <em class="title text-xl block-level">{!! do_shortcode($slide['textblock_title']) !!}</em>
        @endif

        @if (isset($slide['textblock_content']) && strlen($slide['textblock_content']) > 0)
            {!! do_shortcode($slide['textblock_content']) !!}
       @endif
    </span>
</span>
