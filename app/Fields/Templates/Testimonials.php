<?php

namespace App\Fields\Templates;

use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Fields\Components\TemplateHeader;
use App\Fields\Options\Background;
use App\Fields\Options\HtmlAttributes;
use App\Fields\Options\Admin;

class Testimonials {

	public static function getFields() {

        /**
         * [Template] - Testimonials
         */
        $testimonialsTemplate = new FieldsBuilder('testimonials', [
            'label'	=> 'Testimonials'
        ]);

        $testimonialsTemplate

            ->addTab('Content')

                ->addFields(TemplateHeader::getFields())

                ->addRelationship('testimonials_to_show', [
                    'label'     => 'Testimonials to show',
                    'post_type' => ['mmt_testimonial'],
                    'filters'   => ['search'],
                    'return_format' => 'id',
                ])

            ->addTab('Options')

                ->addFields(Background::getFields())

                ->addFields(HtmlAttributes::getFields())

            ->addTab('Admin')

                ->addFields(Admin::getFields());

        return $testimonialsTemplate;

	}

}
