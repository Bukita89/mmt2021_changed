<?php

namespace App\Fields\Objects;

use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Fields\Templates\Columns;
use App\Fields\Templates\CallToAction;
use App\Fields\Templates\BlockGrid;
use App\Fields\Templates\SplitContent;
use App\Fields\Templates\ContentCards;
use App\Fields\Templates\Testimonials;
use App\Fields\Templates\Team;
use App\Fields\Templates\InstagramFeed;

class LayoutBuilder {

	public function __construct() {

		/**
		 * Layout Builder
		 */

		$layoutBuilder = new FieldsBuilder('layout_builder', [
			'style'         => 'seamless',
            'position'      => 'normal',
            'menu_order'    => 4
        ]);

        $layoutBuilder

			->addFlexibleContent('templates', [
				'label'			=> 'Layout Builder',
				'button_label'	=> 'Add Template'
            ])

                ->addLayout(Columns::getFields())

                ->addLayout(ContentCards::getFields())

                ->addLayout(Testimonials::getFields())

                ->addLayout(Team::getFields())

                ->addLayout(InstagramFeed::getFields())

			->setLocation('post_type', '==', 'page')
				->and('page_template', '!=', 'template-blog-page.blade.php')
				->or('post_type', '==', 'ssm_team_member');

		// Register Layout Builder
		add_action('acf/init', function() use ($layoutBuilder) {
			acf_add_local_field_group($layoutBuilder->build());
		});

	}

}
