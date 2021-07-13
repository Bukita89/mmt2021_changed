<div {!! $id !!} {!! $classes !!}>

    <button class="images-carousel__prev slick-prev"><span class="show-for-sr">button prev</span></button>
    <button class="images-carousel__next slick-next"><span class="show-for-sr">button next</span></button>

    @if ( $module['gallery'] )
        
        <div class="images-carousel">

            @foreach ( $module['gallery'] as $image )
                    
                <div class="carousel-item"><img src="{!! $image['url'] !!}" alt="{!! $image['alt'] !!}"></div>

            @endforeach

        </div>

    @endif

</div>
