<?php
App::uses('Step', 'Model');

/**
 * Step Test Case
 *
 */
class StepTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		//'app.step',
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
		$this->Step = ClassRegistry::init('Step');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Step);

		parent::tearDown();
	}

	public function test() {
		$this->markTestIncomplete('Not Implemented.');
	}
}
