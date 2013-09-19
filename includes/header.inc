<?php
class DrawHeaderAndFooter
{
	public static function drawHeader() {
		echo '<!DOCTYPE html>
				<html lang="de_CH">
				<head>
				<meta charset="utf-8">
				<title>PHP und MySQL - eine Einführung</title>
				<!--[if IE]>
				<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js">
				</script>
				<![endif]-->

				<link rel="stylesheet" href="css/reset.css" media="all" />
				<link rel="stylesheet" href="css/main.css" media="screen" />

				</head>
				<body>';
	}

	public static function drawFooter() {
		echo '</body>
				</html>';
	}
}
?>