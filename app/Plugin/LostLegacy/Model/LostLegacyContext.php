<?php
App::uses('Context', 'Model');

/**
 * 『ロストレガシー』のコンテキスト
 *
 * @author fullkawa
 */
class LostLegacyContext extends Context {

	/**
	 * コンテキストのフォーマット/枠を取得する
	 *
	 * <dl>
	 *   <dt></dt><dd></dd>
	 * </dl>
	 */
	static public function get() {
		$context = parent::_get();
		$lostLegacyContext = am($context, array(
		));
		return $lostLegacyContext;
	}
}
