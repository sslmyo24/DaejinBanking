<?php
	namespace app\model;
	
	class ClaimModel extends DefaultModel {
		function action () {
			extract($_POST);

			switch ($action) {
				case 'claim_insert':
					$this->querySet("update", "kamtmp", "bildat = now() where amtdue >= '{$start_date}' and amtdue <= '{$end_date}'");
					alert("생성되었습니다.");
					move(HOME."/claim");
					break;
			}
		}
	}