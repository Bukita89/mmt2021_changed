<?php

namespace App\Fields\Objects;

use StoutLogic\AcfBuilder\FieldsBuilder;

class BlogPage {

	public function __construct() {

         /**
		 * Blog Page Info
		 */
		$blogPageInfo = new FieldsBuilder('blog_page_info', [
            'title'         => 'Page Info',
			'position'      => 'acf_after_title',
            'menu_order'    => 1
		]);

		$blogPageInfo

            ->addPostObject('blog_page_featured_post', [
                'label'         => 'Featured Post',
                'post_type'     => ['post'],
                'return_format' => 'id',
            ])

			->setLocation('post_template', '==', 'template-blog-page.blade.php');

		// Register Where to Buy Page Info
		add_action('acf/init', function() use ($blogPageInfo) {
			acf_add_local_field_group($blogPageInfo->build());
		});

        /**
		 * Where to Buy Page Info
		 */
		$blogPageInfo = new FieldsBuilder('blog_page_message_info', [
            'style'         => 'seamless',
            'position'      => 'normal',
            'menu_order'    => 2
		]);

		$blogPageInfo

            ->addMessage('blog_page_message_field', 'message', [
                'message'       => '<b>No other input is required. The list of most recent published blog posts along with the Categories filter will be displayed here.</b>',
                'wrapper'       => [
                    'class'     => 'hide-label'
                ]
            ])

			->setLocation('post_template', '==', 'template-blog-page.blade.php');

		// Register Where to Buy Page Info
		add_action('acf/init', function() use ($blogPageInfo) {
			acf_add_local_field_group($blogPageInfo->build());
		});

    }

}
