<?php

/**
 * プレイ実行バッチ
 *
 * @author fullkawa
 */
class DoPlayShell extends AppShell {

	/**
	 * 未処理のヒストリデータがあればプレイを進める
	 */
	public function main() {
		$this->PlayHistory = ClassRegistry::init('PlayHistory');

		$num_exec = Configure::read('num_exec_histories');
		$query = array(
			'conditions' => array('PlayHistory.status' => PlayHistory::STATUS_NOT_EXECUTED),
			'limit' => $num_exec,
		);
		$histories = $this->PlayHistory->find('all', $query);
		if (count($histories) === 0) {
			// 未処理のヒストリデータがなければバッチ終了
			return;
		}

		foreach ($histories as $history) {
			$next = $this->PlayHistory->next($history);
			$output = '[DoPlayShell::main()] make play_history: ' . $next['PlayHistory']['id']
				. ', from ' . $history['PlayHistory']['id'];
			$this->log($output, LOG_DEBUG);
		}
		$this->log('[DoPlayShell::main()] finished.', LOG_INFO);
	}
}
