<section {!! $id !!} {!! $classes !!} {!! $style !!}>

    @if ( is_front_page() && $bg_image )

        <div class="overlay hero-image">

            <div class="overlay hero-lines">
                <img src="@asset('images/hero-line-1.svg')" alt="Hero Lines">
            </div>

            <img class="exclude-lazyload" src="{!! $bg_image['sizes']['home-hero-unit-image'] !!}" alt="{!! $bg_image['alt'] !!}">

        </div>

    @elseif( !is_front_page() && $include_overlay_lines )

        <div class="overlay hero-overlay-lines">

            <img src="@asset('images/hero-line-2.svg')" alt="Hero Lines">

        </div>

    @endif

    <div class="grid-container">

        <div class="hero-unit-content">

            @if ( $headline )
                <h1 class="headline">{!! $headline !!}</h1>
            @endif

            @if ( $subheadline )
                <h2 class="subheadline">{!! $subheadline !!}</h2>
            @endif

            @if ( $description )
                <div class="hero-unit-text">{!! $description !!}</div>
            @endif

            @if ( $button && $button['button_label'] )

                @if ( $button['button_source'] == 'internal' && $button['button_page_id'] )

					<a class="button" href="{!! get_permalink( $button['button_page_id'] ) !!}" target="{!! $button['option_button_target'] !!}">{!! $button['button_label'] !!}</a>

				@elseif ( $button['button_source'] == 'external' && $button['button_url'] )

					<a class="button" href="{!! $button['button_url'] !!}" target="{!! $button['option_button_target'] !!}">{!! $button['button_label'] !!}</a>

				@endif

            @endif

        </div>

    </div>

    @if ( $show_down_arrow ) 
        <button class="hero-button-to-bottom"><span class="show-for-sr">to bottom</span></button>
    @endif

</section>