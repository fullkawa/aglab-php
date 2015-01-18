<?php
App::uses('Repdata', 'Model');

/**
 * Repdata Test Case
 *
 */
class RepdataTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.repdata',
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
		$this->Repdata = ClassRegistry::init('Repdata');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Repdata);

		parent::tearDown();
	}

	/**
	 * ディメンジョン項目取得テスト
	 */
	public function test_getItems() {
		$context = array(
			'players' => array(array(), array())
		);
		$items = $this->Repdata->_getItems($context);

		$this->assertEquals(5, count($items));
		$this->assertEquals('2P', $items[0]);
		$this->assertEquals(null, $items[4]);
	}
}
