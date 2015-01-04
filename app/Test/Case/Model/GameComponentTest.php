<?php
App::uses('GameComponent', 'Model');

/**
 * GameComponent Test Case
 *
 */
class GameComponentTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.game_component',
		'app.game',
		'app.play',
		'app.play_history'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->GameComponent = ClassRegistry::init('GameComponent');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->GameComponent);

		parent::tearDown();
	}

	public function test() {
		$this->markTestIncomplete('Not Implemented.');
	}
}
