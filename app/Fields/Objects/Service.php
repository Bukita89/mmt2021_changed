<?php

namespace App\Fields\Objects;

use StoutLogic\AcfBuilder\FieldsBuilder;

class Service {

	public function __construct() {

        /**
		 * Service Info
		 */
		$serviceInfo = new FieldsBuilder('service_info', [
			'position' => 'acf_after_title'
		]);

		$serviceInfo

            ->addWysiwyg('service_short_description',[
                'label'         => 'Short Description',
                'tabs'          => 'all',
                'toolbar'       => 'basic',
                'media_upload'  => 0
            ])

			->setLocation('post_type', '==', 'mmt_service');

		// Register Service Info
		add_action('acf/init', function() use ($serviceInfo) {
			acf_add_local_field_group($serviceInfo->build());
		});

    }

}
