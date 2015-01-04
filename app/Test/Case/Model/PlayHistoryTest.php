<?php
App::uses('PlayHistory', 'Model');

/**
 * PlayHistory Test Case
 *
 */
class PlayHistoryTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.play_history',
		'app.play',
		'app.game',
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->PlayHistory = ClassRegistry::init('PlayHistory');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PlayHistory);

		parent::tearDown();
	}

	public function test() {
		$this->markTestIncomplete('Not Implemented.');
	}
}
