<?php
App::uses('GameCompo', 'Model');

/**
 * GameCompo Test Case
 *
 */
class GameCompoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.game_compo',
		'app.game',
		'app.testplay',
		'app.report',
		'app.play',
		'app.repdata',
		'app.compo'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->GameCompo = ClassRegistry::init('GameCompo');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->GameCompo);

		parent::tearDown();
	}

	public function test() {
		$this->markTestIncomplete();
	}

}
