<div class="grid teaser-wrapper" data-equal-container>
    @foreach($items as $item)
        <div class="{{$columnClass}} teaser-block">
            <a href={{ $item['link_url'] }}>
                <div class="box box-panel">
                    <div class="index-content title-{{$item['color']}}">
                        <div class="teaser-content">
                            <img src="{{$item['image']}}"/>

                        <h4 class="">
                            {{$item['title']}}
                        </h4>
                        <p>{{ $item['lead'] }}</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    @endforeach
</div>
