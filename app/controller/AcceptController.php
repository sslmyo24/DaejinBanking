<?php
	namespace app\controller;

	use app\core\Controller;

	class AcceptController extends Controller {

		function accept () {
			if (isset($_GET['cntnum'])) {
				$this->claim_list = $this->model->get_list("cl.clhnme, a.*", "kamtmp a JOIN kcntmp cn ON a.cntnum = cn.cntnum JOIN kcltmp cl ON cl.clcode = cn.clcode", "where a.cntnum and a.bildat != '0000-00-00' and a.recdat = '0000-00-00'", [$_GET['cntnum']]);
			}
		}
	}