<?php

namespace App\Fields\Objects;

use StoutLogic\AcfBuilder\FieldsBuilder;

class TeamMember {

	public function __construct() {

        /**
		 * Team Member Info
		 */
		$teamMemberInfo = new FieldsBuilder('team_member_info', [
			'position' => 'acf_after_title'
		]);

		$teamMemberInfo

            ->addImage('team_headshot', [
                'label'         => 'Headshot',
                'preview_size'  => 'medium'
            ])

            ->addText('team_specialization', [
                'label'    => 'Specialization',
            ])

			->setLocation('post_type', '==', 'mmt_team_member');

		// Register Team Member Info
		add_action('acf/init', function() use ($teamMemberInfo) {
			acf_add_local_field_group($teamMemberInfo->build());
		});

    }

}
