<?php
App::uses('Compo', 'Model');

/**
 * Compo Test Case
 *
 */
class CompoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.compo',
		'app.game',
		'app.play',
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Compo = ClassRegistry::init('Compo');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Compo);

		parent::tearDown();
	}

	public function test() {
		$this->markTestIncomplete('Not Implemented.');
	}
}
