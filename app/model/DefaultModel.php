<?php
	namespace app\model;

	use app\core\Model;

	class DefaultModel extends Model {
		// get idx of next data
		function get_next_idx ($table) {
			return $this->rowCount("SELECT * FROM {$table}") + 1;
		}

		// get data
		function get_data ($columns, $table, $option = null, $param = false) {
			return $this->fetch("SELECT {$columns} FROM {$table} {$option}", $param);
		}

		// get datalist
		function get_list ($columns, $table, $option = null, $param = false) {
			return $this->fetchAll("SELECT {$columns} FROM {$table} {$option}", $param);
		}
	}