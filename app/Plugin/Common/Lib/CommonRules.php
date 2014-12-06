<?php

/**
 * 多くのゲームで見られる一般的なルール
 *
 * @author fullkawa
 */
class CommonRules extends Object {

	/**
	 * 前後のプレイヤーをセットする
	 *
	 * @param array $context
	 * @return array
	 */
	public function setPrevNextPlayer($context) {
		$this->log("[CommonRules setPrevNextPlayer()] now", LOG_DEBUG);
		try {
			if (($context['stage'] !== 'setup') || $context['players'][0]['next_player']) {
				return $context;
			}
		} catch (Exception $e) {
			return $context;
		}

		$players = $context['players'];
		$start = 0;
		$last = count($players) - 1;
		for ($i=$start; $i<=$last; $i++) {
			if ($i === $start) {
				$context['players'][$i]['prev_player'] = $last;
			} else {
				$context['players'][$i]['prev_player'] = $i - 1;
			}
			if ($i === $last) {
				$context['players'][$i]['next_player'] = $start;
			} else {
				$context['players'][$i]['next_player'] = $i + 1;
			}
		}
		return $context;
	}

	/**
	 * すべてのカードをデッキにセットする
	 *
	 * @param array $context
	 * @return array
	 */
	public function setAllToDeck($context) {
		$this->log("[CommonRules setAllToDeck()] now", LOG_DEBUG);
		if (($context['stage'] !== 'setup') || @$context['deck']) {
			return $context;
		}

		// FIXME: カードセットはcontextから与えられるべき
		$suits = array('C', 'D', 'H', 'S');
		$nums = array('1', '2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'Q', 'K');
		foreach ($suits as $suit) {
			foreach ($nums as $num) {
				$context['deck'][] = $suit . $num;
			}
		}
		$context['deck'][] = 'Joker';

		$this->log("[CommonRules setAllToDeck()] end; context->" . json_encode($context), LOG_INFO);
		return $context;
	}

	/**
	 * デッキのカードをシャッフルする
	 *
	 * @param array $context
	 * @return array
	 */
	public function shuffleDeck($context) {
		$this->log("[CommonRules shuffleDeck()] now", LOG_DEBUG);
		if ((@$context['stage'] !== 'setup') || empty($context['deck'])) {
			return $context;
		}

		shuffle($context['deck']);
		$description = "Deck shuffled.";
		$this->log($description, LOG_INFO);

		return $context;
	}

	/**
	 * デッキのカードすべてをプレイヤーに均等に配る
	 *
	 * @param array $context
	 * @return array
	 */
	public function dealAllCards($context) {
		$this->log("[CommonRules dealAllCards()] now", LOG_DEBUG);
		if ((@$context['stage'] !== 'setup') || @$context['players'][0]['hands']) {
			return $context;
		}

		if (empty($context['deck'])) {
			throw new Exception('No deck !!!');
		}

		$i = 0;
		foreach ($context['deck'] as $card) {
			$context['players'][$i]['hands'][] = $card;
			$i++;
			if ($i >= count($context['players'])) {
				$i = 0;
			}
		}

		$context['deck'] = array();

		$this->log("[CommonRules dealAllCards()] end; context->" . json_encode($context), LOG_INFO);
		return $context;
	}

	/**
	 * 準備終了
	 *
	 * @param array $context
	 * @return array
	 */
	public function setupEnd($context) {
		$this->log("[CommonRules setupEnd()] now", LOG_DEBUG);
		if ($context['stage'] !== 'setup') {
			return $context;
		}

		if (@$context['players'][0]['hands']) {
			$context['stage'] = 'game';
			$this->log("Setup end.", LOG_INFO);
		}

		return $context;
	}

	/**
	 * 手札がなくなったら勝ち抜け
	 *
	 * @param array $context
	 * @return array
	 */
	public function withNoHands($context) {
		$this->log("[CommonRules withNoHands()] now", LOG_DEBUG);

		foreach ($context['players'] as $i => &$player) {
			if (count($player['hands']) === 0 && !array_key_exists('gameend', $player)) {
				$player['gameend'] = true;
				$context['winners'][] = $player['player_name'];
				$this->log("[CommonRules::withNoHands()] winners->" . json_encode($context['winners']), LOG_DEBUG);

				// FIXME: プレイヤー抜け処理 →単独？
				$prev = $player['prev_player'];
				$next = $player['next_player'];
				$context['players'][$prev]['next_player'] = $next;
				$context['players'][$next]['prev_player'] = $prev;

				$description = "{$player['player_name']} Win !";
				$this->log($description, LOG_INFO);
			}
		}
		return $context;
	}

	/**
	 * 次のプレイヤーにターンを渡す
	 *
	 * @param array $context
	 * @return array
	 */
	public function passTurn($context) {
		$this->log("[CommonRules passTurn()] now", LOG_DEBUG);
		if ($context['stage'] !== 'game') {
			return $context;
		}

		$turn_player = $context['players'][$context['turn_player']];
		$context['turn_player'] = $turn_player['next_player'];

		$description = "Turn: {$turn_player['player_name']} -> {$context['players'][$turn_player['next_player']]['player_name']}";
		$this->log($description, LOG_INFO);

		return $context;
	}

	/**
	 * ゲームに残っているプレイヤーが一人になったとき、ゲーム終了
	 * @param array $context
	 * @return array
	 */
	public function gameEndWithOne($context) {
		$this->log("[CommonRules gameEndWithOne()] now", LOG_DEBUG);
		if ($context['stage'] !== 'game') {
			return $context;
		}

		if (count(@$context['players']) - count(@$context['winners']) === 1) {
			$context['stage'] = 'ending';
			$this->log("Game end.", LOG_INFO);
		}
		return $context;
	}

	/**
	 * 最後まで残ったプレイヤーが敗者
	 *
	 * @param array $context
	 * @return array
	 */
	public function lastPlayerIsLooser($context) {
		$this->log("[CommonRules lastPlayerIsLooser()] now", LOG_DEBUG);
		return $context;
	}
}
