@if( $template['option_status'] )

    <section {!! $id !!} {!! $classes !!}>

        <div class="grid-container">

            @if ( $template['include_template_header'] )

                @include('partials.template-header', [ 'headline' => $template['template_headline'], 'subheadline' => $template['template_short_description'] ] )

            @endif

            @if ( $template['choose_appointment'] )
                
                {!! get_field( 'appointment_html_editor', $template['choose_appointment'] ) !!}

            @endif

        </div>

    </section>

@endif
