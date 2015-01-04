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
	 *   <dt>stage</dt><dd>ステージ。標準的なゲームのステージは、setup/play/ending に分かれる。</dd>
	 *   <dt>events</dt><dd>[array] 発生したイベントはこの配列に追加される。</dd>
	 *   <dt>players</dt><dd></dd>
	 *   <dt></dt><dd></dd>
	 * </dl>
	 */
	public static function get($params = array()) {
		$context = array(
			'step' => 0,
			'stage' => '',
			'events' => array(),
			'players' => array(),
		);
		return $context;
	}

	/**
	 * プレイヤーコンテキストのフォーマット/枠を取得する
	 *
	 * <dl>
	 *   <dt>name</dt><dd>プレイヤー名</dd>
	 *   <dt>actions</dt><dd>[array] プレイヤーが実行可能なアクション</dd>
	 *   <dt></dt><dd></dd>
	 * </dl>
	 */
	public static function _getPlayersContext() {
		$context = array(
			'name' => '',
			'actions' => array(),
			'selected_action' => '',
		);
		return $context;
	}
}
