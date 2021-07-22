@if( $template['option_status'] )

	<section {!! $id !!} {!! $classes !!}>

        @if( !empty( $template['modules'] ) )

            <div class="grid-container">

				@if ( $template['include_template_header'] )

					@include('partials.template-header', [ 'headline' => $template['template_headline'], 'subheadline' => $template['template_short_description'], 'header_classes' => $template['template_text_alignment'] ] )

				@endif

				<div class="grid-x grid-margin-x has-1-cols {!! "align-" . $template['option_x_alignment'] !!}">

					<div class="cell medium-12">

						<div class="inner">

							@if( !empty( $template['modules'] ) )

								@include( 'switches.modules', [ 'modules' => $template['modules'] ] )

							@endif

						</div>

					</div>

				</div>

            </div>

        @endif

    </section>

@endif
