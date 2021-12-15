@if( $template['option_status'] )

    <section {!! $id !!} {!! $classes !!}>

        @if ( $dancestyle = $template['dance_styles_to_show'] )

            <div class="grid-container">

                <div class="dancestyle-top">

                    @if ( $template['include_template_header'] )

                        @include('partials.template-header', [ 'headline' => $template['template_headline'], 'subheadline' => $template['template_short_description'], 'header_classes' => $template['template_text_alignment'] ] )

                    @endif

                   

                </div>


                    @foreach ( $dancestyle as $dancestyle_id )

                        <div class="item">

                            @if ( $img = get_field( 'dance_image', $dancestyle_id ) )
                                <div class="img-wrapper"><img src="{!! $img['url'] !!}" alt="{!! $img['alt'] !!}"></div>
                            @endif

                            @if ( $name = get_the_title( $dancestyle_id ))
                                <p class="name"><a href="{!! get_permalink($dancestyle_id) !!}">{!! $name !!}</a></p>
                            @endif

                            @if ( $dance_description = get_field( 'dance_description', $dancestyle_id ) )
                                <p class="description">{!! $dance_description !!}</p>
                            @endif

                        </div>

                    @endforeach


            </div>

        @endif

    </section>

@endif
