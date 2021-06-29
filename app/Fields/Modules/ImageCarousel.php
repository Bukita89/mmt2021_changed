<?php

namespace App\Fields\Modules;

use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Fields\Options\HtmlAttributes;

class ImageCarousel {

	public static function getFields() {

		/**
         * [Module] - Image Carousel
         */
        $imageModule = new FieldsBuilder('image_carousel', [
            'title'	=> 'Image Carousel'
        ]);

        $imageModule

            ->addTab('Content')

                ->addRepeater('items', [
                    'label'         => 'Items',
                    'layout'        => 'block',
                    'min'           => 1,
                    'button_label'  => 'Add Item',
                    'collapsed'     => 'image',
                    'wrapper'       => [
                        'class'     => 'hide-label'
                    ]
                ])

                    ->addImage('image', [
                        'label'         => 'Image',
                        'preview_size'  => 'medium'
                    ])

                ->endRepeater()

            ->addTab('Options')

                ->addFields(HtmlAttributes::getFields());

		return $imageModule;

	}

}
