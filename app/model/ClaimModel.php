<?php
	namespace app\model;
	
	class ClaimModel extends DefaultModel {
		function action () {
			extract($_POST);

			switch ($action) {
				case 'claim_insert':
					$this->querySet("update", "kamtmp", "bildat = now() where cntnum = '{$_GET['cntnum']}' and amtodr = '{$_GET['amtodr']}'");
					alert("생성되었습니다.");
					move(HOME."/claim");
					break;
			}
		}
	}