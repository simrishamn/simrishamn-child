<div class="{{ $classes }}">
  <h4 class="box-title" style="background-color: {{ $title_color }};">
    {!! apply_filters('the_title', $post_title) !!} </h4>
  <div class="box box-horizontal">
    @foreach($items as $item)
      <div class="box-content" style="background-color: {{ $box_color }};">
	<a href="">
	  <span class="title">
	    {{ $item->post_title }}
	  </span>
	  <p style="color: black;">{{ $item->post_content }}</p>
	</a>
      </div>
    @endforeach
  </div>
</div>
