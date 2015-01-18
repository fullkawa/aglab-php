<?php
/**
 * GameRuleFixture
 *
 */
class GameRuleFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'game_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'rule_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'order' => array('type' => 'integer', 'null' => false, 'default' => '99', 'unsigned' => false),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'updated' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'game_id' => 1,
			'rule_id' => 1,
			'order' => 1,
			'created' => '2015-01-18 15:05:41',
			'updated' => '2015-01-18 15:05:41'
		),
	);

}
