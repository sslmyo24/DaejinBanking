<?php
	/**
	 * alert message
	 * @param string $msg message
	 */
	function alert ($msg) {
		echo "<script>alert('{$msg}')</script>";
	}

	/**
	 * move page
	 * @param string $url page address
	 */
	function move ($url = false) {
		echo "<script>";
		$url ? "loction.replace('{$url}')" : "history.back();";
		echo "</script>";
		exit;
	}

	/**
	 * access
	 * @param boolean $bol condition
	 * @param string $msg message
	 * @param string $url page address
	 */
	function access ($bol, $msg, $url = false) {
		if (!$bol) {
			alert($msg);
			move($url);
		}
	}

