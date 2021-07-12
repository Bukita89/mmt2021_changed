
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

                    <div class="item">

                        <div class="img-wrapper">

                            <a href="{!! get_permalink( $data['blog_featured_post'] ) !!}" class="cover-link"><span class="show-for-sr">{!! get_the_title( $data['blog_featured_post'] ) !!}</span></a>

                            @if ( $image = get_the_post_thumbnail_url( $data['blog_featured_post'] ) )
                                <img src="{!! $image !!}" alt="{!! get_the_title( $data['blog_featured_post'] ) !!}">
                            @endif

                        </div>

                        <div class="content">

                            @if ( $category = get_the_category( $data['blog_featured_post'] ) )
                                <p class="preheadline">{!! $category[0]->name !!}</p>
                            @endif

                            <h2 class="title">{!! get_the_title( $data['blog_featured_post'] ) !!}</h2>

                            <a href="{!! get_permalink( $data['blog_featured_post'] ) !!}" class="button simple arrow">Read More</a>

                        </div>

                    </div>

                </div>

            @endif

            <div class="blog-filters-wrapper">
                
                <p class="show-for-medium">Filter Categories</p>

                <div class="blog-filters">
                    <div class="facet-dropdown-wrapper show-for-small-only">
                        <div class="facetwp-facet facetwp-facet-resource_types facetwp-type-dropdown" data-name="resource_types" data-type="dropdown">
                            <select class="facetwp-dropdown">
                                <option value="">Filter Categories</option>
                                <option value="article">Article</option>
                                <option value="case-study">Case Study</option>
                                <option value="video">Video</option>
                            </select>
                        </div>
                    </div>

                    <div class="facet-radio-wrapper show-for-medium">
                        <div class="facetwp-facet facetwp-facet-resource_categories facetwp-type-radio" data-name="resource_categories" data-type="radio">
                            <div class="facetwp-radio checked" data-value="all">Nutrition <span class="facetwp-counter">(1)</span></div>
                            <div class="facetwp-radio" data-value="save-money">Workouts <span class="facetwp-counter">(2)</span></div>
                            <div class="facetwp-radio" data-value="improve-security">Health & Wellness <span class="facetwp-counter">(3)</span></div>
                        </div>
                    </div>
                </div>
            </div>

            @if ( $posts )

                <div class="grid-x grid-margin-x block-grid medium-up-2 large-up-3 align-center template-blog-items">

                    @foreach ( $posts as $item )
                        
                        <div class="cell">
                            <div class="img-wrapper">
                                <a href="#" class="cover-link"><span class="show-for-sr">blog post link</span></a>
                                <img src="" alt="">
                            </div>

                            <div class="content">
                                <p class="preheadline">{{preheadline}}</p>
                                <h4 class="title">{{title}}</h4>
                                <a href="" class="button simple arrow">Read More</a>
                            </div>
                        </div>

                    @endforeach

                </div>

                <div class="blog-pagination">
                    <button class="button-arrow prev disabled"><span class="show-for-sr">button prev</span></button>
                    <button class="blog-pagination__button active">1</button>
                    <button class="blog-pagination__button">2</button>
                    <button class="blog-pagination__button">3</button>
                    <button class="button-arrow next"><span class="show-for-sr">button next</span></button>
                </div>

            @endif

        </div>

    </section>

	@include('page-builder')

@endsection
