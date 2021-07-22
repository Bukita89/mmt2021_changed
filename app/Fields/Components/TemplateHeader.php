<?php

namespace App\Fields\Components;

use StoutLogic\AcfBuilder\FieldsBuilder;

class TemplateHeader {

	public static function getFields() {

		/**
         * [Option] - Template Header
         * @author Rich Staats <rich@secretstache.com>
         * @since 3.0.0
         * @todo Extract Headline / Subheadline into a Header Snippet
         * @todo Link to Team Snippet Code
         */
        $templateHeaderOptions = new FieldsBuilder('template-header');

        $templateHeaderOptions

            ->addTrueFalse('include_template_header', [
                'message'	=> 'Include Template Header',
                'wrapper'	=> [
                    'class'	=> 'hide-label'
                ]
            ])

            ->addText('template_headline', [
                'label'	    => 'Headline',
                'wrapper'   => [
                    'width' => 75
                ]
            ])
                ->conditional('include_template_header', '==', 1)

            ->addSelect('template_text_alignment', [
                'label'          => 'Text Alignment',
                'wrapper'        => [
                    'width'      => 25,
                ],
                'choices'        => [
                    'align-left' => 'Left',
                    'align-center' => 'Center',
                ],
            ])
                ->conditional('include_template_header', '==', 1)

            ->addTextarea('template_short_description', [
                'label'         => 'Short Description',
                'rows'          => '2'
            ])
                ->conditional('include_template_header', '==', 1);

		return $templateHeaderOptions;

	}

}
