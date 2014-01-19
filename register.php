<?php ob_start(); ?>

	<style>
		.register .content .email,
		.register .content .password
		{
			width: 100%;
		}
	</style>
<?php $localCss = ob_get_clean(); ?>

	<form method="post" action="register_verify.php">
		<div class="box register">
			<div class="title">Welcome!  Please register:</div>
			<div class="content">
				<div class="contentItem">
					<div>Email:</div>
					<input class="email" type="email" name="email" placeholder="username@domain.com" autofocus><br />
				</div>
				<div class="contentItem">
					<div>Password:</div>
					<input class="password" type="password" name="password"><br />
				</div>
				<input type="submit" value="Log In">
			</div>
		</div>
	</form>
<?php $maincontent = ob_get_clean(); ?>

<?php
	$pagetitle = "Register";
	include("_template.php");
?>