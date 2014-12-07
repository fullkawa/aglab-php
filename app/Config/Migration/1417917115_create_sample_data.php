<?php
class CreateSampleData extends CakeMigration {

/**
 * Migration description
 *
 * @var string
 */
	public $description = 'create sample data';

/**
 * Actions to be performed
 *
 * @var array $migration
 */
	public $migration = array(
		'up' => array(
		),
		'down' => array(
		),
	);

/**
 * Before migration callback
 *
 * @param string $direction Direction of migration process (up or down)
 * @return bool Should process continue
 */
	public function before($direction) {
		return true;
	}

/**
 * After migration callback
 *
 * @param string $direction Direction of migration process (up or down)
 * @return bool Should process continue
 */
	public function after($direction) {
		$this->Game = ClassRegistry::init('Game');
		$this->GameComponent = ClassRegistry::init('GameComponent');

		if ($direction == 'up') {
			// サンプルゲーム『ババ抜き』
			$game_id = 1;
			$gdata = array(
				'id'	=> $game_id,
				'title'	=> 'ババ抜き',
				'name'	=> 'OldMaid',
				'version'	=> 1,
				'memo'	=> 'これはサンプルデータです。',
			);
			if (!$this->Game->save($gdata)) {
				$this->log("Gameデータの作成に失敗しました。-> " . json_encode($gdata));
			}

			// トランプのカードデータ
			$suits = array(
				array('name' => 'Club',		'shortened' => 'C'),
				array('name' => 'Diamond',	'shortened' => 'D'),
				array('name' => 'Heart',	'shortened' => 'H'),
				array('name' => 'Spade',	'shortened' => 'S')
			);
			$nums = array('A', '2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'Q', 'K');

			foreach ($suits as $suit) {
				foreach ($nums as $num) {
					$prop = array(
						'suit'	=> $suit['name'],
						'num'	=> $num,
					);
					$gcdata = array(
						'game_id'	=> $game_id,
						'component_type'	=> GameComponent::COMPONENT_TYPE_CARD,
						'name'				=> "{$suit['name']} {$num}",
						'shortened_name'	=> "{$suit['shortened']}{$num}",
						'properties'	=> serialize($prop),
						'quantity'	=> 1,
					);
					$this->GameComponent->create();
					if (!$this->GameComponent->save($gcdata)) {
						$this->log("GameComponentデータの作成に失敗しました。-> " . json_encode($gcdata));
					}
				}
			}
			// ジョーカー
			$gcdata = array(
				'game_id'	=> $game_id,
				'component_type'	=> GameComponent::COMPONENT_TYPE_CARD,
				'name'				=> "Joker",
				'shortened_name'	=> "Joker",
				'properties'	=> serialize(array()),
				'quantity'	=> 1,
			);
			$this->GameComponent->create();
			if (!$this->GameComponent->save($gcdata)) {
				$this->log("GameComponentデータの作成に失敗しました。-> " . json_encode($gcdata));
			}

		} elseif ($direction == 'down') {
			$this->GameComponent->deleteAll(array('game_id' => 1), false);
			$this->Game->deleteAll(array('id' => 1), false);
		}
		return true;
	}
}
