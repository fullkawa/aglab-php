<?php

/**
 * レポート作成バッチ
 *
 * @author fullkawa
 */
class MakeReportShell extends AppShell {

	public function main() {
		$this->Testplay = ClassRegistry::init('Testplay');
		$testplays = $this->Testplay->getForReport();

		if (empty($testplays)) {
			return;
		}

		foreach ($testplays as $testplay) {
			$this->log('[MakeReport::main()] testplay -> ' . json_encode($testplay), LOG_DEBUG);
			$this->log('[MakeReport::main()] レポートの作成を開始する。(プレイID: ' . $testplay['Testplay']['id'] . ')', LOG_INFO);

			$modelName = $testplay['Game']['name'] . '.' . $testplay['Game']['name'] . 'Report';
			$this->ReportModel = ClassRegistry::init($modelName);
			$report = $this->ReportModel->makeReport($testplay['Testplay']['id']);
			$this->log('[MakeReport::main()] report -> ' . json_encode($report), LOG_INFO);

			$data = array(
				'testplay_id'	=> $testplay['Testplay']['id'],
				'report'		=> serialize($report),
			);
			$this->ReportModel->save($data);

			$this->Testplay->changeStatus($testplay['Testplay']['id'], Testplay::STATUS_DONE);
			$this->log('[MakeReport::main()] done. Testplay.id:' . $testplay['Testplay']['id'], LOG_INFO);
		}
	}
}
