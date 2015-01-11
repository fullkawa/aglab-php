<?php
/**
 * GameFixture
 *
 */
class GameFixture extends CakeTestFixture {

	public $import = 'Game';

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'title' => 'Test Game',
			'version' => '1.0',
			'memo' => 'これはテスト用のゲームです。',
			'created' => '2014-11-16 13:12:49',
			'updated' => '2014-11-16 13:12:49'
		),
	);

}
