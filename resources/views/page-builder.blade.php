@if( !post_password_required() )

    @if( $data['inner_headline'] )

        @php

            $args = array(
				"option_html_classes" => $data['option_html_classes'],
				"option_html_id" => $data['option_html_id'],
			);

            $classes = $builder->getCustomClasses( 'hero-unit', '', '', $args );
            $id = $builder->getCustomID( $args );
        
        @endphp

        @include( 'templates.hero-unit', [
            'classes'   => $classes, 
            'id'        => $id, 
            'headline'  => $data['inner_headline'], 
            'subheadline'     => $data['inner_short_description'],
            'show_down_arrow' => $data['inner_show_down_arrow'],
            'include_overlay_lines' => $data['inner_include_overlay']
        ])

    @endif

	@if( $data['templates'] )

		@include( 'switches.templates', ['templates' => $data['templates'] ] )

    @endif
    
@else 

    @include( 'partials.password-form' )

@endif