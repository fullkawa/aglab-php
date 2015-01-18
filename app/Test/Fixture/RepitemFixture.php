<?php

class RepitemFixture extends CakeTestFixture {

	public $import = 'Repitem';

	public $records = array(
		array(
			'id' => 1,
			'item_name' => 'num_plays',
			'label' => '試行回数',
			'description' => 'テストプレイを実施した回数',
			'dimension1' => 'item1',
			'dimension2' => '',
			'target' => 'played',
			'summary_type' => 1,
			'threshold_target' => 'ratio',
			'threshold1' => 0.1,
			'threshold2' => 0.5,
			'min_samples' => 5,
			'created' => '2015-01-05 00:00:00',
			'updated' => '2015-01-05 00:00:00',
		),
		array(
			'id' => 2,
			'item_name' => 'err_plays',
			'label' => '試行エラー回数',
			'description' => 'エラーによりテストを完了できなかったプレイの回数',
			'dimension1' => 'item1',
			'dimension2' => '',
			'target' => 'err_raised',
			'summary_type' => 1,
			'threshold_target' => 'count',
			'threshold1' => 0,
			'threshold2' => 1,
			'min_samples' => 5,
			'created' => '2015-01-05 00:00:00',
			'updated' => '2015-01-05 00:00:00',
		),
		array(
			'id' => 3,
			'item_name' => 'num_draws',
			'label' => 'ドロー枚数',
			'description' => '1人のプレイヤーがゲーム終了までにドローするカードの枚数',
			'dimension1' => 'item1',
			'dimension2' => '',
			'target' => 'num_draw',
			'summary_type' => 2,
			'threshold_target' => 'average',
			'threshold1' => 1,
			'threshold2' => 4,
			'min_samples' => 5,
			'created' => '2015-01-05 00:00:00',
			'updated' => '2015-01-05 00:00:00',
		),
	);
}
