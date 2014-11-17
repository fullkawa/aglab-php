<?php
App::uses('Game', 'Model');

/**
 * Game Test Case
 *
 */
class GameTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.game'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Game = ClassRegistry::init('Game');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Game);

		parent::tearDown();
	}

/**
 * testSetup method
 *
 * @return void
 */
	public function testSetup() {
		$this->markTestIncomplete('testSetup not implemented.');
	}

/**
 * testStart method
 *
 * @return void
 */
	public function testStart() {
		$this->markTestIncomplete('testStart not implemented.');
	}

/**
 * testAutoplay method
 *
 * @return void
 */
	public function testAutoplay() {
		$this->markTestIncomplete('testAutoplay not implemented.');
	}

}
