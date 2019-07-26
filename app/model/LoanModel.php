<?php
	namespace app\model;
	
	class LoanModel extends DefaultModel {
		function action () {
			$table = $msg = $url = $more_sql = "";
			extract($_POST);

			$rntrat = $basrat + $spread;
			$term = strtotime($cntend) - strtotime($cntdat);
			$cntpym = floor($term/60/60/24/30/$amtcyc);
			access($cntpym > 1, "계약일과 만료일은 납입주기 이상 차이나야 합니다.");
			switch ($action) {
				case 'new_contract':
					$this->query("INSERT INTO kcstmp SET cntnum = ?, acqcst = ?, cntpym = ?, basrat = ?, rntrat = ?, spread = ?, grend = ?, amtcyc = ?", [$cntnum, $acqcst, $cntpym, $basrat, $rntrat, $spread, $cntend, $amtcyc]);
					$more_sql = ", cntrec = now()";
					$action = "insert";
					$table = "kcntmp";
					$msg = false;
					$url = HOME."/loan?back=".$cntnum;
					break;
				case 'contract_update' :
					access($this->rowCount("SELECT * FROM kamtmp where cntnum = ?", [$cntnum]) == 0, "이미 스케쥴이 생성된 계약입니다.");
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