@extends('layouts.app')

@section('content')

@php $post_id = get_the_ID(); @endphp

	<section class="content-block template-single-post">

		<div class="grid-container">
			<div class="dancestyle-header">
				@if ( $img = get_field( 'dance_image', $post_id ) )
					<div class="img-wrapper"><img src="{!! $img['url'] !!}" alt="{!! $img['alt'] !!}"></div>
				@endif
				<h2 class="title">{!! get_the_title( $post_id ) !!}</h2>
			</div>
			<div class="dancestyle-info">
				@if ( $dance_description = get_field( 'dance_description', $post_id ) )
					<p class="description">{!! $dance_description !!}</p>
				@endif
			</div>
			<div class="template-team-slider trainers">
				@if( $related_team = get_field('related_team', $post_id) )
					@foreach ($related_team as $related_team_member) 
					<div class="item">
						@if ( $img = get_field( 'team_headshot', $related_team_member -> ID ) )
							<div class="img-wrapper"><img src="{!! $img['url'] !!}" alt="{!! $img['alt'] !!}"></div>
						@endif

						@if ( $name = get_the_title( $related_team_member -> ID ))
							<p class="name">{!! $name !!}</p>
						@endif

						@if ( $specialization = get_field( 'team_specialization', $related_team_member -> ID ) )
							<p class="description">{!! $specialization !!}</p>
						@endif
					</div>
					@endforeach
				@endif
			</div>



		</div>

	</section>

@endsection