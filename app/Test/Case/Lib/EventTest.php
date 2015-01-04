<?php
App::uses('Event', 'Lib');
App::uses('Context', 'Model');

class EventTest extends CakeTestCase {

	private $context = array();

	public function setUp() {
		$this->context = Context::get();
	}

	/**
	 * イベント追加テスト
	 */
	public function testAdd() {
		$event = 'on-test';
		Event::add($event, $this->context);

		$this->assertEquals('on-test', $this->context['events'][0]);
	}

	/**
	 * 完全一致によるイベントチェックテスト
	 */
	public function testRaised() {
		$event = 'on-test';
		Event::add($event, $this->context);
		$result = Event::raised('on-test', $this->context);

		$this->assertTrue($result);
	}

	/**
	 * 正規表現によるイベントチェックテスト(1)
	 */
	public function testRaisedWithWildcard1() {
		$event = 'checked_card-1_in_players>0>hands>0';
		Event::add($event, $this->context);
		$result = Event::raised('/checked_card-1_in_players>0>hands>.*/', $this->context);

		$this->assertTrue($result);
	}

	/**
	 * 正規表現によるイベントチェックテスト(2)
	 */
	public function testRaisedWithWildcard2() {
		$event = 'checked_card-1_in_players>0>hands>0';
		Event::add($event, $this->context);
		$result = Event::raised('/checked_.*_in_players>0>hands.*/', $this->context);

		$this->assertTrue($result);
	}
}
