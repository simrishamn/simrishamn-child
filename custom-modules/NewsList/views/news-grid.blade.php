<div class="grid news-grid">
  <div class="grid-md-6">
    <a href="{{ get_permalink($featured_one->ID) }}" class="box box-post-brick">
      <div class="box-image" style="background-image:url({{ $featured_one->thumbnail[0] }});">
        <img src="{{ $featured_one->thumbnail[0] }}" alt="{{ $featured_one->post_title }}">
      </div>
    </a>
  </div>
  <div class="grid-md-6">
    <div class="grid">
      @foreach($items as $item)
	<div class="grid-md-6">
	  <a href="{{ get_permalink($item->ID) }}" class="box box-post-brick" style="">
	    <div class="box-image" style="background-image:url({{ $item->thumbnail[0] }});">
              <img src="{{ $item->thumbnail[0] }}" alt="{{ $item->post_title }}">
	    </div>
	  </a>
	</div>
      @endforeach
      <div class="grid-md-6">
	<div class="box box-post-brick index-content title-blue">
	  <div class="brick-container">
	    <p>Hitta fler hyter i Nyhetsarkivet! Lattast ar att klicka på ga till knappen.</p>
	    <div class="btn-holder">
	      <a class="btn btn-plain" href="{{ get_post_type_archive_link( 'post' ) }}">
		Ga Till
	      </a>
	    </div>
	  </div>
	</div>
      </div>
    </div>
  </div>
</div>
