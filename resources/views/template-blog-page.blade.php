
{{--
  Template Name: Blog Page
  Template Post Type: page
--}}

@extends('layouts.app')

@section('content')

    <section class="content-block template-blog">

        <div class="grid-container">

            @if ( $data['blog_featured_post'] )

                <div class="grid-x grid-margin-x align-center template-blog-stacked">

                    <div class="item cell">

                        <div class="img-wrapper">

                            <a href="{!! get_permalink( $data['blog_featured_post'] ) !!}" class="cover-link"><span class="show-for-sr">{!! get_the_title( $data['blog_featured_post'] ) !!}</span></a>

                            @if ( $image = get_the_post_thumbnail_url( $data['blog_featured_post'] ) )
                                <img src="{!! $image !!}" alt="{!! get_the_title( $data['blog_featured_post'] ) !!}">
                            @endif

                        </div>

                        <div class="content">

                            @if ( $category = get_the_category( $data['blog_featured_post'] ) )
                                <p class="preheadline">{!! implode( ', ', array_column( $category, 'name' ) ) !!}</p>
                            @endif

                            <h2 class="title">{!! get_the_title( $data['blog_featured_post'] ) !!}</h2>

                            <a href="{!! get_permalink( $data['blog_featured_post'] ) !!}" class="button simple arrow">Read More</a>

                        </div>

                    </div>

                </div>

            @endif

            @if ( class_exists('FacetWP') )

                <div class="blog-filters-wrapper">

                    <p class="show-for-medium">Filter Categories</p>

                    <div class="blog-filters">

                        <div class="facet-dropdown-wrapper show-for-small-only">

                            {!! facetwp_display( 'facet', 'mobile_post_categories' ) !!}

                        </div>

                        <div class="facet-radio-wrapper show-for-medium">

                            {!! facetwp_display( 'facet', 'post_categories' ) !!}

                        </div>

                    </div>

                </div>

            @endif

            @php

                $args = array(
                    'post_type' => 'post',
                    'numberposts' => 6,
                    'status' 	=> 'publish',
                    'fields'    => 'ids',
                    'facetwp'   => true,
                );

                $posts = get_posts( $args );

            @endphp

            @if ( !empty( $posts ) )

                <div class="grid-x grid-margin-x block-grid medium-up-2 large-up-3 align-center template-blog-items facetwp-template">

                    @foreach ( $posts as $post_id )

                        <div class="cell">

                            <div class="img-wrapper">

                                <a href="{!! get_permalink( $post_id ) !!}" class="cover-link"><span class="show-for-sr">blog post link</span></a>

                                @if ( $image = get_the_post_thumbnail_url( $post_id ) )
                                    <img src="{!! $image !!}" alt="{!! get_the_title( $post_id ) !!}">
                                @endif

                            </div>

                            <div class="content">

                                @if ( $category = get_the_category( $data['blog_featured_post'] ) )
                                    <p class="preheadline">{!! implode( ', ', array_column( $category, 'name' ) ) !!}</p>
                                @endif

                                <h4 class="title">{!! get_the_title( $post_id ) !!}</h4>

                                <a href="{!! get_permalink( $post_id ) !!}" class="button simple arrow">Read More</a>

                            </div>

                        </div>

                    @endforeach

                </div>

                <div class="blog-pagination">

                    {!! facetwp_display( 'facet', 'pagination' ) !!}

                </div>

            @else

                <p class="text-center">Sorry, no posts were found.</p>

            @endif

        </div>

    </section>

	@include('page-builder')

@endsection
