<?php
	namespace app\controller;

	use app\core\Controller;

	class LoanController extends Controller {
		// 여신관리
		function loan () {
			$this->next_code = $this->model->get_next_idx("kcntmp");
			$this->member_list = $this->model->get_list("clcode", "kcltmp");
			$this->point_list = $this->model->get_list("*", "kdptmp");
			$this->rate_list = $this->model->get_list("*", "kratfp");
		}
	}