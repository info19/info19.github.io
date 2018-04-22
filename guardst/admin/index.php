<?php
session_start();
ob_start();
include('../config.php');

if (isset($_SESSION['username'])) {
    $uname = $_SESSION['username'];
    $table = $prefix . 'users';
    $suser = mysqli_query($connect, "SELECT * FROM `$table` WHERE username='$uname'");
    $count = mysqli_num_rows($suser);
    if ($count > 0) {
        echo '<script type="text/javascript">window.location = "dashboard"</script>';
        exit;
    }
}

$_GET  = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
?>
<!doctype html>
<html class="fixed">

<head>
        
		<!-- Basic -->
		<meta charset="UTF-8">
    
        <title>phpGuard PRO &rsaquo; Admin Panel</title>
    
		<meta name="author" content="Desislav Antonov - ExTrEeMeR">
		
		<link rel="shortcut icon" href="assets/images/favicon.ico">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Web Fonts  -->
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.css" />
		<link rel="stylesheet" href="assets/vendor/magnific-popup/magnific-popup.css" />

		<!-- Theme CSS -->
		<link rel="stylesheet" href="assets/stylesheets/theme.css" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="assets/stylesheets/theme-custom.css">

		<!-- Head Libs -->
		<script src="assets/vendor/modernizr/modernizr.js"></script>

	</head>
	<body>
		<!-- start: page -->
		<section class="body-sign">
			<div class="center-sign">
				<a href="index.php" class="logo pull-left">
					<img src="assets/images/logo.png" height="54" alt="phpGuard PRO" />
				</a>

				<div class="panel panel-sign">
					<div class="panel-title-sign mt-xl text-right">
						<h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i> Sign In</h2>
					</div>
					<div class="panel-body">
						<form action="" method="post">
							<div class="form-group mb-lg">
<?php
@$_SESSION['username-input'] = $_POST['username'];
?>
								<label>Username</label>
								<div class="input-group input-group-icon">
									<input name="username" type="text" class="form-control input-lg" value="<?php
echo $_SESSION['username-input'];
?>" required />
									<span class="input-group-addon">
										<span class="icon icon-lg">
											<i class="fa fa-user"></i>
										</span>
									</span>
								</div>
							</div>

							<div class="form-group mb-lg">
								<div class="clearfix">
									<label class="pull-left">Password</label>
								</div>
								<div class="input-group input-group-icon">
									<input name="password" type="password" class="form-control input-lg" required />
									<span class="input-group-addon">
										<span class="icon icon-lg">
											<i class="fa fa-lock"></i>
										</span>
									</span>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-8">
									<div class="checkbox-custom checkbox-default">
										<input id="RememberMe" name="rememberme" type="checkbox"/>
										<label for="RememberMe">Remember Me</label>
									</div>
								</div>
								<div class="col-sm-4 text-right">
									<button type="submit" class="btn btn-primary hidden-xs" name="signin">Sign In</button>
									<button type="submit" class="btn btn-primary btn-block btn-lg visible-xs mt-lg" name="signin">Sign In</button>
								</div>
							</div>
						</form>
<?php
if (isset($_POST['signin'])) {
    @$username = mysqli_real_escape_string($connect, $_POST['username']);
    @$password = base64_encode($_POST['password']);
    $table = $prefix . "users";
    $check = mysqli_query($connect, "SELECT * FROM `$table` WHERE `username`='$username' AND password='$password'");
    if (mysqli_num_rows($check) > 0) {
        if (isset($_POST['rememberme'])) {
            setcookie("username", $username, time() + 60 * 60 * 24 * 100, '/');
            $_SESSION['username'] = $username;
            echo '<meta http-equiv="refresh" content="0;url=dashboard">';
        } else {
            $_SESSION['username'] = $username;
            echo '<meta http-equiv="refresh" content="0;url=dashboard">';
        }
    } else {
        echo '<br />
		<div class="alert alert-dismissable alert-danger">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              The entered <strong>username</strong> or <strong>password</strong> are incorrect.
        </div>';
    }
}
?>      
					</div>
				</div>

				<p class="text-center text-muted mt-md mb-md">&copy; <?php
echo date("Y");
?> phpGuard PRO</p>
			</div>
		</section>
		<!-- end: page -->

		<!-- Vendor -->
		<script src="assets/vendor/jquery/jquery.js"></script>
        <script src="assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
        <script src="assets/vendor/jquery-cookie/jquery.cookie.js"></script>
        <script src="assets/vendor/bootstrap/js/bootstrap.js"></script>
        <script src="assets/vendor/nanoscroller/nanoscroller.js"></script>
        <script src="assets/vendor/magnific-popup/magnific-popup.js"></script>
        <script src="assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="assets/javascripts/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="assets/javascripts/theme.custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="assets/javascripts/theme.init.js"></script>
	</body>

</html>