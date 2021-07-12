<footer class="site-footer" role="contentinfo">

    <div class="grid-container">

        <div class="grid-x grid-margin-x">

            <div class="cell small-12">

                <div class="text-center d-flex align-items-center align-justify footer-content">

					@php wp_nav_menu( $builder->getMenuArgs('footer_navigation') ); @endphp

                    <ul class="footer-society">

						@if ( $facebook = get_field('facebook', 'options') )
							<li><a target="_blank" href="{{ $facebook }}"><img src="@asset('images/facebook-logo.svg')" class="editable-svg" alt="Facebook"><span class="show-for-sr">facebook</span></a></li>
						@endif

						@if ( $instagram = get_field('instagram', 'options') )
							<li><a target="_blank" href="{{ $instagram }}"><img src="@asset('images/instagram-logo.svg')" class="editable-svg" alt="Instagram"><span class="show-for-sr">instagram</span></a></li>
						@endif

                    </ul>

                </div>

            </div>

        </div>

    </div>

</footer>