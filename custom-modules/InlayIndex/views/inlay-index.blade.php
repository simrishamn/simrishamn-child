<div class="{{ $classes }} inlay-index">
  <h4 class="box-title" style="background-color: {{ $title_color }};">
    {!! apply_filters('the_title', $post_title) !!}n </h4>
  <div class="box box-horizontal" style="margin-bottom: 5px;">
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
  <div class="btn-holder" style="
    border-color: {{ $box_color }};
    background-color: {{ $box_color }};
    margin-top: 0px;
  ">
      <a class="btn btn-plain"
	    href="{{ get_post_type_archive_link( $post_type ) }}"
	    style="background-color: {{ $box_color }}; font-size: 1em;">
	      + Visa fler servicemeddelanden
      </a>
  </div>
</div>
