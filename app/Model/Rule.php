<?php

/**
 * ルール
 *
 * 本フレームワークにおけるルールとは、ゲームの状況(コンテキスト)を変化させうる関数である。
 *
 * @author fullkawa
 */
class Rule extends AppModel {

	private $rules = array();

	/**
	 * ルール適用範囲：準備
	 */
	const SCOPE_SETUP = 1;

	/**
	 * ルール適用範囲：プレイ中
	 */
	const SCOPE_PLAYING = 2;

	/**
	 * ルール適用範囲：終了条件
	 */
	const SCOPE_END = 8;

	/**
	 * ルール適用範囲：勝敗判定
	 */
	const SCOPE_JUDGE = 9;

	/**
	 * ステータス：無効
	 */
	const STATUS_DISABLED = 0;

	/**
	 * ステータス：有効
	 */
	const STATUS_ENABLED = 1;

	/**
	 * ルールを適用する
	 *
	 * @param string $rule 適用するルール(関数)の名称
	 * @param array $context ゲームコンテキスト
	 * @return array $_context ルール適用後のコンテキスト
	 */
	public function apply($rule, $context) {
		$this->log("[Rule::apply()] rule -> " . json_encode($rule) . ", context -> " . json_encode($context), LOG_DEBUG);
		$className = $rule['Rule']['class'] . 'Rules';
		$packageName = $rule['Rule']['class'] . '.Lib';
		$methodName = $rule['Rule']['name'];

		App::uses($className, $packageName);
		$this->Rules = new $className;
		$_context = $this->Rules->$methodName($context);

		return $_context;
	}

	/**
	 * 有効な全てのルールを取得する
	 *
	 * @return array 有効な全てのルール
	 */
	public function getAll() {
		$query = array(
			'conditions' => array('Rule.status' => Rule::STATUS_ENABLED),
			'fields' => array('Rule.scope', 'Rule.class', 'Rule.name'),
			'order' => array('Rule.order'),
		);
		$rules = $this->find('all', $query);
		return $rules;
	}

	/**
	 * 与えられたコンテキストに対して全てのルールを適用する
	 *
	 * @param array $context
	 * @return boolean 正常に適用できたとき、true
	 */
	public function applyAll($context) {
		if (empty($this->rules)) {
			$this->rules = $this->getAll();
			$this->log('[Rule::applyAll()] Get all rules. -> ' . json_encode($this->rules), LOG_DEBUG);
		}
		try {
			foreach ($this->rules as $rule) {
				$context = $this->apply($rule, $context);
			}

		} catch (GameException $e) {
			$this->log('[Rule::applyAll()] Catch GameException.', LOG_INFO);
			// FIXME: 終了処理？

		} catch (Exception $e) {
			$this->log($e->getTraceAsString());
		}
		return $context;
	}
}
