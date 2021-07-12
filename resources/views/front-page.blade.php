@extends('layouts.app')

@section('content')

	@if( $data['home_headline'] )

        @php

            $args = array(
				"option_html_classes" => $data['option_html_classes'],
				"option_html_id" => $data['option_html_id'],
			);

			$bg_image_class = ( !empty( $data['home_headline'] ) ) ? 'bg-image' : '';

            $classes = $builder->getCustomClasses( 'hero-unit', $bg_image_class, '', $args );
            $id = $builder->getCustomID( $args );
        
        @endphp

        @include( 'templates.hero-unit', [
			'classes' 	=> $classes, 
			'id' 		=> $id, 'style' => $style, 
			'headline' 	=> $data['home_headline'], 
			'subheadline' => $data['home_subheadline'],
			'bg_image' 	  => $data['home_front_image'],
			'button'	  => $data['home_button'],
		] )

    @endif

	@include('page-builder')
	
@endsection