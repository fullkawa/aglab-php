<?php
App::uses('AppModel', 'Model');

/**
 * プレイ
 *
 * @property PlayHistory
 * @property PlayData
 *
 * @author fullkawa
 */
class Play extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'game_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'type' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'status' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'num_players' => array(
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
		'Testplay' => array(
			'className' => 'Testplay',
			'foreignKey' => 'testplay_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'PlayData' => array(
			'className' => 'PlayData',
			'foreignKey' => 'play_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'PlayHistory' => array(
			'className' => 'PlayHistory',
			'foreignKey' => 'play_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

	// ステータス：0=未プレイ, 2=プレイ中, 7=レポート作成待ち, 9=プレイ完了

	/**
	 * ステータス：未プレイ
	 */
	const STATUS_NOT_PLAYED = 0;

	/**
	 * ステータス：プレイ中
	 */
	const STATUS_ON_PLAY = 2;

	/**
	 * ステータス：レポート作成待ち
	 */
	const STATUS_WAIT_FOR_REPORT = 7;

	/**
	 * ステータス：プレイ完了
	 */
	const STATUS_DONE = 9;

	public function beforeSave($options = array()) {
		if (!parent::beforeSave($options)) {
			return false;
		}

		if (@$this->data['Play']['conditions']) {
			$this->data['Play']['conditions'] = serialize($this->data['Play']['conditions']);
		}
		return true;
	}

	/**
	 * @deprecated
	 * アクティブな(＝完了ではない)プレイを取得する
	 *
	 * @return array
	 */
	public function getOnActive() {
		$query = array(
			'conditions' => array('Play.status !=' => Play::STATUS_DONE),
		);
		$result = $this->find('all', $query);
		return $result;
	}

	/**
	 * 指定されたプレイのステータス一覧を取得する
	 *
	 * @param integer $id プレイID
	 */
	public function getStatusesById($id) {
		$query = array(
			'conditions' => array('Play.id' => $id),
			'fields'	=> array('Play.id', 'Play.status', 'count(*) num'),
			'order '	=> array('Play.id', 'Play.status'),
		);
		$result = $this->find('all', $query);
		return $result;
	}
}
