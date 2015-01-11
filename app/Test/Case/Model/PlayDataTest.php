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

	/**
	 * ディメンジョン項目取得テスト
	 */
	public function test_getItems() {
		$context = array(
			'players' => array(array(), array())
		);
		$items = $this->PlayData->_getItems($context);

		$this->assertEquals(5, count($items));
		$this->assertEquals('2P', $items[0]);
		$this->assertEquals(null, $items[4]);
	}
}
