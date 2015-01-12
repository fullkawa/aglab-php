<?php
/**
 * TestplayFixture
 *
 */
class TestplayFixture extends CakeTestFixture {

	public $import = 'Testplay';

/**
 * Records
 *
 * @var array
 */
	public function init() {
		parent::init();

		$conditions1 = array(
			'algorithms' => array(
				'Common.Lib/PlayingAlgorithm/Randomizer' => 3,
				'LostLegacy.Lib/PlayingAlgorithm/LowPlayer' => 1,
				'LostLegacy.Lib/PlayingAlgorithm/HighPlayer' => 1,
			)
		);
		$this->records = array(
			array(
				'id' => 1,
				'game_id' => 1,
				'type' => 1,
				'num_plays' => 10,
				'min_players' => 2,
				'max_players' => 4,
				'conditions' => serialize($conditions1),
				'created' => date('Y-m-d H:i:s'),
				'updated' => date('Y-m-d H:i:s'),
			),
		);
	}

}
