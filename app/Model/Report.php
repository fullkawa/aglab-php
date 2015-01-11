<?php

/**
 * レポート
 *
 * 作成されたレポートデータを保持する。
 *
 * @author fullkawa
 */
class Report extends AppModel {

	//The Associations below have been created with all possible keys, those that are not needed can be removed

	/**
	 * belongsTo associations
	 *
	 * @var array
	 */
	public $belongsTo = array(
		'Testplay' => array(
				'className' => 'Testplay',
				'foreignKey' => 'testplay_id',
				'conditions' => '',
				'fields' => '',
				'order' => ''
		)
	);

	/**
	 * テスト条件をまとめる
	 *
	 * @param array $test_cond テスト条件
	 * @return array
	 */
	public function _buildCondition($testplay) {
		$condition = array();

		$condition['num_plays'] = array(
			'label' => '試行回数',
			'count' => intval($testplay['Testplay']['num_plays'])
		);

		$test_cond = unserialize($testplay['Testplay']['conditions']);
		$items = array(
			array('key' => 'min_players', 'label' => '最小プレイ人数'),
			array('key' => 'max_players', 'label' => '最大プレイ人数'),
		);
		foreach ($items as $item) {
			$key = $item['key'];
			if (key_exists($key, $test_cond)) {
				$condition[$key]['label'] = $item['label'];
				$condition[$key]['count'] = $test_cond[$key];
			}
		}
		return $condition;
	}

	/**
	 * テスト項目を取得し、レポートを生成する
	 *
	 * @param integer $game_id ゲームID
	 * @return array
	 */
	public function _buildResult($testplay) {
		$this->ReportItem = ClassRegistry::init('ReportItem');
		$result = $this->ReportItem->getResult($testplay);
		return $result;
	}

	/**
	 * レポートを作成する
	 *
	 * @param integer $play_id
	 * @return array
	 */
	public function makeReport($testplay_id) {
		$report = array();

		$this->Testplay = ClassRegistry::init('Testplay');
		$this->Testplay->id = $testplay_id;
		$testplay = $this->Testplay->read();

		$report['condition'] = $this->_buildCondition($testplay);
		$report['result'] = $this->_buildResult($testplay);

		return $report;
	}
}
