@if( $template['option_status'] )

    <section {!! $id !!} {!! $classes !!}>

        <div class="grid-container">

            @if ( $template['include_template_header'] )

                @include('partials.template-header', [ 'headline' => $template['template_headline'], 'subheadline' => $template['template_short_description'], 'header_classes' => $template['template_text_alignment'] ] )

            @endif

            @php
                
                switch ( $template['data_source'] ) {

                    case 'none':
                        $card_items = $template['items'];
                        break;
                    case 'pages':
                        $card_items = $template['pages'];
                        $page_id_slug = 'page_id';
                        break;
                    case 'services':
                        $card_items = $template['services'];
                        $page_id_slug = 'service_id';
                        break;
                }
                
            @endphp

            @if ( !empty( $card_items ) )

                @if ( $template['data_source'] != 'none' )
                
                    <div class="grid-x grid-margin-x align-center {!! ( $template['layout'] == 'layout-grid' ) ? 'block-grid medium-up-2 large-up-3 template-cards-content-grid' : 'template-cards-content-stacked' !!}">

                        @foreach ( $card_items as $item )

                            @if ( $page_id = $item[$page_id_slug] )
                            
                                <div class="{!! ( $template['layout'] == 'layout-grid' ) ? 'cell' : 'item' !!}">

                                    <div class="img-wrapper">

                                        <a href="{!! get_permalink( $page_id ) !!}" class="cover-link"><span class="show-for-sr">{!! get_the_title( $page_id ) !!}</span></a>

                                        @if ( $template['data_source'] == 'pages' && $item['image'] )

                                            @php $image_url = ( $template['layout'] == 'layout-grid' ) ? $item['image']['sizes']['content-cards-grid-image'] : $item['image']['url']; @endphp

                                            <img src="{!! $image_url !!}" alt="{!! get_the_title( $page_id ) !!}">

                                        @elseif( ( $template['data_source'] == 'services' ) && ( !empty( get_the_post_thumbnail_url( $page_id ) ) ) )

                                            @php $image_url = ( $template['layout'] == 'layout-grid' ) ? get_the_post_thumbnail_url( $page_id, 'content-cards-grid-image' ) : get_the_post_thumbnail_url( $page_id ); @endphp

                                            <img src="{!! $image_url !!}" alt="{!! get_the_title( $page_id ) !!}">

                                        @endif

                                    </div>

                                    <div class="content">
                                        
                                        <h4 class="title">{!! get_the_title( $page_id ) !!}</h4>

                                        @if ( $description = get_field( 'inner_short_description', $page_id ) )
                                            <p class="description">{!! strip_tags( $description ) !!}</p>
                                        @endif

                                        @php $button_type = ( $item['button_type'] == 'default' ) ? 'large' : 'simple arrow'; @endphp

                                        @if ( $item['button_label'] )
                                            <a href="{!! get_permalink( $page_id ) !!}" class="button {!! $button_type !!}">{!! $item['button_label'] !!}</a>
                                        @endif

                                    </div>

                                </div>

                            @endif

                        @endforeach

                    </div>

                @elseif( $template['data_source'] == 'none' && $template['items'] )

                    <div class="grid-x grid-margin-x align-center {!! ( $template['layout'] == 'layout-grid' ) ? 'block-grid medium-up-2 large-up-3 template-cards-content-grid' : 'template-cards-content-stacked' !!}">

                        @foreach ( $template['items']  as $item )
                            
                            <div class="{!! ( $template['layout'] == 'layout-grid' ) ? 'cell' : 'item' !!}">

                                <div class="img-wrapper">

                                    @if ( $button_url = ( $item['include_button'] && $item['button_source'] == 'internal' ) ? get_permalink( $item['button_page_id'] ) : $item['button_url'] )
                                        <a href="{!! $button_url !!}" class="cover-link"><span class="show-for-sr">{!! $item['title'] !!}</span></a>
                                    @endif

                                    @if ( $item['image'] )

                                        @php $image_url = ( $template['layout'] == 'layout-grid' ) ? $item['image']['sizes']['content-cards-grid-image'] : $item['image']['url']; @endphp

                                        <img src="{!! $image_url !!}" alt="{!! $item['image']['alt'] !!}">

                                    @endif

                                </div>

                                <div class="content">
                                    
                                    @if ( $item['title'] )
                                        <h4 class="title">{!! $item['title'] !!}</h4>
                                    @endif

                                    @if ( $item['short_description'] )
                                        <p class="description">{!! strip_tags( $item['short_description'] ) !!}</p>
                                    @endif

                                    @if ( $item['include_button'] && $item['button_label'] )

                                        @php $button_type = ( $template['layout'] == 'layout-grid' ) ? 'simple arrow' : 'large'; @endphp

                                        @if ( $item['button_source'] == 'internal' && $item['button_page_id'] )

                                            <a class="button {!! $button_type !!}" href="{!! get_permalink( $item['button_page_id'] ) !!}" target="{!! $item['option_button_target'] !!}">{!! $item['button_label'] !!}</a>

                                        @elseif ( $item['button_source'] == 'external' && $item['button_url'] )

                                            <a class="button {!! $button_type !!}" href="{!! $item['button_url'] !!}" target="{!! $item['option_button_target'] !!}">{!! $item['button_label'] !!}</a>

                                        @endif

                                    @endif

                                </div>

                            </div>

                        @endforeach

                    </div>

                @endif

            @endif

        </div>

    </section>

@endif
