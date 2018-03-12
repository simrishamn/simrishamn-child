<div class="{{ $classes }}">
  <h4 class="box-title" style="background-color: {{ $color }}">{!! apply_filters('the_title', $post_title) !!}</h4>
  <div class="box box-news box-horizontal">
    @foreach($items as $item)
      <div class="box-content">
	<h3 style="color: black;">{{ $item->post_title }}</h3>
	<p style="color: black;">{{ $item->post_content }}</p>
      </div>
    @endforeach
  </div>
</div>
