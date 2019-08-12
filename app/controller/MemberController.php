<?php
	namespace app\controller;

	use app\core\Controller;

	class MemberController extends Controller {
		// 고객관리
		function member () {

			// 다음 이용자 코드
			$this->next_code = $this->model->get_next_idx("kcltmp");

			// 검색된 이용자 코드가 있으면
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