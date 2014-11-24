<?php

/**
 * プレイレポート
 *
 * Reportモデルは基本的な情報を集計する。
 * ゲーム固有の情報はこのモデルを継承したクラスの方で定義する。
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
			'Testplay' => array(
					'className' => 'Testplay',
					'foreignKey' => 'testplay_id',
					'conditions' => '',
					'fields' => '',
					'order' => ''
			)
	);

	/**
	 * レポートのフォーマット
	 */
	public $format = array();

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
