<?php

namespace App\Fields\Templates;

use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Fields\Components\TemplateHeader;
use App\Fields\Options\HtmlAttributes;
use App\Fields\Options\Admin;
use App\Fields\Components\Button;

class ContentCards {

	public static function getFields() {

        /**
         * [Template] - Content Cards
         */
        $contentCardsTemplate = new FieldsBuilder('content-cards', [
            'label'	=> 'Content Cards'
        ]);

        $contentCardsTemplate

            ->addTab('Content')

                ->addFields(TemplateHeader::getFields())

                ->addRadio('data_source', [
                    'label'         => 'Data Source',
                    'layout'        => 'horizontal',
                    'default_value' => 'none',
                ])
                    ->addChoice('none', 'None')
                    ->addChoice('pages', 'Pages')
                    ->addChoice('services', 'Services')

                ->addRepeater('items', [
                    'label'         => 'Items',
                    'layout'        => 'block',
                    'min'           => 1,
                    'button_label'  => 'Add Item',
                    'collapsed'     => 'title',
                    'wrapper'       => [
                        'class'     => 'hide-label'
                    ]
                ])
                ->conditional( 'data_source', '==', 'none' )

                    ->addImage('image', [
                        'label'         => 'Image',
                        'preview_size'  => 'medium'
                    ])

                    ->addText('title', [
                        'label'         => 'Title'
                    ])

                    ->addWysiwyg('short_description',[
                        'label'         => 'Short Description',
                        'tabs'          => 'all',
                        'toolbar'       => 'basic',
                        'media_upload'  => 0
                    ])

                    ->addFields(Button::getFields( $is_conditional = true ))

                ->endRepeater()

                ->addRepeater('pages', [
                    'label'         => 'Pages',
                    'layout'        => 'block',
                    'min'           => 1,
                    'button_label'  => 'Add Page',
                    'collapsed'     => 'page_id',
                    'wrapper'       => [
                        'class'     => 'hide-label'
                    ]
                ])
                ->conditional( 'data_source', '==', 'pages' )

                    ->addPostObject('page_id', [
                        'label'         => 'Choose Page',
                        'post_type'     => ['page'],
                        'return_format' => 'id',
                    ])

                    ->addRadio('button_type', [
                        'label'         => 'Button Type',
                        'layout'        => 'horizontal',
                        'default_value' => 'tabs',
                    ])
                        ->addChoice('default', 'Default')
                        ->addChoice('simple', 'Simple')

                    ->addText('button_label', [
                        'label'         => 'Button Label'
                    ])

                ->endRepeater()

                ->addRepeater('services', [
                    'label'         => 'Services',
                    'layout'        => 'block',
                    'min'           => 1,
                    'button_label'  => 'Add Service',
                    'collapsed'     => 'choose_service',
                    'wrapper'       => [
                        'class'     => 'hide-label'
                    ]
                ])
                ->conditional( 'data_source', '==', 'services' )

                    ->addPostObject('choose_service', [
                        'label'         => 'Choose Service',
                        'post_type'     => ['mmt_service'],
                        'return_format' => 'id',
                    ])

                    ->addRadio('button_type', [
                        'label'         => 'Button Type',
                        'layout'        => 'horizontal',
                        'default_value' => 'tabs',
                    ])
                        ->addChoice('default', 'Default')
                        ->addChoice('simple', 'Simple')

                    ->addText('button_label', [
                        'label'         => 'Button Label'
                    ])

                ->endRepeater()

            ->addTab('Options')

                ->addRadio('layout', [
                    'label'         => 'Layout',
                    'layout'        => 'horizontal',
                ])
                    ->addChoice('layout-grid', 'Grid')
                    ->addChoice('layout-stacked', 'Stacked')

                ->addFields(HtmlAttributes::getFields())

            ->addTab('Admin')

                ->addFields(Admin::getFields());

        return $contentCardsTemplate;

	}

}
