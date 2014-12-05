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
			if ($context['players'][0]['next_player']) {
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
		if (@$context['deck']) {
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
		$context['deck'][] = 'JK';

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
		if (@$context['players'][0]['hands']) {
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
		$this->log("[CommonRules dealAllCards()] end; context->" . json_encode($context), LOG_INFO);
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
		return $context;
	}

	/**
	 * ゲームに残っているプレイヤーが一人になったとき、ゲーム終了
	 * @param array $context
	 * @return array
	 */
	public function gameEndWithOne($context) {
		$this->log("[CommonRules gameEndWithOne()] now", LOG_DEBUG);
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
