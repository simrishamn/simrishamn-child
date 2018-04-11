<div class="grid">
  <div class="grid-md-4 box">
    <div>
      {{ $thumb_one }}
    </div>
    <div>
      {{ $featured_one->post_title }}
    </div>
  </div>

  <div class="grid-md-4 box">
    <img width="1920" height="1080"
	 src=""
	 class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt=""
    />
    <div>
      {{ $featured_two->post_title }}
    </div>
  </div>

  <div class="grid-md-4">
    <div class="box box-panel inlay-index">
      <div class="box box-horizontal">
	@foreach($items as $item)
	  <a href="">
	    <div class="box-content content-{{ $content_color }}">
	      <div>
		<span class="title">
		  {{ $item->post_title }}
		</span>
		<p style="color: black;">{{ $item->post_excerpt }}</p>
	      </div>
	    </div>
	  </a>
	@endforeach
	<button>Go to Archive</button>
      </div>
    </div>
  </div>
</div>
