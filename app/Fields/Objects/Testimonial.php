<?php

namespace App\Fields\Objects;

use StoutLogic\AcfBuilder\FieldsBuilder;

class Testimonial {

	public function __construct() {

        /**
		 * Testimonial Info
		 */
		$testimonialInfo = new FieldsBuilder('testimonial_info', [
			'position' => 'acf_after_title'
		]);

		$testimonialInfo

            ->addWysiwyg('testimonial_quote',[
                'label'         => 'Quote',
                'tabs'          => 'all',
                'toolbar'       => 'basic',
                'media_upload'  => 0
            ])

            ->addText('testimonial_citation_name', [
                'label'    => 'Citation Name',
            ])

			->setLocation('post_type', '==', 'mmt_testimonial');

		// Register Testimonial Info
		add_action('acf/init', function() use ($testimonialInfo) {
			acf_add_local_field_group($testimonialInfo->build());
		});

    }

}
