<?php
App::uses('NoActionException', 'Lib');

/**
 * プレイングアルゴリズム
 *
 * 自動テストにおいて、プレイヤーの代わりに手を選択するアルゴリズム。
 * ゲームにおけるすべての選択は、このクラスを継承したクラスのgetAction()メソッドにて行う。
 *
 * @author fullkawa
 */
class PlayingAlgorithm extends Object {

	/**
	 * アクションを選択する
	 *
	 * @param array $context コンテキスト
	 * @return array
	 */
	public function getAction($context) {
		$message = 'Subclass of `PlayingAlgorithm` must be implemented this function !';
		throw new NotImplementedException($message);
	}

	/*
	 * 基本的な入力チェッカー
	 */

	/**
	 * Context内にアクションが1つ以上なければならない。
	 *
	 * @param array $context コンテキスト
	 * @return boolean アクションが適切にセットされていない場合、false
	 */
	public function _checkActions($context) {
		$actions = $context['actions'];
		if (!is_array($actions)) {
			$message = 'Actions is not a array !';
			throw new NoActionException($message);
		}
		if (count($actions) < 1) {
			$message = 'Actions is less than 1.';
			throw new NoActionException($message);
		}
		return true;
	}
}