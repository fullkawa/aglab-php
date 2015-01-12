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
	 * <dl>
	 *   <dt>testplay_id</dt><dd>[int] テストプレイID</dd>
	 *   <dt>play_id</dt><dd>[int] プレイID</dd>
	 *   <dt>num_of_players</dt><dd>[int] プレイ人数</dd>
	 *   <dt>algorithms</dt><dd>[array] プレイヤーアルゴリズムのリストとその配分</dd>
	 *   <dt></dt><dd></dd>
	 * </dl>
	 *
	 * @return array
	 */
	public static function get($params = array()) {
		$context = array(
			'testplay_id' => $params['testplay_id'],
			'step'	=> 0,
			'stage'	=> 'setup',
			'events'	=> array(),
			'players'	=> array(),
		);
		if (@is_numeric($params['num_players'])) {
			$algorithms = array();
			for ($i=0; $i<$params['num_players']; $i++) {
				if (count($algorithms) === 0) {
					$algorithms = @self::_buildAlgorithms($params['conditions']['algorithms']);
				}
				$algorithm = array_shift($algorithms);
				$pl_context = self::_getPlayersContext($i+1, $algorithm);
				$context['players'][] = $pl_context;
			}
		}
		return $context;
	}

	public static function _buildAlgorithms($config) {
		$algorithms = array();
		foreach ($config as $key => $value) {
			for ($i=0; $i<$value; $i++) {
				$algorithms[] = $key;
			}
		}
		shuffle($algorithms);
		return $algorithms;
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
	public static function _getPlayersContext($num, $algorithm) {
		$context = array(
			'name'	=> "{$num}P",
			'algorithm'	=> $algorithm,
			'actions'	=> array(),
			'selected-action'	=> null,
			'prev-player'	=> null,
			'next-player'	=> null,
		);
		return $context;
	}
}
