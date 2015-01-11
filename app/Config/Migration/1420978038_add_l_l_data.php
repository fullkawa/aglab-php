<?php
class AddLLData extends CakeMigration {

	public $description = 'Add the LostLegacy data';

	public $migration = array(
		'up' => array(
		),
		'down' => array(
		),
	);

	public function before($direction) {
		return true;
	}

	public function after($direction) {
		$this->Game = ClassRegistry::init('Game');
		$game = array(
			'id' => 2,
			'title' => 'ロストレガシー',
			'name' => 'LostLegacy',
			'version' => '1.0',
			'memo' => '',
			'created' => date('Y-m-d H:i:s'),
			'updated' => date('Y-m-d H:i:s'),
		);
		if (!$this->Game->save($game)) {
			$this->log("Gameデータの作成に失敗しました。-> " . json_encode($gdata));
		}

		$this->Compo = ClassRegistry::init('GameComponent');
		$cards = array(
			array(
				'name' => '宿命の少女', 'shortened_name' => 'Girl', 'quantity' => 1,
				'properties' => serialize(array('order' => '1', 'text' => '', 'expansion' => 'Starship'))
			),
			array(
				'name' => '将軍', 'shortened_name' => 'General', 'quantity' => 1,
				'properties' => serialize(array('order' => '2', 'text' => '', 'expansion' => 'Starship'))
			),
			array(
				'name' => '女盗賊', 'shortened_name' => 'Theif', 'quantity' => 1,
				'properties' => serialize(array('order' => '3', 'text' => '', 'expansion' => 'Starship'))
			),
			array(
				'name' => '剣士', 'shortened_name' => 'Swardsman', 'quantity' => 1,
				'properties' => serialize(array('order' => '4', 'text' => '', 'expansion' => 'Starship'))
			),
			array(
				'name' => '失われた遺産：星を渡る船', 'shortened_name' => 'Legacy', 'quantity' => 1,
				'properties' => serialize(array('order' => '5', 'text' => '', 'expansion' => 'Starship'))
			),
			array(
				'name' => '古地図', 'shortened_name' => 'Map', 'quantity' => 2,
				'properties' => serialize(array('order' => '6', 'text' => '', 'expansion' => 'Starship'))
			),
			array(
				'name' => '調査', 'shortened_name' => 'Search', 'quantity' => 3,
				'properties' => serialize(array('order' => '7', 'text' => '', 'expansion' => 'Starship'))
			),
			array(
				'name' => '襲撃', 'shortened_name' => 'Assault', 'quantity' => 3,
				'properties' => serialize(array('order' => '8', 'text' => '', 'expansion' => 'Starship'))
			),
			array(
				'name' => '待ち伏せ', 'shortened_name' => 'Attack', 'quantity' => 3,
				'properties' => serialize(array('order' => 'X', 'text' => '', 'expansion' => 'Starship'))
			),
		);
		// 共通データをセットする
		foreach ($cards as &$card) {
			$card['game_id'] = 2;
			$card['component_type'] = GameComponent::COMPONENT_TYPE_CARD;
			$card['created'] = date('Y-m-d H:i:s');
			$card['updated'] = date('Y-m-d H:i:s');
		}
		$this->Compo->saveMany($cards);
		return true;
	}
}
