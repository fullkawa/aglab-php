<?php
App::uses('AppModel', 'Model');
/**
 * GameCompo Model
 *
 * @property Game $Game
 * @property Compo $Compo
 */
class GameCompo extends AppModel {


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
		'Compo' => array(
			'className' => 'Compo',
			'foreignKey' => 'compo_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
