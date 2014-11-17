<?php
App::uses('Play', 'Model');

/**
 * Play Test Case
 *
 */
class PlayTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.play',
		'app.game',
		'app.play_condition'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Play = ClassRegistry::init('Play');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Play);

		parent::tearDown();
	}

}
