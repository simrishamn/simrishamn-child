<div class="box box-panel">
  @if (!$hideTitle && !empty($post_title))
    <h4 class="box-title title-{{ $color }}">{!! apply_filters('the_title', $post_title) !!}</h4>
  @endif
  <ul class="nav">
    @foreach ($items as $item)
      <li class="content-{{ $color }}">
        <a href="{{ $item['url'] }}">
          <span class="link-item link-item-outbound title">{{ $item['title'] }}</span>
        </a>
      </li>
    @endforeach
  </ul>
</div>
