<?php
App::uses('AppModel', 'Model');

/**
 * プレイデータ
 *
 * レポートで集計されるためのデータ
 *
 * @author fullkawa
 */
class PlayData extends AppModel {

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
		'key' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
			)
		),
		'value' => array(
			'numeric' => array(
				'rule' => array('numeric'),
			)
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
