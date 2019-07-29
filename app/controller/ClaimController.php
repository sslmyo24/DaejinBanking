<?php
	namespace app\controller;

	use app\core\Controller;

	class ClaimController extends Controller {
		// 청구 관리
		function claim () {
			if (isset($_GET['start_date'])) {
				access($_GET['start_date'] != $_GET['end_date'], "하루 이상 차이나야 합니다.");
				$this->contract_list = $this->model->get_list("cl.clhnme, a.*", "kamtmp a JOIN kcntmp cn ON a.cntnum = cn.cntnum JOIN kcltmp cl ON cl.clcode = cn.clcode", "where a.amtdue >= ? and a.amtdue <= ?", [$_GET['start_date'], $_GET['end_date']]);
			}
			else if (isset($_GET['cntnum'])) {
				$this->contract_data = $this->model->get_data("cl.clhnme, cl.cladrs, a.*", "kamtmp a JOIN kcntmp cn ON a.cntnum = cn.cntnum JOIN kcltmp cl ON cl.clcode = cn.clcode", "where a.cntnum = ? and a.amtodr = ?", [$_GET['cntnum'], $_GET['amtodr']]);
			}
		}
	}