<?php

class CommonFunctions extends Object {

	/**
	 * 何も実行しない
	 *
	 * @param unknown $context
	 * @return unknown
	 */
	public function doNothing($context) {
		return $context;
	}

	/**
	 * カードを引く
	 *
	 * @param array $context
	 * @param string $from カードを引く場所(の名前)
	 * @param integer $num 引く枚数
	 * @return array 引いたカード -> FIXME: contextを返すべき？
	 */
	public function drawCard($context, $from = 'deck', $num = 1) {
		// FIXME: drawCard実装
		return array();
	}

	/**
	 * ターンプレイヤーはデッキの一番上にあるカードと手札を交換してもよい。
	 *
	 * @param array $context
	 * @return array 手札と交換する/しない
	 */
	public function getActionsToExchange($context) {
		$actions = array();

		// FIXME: getActions実装

		return $actions;
	}
}