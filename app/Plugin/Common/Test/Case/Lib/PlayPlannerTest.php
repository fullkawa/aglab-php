<?php
App::uses('PlayPlanner', 'Common.Lib');

Class PlayPlannerTest extends CakeTestCase {

	public $fixtures = array(
		'app.game',
		'app.testplay',
		'app.report',
		'app.play',
	);

	public function setUp() {
		parent::setUp();
		$this->Planner = new PlayPlanner();
	}

	public function tearDown() {
		unset($this->Planner);
		parent::tearDown();
	}

	/**
	 * プレイ計画取得テスト
	 */
	public function testGetPlans() {
		$testplay_id = 1;
		$this->Testplay = ClassRegistry::init('Testplay');
		$testplay = $this->Testplay->findById($testplay_id);
		$plans = $this->Planner->getPlans($testplay);

		$this->assertEquals(10, count($plans), '返ってくる配列の数は試行回数に等しい。');
		$this->assertEquals($testplay_id, $plans[0]['testplay_id']);
		$this->assertEquals(Play::STATUS_NOT_PLAYED, $plans[0]['status']);
		$this->assertNotEmpty($plans[0]['num_players']);
		foreach ($plans as $plan) {
			$this->assertLessThan(5, $plan['num_players'], '均等に散らばっていること。');
		}
	}

	/**
	 * EvenNumberList生成テスト
	 */
	public function testBuildEvenNumberList() {
		$numbers = $this->Planner->buildEvenNumberList(2, 4);

		$this->assertEquals(3, count($numbers));

		// 生成された数字が重複しないことを確認する
		$dist = array();
		foreach ($numbers as $num) {
			$dist[$num] = 1;
		}
		$this->assertEquals(3, count($dist));
	}

	/**
	 * ItemList生成テスト
	 */
	public function testBuildItemList() {
		$items = $this->Planner->buildItemList(array('item1' => 1, 'item2' => 2));

		$this->assertEquals(3, count($items));
		$this->assertTrue(in_array('item1', $items));
		$this->assertTrue(in_array('item2', $items));
	}
}
