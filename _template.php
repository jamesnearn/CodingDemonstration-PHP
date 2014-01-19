<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>
		PHP Demo<?php if (isset($pagetitle)) { echo ' - ' . $pagetitle; } ?>
	</title>
	<script src="//code.jquery.com/jquery-1.10.1.min.js"></script>
	<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap-theme.min.css">
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
	
	<link rel="stylesheet" type="text/css" href="style.css">
	<?php
		$thisPageCssFile = basename($_SERVER['PHP_SELF']);
		$thisPageCssFile = str_replace(".php", ".css", $thisPageCssFile);
		if (file_exists($thisPageCssFile)) {
			echo '<link rel="stylesheet" type="text/css" href="' . $thisPageCssFile . '">';
		}
	?>
	<?php if (isset($localCss)) { echo $localCss; } ?>	
</head>
<body>
	<div id="header">
		<span id="companyName">PHP Demo</span>
		
		<a class="navLink" href="index.php">Home</a>
	</div>
	<?php if (isset($maincontent)) { echo $maincontent; } ?>
</body>
</html>
		