<?php
App::uses('PlayingAlgorithm', 'Lib');

/**
 * プレイングアルゴリズム：ランダマイザ
 *
 * 選択可能な手の中からランダムに手を決定する。
 *
 * @author fullkawa
 */
class Randomizer extends PlayingAlgorithm {

	public function getAction($context) {
		$this->_checkActions($context);

		$actions = $context['actions'];
		$this->log("[Randomizer::getAction()] actions->" . json_encode($actions), LOG_DEBUG);
		$idx = mt_rand(0, count($actions) - 1);
		$this->log("[Randomizer::getAction()] select->$idx", LOG_DEBUG);
		return $actions[$idx];
	}
}