<?php
App::uses('LostLegacyContext', 'LostLegacy.Model');

class LostLegacyContextTest extends CakeTestCase {

	/**
	 * 2人プレイ時のコンテキスト取得テスト
	 */
	public function testGet2P() {
		$params = array(
			'num_of_players' => 2
		);
		$context = LostLegacyContext::get($params);

		$this->assertTrue(key_exists('events', $context)); // Context由来の項目

		$this->assertEquals(2, count($context['players']));
		$this->assertTrue(key_exists('actions', $context['players'][0])); // Context由来の項目
		$this->assertTrue(key_exists('hands', $context['players'][1])); // LostLegacyContext由来の項目
	}
}
