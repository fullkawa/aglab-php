<?php
App::uses('AppModel', 'Model');

/**
 * PlayData Model
 *
 * @property Play $Play
 */
class PlayData extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'play_datas';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'play_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Play' => array(
			'className' => 'Play',
			'foreignKey' => 'play_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
