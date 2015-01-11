<?php
App::uses('AppModel', 'Model');

/**
 * プレイデータ
 *
 * レポートで集計されるためのデータ。
 * ゲームごとに独自のデータを取得する場合は、これを継承したモデルに実装する。
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

	/**
	 * ディメンジョンとして利用する項目のデータを取得する
	 *
	 * @param array $context
	 * @return array
	 * <dl>
	 *   <dt>0</dt><dd>プレイ人数</dd>
	 * </dl>
	 */
	public function _getItems($context) {
		$items = array_fill(0, 5, null);

		if (@is_array($context['players'])) {
			$items[0] = count($context['players']) . 'P';
		}
		return $items;
	}

	/**
	 * プレイデータを記録する
	 *
	 * @param array $context コンテキスト
	 * @param string $key キー
	 * @param integer $value 値
	 * @param string $label ラベル
	 * @param array $detail 詳細データ
	 * @return mixed saveの結果
	 */
	public function record($context, $key, $value, $label = null, $detail = null) {
		$items = $this->_getItems($context);
		$data = array(
			'testplay_id'	=> $testplay_id,
			'play_id'	=> $play_id,
			'item1'		=> $items[0],
			'item2'		=> $items[1],
			'item3'		=> $items[2],
			'item4'		=> $items[3],
			'item5'		=> $items[4],
			'key'		=> $key,
			'label'		=> $label,
			'value'		=> $value,
			'detail'	=> serialize($detail),
		);
		return $this->save($data);
	}
}
