<?php

namespace App\Fields\Objects;

use StoutLogic\AcfBuilder\FieldsBuilder;

class Post {

	public function __construct() {

        /**
		 * Service Info
		 */
		$postInfo = new FieldsBuilder('post_info', [
			'position' => 'acf_after_title'
		]);

		$postInfo

            ->addTaxonomy('post_choose_category', [
                'label'      => 'Choose Category',
                'taxonomy'   => 'category',
                'field_type' => 'select',
                'required'   => 0,
                'add_term'   => 0,
                'save_terms' => 1,
                'load_terms' => 1
            ])

			->setLocation('post_type', '==', 'post');

		// Register Service Info
		add_action('acf/init', function() use ($postInfo) {
			acf_add_local_field_group($postInfo->build());
		});

    }

}
