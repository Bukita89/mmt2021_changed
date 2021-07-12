@if( $template['option_status'] )

    <section {!! $id !!} {!! $classes !!} >

        @if ( $team = $template['team_members_to_show'] )

            <div class="grid-container">

                <div class="team-top">

                @if ( $template['include_template_header'] )

                @include('partials.template-header', [
                    'headline'  	=> $template['template_headline'],
                    'subheadline'   => $template['template_short_description'],
                ])

                @endif

                    <button class="team__prev slick-prev"><span class="show-for-sr">button prev</span></button>
                    <button class="team__next slick-next"><span class="show-for-sr">button next</span></button>

                </div>

                <div class="template-team-slider">

                    @foreach ($team as $item_id)

                        <div class="item">

                            @if ( $img = get_field( 'team_headshot', $item_id ) )
                                <div class="img-wrapper"><img src="{!! $img['url'] !!}" alt="{!! $img['alt'] !!}"></div>
                            @endif

                            @if ( $name = get_the_title( $item_id ))
                                <p class="name">{!! $name !!}</p>
                            @endif

                            @if ( $description = get_field( 'team_specialization', $item_id ) )
                                <p class="description">{!! $description !!}</p>
                            @endif

                        </div>

                    @endforeach

                </div>

            </div>

        @endif

    </section>

@endif
