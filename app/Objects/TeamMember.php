<?php

namespace App\Objects;

/**
 * Add Team CPT
 */
add_action( 'init', function() {

    register_extended_post_type( "mmt_team_member", array(

        "capability_type"   => "page",
        "menu_icon"         => "dashicons-groups",
        "menu_position"		=> 5,
        "supports" 			=> array( "title" ),
        "show_in_menu"      => "mmt",
        "has_archive"       => false,
        "public"            => false,
        "show_ui"           => true,

        "labels" => array(
            "all_items"             => "Team",
        ),

        "admin_cols"    => array( // admin posts list columns
            "default_team_headshot" => array(
                'title'          => "Headshot",
                'featured_image' => 'thumbnail',
                'function'   => function() {
                    echo ( $default_team_headshot = ( get_field( 'team_headshot', get_the_ID() ) ) ) ? '<img height="100" src="' . $default_team_headshot['url'] . '" />' : '<div class="custom-dash">—</div>' ;
                }
            ),
            "title"
        ),

    ), array(

        "singular"  => "Team Member",
        "plural"    => "Team",
        "slug"      => "team"

    ) );

});

/**
 * Move Thumbnail column for Team Member CPT
 */
add_filter( 'manage_mmt_team_member_posts_columns', function( $columns ) {

    unset($columns["title"]);

    $new_columns = array_slice($columns, 0, 2, true) + array("title" => "Title") + array_slice($columns, 2, count($columns) - 1, true);

    return $new_columns;

}, 99, 1);
