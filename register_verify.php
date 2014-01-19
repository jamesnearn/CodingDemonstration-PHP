<?php 
	require 'User.php';
	
	class verifyRegistration {
		public $user;
		
		function LoadPostVariables() {
			$this->user = new User;
			
			if (isset($_POST['email'])) {
				$this->user->email = $_POST['email'];
			}
			
			if (isset($_POST['password'])) {
				$this->user->password = $_POST['password'];
			}			
		}
		
		function ValidateEmailFormat() {
			if ($this->user->HasValidEmail()) {
				return 'Valid Format';
			} else {
				return 'Invalid Format';
			}			
		}
		
		function ValidatePasswordFormat() {
			if ($this->user->HasValidPassword()) {
				return 'Valid Format';
			} else {
				return 'Invalid Format';
			}		
		}
	}
	
	$verifyRegistration = new verifyRegistration;
	$verifyRegistration->LoadPostVariables();
?>
<?php ob_start(); ?>

	<div class="box">
		<div class="title">Registration verification:</div>
		<div class="content">
			<div class="contentItem">
				Email: <?php echo $verifyRegistration->ValidateEmailFormat(); ?>
			</div>
			
			<div class="contentItem">
				Password: <?php echo $verifyRegistration->ValidatePasswordFormat(); ?>
			</div>			
		</div>
	</div>
<?php $maincontent = ob_get_clean(); ?>

<?php
	$pagetitle = "Register verification";
	include("_template.php");
?>