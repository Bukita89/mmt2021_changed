<?php

namespace App\Fields\Options;

use StoutLogic\AcfBuilder\FieldsBuilder;

class Background {

	public static function getFields() {

		/**
         * [Option] - Background Options
         * @author Rich Staats <rich@secretstache.com>
         * @since 3.0.0
         * @todo Extract each background option into their own reusable block
         * @todo Link to Team Snippet Code
         */
        $backgroundOptions = new FieldsBuilder('background_options');

        $backgroundOptions

            ->addRadio('option_background_color', [
                'label'		=> 'Background Color',
                'layout'	=> 'horizontal'
            ])

                ->addChoice('bg-grey', 'Grey')
                ->addChoice('bg-light-grey', 'Light Grey');

		return $backgroundOptions;

	}

}
