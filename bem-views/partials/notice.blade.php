<div class="notice danger notice-md global-notice">
    <div class="grid grid-table-md grid-va-middle no-margin no-padding">
        <h5>{!! $notice['title'] !!}</h5>
    </div>
    <span> {!! $notice['excerpt'] !!} </span>
    <br>
    <a href="{{ $notice['url'] }}">
        {{$notice['linkText']}}
    </a>

</div>
