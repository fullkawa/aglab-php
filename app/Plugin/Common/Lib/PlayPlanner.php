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
				$numPlayers = $this->buildEvenNumbers($testplay['Testplay']['min_players'], $testplay['Testplay']['max_players']);
			}
			if (count($conditionList) === 0) {
				$conditionList = $this->buildEvenConditions($testplay['Testplay']['conditions']);
			}
			$data = array(
				'testplay_id'	=> $testplay['Testplay']['id'],
				'type'		=> 1, // 今のところこれ以外のテストなし
				'status'	=> Play::STATUS_NOT_PLAYED,
				'num_players'	=> array_shift($numPlayers),
				'conditions'	=> array_shift($conditionList),
			);
			$plans[] = $data;
		}

		return $plans;
	}

	/**
	 * 複数の条件についてなるべく均等な組合せを生成する
	 *
	 * @param array $conditions
	 * @return multitype:
	 */
	public function buildEvenConditions($conditions) {
		$conditionList = array();

		// テスト条件を一通り展開する
		$lists = array();
		$max_length = 0;
		foreach ($conditions as $cond_name => $condition) {
			foreach ($condition as $key => $value) {
				if (is_array($value)) {
					$lists[$cond_name] = $this->buildEvenNumbers(@$value['from'], @$value['to']);
				} elseif (is_numeric($value)) {
					if (empty($lists[$cond_name])) {
						$lists[$cond_name] = array();
					}
					$lists[$cond_name] = array_pad($lists[$cond_name], count($lists[$cond_name]) + $value, $key);
				}
			}
			if (count($lists[$cond_name]) > $max_length) {
				$max_length = count($lists[$cond_name]);
			}
		}

		// データが足りなければ補完する
		$stock = array();
		foreach ($lists as $cond_name => $condition) {
			$stock[$cond_name] = array();
			while (count($stock[$cond_name]) < $max_length) {
				shuffle($condition);
				$stock[$cond_name] = array_merge($stock[$cond_name], $condition);
			}
		}

		// 組合せをピックアップする
		for ($i=0; $i<$max_length; $i++) {
			$set = array();
			foreach ($stock as $cond_name => $condition) {
				$set[$cond_name] = array_shift($stock[$cond_name]);
			}
			$conditionList[] = $set;
		}
		return $conditionList;
	}

	/**
	 * 最小値～最大値の範囲で均等に、数の組合せを生成する
	 *
	 * @param integer $min 最小値
	 * @param integer $max 最大値
	 * @return multitype:number
	 */
	public function buildEvenNumbers($min, $max) {
		$numbers = array();
		if (!is_numeric($min) || !is_numeric($max)) {
			$this->log("[PlayPlanner::buildNumPlayersSet] Invalid parameters. min:{$min}, max:{$max}", LOG_WARNING);
		}
		for ($i = intval($min); $i <= intval($max); $i++) {
			$numbers[] = $i;
		}
		shuffle($numbers);

		$this->log("[PlayPlanner::buildNumPlayersSet] numbers -> " . json_encode($numbers), LOG_DEBUG);
		return $numbers;
	}

	/**
	 * キーの文字列を値の数だけ含むリストを生成する
	 *
	 * @param array $items キー => 値
	 * @return array
	 */
	public function buildList($items) {
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
