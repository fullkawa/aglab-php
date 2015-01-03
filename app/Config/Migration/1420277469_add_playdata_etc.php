<?php
class AddPlaydataEtc extends CakeMigration {

/**
 * Migration description
 *
 * @var string
 */
	public $description = 'add_playdata_etc';

/**
 * Actions to be performed
 *
 * @var array $migration
 */
	public $migration = array(
		'up' => array(
			'create_table' => array(
				'play_datas' => array(
					'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
					'play_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
					'item1' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
					'item2' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
					'item3' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
					'item4' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
					'item5' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
					'value' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
					'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
					'updated' => array('type' => 'datetime', 'null' => true, 'default' => null),
					'indexes' => array(
						'PRIMARY' => array('column' => 'id', 'unique' => 1),
					),
					'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB'),
				),
			),
			'create_field' => array(
				'reports' => array(
					'game_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'after' => 'id'),
					'disp_order' => array('type' => 'integer', 'null' => false, 'default' => '99', 'unsigned' => false, 'after' => 'game_id'),
					'item_name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1', 'after' => 'disp_order'),
					'description' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1', 'after' => 'item_name'),
					'dimension1' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1', 'after' => 'description'),
					'dimension2' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1', 'after' => 'dimension1'),
					'summary_type' => array('type' => 'integer', 'null' => false, 'default' => '1', 'unsigned' => false, 'after' => 'dimension2'),
					'threshold_target' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1', 'after' => 'summary_type'),
					'threshold1' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false, 'after' => 'threshold_target'),
					'threshold2' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false, 'after' => 'threshold1'),
					'min_samples' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false, 'after' => 'threshold2'),
				),
			),
			'drop_field' => array(
				'reports' => array('testplay_id', 'report'),
				'testplays' => array('report'),
			),
		),
		'down' => array(
			'drop_table' => array(
				'play_datas'
			),
			'drop_field' => array(
				'reports' => array('game_id', 'disp_order', 'item_name', 'description', 'dimension1', 'dimension2', 'summary_type', 'threshold_target', 'threshold1', 'threshold2', 'min_samples'),
			),
			'create_field' => array(
				'reports' => array(
					'testplay_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
					'report' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
				),
				'testplays' => array(
					'report' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
				),
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
