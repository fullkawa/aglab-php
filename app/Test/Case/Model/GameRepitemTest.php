<?php
App::uses('GameRepitem', 'Model');

/**
 * GameRepitem Test Case
 *
 */
class GameRepitemTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.game_repitem',
		'app.game',
		'app.testplay',
		'app.report',
		'app.play',
		'app.repdata',
		'app.repitem'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->GameRepitem = ClassRegistry::init('GameRepitem');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->GameRepitem);

		parent::tearDown();
	}

	public function test() {
		$this->markTestIncomplete();
	}

}
