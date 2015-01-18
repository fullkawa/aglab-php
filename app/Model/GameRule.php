<?php
App::uses('AppModel', 'Model');
/**
 * GameRule Model
 *
 * @property Game $Game
 * @property Rule $Rule
 */
class GameRule extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Game' => array(
			'className' => 'Game',
			'foreignKey' => 'game_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Rule' => array(
			'className' => 'Rule',
			'foreignKey' => 'rule_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
