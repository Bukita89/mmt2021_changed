<?php

namespace App\Objects;

/**
 * Add Dance Style CPT
 */
add_action( 'init', function() {

    register_extended_post_type( "mmt_dancestyle", array(

        "capability_type"   => "page",
        "menu_icon"         => "dashicons-list-view",
        "menu_position"		=> 5,
        "supports" 			=> array( "title", "thumbnail" ),
        "show_in_menu"      => true,
        "has_archive"       => false,
        "public"            => true,
        "show_ui"           => true,

        "labels" => array(
            "all_items"             => "Dance Styles",
        ),

        "admin_cols"    => array( // admin posts list columns
            "title"
        ),

    ), array(

        "singular"  => "Dance Style",
        "plural"    => "Dance Styles",
        "slug"      => "dancestyles"

    ) );

});

