<?php

/**
 * イベント
 *
 * 本フレームワークにおいてイベントとは、とあるルールから別のルールへと受け渡されるメッセージである。
 *
 * @author fullkawa
 */
class Event extends Object {

	/**
	 * イベントを追加する
	 *
	 * @param string $event
	 * @param array $context $context['events']の最後に$eventが追加される。
	 * @return void
	 */
	public static function add($event, &$context) {
		$context['events'][] = $event;
	}

	/**
	 * あるイベントが発生しているかをチェックする
	 *
	 * @param string $event 正規表現も利用可能。その場合は、"/"で囲むこと。例) Event::raised('/^checked_*$/')
	 * @param array $context
	 * @return boolean $eventが$context['events']に含まれている場合、true
	 */
	public static function raised($event, $context) {
		$result = false;
		if (preg_match('|/*/|', $event)) {
			if (preg_grep($event, $context['events'])) {
				$result = true;
			}
		} else {
			$result = in_array($event, $context['events']);
		}
		return $result;
	}
}
