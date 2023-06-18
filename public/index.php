<?php
var_dump("test");
require('../autoload.php');
$router = new Router($_SERVER["REQUEST_URI"]);