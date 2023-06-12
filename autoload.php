<?php
spl_autoload_register(function ($class) {
	if (strpos($class, "DAO") !== false) {
		include_once("models/dao/{$class}.php");
	} elseif(strpos($class, 'Controller') !== false) {
		include_once("controllers/{$class}.php");
	} elseif (strpos($class, "Router") !== false) {
		require_once("{$class}.php");
	} else {
		include_once("models/entities/{$class}.php");
	}
});