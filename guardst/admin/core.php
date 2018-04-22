<?php
ob_start(); //Increase Site Performance

include('../config.php');

@session_start();

if (isset($_SESSION['username'])) {
    $uname = $_SESSION['username'];
    $suser = mysqli_query($connect, "SELECT * FROM `phpguard_users` WHERE username='$uname'");
    $count = mysqli_num_rows($suser);
    if ($count < 0) {
        echo '<script type="text/javascript">window.location = "index"</script>';
        exit;
    }
} else {
    echo '<script type="text/javascript">window.location = "index"</script>';
    exit;
}

function short_text($text, $length)
{
    $maxTextLenght = $length;
    $aspace        = " ";
    if (strlen($text) > $maxTextLenght) {
        $text = substr(trim($text), 0, $maxTextLenght);
        $text = substr($text, 0, strlen($text) - strpos(strrev($text), $aspace));
        $text = $text . '...';
    }
    return $text;
}

function byte_convert($size)
{
    if ($size < 1024)
        return $size . ' Byte';
    if ($size < 1048576)
        return sprintf("%4.2f KB", $size / 1024);
    if ($size < 1073741824)
        return sprintf("%4.2f MB", $size / 1048576);
    if ($size < 1099511627776)
        return sprintf("%4.2f GB", $size / 1073741824);
    else
        return sprintf("%4.2f TB", $size / 1073741824);
}

//Anti XSS (Cross-site Scripting)
function security($input)
{
    @$input = mysqli_real_escape_string($connect, $input);
    @$input = strip_tags($input);
    @$input = addslashes($input);
    return $input;
}

$_GET  = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

function percent($num_amount, $num_total)
{
    @$count1 = $num_amount / $num_total;
    $count2 = $count1 * 100;
    $count  = number_format($count2, 0);
    return $count;
}

function visitor_country($ip)
{
    $ip_data = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));
    
    if ($ip_data && $ip_data->geoplugin_countryName != null) {
        $result = $ip_data->geoplugin_countryName;
    }
    
    return @$result;
}

function get_browserimg($browser)
{
    if ($browser == "Google Chrome") {
        $image = '<img src="assets/images/icons/chrome.png" width="20px" height="20px" />';
        return $image;
    } else {
        if ($browser == "Mozilla Firefox") {
            $image = '<img src="assets/images/icons/firefox.png" width="20px" height="20px" />';
            return $image;
        } else {
            if ($browser == "Opera") {
                $image = '<img src="assets/images/icons/opera.png" width="20px" height="20px" />';
                return $image;
            } else {
                if ($browser == "Apple Safari") {
                    $image = '<img src="assets/images/icons/safari.png" width="20px" height="20px" />';
                    return $image;
                } else {
                    if ($browser == "Netscape") {
                        $image = '<img src="assets/images/icons/netscape.png" width="20px" height="20px" />';
                        return $image;
                    } else {
                        if ($browser == "Internet Explorer") {
                            $image = '<img src="assets/images/icons/ie.png" width="20px" height="20px" />';
                            return $image;
                        } else {
                            $image = '<img src="assets/images/icons/unknown-browser.png" width="20px" height="20px" />';
                            return $image;
                        }
                    }
                }
            }
        }
    }
}

function get_osimg($os)
{
    if ($os == "Windows") {
        $image = '<img src="assets/images/icons/windows.png" width="20px" height="20px" />';
        return $image;
    } else {
        if ($os == "Linux") {
            $image = '<img src="assets/images/icons/linux.png" width="20px" height="20px" />';
            return $image;
        } else {
            if ($os == "Mac") {
                $image = '<img src="assets/images/icons/mac.png" width="20px" height="20px" />';
                return $image;
            } else {
                $image = '<img src="assets/images/icons/unknown-os.png" width="20px" height="20px" />';
                return $image;
            }
        }
    }
}

function get_banned($ip)
{
    include '../config.php';
    $table = $prefix . 'bans';
    @$query = mysqli_query($connect, "SELECT * FROM `$table` WHERE ip='$ip' LIMIT 1");
    @$count = mysqli_num_rows($query);
    if ($count > 0) {
        return 'Yes';
    } else {
        return 'No';
    }
}

function get_bannedid($ip)
{
    include '../config.php';
    $table = $prefix . 'bans';
    @$query = mysqli_query($connect, "SELECT * FROM `$table` WHERE ip='$ip' LIMIT 1");
    @$row = mysqli_fetch_array($query);
    return $row['id'];
}

function head()
{
    include '../config.php';
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
        <link rel="stylesheet" href="assets/vendor/jquery-datatables-bs3/assets/css/datatables.css" />

		<!-- Specific Page Vendor CSS -->		
        <link rel="stylesheet" href="assets/vendor/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css" />		
        <link rel="stylesheet" href="assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css" />		
        <link rel="stylesheet" href="assets/vendor/morris/morris.css" />
        <link rel="stylesheet" href="assets/vendor/bootstrap-fileupload/bootstrap-fileupload.min.css" />

		<!-- Theme CSS -->
		<link rel="stylesheet" href="assets/stylesheets/theme.css" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="assets/stylesheets/theme-custom.css">

		<!-- Head Libs -->
		<script src="assets/vendor/modernizr/modernizr.js"></script>

	</head>
	<body>
		<section class="body">

			<!-- start: header -->
			<header class="header">
				<div class="logo-container">
					<a href="dashboard" class="logo">
						<img src="assets/images/logo.png" height="35" alt="phpGuard PRO" />
					</a>
					<div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
						<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
					</div>
				</div>
			
				<!-- start: search & user box -->
				<div class="header-right">
			
					<div class="search nav-form">
						<div class="input-group input-search">
							<input type="text" class="form-control" name="q" id="q" placeholder="Search...">
							<span class="input-group-btn">
								<button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
							</span>
						</div>
					</div>
                    
					<span class="separator"></span>
<?php
    $uname = $_SESSION['username'];
    $table = $prefix . 'users';
    $suser = mysqli_query($connect, "SELECT * FROM `$table` WHERE username='$uname'");
    $urow  = mysqli_fetch_array($suser);
?>
					<div id="userbox" class="userbox">
						<a href="#" data-toggle="dropdown">
							<figure class="profile-picture">
								<img src="<?php
    echo $urow['avatar'];
?>" alt="<?php
    echo $_SESSION['username'];
?>" class="img-circle" data-lock-picture="<?php
    echo $urow['avatar'];
?>" />
							</figure>
							<div class="profile-info" data-lock-name="<?php
    echo $_SESSION['username'];
?>" data-lock-email="<?php
    echo $urow['email'];
?>">
								<span class="name"><?php
    echo $_SESSION['username'];
?></span>
								<span class="role">Administrator</span>
							</div>
			
							<i class="fa custom-caret"></i>
						</a>
			
						<div class="dropdown-menu">
							<ul class="list-unstyled">
								<li class="divider"></li>
								<li>
									<a role="menuitem" tabindex="-1" href="users?edit-id=<?php
    echo $urow['id'];
?>"><i class="fa fa-user"></i> My Profile</a>
								</li>
								<li>
									<a role="menuitem" tabindex="-1" href="logout"><i class="fa fa-power-off"></i> Logout</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- end: search & user box -->
			</header>
			<!-- end: header -->

			<div class="inner-wrapper">
				<!-- start: sidebar -->
				<aside id="sidebar-left" class="sidebar-left">
				
					<div class="sidebar-header">
						<div class="sidebar-title">
							Navigation
						</div>
						<div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
							<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
						</div>
					</div>
				
					<div class="nano">
						<div class="nano-content">
							<nav id="menu" class="nav-main" role="navigation">
								<ul class="nav nav-main">
									<li <?php
    if (basename($_SERVER['SCRIPT_NAME']) == 'dashboard.php') {
        echo 'class="nav-active"';
    }
?>>
										<a href="dashboard">
											<i class="fa fa-home" aria-hidden="true"></i>
											<span>Dashboard</span>
										</a>
									</li>
									<li>
										<a href="../" target="_blank">
											<i class="fa fa-desktop" aria-hidden="true"></i>
											<span>View The Site</span>
										</a>
									</li>
                                    <li <?php
    if (basename($_SERVER['SCRIPT_NAME']) == 'malware-scanner.php') {
        echo 'class="nav-active"';
    }
?>>
										<a href="malware-scanner">
											<i class="fa fa-search" aria-hidden="true"></i>
											<span>Malware Scanner</span>
										</a>
									</li>
									<li <?php
    if (basename($_SERVER['SCRIPT_NAME']) == 'security-check.php') {
        echo 'class="nav-active"';
    }
?>>
										<a href="security-check">
											<i class="fa fa-check" aria-hidden="true"></i>
											<span>Security Check</span>
										</a>
									</li>
									<li class="nav-parent <?php
    if (basename($_SERVER['SCRIPT_NAME']) == 'all-logs.php' OR basename($_SERVER['SCRIPT_NAME']) == 'sqli-logs.php' OR basename($_SERVER['SCRIPT_NAME']) == 'massrequest-logs.php' OR basename($_SERVER['SCRIPT_NAME']) == 'proxy-logs.php' OR basename($_SERVER['SCRIPT_NAME']) == 'spammer-logs.php') {
        echo 'nav-expanded nav-active';
    }
?>">
										<a>
											<i class="fa fa-list" aria-hidden="true"></i>
											<span>Logs</span>
										</a>
										<ul class="nav nav-children">
											<li <?php
    if (basename($_SERVER['SCRIPT_NAME']) == 'all-logs.php') {
        echo 'class="nav-active"';
    }
?>>
												<a href="all-logs">
<?php
    $table = $prefix . 'logs';
    @$lquery1 = mysqli_query($connect, "SELECT * FROM $table");
    @$lcount1 = mysqli_num_rows($lquery1);
?>
                                                     <span class="pull-right label label-primary"><?php
    echo $lcount1;
?></span>
													 <i class="fa fa-align-justify"></i> All Logs
												</a>
											</li>
											<li <?php
    if (basename($_SERVER['SCRIPT_NAME']) == 'sqli-logs.php') {
        echo 'class="nav-active"';
    }
?>>
												<a href="sqli-logs">
<?php
    $table = $prefix . 'logs';
    @$lquery2 = mysqli_query($connect, "SELECT * FROM $table WHERE type='SQLi'");
    @$lcount2 = mysqli_num_rows($lquery2);
?>
                                                     <span class="pull-right label label-info"><?php
    echo $lcount2;
?></span>
													 <i class="fa fa-code"></i> SQL Injection Logs
												</a>
											</li>
											<li <?php
    if (basename($_SERVER['SCRIPT_NAME']) == 'massrequest-logs.php') {
        echo 'class="nav-active"';
    }
?>>
												<a href="massrequest-logs">
<?php
    $table = $prefix . 'logs';
    @$lquery3 = mysqli_query($connect, "SELECT * FROM $table WHERE type='Mass Requests'");
    @$lcount3 = mysqli_num_rows($lquery3);
?>
                                                     <span class="pull-right label label-danger"><?php
    echo $lcount3;
?></span>
													 <i class="fa fa-retweet"></i> Mass Request Logs
												</a>
											</li>
											<li <?php
    if (basename($_SERVER['SCRIPT_NAME']) == 'proxy-logs.php') {
        echo 'class="nav-active"';
    }
?>>
												<a href="proxy-logs">
<?php
    $table = $prefix . 'logs';
    @$lquery4 = mysqli_query($connect, "SELECT * FROM $table WHERE type='Proxy'");
    @$lcount4 = mysqli_num_rows($lquery4);
?>
                                                     <span class="pull-right label label-warning"><?php
    echo $lcount4;
?></span>
													 <i class="fa fa-globe"></i> Proxy Logs
												</a>
											</li>
											<li <?php
    if (basename($_SERVER['SCRIPT_NAME']) == 'spammer-logs.php') {
        echo 'class="nav-active"';
    }
?>>
												<a href="spammer-logs">
<?php
    $table = $prefix . 'logs';
    @$lquery5 = mysqli_query($connect, "SELECT * FROM $table WHERE type='Spammer'");
    @$lcount5 = mysqli_num_rows($lquery5);
?>
                                                     <span class="pull-right label label-success"><?php
    echo $lcount5;
?></span>
													 <i class="fa fa-keyboard-o"></i> Spammer Logs
												</a>
											</li>
										</ul>
									</li>
                                    <li class="nav-parent <?php
    if (basename($_SERVER['SCRIPT_NAME']) == 'bans-ip.php' OR basename($_SERVER['SCRIPT_NAME']) == 'bans-country.php') {
        echo 'nav-expanded nav-active';
    }
?>">
										<a>
											<i class="fa fa-ban" aria-hidden="true"></i>
											<span>Bans</span>
										</a>
										<ul class="nav nav-children">
											<li <?php
    if (basename($_SERVER['SCRIPT_NAME']) == 'bans-ip.php') {
        echo 'class="nav-active"';
    }
?>>
												<a href="bans-ip">
<?php
    $table = $prefix . 'bans';
    @$bquery = mysqli_query($connect, "SELECT * FROM $table");
    @$bcount = mysqli_num_rows($bquery);
?>
                                                     <span class="pull-right label label-danger"><?php
    echo $bcount;
?></span>
													 <i class="fa fa-user"></i> IP Bans
												</a>
											</li>
											<li <?php
    if (basename($_SERVER['SCRIPT_NAME']) == 'bans-country.php') {
        echo 'class="nav-active"';
    }
?>>
												<a href="bans-country">
<?php
    $table = $prefix . 'bans-country';
    @$cbquery = mysqli_query($connect, "SELECT * FROM `$table`");
    @$cbcount = mysqli_num_rows($cbquery);
?>
                                                     <span class="pull-right label label-danger"><?php
    echo $cbcount;
?></span>
													 <i class="fa fa-globe"></i> Country Bans
												</a>
											</li>
										</ul>
									</li>
                                    <li <?php
    if (basename($_SERVER['SCRIPT_NAME']) == 'ip-whitelist.php') {
        echo 'class="nav-active"';
    }
?>>
										<a href="ip-whitelist">
											<i class="fa fa-flag-o" aria-hidden="true"></i>
											<span>IP Whitelist</span>
										</a>
									</li>
                                    <li class="nav-parent <?php
    if (basename($_SERVER['SCRIPT_NAME']) == 'sql-injection.php' OR basename($_SERVER['SCRIPT_NAME']) == 'sql-injection.php' OR basename($_SERVER['SCRIPT_NAME']) == 'mass-requests.php' OR basename($_SERVER['SCRIPT_NAME']) == 'cross-site-scripting.php' OR basename($_SERVER['SCRIPT_NAME']) == 'spam.php' OR basename($_SERVER['SCRIPT_NAME']) == 'proxy.php') {
        echo 'nav-expanded nav-active';
    }
?>">
										<a>
											<i class="fa fa-shield" aria-hidden="true"></i>
											<span>Security</span>
										</a>
										<ul class="nav nav-children">
											<li <?php
    if (basename($_SERVER['SCRIPT_NAME']) == 'sql-injection.php') {
        echo 'class="nav-active"';
    }
?>>
												<a href="sql-injection">
<?php
    $table = $prefix . 'sqli-settings';
    @$query = mysqli_query($connect, "SELECT * FROM `$table`");
    @$row = mysqli_fetch_array($query);
    if ($row['protection'] == 'Yes') {
        echo '
                                                     <span class="pull-right label label-success">ON</span>
';
    } else {
        echo '
                                                     <span class="pull-right label label-danger">OFF</span>
';
    }
?>
													 <i class="fa fa-code"></i> SQL Injection
												</a>
											</li>
											<li <?php
    if (basename($_SERVER['SCRIPT_NAME']) == 'mass-requests.php') {
        echo 'class="nav-active"';
    }
?>>
												<a href="mass-requests">
<?php
    $table = $prefix . 'massrequests-settings';
    @$query = mysqli_query($connect, "SELECT * FROM `$table`");
    @$row = mysqli_fetch_array($query);
    if ($row['protection'] == 'Yes') {
        echo '
                                                     <span class="pull-right label label-success">ON</span>
';
    } else {
        echo '
                                                     <span class="pull-right label label-danger">OFF</span>
';
    }
?>
													 <i class="fa fa-retweet"></i> Mass Requests (Flood)
												</a>
											</li>
											<li <?php
    if (basename($_SERVER['SCRIPT_NAME']) == 'spam.php') {
        echo 'class="nav-active"';
    }
?>>
												<a href="spam">
<?php
    $table = $prefix . 'spam-settings';
    @$query = mysqli_query($connect, "SELECT * FROM `$table`");
    @$row = mysqli_fetch_array($query);
    if ($row['protection'] == 'Yes') {
        echo '
                                                     <span class="pull-right label label-success">ON</span>
';
    } else {
        echo '
                                                     <span class="pull-right label label-danger">OFF</span>
';
    }
?>
													 <i class="fa fa-keyboard-o"></i> Spam
												</a>
											</li>
                                            <li <?php
    if (basename($_SERVER['SCRIPT_NAME']) == 'proxy.php') {
        echo 'class="nav-active"';
    }
?>>
												<a href="proxy">
<?php
    $table = $prefix . 'proxy-settings';
    @$query = mysqli_query($connect, "SELECT * FROM `$table`");
    @$row = mysqli_fetch_array($query);
    if ($row['protection'] == 'Yes') {
        echo '
                                                     <span class="pull-right label label-success">ON</span>
';
    } else {
        echo '
                                                     <span class="pull-right label label-danger">OFF</span>
';
    }
?>
													 <i class="fa fa-globe"></i> Proxy
												</a>
											</li>
										</ul>
									</li>
									<li <?php
    if (basename($_SERVER['SCRIPT_NAME']) == 'content-protection.php') {
        echo 'class="nav-active"';
    }
?>>
										<a href="content-protection">
											<i class="fa fa-file-text" aria-hidden="true"></i>
											<span>Content Protection</span>
										</a>
									</li>
									<li class="nav-parent <?php
    if (basename($_SERVER['SCRIPT_NAME']) == 'htaccess-editor.php' OR basename($_SERVER['SCRIPT_NAME']) == 'error-monitoring.php' OR basename($_SERVER['SCRIPT_NAME']) == 'html-encrypter.php' OR basename($_SERVER['SCRIPT_NAME']) == 'php-encoder.php' OR basename($_SERVER['SCRIPT_NAME']) == 'password-generator.php' OR basename($_SERVER['SCRIPT_NAME']) == 'hashing.php') {
        echo 'nav-expanded nav-active';
    }
?>">
										<a>
											<i class="fa fa-wrench" aria-hidden="true"></i>
											<span>Tools</span>
										</a>
										<ul class="nav nav-children">
                                            <li <?php
    if (basename($_SERVER['SCRIPT_NAME']) == 'htaccess-editor.php') {
        echo 'class="nav-active"';
    }
?>>
												<a href="htaccess-editor">
													 <i class="fa fa-columns"></i> .htaccess Editor
												</a>
											</li>
                                            <li <?php
    if (basename($_SERVER['SCRIPT_NAME']) == 'error-monitoring.php') {
        echo 'class="nav-active"';
    }
?>>
												<a href="error-monitoring">
													 <i class="fa fa-file-text-o"></i> Error Monitoring
												</a>
											</li>
											<li <?php
    if (basename($_SERVER['SCRIPT_NAME']) == 'html-encrypter.php') {
        echo 'class="nav-active"';
    }
?>>
												<a href="html-encrypter">
													 <i class="fa fa-code"></i> HTML Encrypter
												</a>
											</li>
											<li <?php
    if (basename($_SERVER['SCRIPT_NAME']) == 'php-encoder.php') {
        echo 'class="nav-active"';
    }
?>>
												<a href="php-encoder">
													 <i class="fa fa-code"></i> PHP Encoder
												</a>
											</li>
                                            <li <?php
    if (basename($_SERVER['SCRIPT_NAME']) == 'password-generator.php') {
        echo 'class="nav-active"';
    }
?>>
												<a href="password-generator">
													 <i class="fa fa-key"></i> Password Generator
												</a>
											</li>
                                            <li <?php
    if (basename($_SERVER['SCRIPT_NAME']) == 'hashing.php') {
        echo 'class="nav-active"';
    }
?>>
												<a href="hashing">
													 <i class="fa fa-lock"></i> Hashing
												</a>
											</li>
										</ul>
									</li>
									<li <?php
    if (basename($_SERVER['SCRIPT_NAME']) == 'settings.php') {
        echo 'class="nav-active"';
    }
?>>
										<a href="settings">
											<i class="fa fa-cogs" aria-hidden="true"></i>
											<span>Settings</span>
										</a>
									</li>
									<li <?php
    if (basename($_SERVER['SCRIPT_NAME']) == 'warning-pages.php') {
        echo 'class="nav-active"';
    }
?>>
										<a href="warning-pages">
											<i class="fa fa-file-text-o" aria-hidden="true"></i>
											<span>Warning Pages</span>
										</a>
									</li>
                                    <li <?php
    if (basename($_SERVER['SCRIPT_NAME']) == 'users.php') {
        echo 'class="nav-active"';
    }
?>>
										<a href="users">
											<i class="fa fa-users" aria-hidden="true"></i>
											<span>Users</span>
										</a>
									</li>
									<li <?php
    if (basename($_SERVER['SCRIPT_NAME']) == 'site-info.php') {
        echo 'class="nav-active"';
    }
?>>
										<a href="site-info">
											<i class="fa fa-info-circle" aria-hidden="true"></i>
											<span>Site Info</span>
										</a>
									</li>
                                    <li <?php
    if (basename($_SERVER['SCRIPT_NAME']) == 'update-check.php') {
        echo 'class="nav-active"';
    }
?>>
										<a href="update-check">
											<i class="fa fa-refresh" aria-hidden="true"></i>
											<span>Check For Update</span>
										</a>
									</li>
								</ul>
							</nav>
				
							<hr class="separator" />
				
						</div>
				
					</div>
				
				</aside>
				<!-- end: sidebar -->
<?php
}

function footer()
{
?>
</div>

		</section>

		<!-- Vendor -->
		<script src="assets/vendor/jquery/jquery.js"></script>
        <script src="assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
        <script src="assets/vendor/jquery-cookie/jquery.cookie.js"></script>
        <script src="assets/vendor/bootstrap/js/bootstrap.js"></script>
        <script src="assets/vendor/nanoscroller/nanoscroller.js"></script>
        <script src="assets/vendor/magnific-popup/magnific-popup.js"></script>
        <script src="assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>
		
		<!-- Specific Page Vendor -->
        <script src="assets/vendor/jquery-ui/js/jquery-ui-1.10.4.custom.js"></script>
        <script src="assets/vendor/jquery-ui-touch-punch/jquery.ui.touch-punch.js"></script>
        <script src="assets/vendor/jquery-appear/jquery.appear.js"></script>
        <script src="assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js"></script>
        <script src="assets/vendor/flot/jquery.flot.js"></script>
        <script src="assets/vendor/flot-tooltip/jquery.flot.tooltip.js"></script>
        <script src="assets/vendor/flot/jquery.flot.pie.js"></script>
        <script src="assets/vendor/flot/jquery.flot.categories.js"></script>
        <script src="assets/vendor/flot/jquery.flot.resize.js"></script>
        <script src="assets/vendor/jquery-sparkline/jquery.sparkline.js"></script>
        <script src="assets/vendor/raphael/raphael.js"></script>
        <script src="assets/vendor/morris/morris.js"></script>
        <script src="assets/vendor/snap-svg/snap.svg.js"></script>
        <script src="assets/vendor/ios7-switch/ios7-switch.js"></script>
        <script src="assets/vendor/jquery-datatables/media/js/jquery.dataTables.js"></script>
        <script src="assets/vendor/jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js"></script>
        <script src="assets/vendor/jquery-datatables-bs3/assets/js/datatables.js"></script>
        <script src="assets/vendor/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="assets/javascripts/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="assets/javascripts/theme.custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="assets/javascripts/theme.init.js"></script>

		<!-- Examples -->
		<script src="assets/javascripts/dashboard/examples.dashboard.js"></script>
        <script src="assets/javascripts/ui-elements/examples.modals.js"></script>
        <script src="assets/javascripts/forms/examples.advanced.form.js" /></script>
        <script src="assets/javascripts/tables/examples.datatables.default.js"></script>
        <script src="assets/javascripts/tables/examples.datatables.row.with.details.js"></script>
		<script src="assets/javascripts/tables/examples.datatables.tabletools.js"></script>
    
	</body>

</html>
<?php
}

ob_end_flush();
?>