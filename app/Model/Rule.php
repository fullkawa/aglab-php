<?php

/**
 * ルール
 *
 * 本フレームワークにおけるルールとは、ゲームの状況(コンテキスト)を変化させうる関数である。
 *
 * @author fullkawa
 */
class Rule extends AppModel {

	public $useTable = false; // FIXME: make table

	/**
	 * ルールを適用する
	 *
	 * @param array $context ゲームコンテキスト
	 * @return array $_context ルール適用後のコンテキスト
	 */
	public function apply($context) {
		$_context = $context;

		return $_context;
	}
}
