<?php
App::uses('CMNGenerator', 'Common.Lib/Report');

/**
 * [プレイヤー別] カードを引いた枚数をカウントアップする
 *
 * @author fullkawa
 */
class LLGNumDrawGenerator extends CMNGenerator {

	public function _getContextDependency() {
		$dependency = parent::_getContextDependency();
		array_push($dependency,
			'turn_player',
			'players[*]>name'
		);
		return $dependency;
	}

	public function _getTriggerRules() {
		$rules = parent::_getTriggerRules();
		$rules[] = 'DrawCard';
		return $rules;
	}

	public function _getRepdata($context) {
		$repdata = array($this->getItems($context));
		$repdata[0]['key'] = 'num_draw';
		$repdata[0]['value'] = 1;
		$turn_player_name = $context['players'][$context['turn_player']];
		$repdata[0]['options'] = array(
			'label' => $turn_player_name
		);
		return $repdata;
	}
}
