<?php

namespace App\Objects;

/**
 * Add Service CPT
 */
add_action( 'init', function() {

    register_extended_post_type( "mmt_service", array(

        "capability_type"   => "page",
        "menu_icon"         => "dashicons-list-view",
        "menu_position"		=> 5,
        "supports" 			=> array( "title", "thumbnail" ),
        "show_in_menu"      => true,
        "has_archive"       => false,
        "public"            => true,
        "show_ui"           => true,

        "labels" => array(
            "all_items"             => "Services",
        ),

        "admin_cols"    => array( // admin posts list columns
            "title"
        ),

    ), array(

        "singular"  => "Service",
        "plural"    => "Services",
        "slug"      => "service"

    ) );

});

