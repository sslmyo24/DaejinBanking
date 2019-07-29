<?php
	namespace app\controller;

	use app\core\Controller;

	class AccountController extends Controller {
		// 회계 관리
		function account () {
			if (isset($_GET['year'])) {
				$date = $_GET['year']."-".$_GET['month']."-".$_GET['date'];
				$this->account_list = $this->model->get_list("ac.actnme, kt.*", "ktrnmp kt JOIN kactmp ac ON kt.actcde = ac.actcde", "where kt.trndat = '{$date}'");
			}
		}
	}