<?php

namespace App\Objects;

/**
 * Add Team CPT
 */
add_action( 'init', function() {

    register_extended_post_type( "mmt_testimonial", array(

        "capability_type"   => "page",
        "menu_icon"         => "dashicons-groups",
        "menu_position"		=> 5,
        "supports" 			=> array( "title" ),
        "show_in_menu"      => "mmt",
        "has_archive"       => false,
        "public"            => false,
        "show_ui"           => true,

        "labels" => array(
            "all_items"             => "Testimonials",
        ),

        "admin_cols"    => array( // admin posts list columns
            "title"
        ),

    ), array(

        "singular"  => "Testimonial",
        "plural"    => "Testimonials",
        "slug"      => "testimonial"

    ) );

});
