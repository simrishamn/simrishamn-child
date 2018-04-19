<div class="grid news-grid">
  <div class="grid-md-6">
    <a href="{{ get_permalink($featured[0]->ID) }}"
       class="box box-post-brick">
      <div class="box-image"
           style="background-image:url({{ $featured[0]->thumbnail }});">
        <img src="{{ $featured[0]->thumbnail }}"
             alt="{{ $featured[0]->post_title }}">
      </div>
    </a>
  </div>
  <div class="grid-md-6">
    <div class="grid">
      @foreach($items as $item)
	<div class="grid-md-6">
	  <a href="{{ get_permalink($item->ID) }}"
             class="box box-post-brick" style="">
	    <div class="box-image"
		 style="background-image:url({{ $item->thumbnail }});">
              <img src="{{ $item->thumbnail }}"
		   alt="{{ $item->post_title }}">
	    </div>
	  </a>
	</div>
      @endforeach
      <div class="grid-md-6">
	<div class="box box-post-brick index-content title-{{$content_color}}">
	  <div class="brick-container">
	    <p>
	      Hitta fler hyter i Nyhetsarkivet!
	      Lättast är att klicka på Gå Till knappen.
	    </p>
	    <div class="btn-holder">
	      <a class="btn btn-plain" href="{{ get_post_type_archive_link( 'post' ) }}">
          Gå Till
	      </a>
	    </div>
	  </div>
	</div>
      </div>
    </div>
  </div>
</div>
