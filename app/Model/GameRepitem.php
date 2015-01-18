<?php
App::uses('AppModel', 'Model');
/**
 * GameRepitem Model
 *
 * @property Game $Game
 * @property Repitem $Repitem
 */
class GameRepitem extends AppModel {


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
		'Repitem' => array(
			'className' => 'Repitem',
			'foreignKey' => 'repitem_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
