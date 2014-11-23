<?php
App::uses('Plugin', 'Model');

/**
 * Plugin Test Case
 *
 */
class PluginTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.plugin',
		'app.game',
		'app.play',
		'app.play_condition',
		'app.games_plugin'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Plugin = ClassRegistry::init('Plugin');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Plugin);

		parent::tearDown();
	}

}
