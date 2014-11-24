<?php

/**
 * 『ババ抜き』プレイレポート
 *
 * @author fullkawa
 */
class OldMaidReport extends Report {

	public $useTable = 'reports';

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
		$report = am(parent::makeReport($testplay_id), $this->format);

		// FIXME: makeReport()実装

		return $report;
	}

}
