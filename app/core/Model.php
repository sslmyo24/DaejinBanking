<?php
	namespace app\core;

	class Model {
		private $db;
		private $close;
		private $execArr;

		function __construct () {
			$this->execArr = [];
			$this->close = true;
		}

		/**
		 * connected database and get database
		 * @return [type] [description]
		 */
		private function init () {
			$option = array(\PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_OBJ, \PDO::ATTR_ERRMODE => \PDO::ERRMODE_WARNING);
			$this->db = new \PDO("mysql:host=127.0.0.1;charset=utf8;dbname=DaejinBanking", "root", "", $option);
			return $this->db;
		}

		/**
		 * disconnected database
		 * @return [type] [description]
		 */
		private function dbClose () {
			if ($this->close) $this->db = null;
			$this->close = true;
		}

		/**
		 * query function
		 * @param  string $sql   sql code
		 * @param  array  $param sql datas
		 * @return object        query result
		 */
		private function query ($sql, $param = false) {
			$res = $this->init()->prepare($sql);
			if ($param) $this->execArr = $param;
			if (!$res->execute($this->execArr)) {
				echo $sql;
				print_r($this->execArr);
				print_r($this->init()->errorInfo());
				exit;
			}

			$this->dbClose();
			return $res;
		}

		private function forQuery () {
			$this->close = false;
			return $this->query();
		}

		/**
		 * get data
		 * @param  string $sql   sql code
		 * @param  array  $param sql datas
		 * @return object        data
		 */
		function fetch ($sql, $param = false) {
			return $this->query($sql, $param)->fetch();
		}

		/**
		 * get data list
		 * @param  string $sql   sql code
		 * @param  array  $param sql datas
		 * @return array        data list
		 */
		function fetchAll ($sql, $param = false) {
			return $this->query($sql, $param)->fetchAll();
		}

		/**
		 * get the numbe of data
		 * @param  string $sql   sql code
		 * @param  array  $param sql datas
		 * @return number        the number of data
		 */
		function rowCount ($sql, $param = false) {
			return $this->query($sql, $param)->rowCount();
		}

		/**
		 * 
		 * @param  [type] $arr    [description]
		 * @param  [type] $cancel [description]
		 * @return [type]         [description]
		 */
		function getColumn ($arr, $cancel) {
			$column = "";
			$this->execArr = [];
			$cancel = explode("/", $cancel);
			foreach ($arr as $key => $val) {
				if (in_array($key, $cancel) || !strlen($val)) continue;
				$column .= ", {$key} = ?";
				$this->execArr[] = $val;
			}
			$column = substr($column, 1);
			return $column;
		}

		/**
		 * simple query
		 * @param  string $action action
		 * @param  string $table  target table
		 * @param  string $column sql data
		 * @return object         query result
		 */
		function querySet ($action, $table, $column) {
			$sql = "";
			switch ($action) {
				case 'insert':
					$sql = "INSERT INTO {$table} SET ";
					break;
				case 'update':
					$sql = "UPDATE {$table} SET ";
					break;
				case 'delete':
					$sql = "DELETE FROM {$table} ";
					break;
			}
			return $this->query($sql.$column);
		}
	}