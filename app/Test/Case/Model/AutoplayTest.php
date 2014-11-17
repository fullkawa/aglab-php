<?php
App::uses('Autoplay', 'Model');

/**
 * Autoplay Test Case
 *
 */
class AutoplayTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.autoplay',
		'app.game'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Autoplay = ClassRegistry::init('Autoplay');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Autoplay);

		parent::tearDown();
	}

}
