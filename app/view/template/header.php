<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title> 대진은행시스템 </title>

	<!-- css -->
	<link rel="stylesheet" href="<?php echo SRC ?>/fontawesome-free-5.9.0-web/css/all.min.css">
	<link rel="stylesheet" href="<?php echo CSS ?>/common.css">
	<?php if ($this->param->type == 'home'): ?>
	<link rel="stylesheet" href="<?php echo CSS ?>/main.css">
	<?php else: ?>
	<link rel="stylesheet" href="<?php echo CSS ?>/sub.css">

	<script src="<?php echo JS ?>/jquery.min.js"></script>
	<script src="<?php echo JS ?>/app.js"></script>
	<?php endif; ?>
</head>
<body>

	<div id="wrap">
	<?php if ($this->param->type != 'home'): ?>
		<nav id="side-menu">
			<ul>
				<li><a href="<?php echo HOME ?>/home"><i class="fa fa-home"></i><span class="nav-name">HOME</span></a></li>
				<li><a href="<?php echo HOME ?>/member"><i class="fa fa-users"></i><span class="nav-name">고객관리</span></a></li>
				<li><a href="<?php echo HOME ?>/loan"><i class="fa fa-hand-holding-usd"></i><span class="nav-name">여신관리</span></a></li>
				<li><a href="<?php echo HOME ?>/"><i class="fa fa-envelope-open-text"></i><span class="nav-name">청구관리</span></a></li>
				<li><a href="<?php echo HOME ?>/"><i class="fa fa-money-check-alt"></i><span class="nav-name">수납관리</span></a></li>
				<li><a href="<?php echo HOME ?>/"><i class="fa fa-table"></i><span class="nav-name">회계관리</span></a></li>
			</ul>
		</nav>

		<section id="content-section">
			<div id="content-head"><i class="fa fa-university"></i>Daejin Internet Banking</div>
	<?php endif; ?>