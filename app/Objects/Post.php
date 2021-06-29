<?php

namespace App\Objects;

/**
 *  Remove post tags support
 */
add_action( 'init', function() {
    unregister_taxonomy_for_object_type('post_tag', 'post');
});

// Post Columns
add_filter( 'manage_post_posts_columns', function( $columns ) {

    unset(
        $columns['comments'],
        $columns['author']
    );

    $columns = array(
        'cb'    => '<input type="checkbox" />',
        'title' => 'Title',
        'categories' => 'Category'
    );

    return $columns;

}, 10, 2 );
