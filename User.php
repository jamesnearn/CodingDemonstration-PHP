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
			//list of bad emails from http://en.wikipedia.org/wiki/Email_address

			$list = array(
				'user@domain.com',	//valid
				'',
				'user',
				'domain.com',
				'Abc.example.com',
				'A@b@c@example.com',
				'a"b(c)d,e:f;g<h>i[j\k]l@example.com',
				'just"not"right@example.com',
				'this is"not\allowed@example.com',
				'this\ still\"not\\allowed@example.com'
			);
			
			$testIndex = 0;
			foreach ($list as $email) {
				$test = new User();
				$test->email = $email;
				if ($test->HasValidEmail()) {
					echo 'FAIL: User->HasValidEmail(), test #' . $testIndex . '<br />';
				} else {
					echo 'PASS: User->HasValidEmail(), test #' . $testIndex . '<br />';
				}
				$testIndex++;
			}
		}
		
		function test_HasValidPassword() {
			$list = array(
			'password1$',	//valid
			'',
			'password',
			'password1',
			'p@ssword!',
			'pass1!',
			);
			
			$testIndex = 0;
			foreach($list as $password) {
				$test = new User();
				$test->password = $password;
				if ($test->HasValidPassword()) {
					echo 'FAIL: User_UnitTest->test_HasValidPassword(), test #' . $testIndex . '<br />';
				} else {
					echo 'PASS: User_UnitTest->test_HasValidPassword(), test #' . $testIndex . '<br />'; 
				}
				$testIndex++;
			}
		}
	}
?>