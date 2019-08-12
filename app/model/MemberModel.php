<?php
	namespace app\model;
	
	class MemberModel extends DefaultModel {

		function action () {
			$more_sql = $url = $msg = "";
			extract($_POST);

			switch ($action) {

				// 신규 이용자
				case 'new_member':
					$action = "insert";
					$msg = "등록되었습니다.";
					$url = HOME."/member";
					break;

				// 기존 이용자 수정
				case 'old_member_update':
					$more_sql = " where clcode = '{$_GET['clcode']}'";
					$action = "update";
					$msg = "수정되었습니다.";
					$url = HOME."/member";
					break;
			}

			$cancel = "action/";
			$column = $this->getColumn($_POST, $cancel).$more_sql;
			$this->querySet($action, "kcltmp", $column);
			alert($msg);
			move($url);
		}
	}
