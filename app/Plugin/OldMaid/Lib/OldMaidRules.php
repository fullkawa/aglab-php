<?php

/**
 * 『ババ抜き』ルール
 *
 * @author fullkawa
 */
class OldMaidRules extends Object {

	/**
	 * プレイヤー初期設定
	 *
	 * @param array $context
	 * @return array
	 */
	public function setupPlayers($context) {
		$this->log("[OldMaidRules setupPlayers()] now", LOG_DEBUG);
		if (@$context['players']) {
			return $context;
		}

		$num_players = $context['num_players'];
		for ($i=1; $i<=$num_players; $i++) {
			$context['players'][] = array(
				'player_name'	=> 'Player' . $i,
				'playing_algorithm'	=> 'Randomizer',
				'playing_algorithm_package'	=> 'Common.Lib/PlayingAlgorithm',
			);
		}
		$context['turn_player'] = 0;
		$this->log("[OldMaidRules setupPlayers()] end; context->" . json_encode($context), LOG_INFO);
		return $context;
	}

	/**
	 * 手札にペアがある限り、処理を繰り返す
	 *
	 * @param array $context
	 * @return array
	 */
	public function whileStartHavePair($context) {
		$this->log("[OldMaidRules whileStartHavePair()] now", LOG_DEBUG);
		return $context;
	}

	public function whileEndHavePair($context) {
		$this->log("[OldMaidRules whileEndHavePair()] now", LOG_DEBUG);
		return $context;
	}

	/**
	 * 手札にペア(同じ値の組合せ)があれば捨てる
	 *
	 * @param array $context
	 * @return array
	 */
	public function dropPair($context) {
		$this->log("[OldMaidRules dropPair()] now", LOG_DEBUG);
		return $context;
	}

	/**
	 * 前プレイヤーの手札から1枚カードを引く
	 *
	 * @param array $context
	 * @return array
	 */
	public function drawCard($context) {
		$this->log("[OldMaidRules drawCard()] now", LOG_DEBUG);
		if ($context['stage'] !== 'game') {
			return $context;
		}

		$turn_player = &$context['players'][$context['turn_player']];
		$prev_player = &$context['players'][$turn_player['prev_player']];
		$context['actions'] = $prev_player['hands'];

		App::uses($turn_player['playing_algorithm'], $turn_player['playing_algorithm_package']);
		$algorithm = new $turn_player['playing_algorithm'];
		$card = $algorithm->getAction($context);

		$prev_player['hands'] = array_values(array_filter($prev_player['hands'], function ($hand) use ($card) {
			return ($hand !== $card);
		}));
		$turn_player['hands'][] = $card;

		$description = "{$turn_player['player_name']} draw: $card";
		$this->log($description, LOG_INFO);

		return $context;
	}
}
