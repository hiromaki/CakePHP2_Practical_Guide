<?php
	// app/Controller/TimelineController.php
	App::uses('AppController', 'Controller');
	class TimelineController extends AppController {
		public $helpers = array('Time');
	
		public function index() {
			// ログイン中のユーザ情報を取得
			$user = $this->Auth->user();
			if (empty($user)) {
				return ;
			}
			// Twitterデータソースを取得
			$ds = $this->Twitter->getTwitterSource() ;	
			// アクセストークンをTwitterデータソースに設定
			$ds->setToken($user['TwitterUser']);
			// タイムラインを取得
			$timeline = $ds->statuses_home_timeline();
			// 取得した情報をビュー変数に設定
			$this->set(compact('timeline'));
		}
	}
