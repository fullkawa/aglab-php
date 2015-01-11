<?php
App::uses('Report', 'Model');

/**
 * Report Test Case
 *
 */
class ReportTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.report',
		'app.report_item',
		'app.game',
		'app.testplay',
		'app.play',
		'app.play_data',
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Report = ClassRegistry::init('Report');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Report);

		parent::tearDown();
	}

/**
 * レポート生成テスト
 *
 * @return void
 */
	public function testMakeReport() {
		$testplay_id = 1;
		$report = $this->Report->makeReport($testplay_id);
		//debug($report);

		$this->assertEquals('試行回数', $report['condition']['num_plays']['label']);
		$this->assertEquals('10', $report['condition']['num_plays']['count']);

		$this->assertEquals('最小プレイ人数', $report['condition']['min_players']['label']);
		$this->assertEquals('2', $report['condition']['min_players']['count']);

		$this->assertEquals('最大プレイ人数', $report['condition']['max_players']['label']);
		$this->assertEquals('4', $report['condition']['max_players']['count']);


		$this->assertEquals('試行回数', $report['result']['num_plays']['total']['label']);
		$this->assertEquals('テストプレイを実施した回数', $report['result']['num_plays']['total']['description']);
		$this->assertEquals('9', $report['result']['num_plays']['total']['count']);

		$this->assertEquals('2P', $report['result']['num_plays']['detail'][0]['label']);
		$this->assertEquals('3', $report['result']['num_plays']['detail'][0]['count']);
		$this->assertTextStartsWith('0.33', $report['result']['num_plays']['detail'][0]['ratio']);

		$this->assertEquals('3P', $report['result']['num_plays']['detail'][1]['label']);
		$this->assertEquals('3', $report['result']['num_plays']['detail'][1]['count']);
		$this->assertTextStartsWith('0.33', $report['result']['num_plays']['detail'][1]['ratio']);

		$this->assertEquals('4P', $report['result']['num_plays']['detail'][2]['label']);
		$this->assertEquals('3', $report['result']['num_plays']['detail'][2]['count']);
		$this->assertTextStartsWith('0.33', $report['result']['num_plays']['detail'][2]['ratio']);


		$this->assertEquals('試行エラー回数', $report['result']['err_plays']['total']['label']);
		$this->assertEquals('1', $report['result']['err_plays']['total']['count']);

		$this->assertEquals('適用できるルールがないケースが発生した。', $report['result']['err_plays']['total']['detail'][0]['label']);
		// FIXME: 集計困難？ $this->assertEquals('1', $report['result']['err_plays']['total']['detail'][0]['count']);
		$this->assertEquals('詳細', $report['result']['err_plays']['total']['detail'][0]['link_label']);
		$this->assertEquals('/plays/view/8', $report['result']['err_plays']['total']['detail'][0]['link_url']);


		$this->assertEquals('ドロー枚数', $report['result']['num_draws']['total']['label']);
		$this->assertEquals('64', $report['result']['num_draws']['total']['sum']);
		$this->assertEquals('27', $report['result']['num_draws']['total']['count']);
		$this->assertEquals('2.3704', $report['result']['num_draws']['total']['avg']);
		$this->assertEquals('0', $report['result']['num_draws']['total']['min']);
		$this->assertEquals('8', $report['result']['num_draws']['total']['max']);

		$this->assertEquals('2P', $report['result']['num_draws']['detail'][0]['label']);
		$this->assertEquals('6', $report['result']['num_draws']['detail'][0]['count']);
		$this->assertEquals('26', $report['result']['num_draws']['detail'][0]['sum']);

		$this->assertEquals('3P', $report['result']['num_draws']['detail'][1]['label']);
		$this->assertEquals('9', $report['result']['num_draws']['detail'][1]['count']);
		$this->assertEquals('2.2222', $report['result']['num_draws']['detail'][1]['avg']);

		$this->assertEquals('4P', $report['result']['num_draws']['detail'][2]['label']);
		$this->assertEquals('12', $report['result']['num_draws']['detail'][2]['count']);
		$this->assertEquals('0', $report['result']['num_draws']['detail'][2]['min']);
		$this->assertEquals('3', $report['result']['num_draws']['detail'][2]['max']);

		/* template
		$this->assertEquals('', $report['result']['']['label']);
		$this->assertEquals('', $report['result']['']['contents']);
		*/
	}

}
