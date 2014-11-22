<?php

/**
 * プレイデータ作成バッチ
 *
 * @author fullkawa
 */
class MakePlayShell extends AppShell {

	/**
	 * 未実行の自動プレイデータがあれば、自動プレイを開始する。
	 */
	public function main() {
		$this->Autoplay = ClassRegistry::init('Autoplay');
		$autoplay = $this->Autoplay->getReady();

		if ($autoplay) {
			$autoplay_id = $autoplay['Autoplay']['id'];

			if (!$this->Autoplay->changeStatus(Autoplay::STATUS_MAKING_PLAY)) {
				return false;
			}
			$this->log("[$this->alias] Start to make play datas.", LOG_INFO);

			$plays = $this->Autoplay->makePlays($autoplay_id);

			$this->Play = ClassRegistry::init('Play');
			if (!$this->Play->saveAll($plays)) {
				$this->log("[$this->alias] Failed to save. -> " . json_encode($plays));
			}
			$num = count($plays);
			$this->log("自動プレイを$num件投入しました。", LOG_INFO);

			if (!$this->Autoplay->changeStatus(Autoplay::STATUS_ON_PLAY)) {
				return false;
			}
			$this->log("[$this->alias] Start to play.", LOG_INFO);
		}
		return true;
	}
}
