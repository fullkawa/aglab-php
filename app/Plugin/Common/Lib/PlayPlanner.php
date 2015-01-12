<?php
App::uses('Play', 'Model');

/**
 * プレイ計画作成クラス
 *
 * @author fullkawa
 *
 */
class PlayPlanner extends Object {

	/**
	 * プレイ計画を取得する
	 *
	 * 指定された試行回数内で、実行条件をなるべく網羅するような計画を作成する。
	 *
	 * @param integer $testplay_id テストプレイデータ
	 * @return array Play.saveAll()で保存されるデータ
	 */
	public function getPlans($testplay) {
		$plans = array();

		$numPlayers = array();
		$conditionList = array();
		for ($i = 0; $i < $testplay['Testplay']['num_plays']; $i++) {
			if (count($numPlayers) === 0) {
				$numPlayers = $this->buildEvenNumberList($testplay['Testplay']['min_players'], $testplay['Testplay']['max_players']);
			}
			$data = array(
				'testplay_id'	=> $testplay['Testplay']['id'],
				'type'		=> 1, // 今のところこれ以外のテストなし
				'status'	=> Play::STATUS_NOT_PLAYED,
				'num_players'	=> array_shift($numPlayers),
				'conditions'	=> $testplay['Testplay']['conditions'],
			);
			$plans[] = $data;
		}

		return $plans;
	}

	/**
	 * 最小値～最大値の範囲で均等な数のリストを生成する
	 *
	 * @param integer $min 最小値
	 * @param integer $max 最大値
	 * @return multitype:number
	 */
	public function buildEvenNumberList($min, $max) {
		$list = array();
		if (!is_numeric($min) || !is_numeric($max)) {
			$this->log("[PlayPlanner::buildNumPlayersSet] Invalid parameters. min:{$min}, max:{$max}", LOG_WARNING);
		}
		for ($i = intval($min); $i <= intval($max); $i++) {
			$list[] = $i;
		}
		shuffle($list);

		$this->log("[PlayPlanner::buildNumPlayersSet] numbers -> " . json_encode($list), LOG_DEBUG);
		return $list;
	}

	/**
	 * ※現在未使用(でもどこかで使うかも)
	 * キーの文字列を値の数だけ含むリストを生成する
	 *
	 * @param array $items キー => 値
	 * @return array
	 */
	public function buildItemList($items) {
		$list = array();
		foreach ($items as $key => $value) {
			for ($i=0; $i<$value; $i++) {
				$list[] = $key;
			}
		}
		shuffle($list);
		return $list;
	}
}
