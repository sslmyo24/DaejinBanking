<?php
	namespace app\controller;

	use app\core\Controller;

	class AcceptController extends Controller {

		// 수납 관리
		function accept () {

			// 검색된 계약번호가 있으면
			if (isset($_GET['cntnum'])) {

				// 수납 목록
				// 발행일이 '0000-00-00'이 아닌 스케쥴 (즉, 청구서가 청구된 스케쥴)
				$this->claim_list = $this->model->get_list("cl.clhnme, a.*", "kamtmp a JOIN kcntmp cn ON a.cntnum = cn.cntnum JOIN kcltmp cl ON cl.clcode = cn.clcode", "where a.cntnum and a.bildat != '0000-00-00'", [$_GET['cntnum']]);
			}
		}
	}