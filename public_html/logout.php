<?php
	$prevpage = $_SERVER['HTTP_REFERER'];
	session_start();

	session_unset();

	session_destroy();

	header("Location: $prevpage");

?>