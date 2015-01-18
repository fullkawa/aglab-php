<?php

/**
 * レポート項目
 *
 * 本モデルでは、レポートとして集計する項目およびその方法を定義する。
 * レポート定義は1ゲームにつき1つだが、それから作成されるレポートはテストプレイごとに1つである。
 *
 * @author fullkawa
 */
class Repitem extends AppModel {

	//The Associations below have been created with all possible keys, those that are not needed can be removed

	/**
	 * belongsTo associations
	 *
	 * @var array
	 */
	public $belongsTo = array(
		'Game' => array(
			'className' => 'Game',
			'foreignKey' => 'game_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	/**
	 * 集計タイプ：カウント＋構成比
	 *
	 * 例) 1:nn1(m1[%]), 2:nn2(m2[%]), 3:nn3(m3[%]), 4:nn4(m4[%]), 5:nn5(m5[%])
	 *
	 * @var integer
	 */
	const SUM_TYPE_COUNT = 1;

	/**
	 * 集計タイプ：基本/順序統計量
	 *
	 * 例) サンプル数:nn1, 平均値:nn2, 最小値:nn3, 最大値:nn4
	 *
	 * @var integer
	 */
	const SUM_TYPE_STATS = 2;

	/**
	 * 基本/順序統計量を取得する
	 *
	 * @param integer $testplay_id 集計対象データのテストプレイID
	 * @param string $target 集計対象データのキー
	 * @param string $dimension ディメンジョンにしたい項目名
	 * @return array
	 */
	public function __getStats($testplay_id, $target, $dimension = null) {
		$this->Repdata = ClassRegistry::init('Repdata');
		$conditions = array(
			'Repdata.testplay_id' => $testplay_id,
			'Repdata.key' => $target,
		);
		$query = array(
			'fields' => array(
				'Repdata.key',
				'sum(value) sum',
				'count(value) count',
				'avg(value) avg',
				'min(value) min',
				'max(value) max',
			),
			'conditions' => $conditions,
		);
		if ($dimension) {
			$query['fields'][] = "Repdata.{$dimension}";
			$query['group'][] = "Repdata.{$dimension}";
		}
		$stats = $this->Repdata->find('all', $query);

		$details = $this->Repdata->find('all', array(
			'fields' => array(
				'Repdata.play_id',
				'Repdata.detail',
			),
			'conditions' => am($conditions, array(
				'and' => array(
					array('Repdata.detail !=' => null),
					array('Repdata.detail !=' => ''),
				)
			)),
			'limit' => 10,
		));
		if ($details & empty($dimension)) {
			$stats[0][0]['detail'] = array();
			foreach ($details as $playdata) {
				$detail = unserialize($playdata['Repdata']['detail']);
				$stats[0][0]['detail'][] = $detail;
			}
		}

		return $stats;
	}

	/**
	 * err_plays の詳細をまとめる
	 *
	 * @param array $detail
	 * @return array
	 */
	public function __getErrPlaysDetail($detail) {
		return array(
			'label' => $detail['err_message'],
			'link_label' => '詳細',
			'link_url' => Router::url(array('controller' => 'plays', 'action' => 'view', $detail['play_id'])),
		);
	}

	/**
	 * カウント＋構成比を集計する
	 *
	 * @param array $item 集計項目の定義
	 * @param integer $testplay_id テストプレイID
	 * @return array
	 */
	public function _buildCount($item, $testplay_id) {
		$count = array(
			$item['Repitem']['item_name'] => array(
				'total' => array(),
				'detail' => array(),
			)
		);

		$total = $this->__getStats($testplay_id, $item['Repitem']['target']);
		$count[$item['Repitem']['item_name']]['total'] = array(
			'label' => $item['Repitem']['label'],
			'description' => $item['Repitem']['description'],
			'count' => $total[0][0]['count'],
		);
		if (@$total[0][0]['detail']) {
			$func_name = "__get" . Inflector::camelize($item['Repitem']['item_name'] . "_detail");
			foreach ($total[0][0]['detail'] as $detail) {
				$count[$item['Repitem']['item_name']]['total']['detail'][] = $this->$func_name($detail);
			}
		}

		if ($item['Repitem']['dimension1']) {
			$detail = $this->__getStats($testplay_id, $item['Repitem']['target'], $item['Repitem']['dimension1']);
			foreach ($detail as $d) {
				$count[$item['Repitem']['item_name']]['detail'][] = array(
					'label' => $d['Repdata'][$item['Repitem']['dimension1']],
					'count' => $d[0]['count'],
					'ratio' => intval($d[0]['count']) / intval($total[0][0]['count']),
				);
			}
		}
		// FIXME: dimension2は不要？

		return $count;
	}

	/**
	 * 基本/順序統計量を集計する
	 *
	 * @param array $item 集計項目の定義
	 * @param integer $testplay_id テストプレイID
	 * @return array
	 */
	public function _buildStats($item, $testplay_id) {
		$stats = array(
			$item['Repitem']['item_name'] => array(
					'total' => array(),
					'detail' => array(),
			)
		);
		$total = $this->__getStats($testplay_id, $item['Repitem']['target']);
		$stats[$item['Repitem']['item_name']]['total'] = am(array(
			'label' => $item['Repitem']['label'],
			'description' => $item['Repitem']['description'],
		), $total[0][0]);

		if ($item['Repitem']['dimension1']) {
			$detail = $this->__getStats($testplay_id, $item['Repitem']['target'], $item['Repitem']['dimension1']);
			foreach ($detail as $d) {
				$stats[$item['Repitem']['item_name']]['detail'][] = am(array(
					'label' => $d['Repdata'][$item['Repitem']['dimension1']],
				), $d[0]);
			}
		}
		// FIXME: dimension2は不要？

		return $stats;
	}

	/**
	 * 項目ごとにレポート出力データをまとめる
	 *
	 * @param integer $testplay テストプレイ
	 * @return array
	 */
	public function getResult($testplay) {
		$result = array();

		$testplay_id = $testplay['Testplay']['id'];
		$items = $this->findAllByGameId($testplay['Testplay']['game_id']);
		foreach ($items as $item) {
			switch ($item['Repitem']['summary_type']) {
				case self::SUM_TYPE_COUNT:
					$summary = $this->_buildCount($item, $testplay_id);
					break;

				case self::SUM_TYPE_STATS:
					$summary = $this->_buildStats($item, $testplay_id);
					break;
			}
			if (@$summary) {
				$result = am($result, $summary);
			}
		}
		return $result;
	}
}
