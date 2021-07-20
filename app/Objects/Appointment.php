<?php

namespace App\Objects;

/**
 * Add Appointment CPT
 */
add_action( 'init', function() {

    register_extended_post_type( "mmt_appointment", array(

        "capability_type"   => "page",
        "menu_icon"         => "dashicons-list-view",
        "menu_position"		=> 5,
        "supports" 			=> array( "title" ),
        "show_in_menu"      => "edit.php?post_type=mmt_service",
        "has_archive"       => false,
        "public"            => false,
        "show_ui"           => true,

        "labels"            => array(
            "all_items"     => "Appointments",
        ),

        "admin_cols"    => array( // admin posts list columns
            "title"
        ),

    ), array(

        "singular"  => "Appointment",
        "plural"    => "Appointments",
        "slug"      => "appointment"

    ) );

});

