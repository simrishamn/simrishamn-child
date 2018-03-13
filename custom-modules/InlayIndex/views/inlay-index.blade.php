<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
<div class="{{ $classes }} inlay-index">
  <h4 class="box-title" style="background-color: {{ $title_color }};">
    {!! apply_filters('the_title', $post_title) !!} </h4>
  <div class="box box-horizontal">
    @foreach($items as $item)
      <a href="">
	<div class="box-content" style="background-color: {{ $box_color }};">
	  <div>
	    <span class="title">
	      {{ $item->post_title }}
	    </span>
	    <p style="color: black;">{{ $item->post_content }}</p>
	  </div>
	  <i class="material-icons">arrow_forward</i>
	</div>
      </a>
    @endforeach
  </div>
</div>
