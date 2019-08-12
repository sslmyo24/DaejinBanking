<?php
	namespace app\model;
	
	class LoanModel extends DefaultModel {
		function action () {
			$table = $msg = $url = $more_sql = "";
			extract($_POST);

			$rntrat = $basrat + $spread; // 연신요율 = 기준금리 + 가산금리
			$term = strtotime($cntend) - strtotime($cntdat); // 전체 계약일 수(종료일 - 시작일)를 초로 환산
			$cntpym = floor($term/60/60/24/30/$amtcyc); // 전체 계약일 수를 납입주기로 나눔
			access($cntpym > 1, "계약일과 만료일은 납입주기 이상 차이나야 합니다.");
			switch ($action) {

				// 신규계약
				case 'new_contract':

					// 신규 계약 금액
					$this->query("INSERT INTO kcstmp SET cntnum = ?, acqcst = ?, cntpym = ?, basrat = ?, rntrat = ?, spread = ?, grend = ?, amtcyc = ?", [$cntnum, $acqcst, $cntpym, $basrat, $rntrat, $spread, $cntend, $amtcyc]);
					$more_sql = ", cntrec = now()";
					$action = "insert";
					$table = "kcntmp";
					$msg = '체결되었습니다.';
					$url = HOME."/loan";
					break;

				// 기존계약 수정
				case 'contract_update' :

					// 이미 스케쥴이 생성된 계약은 수정 불가능
					access($this->rowCount("SELECT * FROM kamtmp where cntnum = ?", [$cntnum]) == 0, "이미 스케쥴이 생성된 계약입니다.");

					// 계약 금액 수정
					$this->query("UPDATE kcstmp SET cntnum = ?, acqcst = ?, cntpym = ?, basrat = ?, rntrat = ?, spread = ?, grend = ?, amtcyc = ? where clcode = ? and cntnum = ?", [$cntnum, $acqcst, $cntpym, $basrat, $rntrat, $spread, $cntend, $amtcyc, $clcode, $cntnum]);
					$more_sql = " where clcode = '{$_GET['clcode']}' and cntnum = '{$cntnum}'";
					$action = "update";
					$table = "kcntmp";
					$msg = false;
					$url = HOME."/loan?clcode=".$cntnum."&cntnum=".$cntnum;
					break;
			}

			$cancel = "action/acqcst/basrat/spread/amtcyc";
			$column = $this->getColumn($_POST, $cancel).$more_sql;
			$this->querySet($action, $table, $column);
			if ($msg) alert($msg);
			move($url);
		}
	}