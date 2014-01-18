<!DOCTYPE html>
<html lang="en">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">

		<!-- Optional theme -->
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap-theme.min.css">

		<!-- Latest compiled and minified JavaScript -->
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
		
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<div>
			<form method="post" action="CheckCredentials.php">
				<div class="box login">
					<div class="title">Please log in to continue:</div>
					<div class="content">
						<div class="contentItem">
							<div>Email:</div>
							<input class="email" type="email" name="email" placeholder="username@domain.com" autofocus><br />
						</div>
						<div class="contentItem">
							<div>Password:</div>
							<input class="password" type="password" name="password"><br />
						</div>
						<input type="submit" value="Submit">
					</div>
				</div>
			</form>
		</div>
	</body>
</html>