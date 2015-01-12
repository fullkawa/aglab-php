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
	 * テスト条件生成テスト
	 */
	public function testBuildEvenConditions() {
		$conditions = array(
			'cond1' => array(
				'value1-1' => 1, 'value1-2' => 1,
			),
			'cond2' => array(
				array('from' => 1, 'to' => 3)
			),
			'cond3' => array(
				'value3-1' => 3, 'value3-2' => 1, 'value3-3' => 1,
			),
		);
		$conditionList = $this->Planner->buildEvenConditions($conditions);
		debug($conditionList);

		$this->assertEquals(5, count($conditionList));

		$chktable = array();
		foreach ($conditionList as $conditions) {
			foreach ($conditions as $value) {
				if (empty($chktable[$value])) {
					$chktable[$value] = 1;
				} else {
					$chktable[$value] = $chktable[$value] + 1;
				}
			}
		}
		ksort($chktable);
		debug($chktable);
		$this->assertGreaterThanOrEqual(2, $chktable['value1-1']);
		$this->assertGreaterThanOrEqual(2, $chktable['value1-2']);
		$this->assertLessThanOrEqual(2, $chktable['1']);
		$this->assertLessThanOrEqual(2, $chktable['2']);
		$this->assertLessThanOrEqual(2, $chktable['3']);
		$this->assertEquals(3, $chktable['value3-1']);
		$this->assertEquals(1, $chktable['value3-2']);
		$this->assertEquals(1, $chktable['value3-3']);
	}

	/**
	 * テストプレイ人数生成テスト
	 */
	public function testBuildEvenNumbers() {
		$numbers = $this->Planner->buildEvenNumbers(2, 4);

		$this->assertEquals(3, count($numbers));

		// 生成された数字が重複しないことを確認する
		$dist = array();
		foreach ($numbers as $num) {
			$dist[$num] = 1;
		}
		$this->assertEquals(3, count($dist));
	}

	/**
	 * テスト条件リスト生成テスト
	 */
	public function testBuildList() {
		$items = $this->Planner->buildList(array('item1' => 1, 'item2' => 2));

		$this->assertEquals(3, count($items));
		$this->assertTrue(in_array('item1', $items));
		$this->assertTrue(in_array('item2', $items));
	}
}
