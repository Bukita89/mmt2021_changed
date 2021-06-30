<?php

namespace App\Fields\Templates;

use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Fields\Lists\Modules;
use App\Fields\Components\TemplateHeader;
use App\Fields\Options\Background;
use App\Fields\Options\HtmlAttributes;
use App\Fields\Options\MobileSortOrder;
use App\Fields\Options\ColumnLayout;
use App\Fields\Options\ColumnAlignment;
use App\Fields\Options\Admin;

class Columns {

	public static function getFields() {

        /**
         * [Template] - Columns
         */
        $columnsTemplate = new FieldsBuilder('columns', [
            'title'	=> 'Free Form'
        ]);

        $columnsTemplate

            ->addTab('Content')

                ->addFields(TemplateHeader::getFields())

                ->addFields(Modules::getFields())

            ->addTab('Options')

                ->addRadio('option_background_color', [
                    'label'		=> 'Background Color',
                    'layout'	=> 'horizontal',
                    'wrapper'   => [
                        'width'	=> '33'
                    ]
                ])

                    ->addChoice('bg-grey', 'Grey')
                    ->addChoice('bg-light-grey', 'Light Grey')

                ->addRadio('layout', [
                    'label'         => 'Layout',
                    'layout'        => 'horizontal',
                    'wrapper'   => [
                        'width'	=> '34'
                    ]
                ])
                    ->addChoice('layout-wide', 'Wide')
                    ->addChoice('layout-thin-card', 'Thin Card')

                ->addRadio('option_x_alignment', [
                    'label'		=> 'X Alignment',
                    'layout'	=> 'horizontal',
                    'default_value' => 'center',
                    'wrapper'   => [
                        'width'	=> '33'
                    ]
                ])
                    ->addChoice('left', 'Left')
                    ->addChoice('center', 'Center')
                    ->addChoice('right', 'Right')

                ->addFields(HtmlAttributes::getFields())

            ->addTab('Admin')

                ->addFields(Admin::getFields());
            
        return $columnsTemplate;

	}

}
