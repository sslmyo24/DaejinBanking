<?php
	session_start();

	/**
	 * class autoload
	 * @param string $c class name
	 */
	function __autoload ($c) {
		require_once $c . ".php";
	}