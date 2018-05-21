<div class="grid" data-equal-container>
    @foreach($items as $item)
	<div class="{{$columnClass}} box-panel">
	    <div class="index-content content-{{$item['color']}}">
		<h4 class="box-title title-{{$item['color']}}">{{$item['title']}}</h4>
		@if($item['image-p'])
		    <div>
			<img src="{{$item['image']}}" style="max-height: 165px; max-width: 300px;"/>
		    </div>
		@endif
		<p>{{ $item['lead'] }}</p>
		<div class="btn-holder">
		    <a href={{ $item['link_url'] }} class="btn btn-plain">{{$item['btn-text']}}</a>
		</div>
	    </div>
	</div>
    @endforeach
</div>
