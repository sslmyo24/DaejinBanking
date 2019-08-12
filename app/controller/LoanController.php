<?php
	namespace app\controller;

	use app\core\Controller;

	class LoanController extends Controller {

		// 여신관리
		function loan () {
			$now = date("Ymd");

			// 다음 계약 번호
			$cnt = $this->model->rowCount("SELECT * FROM kcntmp where cntnum like '{$now}%'") + 1;
			if ($cnt < 10) $cnt = "00".$cnt;
			else if ($cnt < 100) $cnt = "0".$cnt;

			$this->member_list = $this->model->get_list("clcode", "kcltmp"); // 이용자코드 목록
			$this->point_list = $this->model->get_list("*", "kdptmp"); // 부점 목록
			$this->rate_list = $this->model->get_list("*", "kratfp"); // 금리 목록

			// 검색된 이용자코드가 있으면
			if (isset($_GET['clcode'])) {

				// 계약 번호 목록
				$this->search_list = $this->model->get_list("cntnum", "kcntmp", "where clcode = ?", [$_GET['clcode']]);

				// 검색된 계약이 있으면
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

			$rntrat = $this->cs_data->rntrat/100/12; // 연신요율
			$acqcst = $this->cs_data->acqcst; // 여신금액
			$rntamt = $acqcst*$rntrat*pow(1+$rntrat, $this->cs_data->cntpym)/(pow(1+$rntrat, $this->cs_data->cntpym) - 1); // 원리금
			for ($i = 1; $i <= $this->cs_data->cntpym; $i++) {
				$intamt = $acqcst * $rntrat; // 이자
				$acqcst -= $rntamt; // 미회수원금 계산
				if ($acqcst < 0) $acqcst = 0;
				$cycle = $i*$this->cs_data->amtcyc; // 다음 납기일과 계약일과의 차이를 구함
				$amtdue = date("Y-m-d", strtotime($this->cn_data->cntdat." + {$cycle} month")); // 납기일
				$this->model->query("INSERT INTO kamtmp SET cntnum = ?, amtodr = ?, amtdue = ?, rntamt = ?, prnamt = ?, intamt = ?, prnmal = ?", [$_GET['cntnum'], $i, $amtdue, $rntamt, $rntamt - $intamt, $intamt, $acqcst]); // 스케쥴 생성
			}
			$this->model->querySet("update", "kcntmp", "cntcls = 'B' where cntnum = {$_GET['cntnum']}"); // 계약상태 변경
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

		// 스케쥴 조회
		function sch_search () {

			// 스케쥴 목록
			$this->sch_list = $this->model->get_list("*", "kamtmp", "where cntnum = ?", [$_GET['cntnum']]);

			// 합계
			$this->sch_data = $this->model->get_data("sum(intamt) as int_sum, rntamt", "kamtmp", "where cntnum = ? group by cntnum", [$_GET['cntnum']]);

			// 계약 정보
			$this->contract_data = $this->model->get_data("*", "kcstmp", "where cntnum = ?", [$_GET['cntnum']]);
		}
	}