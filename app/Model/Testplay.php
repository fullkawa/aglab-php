<?php
App::uses('AppModel', 'Model');

/**
 * テストプレイに関する情報
 *
 * このモデルに登録された情報を元に自動/手動でテストプレイが行われる。
 *
 * @property Game $Game
 */
class Testplay extends AppModel {

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

	/**
	 * hasOne associations
	 *
	 * @var array
	 */
	public $hasOne = array(
			'Report' => array(
					'className' => 'Report',
					'foreignKey' => 'testplay_id',
			)
	);

	/**
	 * ステータス：未実行
	 */
	const STATUS_NOT_PLAYED = 0;

	/**
	 * ステータス：プレイデータ作成中
	 *
	 * 最初のプレイデータ作成時にこのステータスに変わる
	 */
	const STATUS_MAKING_PLAY = 1;

	/**
	 * ステータス：実行中
	 *
	 * 最初のルール評価時にこのステータスに変わる
	 */
	const STATUS_ON_PLAY = 2;

	/**
	 * ステータス：レポート作成待ち
	 *
	 * 関連付けられたすべてのプレイが終了した時、このステータスに変わる
	 */
	const STATUS_WAIT_FOR_REPORT = 7;

	/**
	 * ステータス：完了
	 */
	const STATUS_DONE = 9;

	/**
	 * 未実行の自動テストプレイデータ(一件のみ)を取得する
	 */
	public function getReady() {
		try {
			$query = array(
				'conditions' => array('Testplay.status' => STATUS_NOT_PLAYED),
				'order' => array('Testplay.created DESC'),
			);
			$testplay = $this->find('first', $query);

			return $testplay;

		} catch (Exception $e) {
			$this->log($e->getTraceAsString());
		}
		return false;
	}

	/**
	 * テストプレイの状態を変更する
	 *
	 * 変更前ステータスの指定がある場合は、そのステータスにあるときしか変更されない。
	 *
	 * @param integer $id テストプレイID
	 * @param integer $status 変更後のステータス
	 * @param integer $before 変更前のステータス(任意)
	 *
	 * @return boolean DB変更結果
	 */
	public function changeStatus($id, $status, $before = null) {
		try {
			// チェック
			$query = array('conditions' => array('Testplay.id'	=> $id));
			if ($before) {
				$query = am($query, array('conditions' => array('Testplay.status' => $before)));
			}
			$record = $this->find('first', $query);
			if (empty($record)) {
				return false;
			}

			// 変更
			$this->id = $record['Testplay']['id'];
			if (!$result = $this->saveField('status', $status)) {
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
	 * テストプレイデータからプレイデータを作成する
	 *
	 * @param integer $id 作成元となるテストプレイ情報のID
	 * @return multitype: saveAll()で保存できるフォーマットで
	 */
	public function makePlays($id) {
		$plays = array();

		// TODO: makePlays()実装

		return $plays;
	}

	/**
	 * レポート作成対象を取得する
	 *
	 * @return array レポートを作成できるデータ
	 */
	public function getForReport() {
		$query = array(
			'condtions' => array(
				'Testplay.status' => Testplay::STATUS_WAIT_FOR_REPORT,
			)
		);
		$record = $this->find('all', $query);
		return $record;
	}
}
