<?php

namespace App\Fields\SettingsPages;

use StoutLogic\AcfBuilder\FieldsBuilder;

class BrandSettings {

	public function __construct() {

		/**
		 * Logo Assets
		 * @author Rich Staats <rich@secretstache.com>
		 * @since 3.0.0
		 * @todo Link to Team Snippet Code
		 */
		$logoAssets = new FieldsBuilder('logo_assets', [
			'title'			=> 'Logo Assets',
			'menu_order'	=>	1
		]);

		$logoAssets

			->addImage('brand_logo', [
				'label'			=> 'Full Logo',
				'preview_size'	=> 'medium'
			])

			->addImage('favicon', [
				'label'			=> 'Favicon',
				'preview_size'	=> 'medium',
				'mime_types' 	=> 'png, svg, ico'
			])

			->setLocation('options_page', '==', 'acf-options-brand-settings');

		// Register Logo Assets
		add_action('acf/init', function() use ($logoAssets) {
			acf_add_local_field_group($logoAssets->build());
		});


		/**
		 * Business Information
		 * @author Rich Staats <rich@secretstache.com>
		 * @since 3.0.0
		 * @todo Link to Team Snippet Code
		 */
		$businessInformation = new FieldsBuilder('business_information', [
			'title'			=> 'Business Information',
			'menu_order'	=>	5
		]);

		$businessInformation

			->addField('primary_phone_number', 'phone', [
				'label' 			=> 'Primary Phone Number',
				'initial_country' 	=> 'US',
				'return_format'		=> 'array',
				'wrapper'			=> [
					'width'			=> '33'
				]
			])

			->addEmail('primary_email_address', [
				'label' 	=> 'Primary Email Address',
				'wrapper'	=> [
					'width'	=> '33'
				]
			])

			->setLocation('options_page', '==', 'acf-options-brand-settings');

		// Register Business Information
		add_action('acf/init', function() use ($businessInformation) {
			acf_add_local_field_group($businessInformation->build());
		});


		/**
		 * Social Networks
		 * @author Rich Staats <rich@secretstache.com>
		 * @since 3.0.0
		 * @todo Link to Team Snippet Code
		 */
		$socialNetworks = new FieldsBuilder('social_networks', [
			'title'			=> 'Social Networks',
			'menu_order'	=>	10
		]);

		$socialNetworks

			->addText('facebook', [
				'label' 	=> 'Facebook',
				'prepend' 	=> 'URL',
			])

			->addText('instagram', [
				'label' 	=> 'Instagram',
				'prepend' 	=> 'URL',
			])

			->setLocation('options_page', '==', 'acf-options-brand-settings');

		// Register Social Networks
		add_action('acf/init', function() use ($socialNetworks) {
			acf_add_local_field_group($socialNetworks->build());
		});

		/**
		 * Analytics
		 * @author Rich Staats <rich@secretstache.com>
		 * @since 3.0.0
		 * @todo Link to Team Snippet Code
		 */
		$analytics = new FieldsBuilder('analytics', [
			'title'			=> 'Analytics',
			'menu_order'	=>	20
		]);

		$analytics

			->addText('google_tag_manager_id', [
				'label'	=> 'Google Tag Manager ID'
			])

			->addText('google_site_verification_id', [
				'label'	=> 'Google Site Verification ID'
			])

			->addText('facebook_account_id', [
				'label'	=> 'Facebook Account ID'
			])

			->addRepeater('custom_tracking_scripts', [
				'layout'		=> 'block',
				'button_label'	=> 'Add Tracking Script'
			])

				->addText('title', [
					'label' => 'Title'
				])

				->addField('script', 'acf_code_field', [
					'label' => 'Script',
					'mode'	=> 'htmlmixed',
					'theme'	=> 'monokai',
				])

				->addRadio('location', [
					'label' 		=> 'Location',
					'choices'		=> [
						'header' 	=> 'Header',
						'footer' 	=> 'Footer'
					],
					'layout' 		=> 'horizontal'
				])

			->endRepeater()

			->setLocation('options_page', '==', 'acf-options-brand-settings');

		// Register Analytics
		add_action('acf/init', function() use ($analytics) {
			acf_add_local_field_group($analytics->build());
		});


		/**
		 * Global Inline Styles
		 * @author Rich Staats <rich@secretstache.com>
		 * @since 3.0.0
		 * @todo Link to Team Snippet Code
		 */
		$globalInlineStyles = new FieldsBuilder('global_inline_styles', [
			'title'			=> 'Global Inline Styles',
			'menu_order'	=>	25
		]);

		$globalInlineStyles

			->addField('global_inline_styles', 'acf_code_field', [
				'label'	=>	'CSS Editor',
				'mode' 	=>	'css',
				'theme' =>	'monokai'
			])

			->setLocation('options_page', '==', 'acf-options-brand-settings');

		// Register Analytics
		add_action('acf/init', function() use ($globalInlineStyles) {
			acf_add_local_field_group($globalInlineStyles->build());
		});

	}

}
