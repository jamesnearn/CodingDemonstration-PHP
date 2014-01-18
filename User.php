<?php
	class User
	{
		var $email = '';
		var $password = '';

		function HasValidEmail() {
			//Have a php class that checks for valid email address and password. 
			// http://stackoverflow.com/questions/12026842/how-to-validate-an-email-address-in-php
			return filter_var($this->email, FILTER_VALIDATE_EMAIL);
		}
		
		function HasValidPassword() {
			// Maybe the password has to be at least 10 characters long and include at least one number and one special character.

			// http://stackoverflow.com/questions/18175644/password-validation-php-regex
			// http://us3.php.net/preg_match
			// http://regex101.com/r/fD5lN6

			$LookaheadOneNumber = '(?=.*\d)';
			$MatchLetterNumSymbols = '[0-9A-Za-z!@#$%*]';
			$RequireTenDigits = '{10,}';
			$pattern = '/^' . $LookaheadOneNumber . $MatchLetterNumSymbols . $RequireTenDigits . '$/';
			return preg_match($pattern, $this->password);
		}
	}
	
	class User_UnitTest
	{
		function RunTest() {
			$this->test_HasValidEmail();
			$this->test_HasValidPassword();
		}

		function test_HasValidEmail() {
			$test = new User();
			$test->email = 'user@domain.com';
			if ($test->hasvalidemail()) {
				echo 'PASS: User->HasValidEmail(), test #1<br />';
			} else {
				echo 'FAIL: User->HasValidEmail(), test #1<br />';
			}

			$test->email = 'user';
			if ($test->HasValidEmail()) {
				echo 'FAIL: User->HasValidEmail(), test #2<br />';
			} else {
				echo 'PASS: User->HasValidEmail(), test #2<br />';
			}

			$test->email = 'domain.com';
			if ($test->HasValidEmail()) {
				echo 'FAIL: User->HasValidEmail(), test #3<br />';
			} else {
				echo 'PASS: User->HasValidEmail(), test #3<br />';
			}
		}
		
		function test_HasValidPassword() {
			$test = new User();

			$test->password = 'password1$';
			if ($test->HasValidPassword()) {
				echo "PASS: User_UnitTest->test_HasValidPassword(), test #1<br />"; 
			} else {
				echo "FAIL: User_UnitTest->test_HasValidPassword(), test #1<br />"; 
			}

			$test->password = 'password';
			if ($test->HasValidPassword()) {
				echo "FAIL: User_UnitTest->test_HasValidPassword(), test #2<br />"; 
			} else {
				echo "PASS: User_UnitTest->test_HasValidPassword(), test #2<br />"; 
			}

			$test->password = 'password1';
			if ($test->HasValidPassword()) {
				echo "FAIL: User_UnitTest->test_HasValidPassword(), test #3<br />"; 
			} else {
				echo "PASS: User_UnitTest->test_HasValidPassword(), test #3<br />"; 
			}
		}
	}
?>