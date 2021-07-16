<?php

namespace App\Fields\Templates;

use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Fields\Components\TemplateHeader;
use App\Fields\Options\HtmlAttributes;
use App\Fields\Options\Admin;

class Appointment {

	public static function getFields() {

		/**
         * [Template] - Appointment
         */
        $appointmentTemplate = new FieldsBuilder('appointment', [
            'title'	=> 'Appointment'
        ]);

        $appointmentTemplate
        
            ->addTab('Content')

                ->addFields(TemplateHeader::getFields())

                ->addPostObject('choose_appointment', [
                    'label'         => 'Choose Appointment',
                    'post_type'     => ['mmt_appointment'],
                    'return_format' => 'id',
                ])

            ->addTab('Options')

                ->addFields(HtmlAttributes::getFields())

            ->addTab('Admin')

                ->addFields(Admin::getFields());
        
        return $appointmentTemplate;

	}

}