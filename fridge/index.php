<?php
session_start();

if (isset($_GET['action'])) {
	$action = $_GET['action'];
} else {
	$action = 'home';
}

function render($view, $data = []) {
		extract($data);
		include("views/layout.php");
}

require("model.php");
require("controllers/$action.php");
