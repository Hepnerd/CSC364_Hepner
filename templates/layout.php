<?php
class layout
{
    public static function LoggedIn()
    {
        $user = $_SESSION['user'];
        $x = '';
        return $x;
    }
    public static function LoggedOut()
    {
        $x = '';
        return $x;
    }
    public static function pageTop($title)
    {
        /*
		if (isset($_SESSION['user'])) {
            $menu = static::LoggedIn();
        } else {
            $menu = static::LoggedOut();
        }
		*/
        echo <<<pageTop
        <!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Hepner's Haggles</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="Description" lang="en" content="ADD SITE DESCRIPTION">
		<meta name="author" content="ADD AUTHOR INFORMATION">
		<meta name="robots" content="index, follow">

		<!-- icons -->
		<link rel="apple-touch-icon" href="/assets/img/apple-touch-icon.png">
		<link rel="shortcut icon" href="/assets/img/favicon.ico">

		<!-- Bootstrap Core CSS file -->
		<link rel="stylesheet" href="/assets/css/bootstrap.min.css">

		<!-- Override CSS file - add your own CSS rules -->
		<link rel="stylesheet" href="/assets/css/styles.css">

		<!-- Conditional comment containing JS files for IE6 - 8 -->
		<!--[if lt IE 9]>
			<script src="/assets/js/html5.js"></script>
			<script src="/assets/js/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<style>
.stock
{
	display:inline;
	float:right;
}
		</style>

		<!-- Navigation -->
	    <nav class="navbar navbar-fixed-top navbar-inverse" role="navigation">
			<div class="container-fluid">

				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">Hepner's Haggles</a>
				</div>
				<!-- /.navbar-header -->

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li><a href="#">Nav item 1</a></li>
						<li><a href="#">Nav item 2</a></li>
						<li><a href="#">Nav item 3</a></li>
					</ul>
				</div>
				<!-- /.navbar-collapse -->
			</div>
			<!-- /.container-fluid -->
		</nav>
		<!-- /.navbar -->
pageTop;
    }
    }
?>