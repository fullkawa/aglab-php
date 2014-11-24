<?php

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
		$testplay = $this->Testplay->getReady();

		if ($testplay) {
			$testplay_id = $testplay['Testplay']['id'];

			if (!$this->Testplay->changeStatus(Testplay::STATUS_MAKING_PLAY)) {
				return false;
			}
			$this->log("[$this->alias] Start to make play datas.", LOG_INFO);

			$plays = $this->Testplay->makePlays($testplay_id);

			$this->Play = ClassRegistry::init('Play');
			if (!$this->Play->saveAll($plays)) {
				$this->log("[$this->alias] Failed to save. -> " . json_encode($plays));
			}
			$num = count($plays);
			$this->log("自動テストプレイを$num件投入しました。", LOG_INFO);

			if (!$this->Testplay->changeStatus(Testplay::STATUS_ON_PLAY)) {
				return false;
			}
			$this->log("[$this->alias] Start to play.", LOG_INFO);
		}
		return true;
	}
}
