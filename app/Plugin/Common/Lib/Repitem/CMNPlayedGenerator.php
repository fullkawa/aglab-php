<?php
App::uses('RepdataGenerator', 'Lib/Repitem');

/**
 * プレイが終了したとき、プレイ回数をカウントアップする
 *
 * @author fullkawa
 */
class CMNPlayedGenerator extends CMNGenerator {

	public function _getContextDependency() {
		$dependency = parent::_getContextDependency();
		return $dependency;
	}

	public function _getTriggerRules() {
		return array();
	}

	public function _getTriggerEvents() {
		$events = array('on-gameend');
		return $events;
	}

	public function _getRepdata($context) {
		$repdata = array($this->getItems($context));
		$repdata[0]['key'] = 'played';
		$repdata[0]['value'] = 1;
		return $repdata;
	}
}
