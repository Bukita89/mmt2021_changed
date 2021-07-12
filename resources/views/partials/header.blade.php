<header class="site-header">

    <div class="grid-container navbar">

        <div class="grid-x grid-margin-x align-middle align-{!! $alignment = $is_landing_page ? 'center' : ''; !!}">

            <div class="brand cell shrink" role="banner">

				@php $link = $is_landing_page ? false : true; @endphp

				@if ($link)
					<a href="{{home_url()}}">
				@endif

					@if ( $logo = get_field( 'brand_logo', 'options' ) )
						<img src="{{ $logo['url'] }}" alt="{{ $logo['alt'] }}" class="editable-svg">
					@else
						<span class="site-title">{{ $siteName }}</span>
					@endif

				@if($link)
					</a>
				@endif

            </div>
			
			@if ( !$is_landing_page && has_nav_menu('primary_navigation') )

				<nav class="primary-navigation cell shrink grid-x align-middle" role="navigation">

					@php wp_nav_menu( $builder->getMenuArgs('primary_navigation') ); @endphp
						
					@include( 'partials.hamburger' )

				</nav>

			@endif

        </div>

    </div>

</header>