<?php

/**
 * SSM Theme Boilerplate
 */

namespace App;

/**
 * Add Required Plugins
 */
add_filter( 'sober/bundle/file', function () {
    return get_template_directory( __FILE__ ) . '/config/json/required-plugins.json';
});

/**
 * Add SSM menu item
 */
add_action( 'admin_menu', function () {

    add_menu_page(
        "Momenta",
        "Momenta",
        "manage_options",
        "mmt",
        "",
        "dashicons-layout",
        5
    );

});

/**
 * Remove first SSM submenu item
 */
add_action( 'admin_menu', function () {
    remove_submenu_page("mmt", "mmt");
}, 99);

/**
 * Create SSM Menu sub items
 */
add_action( 'init', function() {

    if( class_exists("acf") ) {

        // Add Brand Settings Page
        acf_add_options_sub_page( array(
            "page_title" => "Brand Settings",
            "menu_title" => "Brand Settings",
            "parent_slug" => "mmt",
		));

    }

});

/**
 * Assign custom Page Post States
 */
add_filter( 'display_post_states', function( $post_states, $post ) {

    if( get_page_template_slug( $post ) == 'template-landing-page.blade.php' ) {
        $post_states[] = 'Landing Page';
    }

    if( get_page_template_slug( $post ) == 'template-blog-page.blade.php' ) {
        $post_states[] = 'Blog Page';
    }

    return $post_states;

 }, 10, 2 );

/*
* Append the template name to the label of a layout builder template
*/
add_filter('acf/fields/flexible_content/layout_title/name=templates', function( $title, $field, $layout, $i ) {

    $label = $layout['label'];

    if ( $admin_label = get_sub_field("option_section_label") ) {
        $label = stripslashes( $admin_label ) . " - " . $label;
    }

    if ( get_sub_field("option_status") == false ) {
        $label = "<span class=\"template-inactive\">Inactive</span> - " . $label;
    }

    return $label;

}, 999, 4 );

/**
 * Register Objects
 */
foreach ( glob( get_template_directory( __FILE__ ) . '/app/Objects/*.php') as $file) {
	require_once( $file );
}

/**
 * Register ACF
 */
foreach( glob( get_template_directory( __FILE__ ) . '/app/Fields/*', GLOB_ONLYDIR ) as $dir ) {

	$namespace = last( explode( "/", $dir ) ); // "Objects"

	if( count(scandir($dir)) > 2 ) {

		foreach ( glob( $dir . '/*.php' ) as $file) {

			$filename = basename( $file, '.php' ); // "Team"
			$class = "App\\Fields\\{$namespace}\\{$filename}"; // "App\Fields\Objects\Team"

			$$filename = new $class(); // $Team = new App\Fields\Objects\Team

		}

	}

}

/*
* Remove Yoast Seo Columns
*/
add_filter( 'manage_edit-page_columns', __NAMESPACE__ . '\\remove_yoast_columns');
add_filter( 'manage_edit-post_columns', __NAMESPACE__ . '\\remove_yoast_columns');

function remove_yoast_columns( $columns ) {

    unset( $columns['wpseo-score-readability'] );
    unset( $columns['wpseo-score'] );
    unset( $columns['wpseo-title'] );
    unset( $columns['wpseo-metadesc'] );
    unset( $columns['wpseo-focuskw'] );
    unset( $columns['wpseo-links']);
    unset( $columns['wpseo-linked']);

    return $columns;

}
