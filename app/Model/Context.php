<?php

/**
 * コンテキスト
 *
 * コンテキストはある時点におけるゲームの状態すべてを記録、保持する
 *
 * @author fullkawa
 */
class Context extends AppModel {

	public $useTable = false;

	/**
	 * コンテキストのフォーマット/枠を取得する
	 *
	 * <dl>
	 *   <dt>step</dt><dd>実行ステップ数</dd>
	 *   <dt></dt><dd></dd>
	 * </dl>
	 */
	static public function get() {
		$context = array(
			'step' => 0,
		);
		return $context;
	}
}
