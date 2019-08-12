<?php
	namespace app\controller;

	use app\core\Controller;

	class ClaimController extends Controller {

		// 청구 관리
		function claim () {

			// 시작일이 있으면
			if (isset($_GET['start_date'])) {

				// 시작일과 종료일이 같으면 되돌아감
				access($_GET['start_date'] != $_GET['end_date'], "하루 이상 차이나야 합니다.");

				// 스케쥴 목록
				$this->contract_list = $this->model->get_list("cl.clhnme, a.*", "kamtmp a JOIN kcntmp cn ON a.cntnum = cn.cntnum JOIN kcltmp cl ON cl.clcode = cn.clcode", "where a.amtdue >= ? and a.amtdue <= ?", [$_GET['start_date'], $_GET['end_date']]);
			}
		}
	}