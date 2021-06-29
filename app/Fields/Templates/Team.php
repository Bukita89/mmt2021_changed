<?php

namespace App\Fields\Templates;

use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Fields\Components\TemplateHeader;
use App\Fields\Options\HtmlAttributes;
use App\Fields\Options\Admin;

class Team {

	public static function getFields() {

        /**
         * [Template] - Team
         */
        $teamTemplate = new FieldsBuilder('team', [
            'label'	=> 'Team'
        ]);

        $teamTemplate

            ->addTab('Content')

                ->addFields(TemplateHeader::getFields())

                ->addRelationship('team_members_to_show', [
                    'label'     => 'Team Members to show',
                    'post_type' => ['mmt_team_member'],
                    'filters'   => ['search'],
                    'return_format' => 'id',
                ])

            ->addTab('Options')

                ->addFields(HtmlAttributes::getFields())

            ->addTab('Admin')

                ->addFields(Admin::getFields());

        return $teamTemplate;

	}

}
