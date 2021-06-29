<?php

namespace App\Fields\Templates;

use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Fields\Components\TemplateHeader;
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
                    'message'   => 'No additional options are required. This block will display an Instagram Feed based on the information provided in Brand Settings.',
                    'wrapper'   => [
                        'class' => 'hide-label'
                    ]
                ])

            ->addTab('Options')

                ->addFields(HtmlAttributes::getFields())

            ->addTab('Admin')

                ->addFields(Admin::getFields());

        return $instagramFeedTemplate;

	}

}
