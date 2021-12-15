<?php

namespace App\Fields\Templates;

use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Fields\Components\TemplateHeader;
use App\Fields\Options\Background;
use App\Fields\Options\HtmlAttributes;
use App\Fields\Options\Admin;

class DanceStyle {

	public static function getFields() {

        /**
         * [Template] - Dance Style
         */
        $danceStyleTemplate = new FieldsBuilder('dancestyle', [
            'label'	=> 'Dance Style'
        ]);

        $danceStyleTemplate

            ->addTab('Content')

                ->addFields(TemplateHeader::getFields())

                ->addRelationship('dance_styles_to_show', [
                    'label'     => 'Dance Styles to show',
                    'post_type' => ['mmt_dancestyle'],
                    'filters'   => ['search'],
                    'return_format' => 'id',
                ])

            ->addTab('Options')

                // ->addFields(Background::getFields())

                ->addFields(HtmlAttributes::getFields())

            ->addTab('Admin')

                ->addFields(Admin::getFields());

        return $danceStyleTemplate;

	}

}
