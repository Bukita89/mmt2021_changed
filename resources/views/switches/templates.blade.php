@php $column_index = 0; @endphp

@foreach( $templates as $template )

    @switch( $template['acf_fc_layout'] )

        @case('columns')

            @php

                $layout_card = ( $template['layout'] == 'layout-thin-card' ) ? ' layout-card' : '';

                $classes = $builder->getCustomClasses( "template", 'template-free-form' . $layout_card, '', $template );
                $id = $builder->getCustomID( $template );

            @endphp

            @include( 'templates.columns', [ 'classes' => $classes, 'id' => $id ] )
            @break

        @case('team')

            @php

                $classes = $builder->getCustomClasses( "template", 'template-team', '', $template );
                $id = $builder->getCustomID( $template );

            @endphp

            @include( 'templates.team', [ 'classes' => $classes, 'id' => $id ] )
            @break

        @case('dancestyle')

            @php

                $classes = $builder->getCustomClasses( "template", 'template-dancestyle', '', $template );
                $id = $builder->getCustomID( $template );

            @endphp

            @include( 'templates.dancestyle', [ 'classes' => $classes, 'id' => $id ] )
            @break

        @case('testimonials')

            @php

                $classes = $builder->getCustomClasses( "template", 'template-testimonials', '', $template );
                $id = $builder->getCustomID( $template );

            @endphp

            @include( 'templates.testimonials', [ 'classes' => $classes, 'id' => $id ] )
            @break

        @case('content-cards')

            @php

                $classes = $builder->getCustomClasses( "template", 'template-content-cards ' . $template['layout'], '', $template );
                $id = $builder->getCustomID( $template );

            @endphp

            @include( 'templates.content-cards', [ 'classes' => $classes, 'id' => $id ] )
            @break

        @case('instagram-feed')

            @php

                $classes = $builder->getCustomClasses( "template", 'template-instagram-feed', '', $template );
                $id = $builder->getCustomID( $template );

            @endphp

            @include( 'templates.instagram-feed', [ 'classes' => $classes, 'id' => $id ] )
            @break

        @case('appointment')

            @php

                $classes = $builder->getCustomClasses( "template", 'template-appointment', '', $template );
                $id = $builder->getCustomID( $template );

            @endphp

            @include( 'templates.appointment', [ 'classes' => $classes, 'id' => $id ] )
            @break

    @endswitch

@endforeach
