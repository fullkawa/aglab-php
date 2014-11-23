<?php

/**
 * コンテキスト
 *
 * コンテキストはある時点におけるゲームの状態すべてを記録、保持する。
 * Contextモデルは本フレームワークの基本機能を実行するのに必要な情報を扱う。
 * ゲーム固有の情報はこのモデルを継承したクラスの方で定義する。
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
	static public function _get() {
		$context = array(
			'step' => 0,
		);
		return $context;
	}
}
