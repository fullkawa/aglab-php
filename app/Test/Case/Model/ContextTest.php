<?php
App::uses('Context', 'Model');

class ContextTest extends CakeTestCase {

	/**
	 * 2人プレイ時のコンテキスト取得テスト
	 */
	public function testGet2P() {
		$params = array(
			'num_of_players' => 2
		);
		$context = Context::get($params);

		$this->assertEquals(0, $context['step']);

		$this->assertEquals(2, count($context['players']));
		$this->assertTrue(key_exists('actions', $context['players'][1]));
	}
}
