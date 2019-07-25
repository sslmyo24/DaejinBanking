<?php
	namespace app\controller;

	use app\core\Controller;

	class MemberController extends Controller {
		// 고객관리
		function member () {
			$this->next_code = $this->model->get_next_idx("kcltmp");
			if (isset($_GET['clcode'])) {
				$this->member_data = $this->model->get_data("*", "kcltmp", "where clcode = ?", [$_GET['clcode']]);
			}
		}

		// 고객삭제
		function member_delete () {
			$this->model->querySet("delete", "kcltmp", "where clcode = ".$_GET['code']);
			alert("삭제되었습니다.");
			move(HOME."/member");
		}

	}