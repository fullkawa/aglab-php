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
	 *   <dt>players</dt><dd>プレイヤー</dd>
	 *   <dt></dt><dd></dd>
	 * </dl>
	 *
	 * @param array $params
	 * <ul>
	 *   <li>testplay_id(int): テストプレイID</li>
	 *   <li>play_id(int): プレイID</li>
	 *   <li>num_of_players(int): プレイ人数</li>
	 *   <li></li>
	 * </ul>
	 *
	 * @return array
	 */
	public static function get($params = array()) {
		$context = array(
			'testplay_id' => $params['testplay_id'],
			'play_id' => $params['play_id'],
			'step'	=> 0,
			'stage'	=> '',
			'events'	=> array(),
			'players'	=> array(),
		);
		if (@is_numeric($params['num_players'])) {
			for ($i=0; $i<$params['num_players']; $i++) {
				$pl_context = self::_getPlayersContext();
				$context['players'][] = $pl_context;
			}
		}
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
			'name'	=> '',
			'algorithm'	=> null,
			'actions'	=> array(),
			'selected-action'	=> null,
			'prev-player'	=> null,
			'next-player'	=> null,
		);
		return $context;
	}
}
