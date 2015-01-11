<?php
/**
 * TestplayFixture
 *
 */
class TestplayFixture extends CakeTestFixture {

	public $import = 'Testplay';

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'game_id' => 1,
			'type' => 1,
			'num_plays' => 10,
			'conditions' => 'a:2:{s:11:"min_players";i:2;s:11:"max_players";i:4;}',
			'created' => '2014-11-17 20:59:42',
			'updated' => '2014-11-17 20:59:42'
		),
	);

}
