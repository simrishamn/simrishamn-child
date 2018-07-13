<div class="grid news-list">
    @if (!$hideTitle && !empty($post_title))
        <div class="block-title">
	    <h1>{{ $post_title }}</h1>
        </div>
    @endif

    @foreach($featured as $item)
        <div class="grid-md-4 news-featured">
	    <a href="{{ get_permalink($item->ID) }}">
	        <div class="box-image">
                    <div class="box-stripe"> {{ get_the_date('j F Y', $item->ID) }} </div>
		    <img src="{{ $item->thumbnail }}" alt="{{ $item->post_title }}" />
	        </div>
	        <div class="box box-content">
		    <span class="title">
		        {{ $item->post_title }}
		    </span>
		    <p>{{ $item->post_excerpt }}</p>
	        </div>
	    </a>
        </div>
    @endforeach

    <div class="grid-md-4">
        <div class="box-panel inlay-index">
	    <div class="box-horizontal">
	        @foreach($items as $item)
		    <a href="{{ get_permalink($item->ID) }}">
		        <div class="box-content content-light-{{ $content_color }}">
			    <div>
			        <span class="title">
				    {{ get_the_date('j M', $item->ID) }} {{ $item->post_title }}
			        </span>
			        <p style="color: black;">
				    {{ $item->post_excerpt }}
			        </p>
			    </div>
		        </div>
		    </a>
	        @endforeach
	        <div class="btn-holder border-{{ $content_color }}">
		    <a class="btn btn-plain"
		       href="{{ get_post_type_archive_link( 'post' ) }}">
		        Gå till Nyhetsarkiv
		    </a>
	        </div>
	    </div>
        </div>
    </div>
</div>
