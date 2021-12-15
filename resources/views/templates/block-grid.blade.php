@if( $template['option_status'] )

	<section {!! $id !!} {!! $classes !!}>


            <div class="grid-container">

				@if ( $template['include_template_header'] )

					@include('partials.template-header', [ 'headline' => $template['template_headline'], 'subheadline' => $template['template_short_description'], 'header_classes' => $template['template_text_alignment'] ] )

				@endif


                
                @if($items = $template['block_grid_items'])
                    @foreach ($items as $item)
                        @if ( $block_grid_icon = $item[ 'block_grid_icon'] )
                            <div class="img-wrapper"><img src="{!! $block_grid_icon['url'] !!}" alt="{!! $block_grid_icon['alt'] !!}"></div>
                        @endif

                        @if ( $block_grid_title = $item[ 'block_grid_title'])
                                <h3 class="title">{!! $block_grid_title !!}</h3>
                        @endif

                        @if ( $text_editor = $item[ 'text_editor'])
                                <p class="text">{!! $text_editor !!}</p>
                        @endif

                    @endforeach


                @endif






            </div>



    </section>

@endif
