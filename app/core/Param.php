<?php
	namespace app\core;

	class Param {
		var $type;
		var $include_file;
		var $idx;
		var $isMember;
		var $member;
		public static $instance;

		function __construct () {
			$get_param = isset($_GET['param']) ? explode("/", $_GET['param']) : null;
			$this->type = isset($get_param[0]) && strlen($get_param[0]) ? $get_param[0] : 'home';
			$this->action = isset($get_param[1]) ? $get_param[1] : null;
			$this->idx = isset($get_param[2]) ? $get_param[2] : null;
			$this->include_file = isset($this->action) ? $this->action : $this->type;
			$this->isMember = isset($_SESSION['member']);
			$this->member = $this->isMember ? $_SESSION['member'] : null;
		}

		public static function init () {
			self::$instance = new Param();
		}

		public static function getInstance() {
			return self::$instance;
		}
	}