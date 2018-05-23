<div class="grid" data-equal-container>
  @foreach($items as $item)
    <div class="{{$columnClass}}">
      <div class="box box-panel index-info">
        <div class="index-content title-{{$item['color']}}">
          <p>{{ $item['lead'] }}</p>
          <div class="btn-holder">
            <a href={{ $item['link_url'] }} class="btn btn-plain">{{$item['btn-text']}}</a>
          </div>
        </div>
      </div>
    </div>
  @endforeach
</div>
