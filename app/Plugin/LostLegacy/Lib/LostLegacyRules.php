<?php
App::uses('LostLegacyComponent', 'LostLegacy.Model');

/**
 * 『LostLegacy』の固有ルール
 *
 * @author fullkawa
 */
class LostLegacyRules extends Object {


	public function drawCard($context) {
		$this->log("draw card", LOG_INFO);

		moveCard(array('deck', 'top'), array('players', $context['turn_player'], 'hands', 1));

		$context['players'][$context['turn_player']]['drawn'][] = $context['players'][$context['turn_player']]['hands'][1]['number'];

		return $context;
	}

	/**
	 * 宿命の少女(プレイ時)
	 *
	 * @param array $context
	 * @return array
	 */
	public function playGirlOfFate($context) {
		$this->log("play 'Girl of fate'", LOG_INFO);
	}

	/**
	 * 宿命の少女(効果の対象となった時)
	 *
	 * 「手札にあるこのカードを他のプレイヤーに見られた時」あなたはゲームから脱落する。
	 *
	 * @param array $context
	 * @return array
	 */
	public function intendedGirlOfFate($context, $target_path) {
		// if (Event::raised('checked_sneak-attack-*', $context)) と書きたい。
		if (array_key_exists('onchecked_sneak_attack', $context['events'])) {
			$this->log("intended 'Girl of fate'", LOG_INFO);

			moveCard($target_path, array('trush', 'last')); // FIXME: moveCard()実装
			moveCard(array('players', $context['turn_player'], 'hands', 0), $target_path);
			lose($context, $contxt['turn_player']);
		}
		return $context;
	}

	/**
	 * 将軍(プレイ時)
	 *
	 * 山札の一番上にあるカードを見る。あなたはそのカードと手札を交換してもよい。
	 *
	 * @param array $context
	 * @return array
	 */
	public function playGeneral($context) {
		$this->log("play 'General'", LOG_INFO);

		$actions = array(
			array('exchangeCard', array('deck', 'top'), array('players', $context['turn_player'], 'hands', 0)),
			array('doNothing'),
		);
		$action = $algorithm->getAction($actions, $context);
		$context = execute($action, $context); // FIXME: execute()実装

		return $context;
	}

	/**
	 * 女盗賊(プレイ時)
	 *
	 * あなた以外の誰かの手札あるいは遺跡にあるカードのうち1枚を見る。そのカードが《失われた遺産》だった場合、あなたはゲームに勝利する。
	 *
	 * @param array $context
	 * @return array
	 */
	public function playFemaleThief($context) {
		$this->log("play 'Female thief'", LOG_INFO);

		$actions = $this->_getActionsToCheckOthersCard($context);
		$actions[] = array(
			'checkCard', array('site')
		);
		$action = $algorithm->getAction($actions, $context);
		$context = execute($action, $context);

		if ($context['checked_card']['number'] === LostLegacyComponent::NUMBER_LOST_LEGACY) {
			win($context); // FIXME: win()実装
			game_end($context); // FIXME: game_end()実装
		}
		return $context;
	}

	/**
	 * あなた以外の誰かの手札を見る。
	 */
	public function _getActionsToCheckOthersCard($context) {
		$actions = array();
		foreach ($context['players'] as $player_name => $player) {
			if ($player_name !== $context['turn_player']) {
				$actions[] = array('checkCard', array('players', $player_name, 'hands', 0));
			}
		}
		return $actions;
	}

	/**
	 * 剣士(プレイ時)
	 *
	 * あなた以外の誰か一人の手札を見る。そのカードがXであった場合、その効果を無効にし、そのプレイヤーはゲームから脱落する。
	 *
	 * @param array $context
	 * @return array
	 */
	public function playSwordsman($context) {
		$this->log("play 'Swordsman'", LOG_INFO);

		$actions = $this->_getActionsToCheckOthersCard($context);
		$action = $algorithm->getAction($actions, $context);
		$context = execute($action, $context);

		if ($context['checked_card']['number'] === LostLegacyComponent::NUMBER_SNEAK_ATTACK) {
			lose($context, $contxt['checked_card']['owner']); // FIMXE: lose()実装
		}
		return $context;
	}

	/**
	 * 失われた遺産(プレイ時)
	 *
	 * このカードはプレイできない。
	 *
	 * @param array $context
	 * @return array
	 */
	public function playLostLegacy($context) {
		$message = "このカードはプレイできない。";
		throw new Exception($message);
	}

	/**
	 * 古地図(プレイ時)
	 *
	 * 山札の一番上にあるカードを見て遺跡に置く。その後、遺跡にあるカード全てをシャッフルしてもよい。
	 *
	 * @param array $context
	 * @return array
	 */
	public function playOldMap($context) {
		$this->log("play 'Old map'", LOG_INFO);

		checkCard($context, array('deck', 'top'));
		moveCard($context, array('deck', 'top'), array('site'));

		$actions = array(
			array('shuffleCards', 'site'),
			array('doNothing'),
		);
		$action = $algorithm->getAction($actions, $context);
		$context = execute($action, $context);

		return $context;
	}

	/**
	 * 調査(プレイ時)
	 *
	 * 遺跡にあるカード1枚を見る。あなたはそのカードと手札を交換してもよい。
	 *
	 * @param array $context
	 * @return array
	 */
	public function playSearch($context) {
		$this->log("play 'Search'", LOG_INFO);

		$actions = $this->_getActionsToCheckSiteCard($context);
		$action = $algorithm->getAction($actions, $context);
		$context = execute($action, $context);

		$actions = array(
			array('exchangeCard', array('site', $context['checked_card']['subscript']), array('players', $context['turn_player'], 'hands', 0)),
			array('doNothing'),
		);
		$action = $alogrithm->getAction($actions, $context);
		$context = execute($action, $context);

		return $context;
	}

	/**
	 * 遺跡にあるカード1枚を見る。
	 */
	public function _getActionsToCheckSiteCard($context) {
		$actions = array();
		foreach ($context['site'] as $subscript => $card) {
			$actions[] = array('checkCard', array('site', $subscript));
		}
		return $actions;
	}

	/**
	 * 襲撃(プレイ時)
	 *
	 * あなた以外の誰か一人の手札を見る。あなたはそのカードと手札を交換してもよい。
	 *
	 * @param array $context
	 * @return array
	 */
	public function playAssault($context) {
		$this->log("play 'Assault'", LOG_INFO);

		$actions = $this->_getActionsToCheckOthersCard($context);
		$action = $algorithm->getAction($actions, $context);
		$context = execute($action, $context);

		$actions = array(
			array('exchangeCard', array('players', $context['checked_card']['owner'], 'hands', 0), array('players', $context['turn_player'], 'hands', 0)),
			array('doNothing'),
		);
		$action = $algorithm->getAction($actions, $context);
		$context = execute($action, $context);
	}

	/**
	 * 待ち伏せ(プレイ時)
	 *
	 * @param array $context
	 * @return array
	 */
	public function playSneakAttack($context) {
		$this->log("play 'Sneak attack'", LOG_INFO);
	}

	/**
	 * 待ち伏せ(効果の対象となった時)
	 *
	 * 「手札にあるこのカードを他のプレイヤーに見られたとき」このカードを捨て札に置き、そのプレイヤーの手札を奪う。そのプレイヤーはゲームから脱落する。
	 *
	 * @param array $context
	 * @return array
	 */
	public function intendedSneakAttack($context, $target_path) {
		if (array_key_exists('onchecked_sneak_attack', $context['events'])) {
			$this->log("intended 'Sneak attack'", LOG_INFO);

			moveCard($target_path, array('trush', 'last')); // FIXME: moveCard()実装
			moveCard(array('players', $context['turn_player'], 'hands', 0), $target_path);
			lose($context, $contxt['turn_player']);
		}
		return $context;
	}

	/**
	 * 非公開状態のカードを1枚見る
	 *
	 * @param array $context
	 * @param array $target_path
	 * @param array
	 */
	public function checkCard($context, $target_path) {
		foreach ($target_path as $subscript) {
			$target = $context[$subscript];
		}

		if (@$target_path[2] === 'hands') {
			$context['events'][] = array(
				'onchecked_' . $target['name'],
			);
		}

		/* -> Event
		if ($target['number'] === LostLegacyComponent::NUMBER_GIRL_OF_FATE) {
			$context = $this->intendedGirlOfFate($context, $target_path);
		}
		if ($target['number'] === LostLegacyComponent::NUMBER_SNEAK_ATTACK) {
			$context = $this->intendedSneakAttack($context, $target_path);
		}
		*/

		$context['players'][$context['turn_player']]['known_cards'][] = array(
			'path' => $target_path,
			'number' => $target['number'],
		);
		return $context;
	}
	
	/**
	 * ゲーム終了時
	 * 
	 * @param array $context コンテキスト
	 */
	public function _onEnding($context) {
		$this->PlayData = ClassRegistry::init('PlayData', true);
		
		foreach ($context['players'] as $player) {
			$this->PlayData->record($context, 'num_draw', $player['num-draw'], $player['name']);
		}
	}
}
