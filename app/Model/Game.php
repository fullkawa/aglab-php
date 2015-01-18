<?php
App::uses('AppModel', 'Model');

/**
 * ゲーム定義
 *
 * 本モデルでは、ゲームに関する基本情報を定義する。
 * 本フレームワークにおけるゲームとは、終了条件を満たすまでルールを適用し続けることである。
 *
 * @property Rule
 * @property Compo
 * @property Testplay
 * @property Repitem
 *
 * @author fullkawa
 */
class Game extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'title';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'title' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
			),
		)
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Testplay' => array(
			'className' => 'Testplay',
			'foreignKey' => 'game_id',
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
	);

	/**
	 * @deprecated
	 * @see Contextモデル
	 * コンテキスト(ゲーム内の各種ステータス)
	 * @var array
	 *
	protected $context = array();
	 */

	/**
	 * @deprecated
	 * ゲームを初期状態にする
	 *
	 * @param array $params パラメータ
	 * <p>
	 *  - 'num_players': プレイ人数<br/>
	 * </p>
	 *
	 * @return string $play_id プレイID
	 *
	public function setup($params) {

		return $play_id;
	}
	 */

	/**
	 * @deprecated
	 * ゲームを開始する
	 *
	 * @param stirng $play_id プレイID
	 * @return array $report プレイ結果(レポート)
	 *
	public function start() {
		$report = array();

		return $report;
	}
	 */

	/**
	 * @deprecated
	 * 自動テストプレイを行う
	 *
	 * @param array $params パラメータ
	 * <p>
	 *  - 'num_trials': 試行回数
	 * </p>
	 *
	 * @return array $report テストプレイ結果(レポート)
	 *
	public function autoplay() {
		$report = array();

		$num_plays = $this->request->param['num_plays'];
		for ($i=1; $i<=$num_plays; $i++) {
			$this->log("count:$i");
		}

		return $report;
	}
	 */

}
