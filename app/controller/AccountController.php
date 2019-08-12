<?php
	namespace app\controller;

	use app\core\Controller;

	class AccountController extends Controller {

		// 회계 관리
		function account () {

			// 검색된 날짜가 있으면
			if (isset($_GET['year'])) {
				$date = $_GET['year']."-".$_GET['month']."-".$_GET['date'];

				// 회계 전표 목록
				$this->account_list = $this->model->get_list("ac.actnme, kt.*", "ktrnmp kt JOIN kactmp ac ON kt.actcde = ac.actcde", "where kt.trndat = '{$date}' order by trnseq asc, acttyp asc"); 

				// 다음 번호
				$this->next_seq = isset($this->account_list[count($this->account_list) - 1]) ? $this->account_list[count($this->account_list) - 1]->trnseq + 1 : 1;

				// 계정 과목 목록
				$this->act_list = $this->model->get_list("*", "kactmp");

				// 합계
				$this->account_data = $this->model->get_data("sum(dramtw) as d_sum, sum(cramtw) as c_sum", "ktrnmp", "where trndat = ? group by trndat", [$date]);
			}
		}
	}