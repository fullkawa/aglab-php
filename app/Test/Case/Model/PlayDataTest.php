<?php
App::uses('PlayData', 'Model');

/**
 * PlayData Test Case
 *
 */
class PlayDataTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.play_data',
		'app.play',
		'app.game',
		'app.report',
		'app.play_condition',
		'app.play_history'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->PlayData = ClassRegistry::init('PlayData');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PlayData);

		parent::tearDown();
	}

}
