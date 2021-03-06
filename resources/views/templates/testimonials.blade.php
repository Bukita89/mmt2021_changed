@if( $template['option_status'] )

    <section {!! $id !!} {!! $classes !!} >

        @if ( $testimonials = $template['testimonials_to_show'] )

            <div class="grid-container">

                <div class="testimonials-top">

                    @if ( $template['include_template_header'] )

                        @include('partials.template-header', [ 'headline' => $template['template_headline'], 'subheadline' => $template['template_short_description'], 'header_classes' => $template['template_text_alignment'] ] )

                    @endif

                    <button class="testimonials__prev slick-prev"><span class="show-for-sr">button prev</span></button>
                    <button class="testimonials__next slick-next"><span class="show-for-sr">button next</span></button>

                </div>

                <div class="template-testimonials-slider">

                    @foreach ( $testimonials as $testimonial_id )

                        <div class="item">

                            @if ( $quote = get_field( 'testimonial_quote', $testimonial_id  ) )
                                <p class="review">{!! '“' . trim( strip_tags( $quote ) ) . '”' !!}</p>
                            @endif

                            @if ( $citation_name = get_field( 'testimonial_citation_name', $testimonial_id  ) )
                                <p class="name">{!! $citation_name !!}</p>
                            @endif

                        </div>

                    @endforeach

                </div>

            </div>

        @endif

    </section>

@endif
