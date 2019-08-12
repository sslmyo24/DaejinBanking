<?php
	namespace app\model;
	
	class ClaimModel extends DefaultModel {
		function action () {
			extract($_POST);

			switch ($action) {

				// 청구서 생성
				case 'claim_insert':

					// 시작일과 종료일 사이의 스케쥴의 청구서를 생성
					$this->querySet("update", "kamtmp", "bildat = now() where amtdue >= '{$start_date}' and amtdue <= '{$end_date}'");
					alert("생성되었습니다.");
					move(HOME."/claim");
					break;
			}
		}
	}