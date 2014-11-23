<?php
App::uses('Context', 'Model');

/**
 * 『ババ抜き』のコンテキスト
 *
 * @author fullkawa
 */
class OldMaidContext extends Context {

	/**
	 * コンテキストのフォーマット/枠を取得する
	 *
	 * <dl>
	 *   <dt></dt><dd></dd>
	 * </dl>
	 */
	static public function get() {
		$context = parent::_get();
		$oldMaidContext = am($context, array(
		));
		return $oldMaidContext;
	}
}
