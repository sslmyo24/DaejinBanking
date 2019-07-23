<?php
	// path
	define("_DIR", __dir__);
	define("_APP", _DIR."/app");
	define("_PUBLIC", _DIR."/public");
	define("_CORE", _APP."/core");
	define("_CONTROLLER", _APP."/controller");
	define("_MODEL", _APP."/model");
	define("_CONFIG", _APP."/config");
	define("_VIEW", _APP."/view");

	// url
	define("HOME", str_replace("/index.php", "", $_SERVER['PHP_SELF']));
	define("SRC", HOME."/public");
	define("CSS", SRC."/css");
	define("JS", SRC."/js");
	define("IMG", SRC."/img");

	// config
	require_once(_CONFIG."/config.php");
	require_once(_CONFIG."/lib.php");

	// run
	app\core\Param::init();
	app\core\Controller::run();