<?php

/**
 * レポート定義
 *
 * 本モデルでは、レポートとして集計する項目およびその方法を定義する。
 * レポート定義は1ゲームにつき1つだが、それから作成されるレポートはテストプレイごとに1つである。
 *
 * @author fullkawa
 */
class Report extends AppModel {

	//The Associations below have been created with all possible keys, those that are not needed can be removed

	/**
	 * belongsTo associations
	 *
	 * @var array
	 */
	public $belongsTo = array(
			'Game' => array(
					'className' => 'Game',
					'foreignKey' => 'game_id',
					'conditions' => '',
					'fields' => '',
					'order' => ''
			)
	);

	/**
	 * レポートを作成する
	 *
	 * @param integer $play_id
	 * @return array
	 */
	public function makeReport($testplay_id) {
		$report = $this->format;

		// FIXME: makeReport()実装

		return $report;
	}
}
