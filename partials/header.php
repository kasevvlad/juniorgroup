<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="keywords" content="<?= $kw ?>">
	<meta name="description" content="<?= $desc ?>">
	<link rel="stylesheet" href="/assets/css/global.min.css">
	<?php
	switch ($page) {
		case 'index':
			echo '<link rel="stylesheet" href="/assets/css/index.min.css">';
			break;
	}
	?>
	<title><?= $title ?></title>
</head>

<body>
	<div class="wrapper">
		<header class="header">

		</header>