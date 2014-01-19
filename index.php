<?php ob_start(); ?>

	<div class="box welcome">
		<div class="title">Welcome</div>
		<div class="content">
			<div class="contentItem">
				<a href="register.php">Register a new user</a><br />
				<br />
				<a href="_UnitTests.php">Run unit tests</a>
			</div>
		</div>
	</div>
<?php $maincontent = ob_get_clean(); ?>

<?php
	//$pagetitle = "";
	include("_template.php");
?>