<?php

/**
 * CMN*Generatorの基底クラス
 *
 * @author fullkawa
 */
class CMNGenerator extends RepdataGenerator {

	public function _getContextDependency() {
		return array('players');
	}

	public function _getTriggerRules() {
		return array();
	}

	public function getItems($context) {
		$items = array(
			'item1' => count($context['players']) . 'P'
		);
		return $items;
	}
}
