<?php ob_start(); ?>

	<style>
		.register .content #email,
		.register .content #password
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
					<input id="email" type="email" name="email" placeholder="username@domain.com" autofocus><br />
				</div>
				<div class="contentItem">
					<div>Password:</div>
					<input id="password" type="password" name="password"><br />
					<div id="requirements">
						Requirements:
						<ul>
							<li id="CharsLength">At least 10 characters</li>
							<li id="Numbers">Include at least one number</li>
							<li id="Specials">Include at least one special character</li>
						</ul>	
					</div>
					<script>
						$('#password').keyup(function () {
							var pass = $(this).val();
							$("#requirements").show();
							
							if ($(this).val().length < 10) {
								$("#CharsLength").css('color', 'red');
							} else {
								$("#CharsLength").css('color', 'green');
							}
							
							if (pass.match('[0-9]') == null) {
								$("#Numbers").css('color', 'red');
							} else {
								$("#Numbers").css('color', 'green');
							}

							if (pass.match('[!@#$%*]') == null) {
								$("#Specials").css('color', 'red');
							} else {
								$("#Specials").css('color', 'green');
							}
						});
						$(document).ready(function () {
							$("#requirements").hide();
						});
					</script>
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