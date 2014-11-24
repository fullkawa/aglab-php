<?php

/**
 * プレイ計画を作成するクラスのパッケージ名
 */
Configure::write('PlannerPackageName', 'Common.Lib');

/**
 * プレイ計画を作成するクラスのクラス名
 */
Configure::write('PlannerClassName', 'PlayPlanner');

/**
 * 一度に処理するPlayHistoryの数
 */
Configure::write('num_exec_histories', 10);
