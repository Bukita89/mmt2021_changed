<?php

namespace App\Fields\Objects;

use StoutLogic\AcfBuilder\FieldsBuilder;

class Appointment {

	public function __construct() {

         /**
		 * Appointment Info
		 */
		$appointmentInfo = new FieldsBuilder('appointment_info', [
            'title'         => 'Appointment Info',
			'position'      => 'acf_after_title',
            'menu_order'    => 1
		]);

		$appointmentInfo

            ->addField('appointment_html_editor', 'acf_code_field', [
				'label'	=> 'HTML Editor',
				'mode' 	=> 'htmlmixed',
				'theme'	=> 'monokai',
			])

			->setLocation('post_type', '==', 'mmt_appointment');

		// Register Appointment Info
		add_action('acf/init', function() use ($appointmentInfo) {
			acf_add_local_field_group($appointmentInfo->build());
		});

    }

}
