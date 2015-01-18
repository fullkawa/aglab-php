<?php
App::uses('Event', 'Lib');

/**
 * レポートデータジェネレータ
 *
 * ジェネレータは、レポート作成のために集計されるデータ(Repdata)を生成する。
 *
 * レポート項目(Repitem)と1:1で対応するジェネレータが必要であり、それは本クラスを継承して作成する。
 * クラス名は、"プラグイン識別コード"+"レポート項目名"+"Generator"とする。
 * 例) プラグイン名:Common, プラグイン識別コード:CMN, レポート項目名:Hoge -> Common.Lib/Repitem/CMNHogeGerator
 *
 * @see Common.Lib/Repitem/CMNPlayedGerator ※実装の参考にしてください
 * @see Model/Repitem レポート項目
 * @see Model/Repdata レポートデータ
 *
 * @author fullkawa
 */
class RepdataGenerator extends Object {

	/**
	 * 新たなレポート項目を作成する場合は、本メソッドをオーバーライドし、
	 * レポートデータ生成に必要なコンテキストのパスを定義する。
	 *
	 * @return array
	 */
	public function _getContextDependency() {
		return array();
	}

	/**
	 * 新たなレポート項目を作成する場合は、本メソッドをオーバーライドし、
	 * トリガーとなるルールを定義する。
	 * トリガーが設定されていない(empty)場合、イベントがトリガーとなる。
	 *
	 * @return array
	 */
	public function _getTriggerRules() {
		return array();
	}

	/**
	 * イベントがトリガーとなる場合は、本メソッドをオーバーライドし、定義する。
	 *
	 * @return array
	 */
	public function _getTriggerEvents() {
		return array();
	}

	/**
	 * レポートデータ生成を行うか？
	 *
	 * @param string $ruleName
	 * @param array $context
	 * @param boolean
	 */
	public function onFire($ruleName, $context) {
		if (empty($this->_getTriggerRules())) {
			foreach ($this->_getTriggerEvents() as $event) {
				if (Event::raised($event, $context)) {
					return true;
				}
			}
		} else {
			return in_array($ruleName, $this->_getTriggerRules());
		}
		return false;
	}

	/**
	 * このジェネレータが依存するコンテキスト、ルールを取得する
	 *
	 * @return array
	 * <dl>
	 *   <dt>context</dt><dd>依存するコンテキストのパス</dd>
	 *   <dt>rules</dt><dd>依存するルールの名称</dd>
	 * </dl>
	 */
	public function getDependency() {
		$dependency = array(
			'context' => am($this->_getContextDependency()),
			'rules' => $this->_getTriggerRules(),
		);
		return $dependency;
	}

	/**
	 * 新たなレポート項目を作成する場合は、本メソッドをオーバーライドし、
	 * レポートデータ生成ロジックを実装する。
	 *
	 * @param array $context
	 * @return array Repdata->saveAll()で保存できる形式。'key', 'value'必須
	 */
	public function _getRepdata($context) {
		return array();
	}

	/**
	 * レポートデータを取得する
	 *
	 * @param array $context
	 * @return array
	 */
	public function getRepdata($context) {
		$repdata = $this->_getRepdata($context);
		foreach ($repdata as &$data) {
			$data['testplay_id'] = $context['testplay_id'];
			$data['play_id'] = $context['play_id'];
		}
		return $repdata;
	}
}
