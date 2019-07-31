<?php
	namespace app\controller;

	use app\core\Controller;

	class LoanController extends Controller {
		// 여신관리
		function loan () {
			$now = date("Ymd");
			$cnt = $this->model->rowCount("SELECT * FROM kcntmp where cntnum like '{$now}%'") + 1;
			if ($cnt < 10) $cnt = "00".$cnt;
			else if ($cnt < 100) $cnt = "0".$cnt;
			$this->cntcode = isset($_GET['back']) ? $_GET['back'] : $now.$cnt;
			$this->member_list = $this->model->get_list("clcode", "kcltmp");
			$this->point_list = $this->model->get_list("*", "kdptmp");
			$this->rate_list = $this->model->get_list("*", "kratfp");
			if (isset($_GET['back'])) $this->now_data = $this->model->get_data("kn.*, ks.acqcst, ks.basrat, ks.spread, ks.amtcyc", "kcntmp kn JOIN kcstmp ks ON kn.cntnum = ks.cntnum", "where kn.cntnum = ?", [$_GET['back']]);
			if (isset($_GET['clcode'])) {
				$this->search_list = $this->model->get_list("cntnum", "kcntmp", "where clcode = ?", [$_GET['clcode']]);
				if (count($this->search_list) > 0) {
					$cntnum = isset($_GET['cntnum']) ? $_GET['cntnum'] : $this->search_list[0]->cntnum;
					$this->search_data = $this->model->get_data("kn.*, ks.acqcst, ks.basrat, ks.spread, ks.amtcyc", "kcntmp kn JOIN kcstmp ks ON kn.cntnum = ks.cntnum", "where kn.clcode = ? and kn.cntnum = ?", [$_GET['clcode'], $cntnum]);
				}
			}
		}

		// 원리금상환스케쥴 생성
		function sch_insert () {
			$this->cs_data = $this->model->get_data("*", "kcstmp", "where cntnum = ?", [$_GET['cntnum']]);
			$this->cn_data = $this->model->get_data("*", "kcntmp", "where cntnum = ?", [$_GET['cntnum']]);
			$rntrat = $this->cs_data->rntrat/100/12;
			$acqcst = $this->cs_data->acqcst;
			$rntamt = $acqcst*$rntrat*pow(1+$rntrat, $this->cs_data->cntpym)/(pow(1+$rntrat, $this->cs_data->cntpym) - 1);
			for ($i = 1; $i <= $this->cs_data->cntpym; $i++) {
				$intamt = $acqcst * $rntrat;
				$acqcst -= $rntamt;
				if ($acqcst < 0) $acqcst = 0;
				$cycle = $i*$this->cs_data->amtcyc;
				$amtdue = date("Y-m-d", strtotime($this->cn_data->cntdat." + {$cycle} month"));
				$this->model->query("INSERT INTO kamtmp SET cntnum = ?, amtodr = ?, amtdue = ?, rntamt = ?, prnamt = ?, intamt = ?, prnmal = ?", [$_GET['cntnum'], $i, $amtdue, $rntamt, $rntamt - $intamt, $intamt, $acqcst]);
			}
			$this->model->querySet("update", "kcntmp", "cntcls = 'B' where cntnum = {$_GET['cntnum']}");
			alert('생성되었습니다.');
			move(HOME."/loan");
		}

		// 계약 취소
		function contract_delete () {
			foreach (['kamtmp', 'kcntmp', 'kcstmp'] as $table) {
				$this->model->querySet("delete", $table, "where cntnum = '{$_GET['cntnum']}'");
			}
			alert("삭제되었습니다.");
			move(HOME."/loan");
		}

		function sch_search () {
			$this->sch_list = $this->model->get_list("*", "kamtmp", "where cntnum = ?", [$_GET['cntnum']]);
			$this->sch_data = $this->model->get_data("sum(intamt) as int_sum, rntamt", "kamtmp", "where cntnum = ? group by cntnum", [$_GET['cntnum']]);
			$this->contract_data = $this->model->get_data("*", "kcstmp", "where cntnum = ?", [$_GET['cntnum']]);
		}
	}