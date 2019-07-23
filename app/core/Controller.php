<?php
	namespace app\core;

	class Controller {
		protected $param;
		protected $model;

		public static function run () {
			$param = Param::getInstance();
			$ctr_name = "app\\controller\\".ucfirst($param->type)."Controller";
			$model_name = "app\\model\\".ucfirst($param->type)."Model";
			$ctr = new $ctr_name();
			$ctr->model = new $model_name();
			$ctr->param = $param;
			$ctr->index();
		}

		protected function index () {
			if (isset($_POST['action'])) {
				$this->model->action();
			}
			if (method_exists($this, $this->param->include_file)) {
				$this->{$this->param->include_file}();
			}

			require_once(_VIEW."/template/header.php");
			require_once(_VIEW."/{$this->param->type}/{$this->param->include_file}.php");
			require_once(_VIEW."/template/footer.php");
		}
	}