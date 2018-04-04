<div class="{{ $classes }} inlay-index">
  <h4 class="box-title" style="background-color: {{ $title_color }};">
    {!! apply_filters('the_title', $post_title) !!} </h4>
  <div class="box box-horizontal">
    @foreach($items as $item)
      <a href={!! get_permalink($item->ID) !!}>
	<div class="box-content" style="background-color: {{ $box_color }};">
	  <div>
	    <span class="title"> {{ $item->post_title }} </span>
	    <p style="color: black;">{{ $item->post_excerpt }}</p>
	  </div>
	</div>
      </a>
    @endforeach
  </div>
</div>
