@extends('layouts.app')

@section('content')

	@php $post_id = get_the_ID(); @endphp

	<section class="content-block template-single-post">

		<div class="grid-container">

			@if ( $blog_page_id = array_shift( get_pages( array( 'meta_key' => '_wp_page_template', 'meta_value' => 'template-blog-page.blade.php' ) ) )->ID )
				<a href="{!! get_permalink( $blog_page_id ) !!}" class="back-to-blog">Back to blog</a>
			@endif

			<div class="grid-x grid-margin-x align-center template-single-post-stacked">

				<div class="item">

					@if ( $image = get_the_post_thumbnail_url( $post_id ) )
						<div class="img-wrapper"><img src="{!! $image !!}" alt="{!! get_the_title( $post_id ) !!}"></div>
					@endif

					<div class="content">

						@if ( $category = get_the_category( $data['blog_featured_post'] ) )
							<p class="preheadline">{!! implode( ', ', array_column( $category, 'name' ) ) !!}</p>
						@endif

						<h2 class="title">{!! get_the_title( $post_id ) !!}</h2>

					</div>

				</div>

			</div>

			<div class="grid-x grid-margin-x single-post-content">

				<div class="module text-editor">

					{!! the_content(); !!}

				</div>

			</div>

		</div>

	</section>

@endsection