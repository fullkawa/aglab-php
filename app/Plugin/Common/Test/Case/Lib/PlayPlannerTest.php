<?php
App::uses('PlayPlanner', 'Common.Lib');

Class PlayPlannerTest extends CakeTestCase {

	public function testGetPlans() {
		$PlayPlanner = new PlayPlanner();

		$num_trials = 5;
		$conditions = array(
			'num_players'	=> array('from' => 1, 'to' => 4),
		);
		$plans = $PlayPlanner->getPlans($num_trials, $conditions);

		$this->assertEquals(5, count($plans), '返ってくる配列の数は試行回数に等しい。');
		$this->assertNotEmpty($plans[0]['num_players'], 'conditionsの要素が含まれていること。');
		foreach ($plans as $plan) {
			$this->assertLessThan(3, $plan['num_players'], '均等に散らばっていること。');
		}
	}
}
