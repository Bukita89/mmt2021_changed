@if( $template['option_status'] )

    <section {!! $id !!} {!! $classes !!} >

        @if ( $instagram_url = get_field( 'instagram', 'options' ) )

            <div class="grid-container">

                <div class="instagram-feed-top">

                    @if ( $template['include_template_header'] )

                        @include('partials.template-header', [ 'headline' => $template['template_headline'], 'subheadline' => $template['template_short_description'], 'header_classes' => $template['template_text_alignment'] ] )

                    @endif

                    <button class="instagram-feed__prev slick-prev"><span class="show-for-sr">button prev</span></button>
                    <button class="instagram-feed__next slick-next"><span class="show-for-sr">button next</span></button>

                </div>

                {{-- <div class="instagram-feed-slider"> --}}

                    {!! do_shortcode( '[instagram-feed]' ); !!}

                {{-- </div> --}}

            </div>

        @endif

    </section>

@endif
