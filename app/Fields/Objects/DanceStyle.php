<?php

namespace App\Fields\Objects;

use StoutLogic\AcfBuilder\FieldsBuilder;

class DanceStyle {

	public function __construct() {

        /**
		 * Dance Style Info
		 */
		$danceStyleInfo = new FieldsBuilder('dance_style_info', [
			'position' => 'acf_after_title'
		]);

		$danceStyleInfo

            ->addImage('dance_image', [
                'label'         => 'Image',
                'preview_size'  => 'medium'
            ])

            ->addWysiwyg('dance_description', [
                'label'    => 'Description',
            ])

			->setLocation('post_type', '==', 'mmt_dancestyle');

		// Register Team Member Info
		add_action('acf/init', function() use ($danceStyleInfo) {
			acf_add_local_field_group($danceStyleInfo->build());
		});

    }

}
