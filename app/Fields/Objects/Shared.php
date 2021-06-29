<?php

namespace App\Fields\Objects;

use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Fields\Lists\Buttons;
use App\Fields\Components\Header;
use App\Fields\Options\Background;
use App\Fields\Options\HtmlAttributes;
use App\Fields\Components\Button;

class Shared {

	public function __construct() {

		/**
		 * Home Hero Unit
		 */
		$homeHeroUnit = new FieldsBuilder('home_hero_unit', [
            'title'    => 'Hero Unit',
			'position' => 'acf_after_title'
		]);

		$homeHeroUnit

			->addTab('Content')

                ->addImage('home_front_image', [
                    'label'         => 'Front Image',
                    'preview_size'  => 'medium'
                ])

                ->addText('home_headline', [
                    'label'    => 'Headline'
                ])

                ->addText('home_subheadline', [
                    'label'    => 'Subheadline'
                ])

				->addGroup('home_button', [
					'label'	   => 'Button'
				])

                	->addFields(Button::getFields( ))

				->endGroup()

			->addTab('Options')

				->addFields(HtmlAttributes::getFields())

			->setLocation('page_type', '==', 'front_page');

		// Register Home Hero Unit
		add_action('acf/init', function() use ($homeHeroUnit) {
			acf_add_local_field_group($homeHeroUnit->build());
		});

        /**
		 * Inner Hero Unit
		 */
		$innerHeroUnit = new FieldsBuilder('inner_hero_unit', [
            'title'    => 'Hero Unit',
			'position' => 'acf_after_title'
		]);

		$innerHeroUnit

			->addTab('Content')

                ->addText('inner_headline', [
                    'label'    => 'Headline'
                ])

                ->addWysiwyg('inner_short_description',[
                    'label'         => 'Short Description',
                    'tabs'          => 'all',
                    'toolbar'       => 'basic',
                    'media_upload'  => 0
                ])

                ->addTrueFalse('inner_show_down_arrow', [
                    'wrapper' => [
                        'class' => 'hide-label',
                    ],
                    'message'   => 'Show Down Arrow',
                ])

			->addTab('Options')

                ->addTrueFalse('inner_include_overlay', [
                    'wrapper' => [
                        'class' => 'hide-label',
                    ],
                    'message'   => 'Include Overlay',
                ])

				->addFields(HtmlAttributes::getFields())

            ->setLocation('page_template', '==', 'default')
				->and('page_template', '!=', 'template-blog-page.blade.php')
                ->and('page_type', '!=', 'front_page');

		// Register Inner Hero Unit
		add_action('acf/init', function() use ($innerHeroUnit) {
			acf_add_local_field_group($innerHeroUnit->build());
		});

		/**
		 * Inline Styles
		 * @author Rich Staats <rich@secretstache.com>
		 * @since 3.0.0
		 * @todo Link to Team Snippet Code
		 */
		$inlineStyles = new FieldsBuilder('inline_styles', [
			'menu_order' =>	5
		]);

		$inlineStyles

			->addField('page_inline_styles', 'acf_code_field', [
				'label'	=>	'CSS Editor',
				'mode' 	=> 'css',
				'theme'	=> 'monokai'
			])

			->setLocation('post_type', '==', 'page')
				->or('post_type', '==', 'post');

		// Register Inline Styles
		add_action('acf/init', function() use ($inlineStyles) {
			acf_add_local_field_group($inlineStyles->build());
		});

		/**
		 * Inline Scripts
		 * @author Rich Staats <rich@secretstache.com>
		 * @since 3.0.0
		 * @todo Link to Team Snippet Code
		 */
		$inlineScripts = new FieldsBuilder('inline_scripts', [
			'menu_order' =>	10
		]);

		$inlineScripts

			->addField('page_inline_scripts', 'acf_code_field', [
				'label'	=>	'JS Editor',
				'mode' 	=> 'javascript',
				'theme'	=> 'monokai',
			])

			->setLocation('post_type', '==', 'page')
				->or('post_type', '==', 'post');

		// Register Inline Scripts
		add_action('acf/init', function() use ($inlineScripts) {
			acf_add_local_field_group($inlineScripts->build());
		});

		/**
		 * Facebook Conversion Pixel
		 * @author Rich Staats <rich@secretstache.com>
		 * @since 3.0.0
		 * @todo Link to Team Snippet Code
		 */
		$facebookConversionPixel = new FieldsBuilder('facebook_conversion_pixel', [
			'menu_order'	=>	15,
			'position'		=>	'side'
		]);

		$facebookConversionPixel

			->addSelect('facebook_standard_event', [
				'label'			=> 'Standard Event',
				'default_value' => array(),
				'allow_null' 	=> 1
			])

				->addChoice('fbq("track", "ViewContent");', 'Key Page View')
				->addChoice('fbq("track", "Lead");', 'Lead')
				->addChoice('fbq("track", "CompleteRegistration");', 'Completed Registration')
				->addChoice('fbq("track", "InitiateCheckout");', 'Initiated Checkout')
				->addChoice('fbq("track", "AddPaymentInfo");', 'Added Payment Info')
				->addChoice('fbq("track", "Purchase");', 'Made a Purchase')

			->setLocation('post_type', '==', 'page')
				->or('post_type', '==', 'post');

		// Register Facebook Conversion Pixel
		add_action('acf/init', function() use ($facebookConversionPixel) {
			acf_add_local_field_group($facebookConversionPixel->build());
		});

	}

}
