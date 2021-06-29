<?php

namespace App\Fields\Modules;

use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Fields\Components\Button as ButtonComponent;
use App\Fields\Options\ButtonDefaults;
use App\Fields\Options\HtmlAttributes;

class Button {

	public static function getFields() {

		/**
         * [Module] - Button
         * @author Rich Staats <rich@secretstache.com>
         * @since 3.0.0
         * @todo Link to Team Snippet Code
         */
        $buttonModule = new FieldsBuilder('button', [
            'title'	=>	'Button'
        ]);

        $buttonModule

            ->addTab('Content')

                ->addFields(ButtonComponent::getFields())

            ->addTab('Options')

                ->addRadio('layout', [
                    'label'         => 'Layout',
                    'layout'        => 'horizontal',
                    'default_value' => 'wide',
                ])
                    ->addChoice('wide', 'Wide')
                    ->addChoice('thin-card', 'Thin Card')

                ->addFields(ButtonDefaults::getFields())

                ->addFields(HtmlAttributes::getFields());

		return $buttonModule;

	}

}
