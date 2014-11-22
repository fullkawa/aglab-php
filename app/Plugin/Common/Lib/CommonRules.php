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
