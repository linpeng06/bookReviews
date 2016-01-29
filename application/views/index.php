<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Login/Registration</title>
 <!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-       theme.min.css">

		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  	<script type="text/javascript" src="//code.jquery.com/jquery-1.11.3.min.js"></script>
</head>
<body>
    <div class = "container">
    <div class="page-header">
        <img src="/assets/images/icon2.png" width="100" height="100">
        <h2>Welcome to Book Reviews!</h2> 
    </div>
	<h4>Register</h4>
	<div class ="register">
        <form action="/register" class="form-group" method="post">
            <label>First Name:</label>
            <input type="text" name="first_name"></input></br>
            <label>Last Name:</label>
            <input type="text" name="last_name"></input></br>
            <label>Alias:</label>
            <input type="text" name="alias"></input></br>
            <label>Email:</label>
            <input type="text" name="email"></input></br>
            <label>Password:</label>
            <input type="password" name="password"></input></br>
            <p>Password should be at least 8 characters</p>
            <label>Confirm Password:</label>
            <input type="password" name="confirm_password"></input></br>
            <input type="submit" value="Register"></input></br>
        </form>	
    </div>
	<!-- VALIDATION REGISTER ERRORS -->
	<?php echo $this->session->flashdata("register_errors"); ?>
    <div class="login">
    <h4>Login</h4>
    <div class ="login">
        <form action="/login" class="form-group" method="post">
            <label>Email:</label>
            <input type="text" name="email"></input></br>
            <label>Password:</label>
            <input type="password" name="password"></input></br>
            <input type="submit" value="Login"></input></br>
        </form>	
    </div>
	<!-- VALIDATION LOGIN ERRORS -->
	<?php echo $this->session->flashdata("errors"); ?>
</body>
</html>