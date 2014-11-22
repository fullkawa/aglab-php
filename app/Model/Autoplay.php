<?php
App::uses('AppModel', 'Model');
/**
 * 自動プレイに関する情報
 *
 * このモデルに登録された情報を元に自動プレイが行われる。
 *
 * @property Game $Game
 */
class Autoplay extends AppModel {

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
		'num_plays' => array(
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
		'Game' => array(
			'className' => 'Game',
			'foreignKey' => 'game_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	const STATUS_NOT_PLAYED		= 0; // 未実行
	const STATUS_MAKING_PLAY	= 1; // プレイデータ作成中
	const STATUS_ON_PLAY		= 2; // 実行中
	const STATUS_WAIT_FOR_REPORT= 7; // レポート作成待ち
	const STATUS_DONE			= 9; // プレイ完了

	/**
	 * 未実行の自動プレイデータ(一件のみ)を取得する
	 */
	public function getReady() {
		try {
			$query = array(
				'conditions' => array('Autoplay.status' => STATUS_NOT_PLAYED),
				'order' => array('Autoplay.created DESC'),
			);
			$autoplay = $this->find('first', $query);

			return $autoplay;

		} catch (Exception $e) {
			$this->log($e->getTraceAsString());
		}
		return false;
	}

	/**
	 * 自動プレイの状態を変更する
	 *
	 * @param integer $status 変更後のステータス
	 *
	 * @return boolean DB変更結果
	 */
	public function changeStatus($status) {
		try {
			$data = array(
				'Autoplay' => array('status' => $status)
			);
			if (!$result = $this->save($data)) {
				$this->log("[$this->alias] Failed to change a status. -> " . json_encode($result));
				return false;
			}
			return $result;

		} catch (Exception $e) {
			$this->log($e->getTraceAsString());
		}
		return false;
	}

	/**
	 * 自動プレイデータからプレイデータを作成する
	 *
	 * @param integer $id 作成元となる自動プレイ情報のID
	 * @return multitype: saveAll()で保存できるフォーマットで
	 */
	public function makePlays($id) {
		$plays = array();

		// TODO: makePlays()実装

		return $plays;
	}
}
