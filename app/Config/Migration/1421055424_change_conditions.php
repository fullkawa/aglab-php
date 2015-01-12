<?php
class ChangeConditions extends CakeMigration {

/**
 * Migration description
 *
 * @var string
 */
	public $description = 'change_conditions';

/**
 * Actions to be performed
 *
 * @var array $migration
 */
	public $migration = array(
		'up' => array(
			'create_field' => array(
				'plays' => array(
					'conditions' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8', 'after' => 'num_players'),
				),
				'testplays' => array(
					'min_players' => array('type' => 'integer', 'null' => false, 'default' => '1', 'unsigned' => false, 'after' => 'num_plays'),
					'max_players' => array('type' => 'integer', 'null' => false, 'default' => '1', 'unsigned' => false, 'after' => 'min_players'),
				),
			),
		),
		'down' => array(
			'drop_field' => array(
				'plays' => array('conditions'),
				'testplays' => array('min_players', 'max_players'),
			),
		),
	);

/**
 * Before migration callback
 *
 * @param string $direction Direction of migration process (up or down)
 * @return bool Should process continue
 */
	public function before($direction) {
		return true;
	}

/**
 * After migration callback
 *
 * @param string $direction Direction of migration process (up or down)
 * @return bool Should process continue
 */
	public function after($direction) {
		return true;
	}
}
