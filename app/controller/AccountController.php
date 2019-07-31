<?php
	namespace app\controller;

	use app\core\Controller;

	class AccountController extends Controller {
		// 회계 관리
		function account () {
			if (isset($_GET['year'])) {
				$date = $_GET['year']."-".$_GET['month']."-".$_GET['date'];
				$this->account_list = $this->model->get_list("ac.actnme, kt.*", "ktrnmp kt JOIN kactmp ac ON kt.actcde = ac.actcde", "where kt.trndat = '{$date}' order by trnseq asc, acttyp asc");
				$this->next_seq = isset($this->account_list[count($this->account_list) - 1]) ? $this->account_list[count($this->account_list) - 1]->trnseq + 1 : 1;
				$this->act_list = $this->model->get_list("*", "kactmp");
				$this->account_data = $this->model->get_data("sum(dramtw) as d_sum, sum(cramtw) as c_sum", "ktrnmp", "where trndat = ? group by trndat", [$date]);
			}
		}
	}