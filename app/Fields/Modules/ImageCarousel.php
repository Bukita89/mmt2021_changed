<?php

namespace App\Fields\Modules;

use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Fields\Options\HtmlAttributes;

class ImageCarousel {

	public static function getFields() {

		/**
         * [Module] - Image Carousel
         */
        $imageModule = new FieldsBuilder('carousel', [
            'title'	=> 'Image Carousel'
        ]);

        $imageModule

            ->addTab('Content')

                ->addGallery('gallery', [
                    'label'	    => 'Image Gallery',
                    'wrapper'   => [
                        'class' => 'hide-label'
                    ]
                ])

            ->addTab('Options')

                ->addFields(HtmlAttributes::getFields());

		return $imageModule;

	}

}
