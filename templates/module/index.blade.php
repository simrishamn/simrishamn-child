<div class="grid" data-equal-container>
    @if (!$hideTitle && !empty($post_title))
    <div class="grid-xs-12">
        <h2>{!! apply_filters('the_title', $post_title) !!}</h2>
    </div>
    @endif

    @foreach ($items as $item)
      <div class="{{ $columnClass }}" id="{{ $item['title'] }}">
        <div>
	  <h4 class="box-title">{{ $item['title'] }}</h4>
	  <div class="box-content">
            {!! $item['lead'] !!}
	    <a href="{{ $item['permalink'] }}" class="btn btn-plain">
	      Läs Mer
	    </a>
	  </div>
        </div>
    </div>
    @endforeach
</div>
