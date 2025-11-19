<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="utf-8">
    <title>Jay O Food - Admin</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="../img/chef-hat.png" rel="icon">
  <link rel="stylesheet" href="./style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<!DOCTYPE html>
<html>
<head>
	<title>Slide Navbar</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
</head>
<body>
	<div class="main">  	
		<input type="checkbox" id="chk" aria-hidden="true">

			<div class="signup">
				<form>
					<label for="chk" aria-hidden="true">Administration</label>
					<!-- Sign up
					<input type="text" name="txt" placeholder="User name" required="">
					<input type="email" name="email" placeholder="Email" required="">
					<input type="password" name="pswd" placeholder="Password" required="">
					<button>Sign up</button> -->
					<h3 style="color: whitesmoke; text-align: center;"><?php 
						if( isset($_GET['first_name']) && isset($_GET['unique']) ) {echo "Your email and password is Incorrect " . $_GET['first_name'] ." & ". $_GET['unique'];}
					?></h3>
				</form>
			</div>

			<div class="login">
				<form action="php_login.php" method="post" id="login">
					<label for="chk" aria-hidden="true">Sign In</label>
					<input type="email" name="email" placeholder="Email" required="">
					<input type="Password" name="pass" placeholder="Enter Password" required>
					<button>Login</button>
				</form>
			</div>
	</div>
</body>
</html>
<!-- partial -->
  
</body>
</html>
