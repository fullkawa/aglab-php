<?php

/**
 * ゲーム
 *
 * 本フレームワークにおけるゲームとは、終了条件を満たすまでルールを適用し続けることである。
 *
 * @author fullkawa
 */
Class Game extends AppModel {

	/**
	 * コンテキスト(ゲーム内の各種ステータス)
	 * @var array
	 */
	protected $context = array();

	/**
	 * ゲームを初期状態にする
	 *
	 * @param array $params パラメータ
	 * <p>
	 *  - 'num_players': プレイ人数<br/>
	 * </p>
	 *
	 * @return string $play_id プレイID
	 */
	public function setup($params) {

		return $play_id;
	}

	/**
	 * ゲームを開始する
	 *
	 * @param stirng $play_id プレイID
	 * @return array $report プレイ結果(レポート)
	 */
	public function start() {
		$report = array();

		return $report;
	}

	/**
	 * 自動テストプレイを行う
	 *
	 * @param array $params パラメータ
	 * <p>
	 *  - 'num_trials': 試行回数
	 * </p>
	 *
	 * @return array $report テストプレイ結果(レポート)
	 */
	public function autoplay($params) {
		$report = array();

		return $report;
	}
}
