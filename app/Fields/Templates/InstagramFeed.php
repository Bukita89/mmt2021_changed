<?php

namespace App\Fields\Templates;

use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Fields\Components\TemplateHeader;
use App\Fields\Options\Background;
use App\Fields\Options\HtmlAttributes;
use App\Fields\Options\Admin;

class InstagramFeed {

	public static function getFields() {

        /**
         * [Template] - Instagram Feed
         */
        $instagramFeedTemplate = new FieldsBuilder('instagram-feed', [
            'label'	=> 'Instagram Feed'
        ]);

        $instagramFeedTemplate

            ->addTab('Content')

                ->addFields(TemplateHeader::getFields())

                ->addField('message_close', 'message', [
                    'message'   => 'No additional options are required. This block will display an Instagram Feed based on the information provided in <a target="_blank" href="/wp-admin/admin.php?page=acf-options-brand-settings/#acf-group_social_networks">Brand Settings</a>.',
                    'wrapper'   => [
                        'class' => 'hide-label'
                    ]
                ])

            ->addTab('Options')

                ->addFields(Background::getFields())

                ->addFields(HtmlAttributes::getFields())

            ->addTab('Admin')

                ->addFields(Admin::getFields());

        return $instagramFeedTemplate;

	}

}
