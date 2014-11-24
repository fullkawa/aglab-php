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
	 * @param integer $num_trials 試行回数
	 * @param array $conditions 実行条件
	 *
	 * @return array
	 */
	public function getPlans($num_trials, $conditions = array()) {
		if (!is_numeric($num_trials)) {
			$this->log("[PlayPlanner::getPlans()] num_trials is not a number. -> $num_trials", LOG_WARNING);
			return false;
		}
		if ($num_trials < 1) {
			$this->log("[PlayPlanner::getPlans()] num_trials is not valid. -> $num_trials", LOG_WARNING);
			return false;
		}

		$plans = array();

		$numPlayersSet = array();
		for ($i = 0; $i < $num_trials; $i++) {
			if (count($numPlayersSet) === 0 && is_numeric(@$conditions['num_players'])) {
				$numPlayersSet = $this->buildNumPlayersSet($conditions['num_players']);
			}
			$data = array(
				'game_id'	=> $conditions['game_id'],
				'testplay_id'	=> $conditions['testplay_id'],
				'type'		=> $conditions['type'],
				'status'	=> Play::STATUS_NOT_PLAYED,
				'num_players'	=> array_shift($numPlayersSet),
			);
			$plans[] = $data;
		}

		return $plans;
	}

	public function buildNumPlayersSet($num_players) {
		$set = array();
		if (is_numeric($num_players)) {
			for ($i = 1; $i <= $num_players; $i++) {
				$set[] = $i;
			}
			shuffle($set);
		}
		$this->log("[PlayPlanner::buildNumPlayersSet] set -> " . json_encode($set), LOG_DEBUG);
		return $set;
	}
}
