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
	public static function get($params = array()) {
		$context = am(parent::get($params), array(
			'deck'	=> array(),
			'site'	=> array(),
			'turn_player'	=> 0,
			'winners'	=> array(),
			'losers'	=> array(),
		));
		foreach ($context['players'] as &$player) {
			self::_addPlayersContext($player);
		}
		return $context;
	}

	/**
	 * プレイヤーコンテキストを追加する。
	 *
	 * @param array $players プレイヤー
	 *
	 * @return void
	 */
	public static function _addPlayersContext(&$player) {
		$context = array(
			'hands'	=> array(),
			'trash'	=> array(),
			'known-cards'	=> array(),
			'num-draw'		=> 0,
			'num-action'	=> 0,
			'flg-search'	=> false,
			'flg-finded'	=> false,
		);
		$player = am($player, $context);
	}
}
