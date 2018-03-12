<div class="grid" data-equal-container>
    @foreach ($items as $item)
    <div class="{{ $columnClass }}">
      <a href="{{ $item['permalink'] }}" class="{{ $classes }}" data-equal-item>
        <div class="box-content">
	  {!! $item['icon'] !!}
          <h5 class="box-action-title">{{ $item['title'] }}</h5>
        </div>
      </a>
    </div>
    @endforeach
</div>
