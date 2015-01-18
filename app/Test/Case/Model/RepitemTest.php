<?php
App::uses('Repitem', 'Model');

/**
 * Repitem Test Case
 *
 */
class RepitemTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.repitem',
		'app.game',
		'app.play',
		'app.repdata',
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Repitem = ClassRegistry::init('Repitem');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Repitem);

		parent::tearDown();
	}

	/**
	 * ディメンジョンあり集計テスト
	 *
	 * @return void
	 */
	public function test__getStats_dimension() {
		$testplay_id = 1;
		$target = 'played';
		$dimension = 'item1';
		$count = $this->Repitem->__getStats($testplay_id, $target, $dimension);

		$this->assertEquals(3, count($count));
		$this->assertEquals('played', $count[0]['Repdata']['key']);
		$this->assertEquals('3P', $count[1]['Repdata']['item1']);
	}

	/**
	 * ディメンジョンなし集計テスト
	 *
	 * @return void
	 */
	public function test__getStats_nodimension() {
		$testplay_id = 1;
		$target = 'played';
		$count = $this->Repitem->__getStats($testplay_id, $target);

		$this->assertEquals(1, count($count));
		$this->assertEquals('played', $count[0]['Repdata']['key']);
		$this->assertArrayNotHasKey('item1', $count[0]['Repdata']);
		$this->assertEquals(9, $count[0][0]['count']);
	}

	/**
	 * 詳細あり集計テスト
	 *
	 * @return void
	 */
	public function test__getStats_detail() {
		$testplay_id = 1;
		$target = 'err_raised';
		$count = $this->Repitem->__getStats($testplay_id, $target);

		$this->assertEquals(1, count($count));
		$this->assertEquals('err_raised', $count[0]['Repdata']['key']);
		$this->assertEquals(1, $count[0][0]['count']);
		$this->assertEquals('適用できるルールがないケースが発生した。', $count[0][0]['detail'][0]['err_message']);
		$this->assertEquals(8, $count[0][0]['detail'][0]['play_id']);
	}

}
