<header class="template-header {!! $headline_size !!}{!! $header_classes !!}">

    @if ( $headline )
        <h2 class="headline">{!! $headline !!}</h2>
    @endif

    @if ( $subheadline )
        <div class="subheadline">{!! $subheadline !!}</div>
    @endif

</header>

