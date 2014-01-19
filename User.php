<?php
	class User
	{
		var $email = '';
		var $password = '';

		function HasValidEmail() {
			//Have a php class that checks for valid email address and password. 
			// http://stackoverflow.com/questions/12026842/how-to-validate-an-email-address-in-php
			if ($this->email == '') return false;
			return filter_var($this->email, FILTER_VALIDATE_EMAIL) == $this->email;
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
				array('valid',   'user@domain.com'),
				array('invalid', ''),
				array('invalid', 'user'),
				array('invalid', 'domain.com'),
				array('invalid', 'Abc.example.com'),
				array('invalid', 'A@b@c@example.com'),
				array('invalid', 'a"b(c)d,e:f;g<h>i[j\k]l@example.com'),
				array('invalid', 'just"not"right@example.com'),
				array('invalid', 'this is"not\allowed@example.com'),
				array('invalid', 'this\ still\"not\\allowed@example.com', 'invalid')
			);
			
			$testIndex = 0;
			foreach ($list as $testcase) {
				$test = new User();
				$test->email = $testcase[1];

				// invert results if testcase is expected to be invalid by multiplying the negative of the test results
				// if testcase expects invalid results.... return 1... 
				$IfInvalidThisIsOne = ($testcase[0] == 'invalid'); 

				// if false, subtract... -1 is true also
				$results = $test->HasValidEmail() - $IfInvalidThisIsOne;

				if ($results) {
					echo 'PASS: User->HasValidEmail(), test #' . $testIndex . '<br />';
				} else {
					echo 'FAIL: User->HasValidEmail(), test #' . $testIndex . '<br />';
				}
				$testIndex++;
			}
		}
		
		function test_HasValidPassword() {
			$list = array(
				array('valid',   'password1$'),
				array('valid',   'password123$'),
				array('valid',   'password1$@%'),
				array('valid',   'password123$#$%'),
				array('invalid', ''),
				array('invalid', 'password'),
				array('invalid', 'password1'),
				array('invalid', 'p@ssword!'),
				array('invalid', 'pass1!'),
			);
			
			$testIndex = 0;
			foreach($list as $testcase) {
				$test = new User();
				$test->password = $testcase[1];

				// invert results if testcase is expected to be invalid by multiplying the negative of the test results
				// if testcase expects invalid results.... return 1... 
				$IfInvalidThisIsOne = ($testcase[0] == 'invalid'); 

				// if false, subtract... -1 is true also
				$results = $test->HasValidPassword() - $IfInvalidThisIsOne;

				if ($results) {
					echo 'PASS: User_UnitTest->test_HasValidPassword(), test #' . $testIndex . '<br />';
				} else {
					echo 'FAIL: User_UnitTest->test_HasValidPassword(), test #' . $testIndex . '<br />'; 
				}
				$testIndex++;
			}
		}
	}
?>