<?php
App::uses('AppModel', 'Model');
/**
 * TODO: きっとKeyValueストアで保持するのが適切なはず
 * ヒストリ
 *
 * ゲームプレイ中の各ステップ(プレイの最小単位)の状態を保持する。
 *
 * @property Play $Play
 */
class PlayHistory extends AppModel {

	public $actsAs = array('Tree');

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

	/**
	 * ステータス：未処理
	 */
	const STATUS_NOT_EXECUTED = 0;

	/**
	 * ステータス：処理済み
	 */
	const STATUS_EXECUTED = 9;

	public function beforeSave($options = array()) {
		$this->log("[PlayHistory::beforeSave()] now", LOG_DEBUG);
		if (!parent::beforeSave()) {
			$this->log("[PlayHistory::beforeSave()] parent::beforeSave() is failed.", LOG_WARNING);
			return false;
		}

		if (@$this->data['PlayHistory']['context']) {
			$this->log("[PlayHistory::beforeSave()] context->" . json_encode($this->data['PlayHistory']['context']), LOG_DEBUG);
			$this->data['PlayHistory']['context'] = serialize($this->data['PlayHistory']['context']);
			///$this->log("[PlayHistory::beforeSave()] context->" . json_encode($this->data['PlayHistory']['context']), LOG_DEBUG);
		}
		return true;
	}

	public function afterFind($results, $primary = false) {
		$results = parent::afterFind($results, $primary);

		foreach ($results as &$result) {
			if (@$result['PlayHistory']['context']) {
				$result['PlayHistory']['context'] = unserialize($result['PlayHistory']['context']);
			}
		}
		return $results;
	}

	/**
	 * プレイを1ステップ進める
	 *
	 * @param array $data ヒストリデータ
	 *
	 * @return array|boolean $this->save()の戻り値
	 */
	public function next($data = array()) {
		if ($data) {
			if (@$data[$this->alias]) {
				$this->data = $data;
			} else {
				$this->data[$this->alias] = $data;
			}
		}
		///$this->log('[PlayHistory::next()] data -> ' . json_encode($this->data), LOG_DEBUG);
		$id = $this->data[$this->alias]['id'];

		$context = $this->data[$this->alias]['context'];
		if (empty($context)) {
			App::uses('Context', 'Model');
			$context = Context::get();
		}
		$this->Rule = ClassRegistry::init('Rule', true);
		$next_context = $this->Rule->applyAll($context);
		if (@$next_context['step']) {
			$next_context['step'] = $context['step'] + 1;
		}
		$next_data = array(
			'play_id'	=> $this->data[$this->alias]['play_id'],
			'parent_id'	=> $this->data[$this->alias]['id'],
			'context'	=> $next_context,
			'status'	=> PlayHistory::STATUS_NOT_EXECUTED,
		);
		///$this->log('[PlayHistory::next()] next_data -> ' . json_encode($next_data), LOG_DEBUG);

		$this->create();
		$result = $this->save($next_data);

		if ($result) {
			$this->_markAsExecuted($id);
		}

		return $result;
	}

	/**
	 * 処理済みにする
	 *
	 * @param integer $id 処理済みにするヒストリのID
	 * @return array|boolean $this->save()の戻り値
	 */
	public function _markAsExecuted($id) {
		$this->id = $id;
		$result = $this->saveField('status', PlayHistory::STATUS_EXECUTED);
		return $result;
	}
}
