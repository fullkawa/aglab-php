<?php
/**
 * RepdataFixture
 *
 */
class RepdataFixture extends CakeTestFixture {

	public $import = 'Repdata';

	public function init() {
		parent::init();
		$this->records = array(
			/*
			 * プレイ(回数)データ
			 */
			array('id' => 1, 'testplay_id' => 1, 'play_id' => 1, 'item1' => '2P', 'item2' => '', 'item3' => '', 'item4' => '', 'item5' => '', 'key' => 'played', 'label' => '', 'value' => 1, 'detail' => '', 'created' => date('Y-m-d H:i:s'), 'updated' => date('Y-m-d H:i:s')),
			array('id' => 2, 'testplay_id' => 1, 'play_id' => 2, 'item1' => '3P', 'item2' => '', 'item3' => '', 'item4' => '', 'item5' => '', 'key' => 'played', 'label' => '', 'value' => 1, 'detail' => '', 'created' => date('Y-m-d H:i:s'), 'updated' => date('Y-m-d H:i:s')),
			array('id' => 3, 'testplay_id' => 1, 'play_id' => 3, 'item1' => '4P', 'item2' => '', 'item3' => '', 'item4' => '', 'item5' => '', 'key' => 'played', 'label' => '', 'value' => 1, 'detail' => '', 'created' => date('Y-m-d H:i:s'), 'updated' => date('Y-m-d H:i:s')),
			array('id' => 4, 'testplay_id' => 1, 'play_id' => 4, 'item1' => '4P', 'item2' => '', 'item3' => '', 'item4' => '', 'item5' => '', 'key' => 'played', 'label' => '', 'value' => 1, 'detail' => '', 'created' => date('Y-m-d H:i:s'), 'updated' => date('Y-m-d H:i:s')),
			array('id' => 5, 'testplay_id' => 1, 'play_id' => 5, 'item1' => '3P', 'item2' => '', 'item3' => '', 'item4' => '', 'item5' => '', 'key' => 'played', 'label' => '', 'value' => 1, 'detail' => '', 'created' => date('Y-m-d H:i:s'), 'updated' => date('Y-m-d H:i:s')),
			array('id' => 6, 'testplay_id' => 1, 'play_id' => 6, 'item1' => '2P', 'item2' => '', 'item3' => '', 'item4' => '', 'item5' => '', 'key' => 'played', 'label' => '', 'value' => 1, 'detail' => '', 'created' => date('Y-m-d H:i:s'), 'updated' => date('Y-m-d H:i:s')),
			array('id' => 7, 'testplay_id' => 1, 'play_id' => 7, 'item1' => '2P', 'item2' => '', 'item3' => '', 'item4' => '', 'item5' => '', 'key' => 'played', 'label' => '', 'value' => 1, 'detail' => '', 'created' => date('Y-m-d H:i:s'), 'updated' => date('Y-m-d H:i:s')),
			array('id' => 8, 'testplay_id' => 1, 'play_id' => 8, 'item1' => '3P', 'item2' => '', 'item3' => '', 'item4' => '', 'item5' => '', 'key' => 'played', 'label' => '', 'value' => 1, 'detail' => '', 'created' => date('Y-m-d H:i:s'), 'updated' => date('Y-m-d H:i:s')),
			array('id' => 9, 'testplay_id' => 1, 'play_id' => 9, 'item1' => '4P', 'item2' => '', 'item3' => '', 'item4' => '', 'item5' => '', 'key' => 'played', 'label' => '', 'value' => 1, 'detail' => '', 'created' => date('Y-m-d H:i:s'), 'updated' => date('Y-m-d H:i:s')),

			/*
			 * エラーデータ
			 */
			array('id' => 10, 'testplay_id' => 1, 'play_id' => 10, 'item1' => '4P', 'item2' => '', 'item3' => '', 'item4' => '', 'item5' => '', 'key' => 'err_raised', 'label' => '', 'value' => 1, 'detail' => 'a:2:{s:11:"err_message";s:60:"適用できるルールがないケースが発生した。";s:7:"play_id";i:8;}', 'created' => date('Y-m-d H:i:s'), 'updated' => date('Y-m-d H:i:s')),

			/*
			 * ドロー枚数データ
			 */
			array('id' => 11, 'testplay_id' => 1, 'play_id' => 1, 'item1' => '2P', 'item2' => '', 'item3' => '', 'item4' => '', 'item5' => '', 'key' => 'num_draw', 'label' => 'P1', 'value' => 1, 'detail' => '', 'created' => date('Y-m-d H:i:s'), 'updated' => date('Y-m-d H:i:s')),
			array('id' => 20, 'testplay_id' => 1, 'play_id' => 1, 'item1' => '2P', 'item2' => '', 'item3' => '', 'item4' => '', 'item5' => '', 'key' => 'num_draw', 'label' => 'P2', 'value' => 2, 'detail' => '', 'created' => date('Y-m-d H:i:s'), 'updated' => date('Y-m-d H:i:s')),

			array('id' => 12, 'testplay_id' => 1, 'play_id' => 2, 'item1' => '3P', 'item2' => '', 'item3' => '', 'item4' => '', 'item5' => '', 'key' => 'num_draw', 'label' => 'P1', 'value' => 1, 'detail' => '', 'created' => date('Y-m-d H:i:s'), 'updated' => date('Y-m-d H:i:s')),
			array('id' => 21, 'testplay_id' => 1, 'play_id' => 2, 'item1' => '3P', 'item2' => '', 'item3' => '', 'item4' => '', 'item5' => '', 'key' => 'num_draw', 'label' => 'P2', 'value' => 0, 'detail' => '', 'created' => date('Y-m-d H:i:s'), 'updated' => date('Y-m-d H:i:s')),
			array('id' => 29, 'testplay_id' => 1, 'play_id' => 2, 'item1' => '3P', 'item2' => '', 'item3' => '', 'item4' => '', 'item5' => '', 'key' => 'num_draw', 'label' => 'P3', 'value' => 0, 'detail' => '', 'created' => date('Y-m-d H:i:s'), 'updated' => date('Y-m-d H:i:s')),

			array('id' => 13, 'testplay_id' => 1, 'play_id' => 3, 'item1' => '4P', 'item2' => '', 'item3' => '', 'item4' => '', 'item5' => '', 'key' => 'num_draw', 'label' => 'P1', 'value' => 1, 'detail' => '', 'created' => date('Y-m-d H:i:s'), 'updated' => date('Y-m-d H:i:s')),
			array('id' => 22, 'testplay_id' => 1, 'play_id' => 3, 'item1' => '4P', 'item2' => '', 'item3' => '', 'item4' => '', 'item5' => '', 'key' => 'num_draw', 'label' => 'P2', 'value' => 1, 'detail' => '', 'created' => date('Y-m-d H:i:s'), 'updated' => date('Y-m-d H:i:s')),
			array('id' => 30, 'testplay_id' => 1, 'play_id' => 3, 'item1' => '4P', 'item2' => '', 'item3' => '', 'item4' => '', 'item5' => '', 'key' => 'num_draw', 'label' => 'P3', 'value' => 0, 'detail' => '', 'created' => date('Y-m-d H:i:s'), 'updated' => date('Y-m-d H:i:s')),
			array('id' => 35, 'testplay_id' => 1, 'play_id' => 3, 'item1' => '4P', 'item2' => '', 'item3' => '', 'item4' => '', 'item5' => '', 'key' => 'num_draw', 'label' => 'P4', 'value' => 0, 'detail' => '', 'created' => date('Y-m-d H:i:s'), 'updated' => date('Y-m-d H:i:s')),

			array('id' => 14, 'testplay_id' => 1, 'play_id' => 4, 'item1' => '4P', 'item2' => '', 'item3' => '', 'item4' => '', 'item5' => '', 'key' => 'num_draw', 'label' => 'P1', 'value' => 3, 'detail' => '', 'created' => date('Y-m-d H:i:s'), 'updated' => date('Y-m-d H:i:s')),
			array('id' => 23, 'testplay_id' => 1, 'play_id' => 4, 'item1' => '4P', 'item2' => '', 'item3' => '', 'item4' => '', 'item5' => '', 'key' => 'num_draw', 'label' => 'P2', 'value' => 3, 'detail' => '', 'created' => date('Y-m-d H:i:s'), 'updated' => date('Y-m-d H:i:s')),
			array('id' => 31, 'testplay_id' => 1, 'play_id' => 4, 'item1' => '4P', 'item2' => '', 'item3' => '', 'item4' => '', 'item5' => '', 'key' => 'num_draw', 'label' => 'P3', 'value' => 3, 'detail' => '', 'created' => date('Y-m-d H:i:s'), 'updated' => date('Y-m-d H:i:s')),
			array('id' => 36, 'testplay_id' => 1, 'play_id' => 4, 'item1' => '4P', 'item2' => '', 'item3' => '', 'item4' => '', 'item5' => '', 'key' => 'num_draw', 'label' => 'P4', 'value' => 2, 'detail' => '', 'created' => date('Y-m-d H:i:s'), 'updated' => date('Y-m-d H:i:s')),

			array('id' => 15, 'testplay_id' => 1, 'play_id' => 5, 'item1' => '3P', 'item2' => '', 'item3' => '', 'item4' => '', 'item5' => '', 'key' => 'num_draw', 'label' => 'P1', 'value' => 4, 'detail' => '', 'created' => date('Y-m-d H:i:s'), 'updated' => date('Y-m-d H:i:s')),
			array('id' => 24, 'testplay_id' => 1, 'play_id' => 5, 'item1' => '3P', 'item2' => '', 'item3' => '', 'item4' => '', 'item5' => '', 'key' => 'num_draw', 'label' => 'P2', 'value' => 4, 'detail' => '', 'created' => date('Y-m-d H:i:s'), 'updated' => date('Y-m-d H:i:s')),
			array('id' => 32, 'testplay_id' => 1, 'play_id' => 5, 'item1' => '3P', 'item2' => '', 'item3' => '', 'item4' => '', 'item5' => '', 'key' => 'num_draw', 'label' => 'P3', 'value' => 4, 'detail' => '', 'created' => date('Y-m-d H:i:s'), 'updated' => date('Y-m-d H:i:s')),

			array('id' => 16, 'testplay_id' => 1, 'play_id' => 6, 'item1' => '2P', 'item2' => '', 'item3' => '', 'item4' => '', 'item5' => '', 'key' => 'num_draw', 'label' => 'P1', 'value' => 8, 'detail' => '', 'created' => date('Y-m-d H:i:s'), 'updated' => date('Y-m-d H:i:s')),
			array('id' => 25, 'testplay_id' => 1, 'play_id' => 6, 'item1' => '2P', 'item2' => '', 'item3' => '', 'item4' => '', 'item5' => '', 'key' => 'num_draw', 'label' => 'P2', 'value' => 7, 'detail' => '', 'created' => date('Y-m-d H:i:s'), 'updated' => date('Y-m-d H:i:s')),

			array('id' => 17, 'testplay_id' => 1, 'play_id' => 7, 'item1' => '2P', 'item2' => '', 'item3' => '', 'item4' => '', 'item5' => '', 'key' => 'num_draw', 'label' => 'P1', 'value' => 4, 'detail' => '', 'created' => date('Y-m-d H:i:s'), 'updated' => date('Y-m-d H:i:s')),
			array('id' => 26, 'testplay_id' => 1, 'play_id' => 7, 'item1' => '2P', 'item2' => '', 'item3' => '', 'item4' => '', 'item5' => '', 'key' => 'num_draw', 'label' => 'P2', 'value' => 4, 'detail' => '', 'created' => date('Y-m-d H:i:s'), 'updated' => date('Y-m-d H:i:s')),

			array('id' => 18, 'testplay_id' => 1, 'play_id' => 8, 'item1' => '3P', 'item2' => '', 'item3' => '', 'item4' => '', 'item5' => '', 'key' => 'num_draw', 'label' => 'P1', 'value' => 3, 'detail' => '', 'created' => date('Y-m-d H:i:s'), 'updated' => date('Y-m-d H:i:s')),
			array('id' => 27, 'testplay_id' => 1, 'play_id' => 8, 'item1' => '3P', 'item2' => '', 'item3' => '', 'item4' => '', 'item5' => '', 'key' => 'num_draw', 'label' => 'P2', 'value' => 2, 'detail' => '', 'created' => date('Y-m-d H:i:s'), 'updated' => date('Y-m-d H:i:s')),
			array('id' => 33, 'testplay_id' => 1, 'play_id' => 8, 'item1' => '3P', 'item2' => '', 'item3' => '', 'item4' => '', 'item5' => '', 'key' => 'num_draw', 'label' => 'P3', 'value' => 2, 'detail' => '', 'created' => date('Y-m-d H:i:s'), 'updated' => date('Y-m-d H:i:s')),

	 		array('id' => 19, 'testplay_id' => 1, 'play_id' => 9, 'item1' => '4P', 'item2' => '', 'item3' => '', 'item4' => '', 'item5' => '', 'key' => 'num_draw', 'label' => 'P1', 'value' => 2, 'detail' => '', 'created' => date('Y-m-d H:i:s'), 'updated' => date('Y-m-d H:i:s')),
			array('id' => 28, 'testplay_id' => 1, 'play_id' => 9, 'item1' => '4P', 'item2' => '', 'item3' => '', 'item4' => '', 'item5' => '', 'key' => 'num_draw', 'label' => 'P2', 'value' => 1, 'detail' => '', 'created' => date('Y-m-d H:i:s'), 'updated' => date('Y-m-d H:i:s')),
			array('id' => 34, 'testplay_id' => 1, 'play_id' => 9, 'item1' => '4P', 'item2' => '', 'item3' => '', 'item4' => '', 'item5' => '', 'key' => 'num_draw', 'label' => 'P3', 'value' => 1, 'detail' => '', 'created' => date('Y-m-d H:i:s'), 'updated' => date('Y-m-d H:i:s')),
			array('id' => 37, 'testplay_id' => 1, 'play_id' => 9, 'item1' => '4P', 'item2' => '', 'item3' => '', 'item4' => '', 'item5' => '', 'key' => 'num_draw', 'label' => 'P4', 'value' => 1, 'detail' => '', 'created' => date('Y-m-d H:i:s'), 'updated' => date('Y-m-d H:i:s')),

			/*
			array('id' => 999, 'testplay_id' => 1, 'play_id' => 1, 'item1' => '4P', 'item2' => '', 'item3' => '', 'item4' => '', 'item5' => '', 'key' => '', 'value' => 1, 'detail' => '', 'created' => date('Y-m-d H:i:s'), 'updated' => date('Y-m-d H:i:s')),
			*/
		);
	}

}
