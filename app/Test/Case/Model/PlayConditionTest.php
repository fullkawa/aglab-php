<?php
App::uses('PlayCondition', 'Model');

/**
 * PlayCondition Test Case
 *
 */
class PlayConditionTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.play_condition',
		'app.play'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->PlayCondition = ClassRegistry::init('PlayCondition');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PlayCondition);

		parent::tearDown();
	}

}
