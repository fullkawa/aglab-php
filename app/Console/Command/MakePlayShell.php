<?php
App::uses('Context', 'Model');
App::uses('Step', 'Model');

/**
 * プレイデータ作成バッチ
 *
 * @author fullkawa
 */
class MakePlayShell extends AppShell {

	/**
	 * 未実行の自動テストプレイデータがあれば、自動テストプレイを開始する。
	 */
	public function main() {
		$this->Testplay = ClassRegistry::init('Testplay');
		$this->Play = ClassRegistry::init('Play');

		$testplay = $this->Testplay->getReady();
		if (empty($testplay)) {
			// 対象データがなければバッチ終了
			$this->log('[MakePlayShell] 未実行のテストプレイデータはありません。', LOG_INFO);
			return;
		}

		$testplay_id = $testplay['Testplay']['id'];
		$this->Testplay->changeStatus($testplay_id, Testplay::STATUS_MAKING_PLAY);
		$this->log("[MakePlayShell] テストプレイID:{$testplay_id}を開始します。", LOG_INFO);

		$plays = $this->Testplay->makePlays($testplay);
		foreach ($plays as $play) {
			try {
				$modelName = "{$testplay['Game']['name']}Context";
				App::uses($modelName, "{$testplay['Game']['name']}.Model");
				$context = $modelName::get($play);

			} catch (Exception $e) {
				$this->log("No {$modelName} class.", LOG_DEBUG);
				$context = Context::get($play);
			}
			$data = array(
				'Play' => $play,
				'Step' => array(
					array(
						'context'	=> $context,
						'status'	=> Step::STATUS_NOT_EXECUTED,
					)
				)
			);
			if (!$this->Play->saveAll($data)) {
				$this->log("[MakePlayShell] Failed to save. -> " . json_encode($data));
			}
		}

		$num = count($plays);
		$this->log("[MakePlayShell] 自動テストプレイを${num}件投入しました。", LOG_INFO);

		$this->Testplay->changeStatus($testplay_id, Testplay::STATUS_ON_PLAY);
		$this->log("[MakePlayShell] Start to play.", LOG_INFO);
	}
}
