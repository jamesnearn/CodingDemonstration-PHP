<?php ob_start(); ?>

	<style>
		.box {
			width: 400px;
		}
	</style>
<?php $localCss = ob_get_clean(); ?>

	<div class="box">
		<div class="title">Unit Testing</div>
		<div class="content">
			<div class="contentItem">
			<?php
				require_once 'User.php';
				$user_unitTest = new User_UnitTest;
				$user_unitTest->RunTest();
			?>
			</div>
		</div>
	</div>
<?php $maincontent = ob_get_clean(); ?>

<?php
	$pagetitle = "Unit testing";
	include("_template.php");
?>