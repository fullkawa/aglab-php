<?php
App::uses('Testplay', 'Model');

/**
 * Testplay Test Case
 *
 */
class TestplayTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.testplay',
		'app.game',
		'app.play',
		'app.play_condition'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Testplay = ClassRegistry::init('Testplay');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Testplay);

		parent::tearDown();
	}

}
