<?php
class MakeReport extends CakeMigration {

/**
 * Migration description
 *
 * @var string
 */
	public $description = 'make_report';

/**
 * Actions to be performed
 *
 * @var array $migration
 */
	public $migration = array(
		'up' => array(
			'alter_field' => array(
				'games' => array(
					'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 64, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
					'version' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 16, 'collate' => 'utf8_general_ci', 'comment' => '?????', 'charset' => 'utf8'),
				),
				'play_datas' => array(
					'value' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
				),
				'reports' => array(
					'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci'),
				),
			),
			'create_field' => array(
				'play_datas' => array(
					'testplay_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'after' => 'id'),
					'key' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8', 'after' => 'item5'),
					'label' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8', 'after' => 'key'),
					'detail' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8', 'after' => 'value'),
				),
				'reports' => array(
					'testplay_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'after' => 'id'),
					'report' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8', 'after' => 'testplay_id'),
				),
				'testplays' => array(
					'conditions' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '?????', 'charset' => 'utf8', 'after' => 'num_plays'),
				),
			),
			'drop_field' => array(
				'plays' => array('game_id'),
				'reports' => array('game_id', 'disp_order', 'item_name', 'description', 'dimension1', 'dimension2', 'summary_type', 'threshold_target', 'threshold1', 'threshold2', 'min_samples'),
			),
			'create_table' => array(
				'report_items' => array(
					'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
					'game_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
					'disp_order' => array('type' => 'integer', 'null' => false, 'default' => '99', 'unsigned' => false),
					'item_name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
					'label' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
					'description' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
					'dimension1' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
					'dimension2' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
					'target' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
					'summary_type' => array('type' => 'integer', 'null' => false, 'default' => '1', 'unsigned' => false),
					'threshold_target' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
					'threshold1' => array('type' => 'float', 'null' => true, 'default' => null, 'unsigned' => false),
					'threshold2' => array('type' => 'float', 'null' => true, 'default' => null, 'unsigned' => false),
					'min_samples' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
					'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
					'updated' => array('type' => 'datetime', 'null' => true, 'default' => null),
					'indexes' => array(
						'PRIMARY' => array('column' => 'id', 'unique' => 1),
					),
					'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB'),
				),
			),
		),
		'down' => array(
			'alter_field' => array(
				'games' => array(
					'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
					'version' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false, 'comment' => '?????'),
				),
				'play_datas' => array(
					'value' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
				),
				'reports' => array(
					'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB'),
				),
			),
			'drop_field' => array(
				'play_datas' => array('testplay_id', 'key', 'label', 'detail'),
				'reports' => array('testplay_id', 'report'),
				'testplays' => array('conditions'),
			),
			'create_field' => array(
				'plays' => array(
					'game_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
				),
				'reports' => array(
					'game_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
					'disp_order' => array('type' => 'integer', 'null' => false, 'default' => '99', 'unsigned' => false),
					'item_name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
					'description' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
					'dimension1' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
					'dimension2' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
					'summary_type' => array('type' => 'integer', 'null' => false, 'default' => '1', 'unsigned' => false),
					'threshold_target' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
					'threshold1' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
					'threshold2' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
					'min_samples' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
				),
			),
			'drop_table' => array(
				'report_items'
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
