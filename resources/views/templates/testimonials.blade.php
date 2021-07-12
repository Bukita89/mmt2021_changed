@if( $template['option_status'] )

    <section {!! $id !!} {!! $classes !!} >

        @if ( $testimonials = $template['testimonials_to_show'] )

            <div class="grid-container">

                <div class="testimonials-top">

                    @if ( $template['include_template_header'] )

                    @include('partials.template-header', [
                        'headline'  	=> $template['template_headline'],
                        'subheadline'   => $template['template_short_description'],
                    ])

                    @endif

                    <button class="testimonials__prev slick-prev"><span class="show-for-sr">button prev</span></button>
                    <button class="testimonials__next slick-next"><span class="show-for-sr">button next</span></button>

                </div>

                <div class="template-testimonials-slider">

                    @foreach ( $testimonials as $item_id )

                        <div class="item">

                            @if ( $quote = get_field( 'testimonial_quote', $item_id  ))
                                <p class="review">{!! strip_tags($quote) !!}</p>
                            @endif

                            @if ( $name = get_field( 'testimonial_citation_name', $item_id  ))
                                <p class="name">{!! $name !!}</p>
                            @endif

                        </div>

                    @endforeach

                </div>

            </div>

        @endif

    </section>

@endif
