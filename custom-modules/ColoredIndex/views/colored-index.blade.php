<div class="grid" data-equal-container>
    @foreach($items as $item)
	<div class="{{$columnClass}}">
	    <div class="box box-panel">
		<div class="index-content content-{{$item['color']}}">
		    <h4 class="box-title title-{{$item['color']}}">
			{{$item['title']}}
		    </h4>
		    <p>{{ $item['lead'] }}</p>
		    <div>
			<a href={{ $item['link_url'] }} class="btn btn-plain">
			    {{$item['btn-text']}}
			</a>
		    </div>
		</div>
	    </div>
	</div>
    @endforeach
</div>
