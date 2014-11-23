<?php
App::uses('GamesPlugin', 'Model');

/**
 * GamesPlugin Test Case
 *
 */
class GamesPluginTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.games_plugin',
		'app.game',
		'app.play',
		'app.play_condition',
		'app.plugin'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->GamesPlugin = ClassRegistry::init('GamesPlugin');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->GamesPlugin);

		parent::tearDown();
	}

}
