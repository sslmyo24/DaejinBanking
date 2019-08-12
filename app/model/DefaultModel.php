<?php
	namespace app\model;

	use app\core\Model;

	class DefaultModel extends Model {

		/**
		 * // get idx of next data
		 * @param  string $table table name
		 * @return number        idx of next data
		 */
		function get_next_idx ($table) {
			return $this->rowCount("SELECT * FROM {$table}") + 1;
		}

		/**
		 * get data
		 * @param  string  $columns columns
		 * @param  string  $table   table name
		 * @param  string  $option  conditions
		 * @param  array $param   	sql datas
		 * @return object           data
		 */
		function get_data ($columns, $table, $option = null, $param = false) {
			return $this->fetch("SELECT {$columns} FROM {$table} {$option}", $param);
		}

		/**
		 * get datalist
		 * @param  string  $columns columns
		 * @param  string  $table   table name
		 * @param  string  $option  conditions
		 * @param  array $param   	sql datas
		 * @return object           datalist
		 */
		function get_list ($columns, $table, $option = null, $param = false) {
			return $this->fetchAll("SELECT {$columns} FROM {$table} {$option}", $param);
		}
	}