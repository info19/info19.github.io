<?php
$configfile = 'config.php';
if (!file_exists($configfile)) {
    echo '<meta http-equiv="refresh" content="0; url=install/index.php" />';
    exit();
}

include "config.php";
include "security.php";
?>
<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <title>phpGuard PRO - Security for your site</title>
    <meta name="description" content="phpGuard PRO - Security for your website">
    <meta name="keywords" content="phpguard pro, phpguard, pro, guard, web, firewall,  webfirewall, phpguard-pro, antonov-web, web tools, web optimization, attacks, exploit, guard, hack, hackers, hacking, protect, protection, script, secure, security, site, website defender">
    <link rel="shortcut icon" href="assets/img/favicon.ico">
    <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css" media="all" />
    <link rel="stylesheet" href="assets/css/font-awesome.min.css" type="text/css" media="all" />
    <link rel="stylesheet" href="assets/css/animate.css" type="text/css" media="all" />
    <link rel="stylesheet" href="assets/css/style.css" type="text/css" media="all" />
    
    <!--[if lt IE 9]>
        <script src="assets/js/html5.js"></script>
        <script src="assets/js/respond.min.js"></script>
    <![endif]-->
</head>

<body id="landing-page">

    <!-- Preloader -->
    <div id="mask">
        <div id="loader"></div>
    </div>
        
    <header>
        <nav class="navigation navigation-header">
            <div class="container">
                <div class="navigation-brand">
                    <div class="brand-logo">
						<a href="index.html" class="logo"></a>
						<span class="sr-only">phpGuard PRO</span>
                    </div>
                    <button class="navigation-toggle visible-xs" type="button" data-toggle="dropdown" data-target=".navigation-navbar">
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="navigation-navbar">
				    <ul class="navigation-bar navigation-bar-left">
                        <li class="active"><a href="#hero">Home</a></li>
                        <li><a href="#about">About</a></li>
                        <li><a href="#features">Features</a></li>
						<li><a href="#demo">Demo</a></li>
                    </ul>
                    <ul class="navigation-bar navigation-bar-right">
                        <li class="featured"><a href="admin">Demo - Admin Panel</a></li>
                    </ul>  
                </div>
            </div>
        </nav>
    </header>
    
    <div id="hero" class="static-header light clearfix">
        <div class="text-heading">
            <h1 class="animated hiding" data-animation="bounceInDown" data-delay="0">phpGuard <span class="highlight">PRO</span></h1>
            <p class="animated hiding" data-animation="fadeInDown" data-delay="500">Reliable protection for every site</p>
            <ul class="list-inline">
                <li><a href="#demo" class="btn btn-default animated hiding" data-animation="bounceIn" data-delay="700">Demo - Testing protection</a></li>
                <li><a href="admin" class="btn btn-primary animated hiding" data-animation="bounceIn" data-delay="700">Demo - Admin Panel</a></li>
            </ul>
        </div>
        <div class="video-wrapper">
            <div class="container">
                <img src="assets/img/features/app_block.png" alt="video" class="img-responsive animated hiding" data-animation="bounceInUp" data-delay="1000" />
            </div>
        </div>
    </div>
    
    <hr class="no-margin" />
    
    <section id="about" class="section dark">
        <div class="container">
            <div class="section-content row">                
                <div class="col-sm-6 pull-right animated hiding" data-animation="fadeInRight">
                    <img src="assets/img/features/content_image1.png" class="img-responsive" alt="process 2" />
                </div>
                <div class="col-sm-6 animated hiding" data-animation="fadeInLeft">
					<br/><br/>
                    <article>
                        <h3>WEB <span class="highlight">FIREWALL</span></h3>
                        <p>phpGuard PRO is a product that will protect your site from hackers and attacks. It could protect your site from SQLi (SQL Injection), Mass Requests (DDoS), XSS, Proxy, Spammers, Malicious Files (Shells) and other types of threats. <br />Each attack is logged in the database (No Duplicates).</p>
                    </article>
                </div>
                
                <hr class="clearfix" />
                
                <div class="col-sm-6 animated hiding" data-animation="fadeInLeft">
                    <img src="assets/img/features/rich_features_1.png" class="img-responsive" alt="process 3" />
                </div>
                <div class="col-sm-6 animated hiding" data-animation="fadeInRight">
					<br/><br/>
                    <article>
                        <h3>MULTIFUNCTIONAL <span class="highlight">ADMIN PANEL</span></h3>
                        <p>phpGuard PRO comes with powerful admin panel, from which you can view all logs and he is also integrated with Ban system from which can be viewed and banned users and countries. The Admin Panel has many features and settings. Through it can be easily managed the whole phpGuard PRO, as well as all of its modules and functions.</p>
                    </article>
                </div>
                
            </div>
        </div>
		<br />
    </section>
	
	<section id="features" class="section inverted">
        <div class="container animated hiding" data-animation="fadeInDown">
		<br />
		<div class="col-md-12">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <article class="center">	
					<i class="icon icon-active fa fa-code fa-4x"></i>
                    <span class="h7">SQLi Protection</span>
                    <p class="thin">Protection module for SQL Injections (SQLi) and XSS Vulnerabilities. </p>
                </article>
            </div>                                  
			<div class="col-md-3 col-sm-6 col-xs-12">
                <article class="center">	
					<i class="icon icon-active fa fa-retweet fa-4x"></i>
                    <span class="h7">Mass Requests Protection</span>
                    <p class="thin">Protection Module for Mass Requests that are made in order to overload your site. </p>
                </article>
            </div>             
			<div class="col-md-3 col-sm-6 col-xs-12">
                <article class="center">	
					<i class="icon icon-active fa fa-keyboard-o fa-4x"></i>
                    <span class="h7">Spam Protection</span>
                    <p class="thin">Protection Module for Spammers and Spam Bots that aim to spam your site. </p>
                </article>
            </div>             
			<div class="col-md-3 col-sm-6 col-xs-12">
                <article class="center">	
					<i class="icon icon-active fa fa-globe fa-4x"></i>
                    <span class="h7">Proxy Protection</span>
                    <p class="thin">Protection Module for Proxy Visitors or so-called people hiding behind proxies. </p>
                </article>
            </div> 
		</div>
		<div class="col-md-12">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <article class="center">	
					<i class="icon icon-active fa fa-search fa-4x"></i>
                    <span class="h7">Scanner</span>
                    <p class="thin">Scanner for Malicious Files that will scan your site and notifies you if detected viruses. </p>
                </article>
            </div>
			<div class="col-md-3 col-sm-6 col-xs-12">
                <article class="center">	
					<i class="icon icon-active fa fa-pencil-square-o fa-4x"></i>
                    <span class="h7">Santitization</span>
                    <p class="thin">Protection Module that sanitize all incoming and outgoing fields and requests. </p>
                </article>
            </div>             
			<div class="col-md-3 col-sm-6 col-xs-12">
                <article class="center">	
					<i class="icon icon-active fa fa-database fa-4x"></i>
                    <span class="h7">DNSBL Integration</span>
                    <p class="thin">Integration with some of the best Spam Databases (DNSBL). </p>
                </article>
            </div>             
			<div class="col-md-3 col-sm-6 col-xs-12">
                <article class="center">	
					<i class="icon icon-active fa fa-ban fa-4x"></i>
                    <span class="h7">Ban System</span>
                    <p class="thin">Ban System with which can be blocked and redirected users and countries. </p>
                </article>
            </div>
		</div>
		<div class="col-md-12">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <article class="center">	
					<i class="icon icon-active fa fa-gavel fa-4x"></i>
                    <span class="h7">Auto Ban</span>
                    <p class="thin">Function that will automatically block people behind attacks against your site. </p>
                </article>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <article class="center">	
					<i class="icon icon-active fa fa-dashboard fa-4x"></i>
                    <span class="h7">Dashboard with Stats</span>
                    <p class="thin">Dashboard in the Admin Panel with Statistics about your site. </p>
                </article>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <article class="center">	
					<i class="icon icon-active fa fa-list fa-4x"></i>
                    <span class="h7">Attack Logs</span>
                    <p class="thin">Function that will log each attack in the Database (No Dublicates). </p>
                </article>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <article class="center">	
					<i class="icon icon-active fa fa-info-circle fa-4x"></i>
                    <span class="h7">E-Mail Notifications</span>
                    <p class="thin">Receive E-Mail Notifications if someone tries to hack your site. </p>
                </article>
            </div>
		</div>
		<div class="col-md-12">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <article class="center">	
					<i class="icon icon-active fa fa-cogs fa-4x"></i>
                    <span class="h7">Useful Tools</span>
                    <p class="thin">Large collection of Tools such as: .htaccess Editor, HTML & PHP Encryptor, Pass & Hash Generator. </p>
                </article>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <article class="center">	
					<i class="icon icon-active fa fa-desktop fa-4x"></i>
                    <span class="h7">Errors Monitoring</span>
                    <p class="thin">Useful tool that logs all errors in the site that can be viewed later. </p>
                </article>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <article class="center">	
					<i class="icon icon-active fa fa-flag-o fa-4x"></i>
                    <span class="h7">IP Whitelist</span>
                    <p class="thin">A list of IP Addresses that will be ignored by phpGuard PRO and will not be blocked. </p>
                </article>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <article class="center">	
					<i class="icon icon-active fa fa-info fa-4x"></i>
                    <span class="h7">Site Information</span>
                    <p class="thin">Module with a huge amount of Information and Statistics about your site. </p>
                </article>
            </div>
		</div>
        </div>
    </section>
    
     <section id="demo" class="section dark">
            <div class="container animated hiding" data-animation="fadeInDown">
                    <h3 class="text-center">Demonstration of the protection</h3>
                    <ul class="nav nav-tabs">
                        <li <?php
if (isset($_POST['submit'])) {
    echo '';
} else {
    echo 'class="active"';
}
?>><a href="#sqli-demo" data-toggle="tab">SQLi Attack</a></li>
                        <li <?php
if (isset($_POST['submit'])) {
    echo 'class="active"';
}
?>><a href="#xss-demo" data-toggle="tab">XSS Attack</a></li>
                        <li><a href="#proxy-demo" data-toggle="tab">Proxy Visit</a></li>
                    </ul>
                    
                    <div class="tab-content">
                        <div class="tab-pane <?php
if (isset($_POST['submit'])) {
    echo '';
} else {
    echo 'active';
}
?>" id="sqli-demo">
                            <div class="row">
                            <div class="col-md-6">
                                If you want to try the protection from SQLi Attacks (Attacks aimed stealing information from MySQL Database or performing various commands to the Database) just click the button in right and will automatically be simulated SQLi Attack.
                            </div>
                            <div class="col-md-6">
                                <center>
                                <a href="index.php?id=1+UNION+1,2,3,4,5,6--" type="button" class="btn btn-primary"><i class="fa fa-arrow-circle-right"></i> Generate SQLi Attack</a>
                            </center><br/>
                                <input type="text" class="form-control" value="index.php?id=1+UNION+1,2,3,4,5,6--" readonly />
                            </div>
                            </div>
                        </div>
                        
                        <div class="tab-pane <?php
if (isset($_POST['submit'])) {
    echo 'active';
}
?>" id="xss-demo">
                           <div class="row">
                            <div class="col-md-6">
                                If you want to try out the protection for XSS Attacks (Type of attacks, which are used to perform HTML and Javascript code into a web page) just enter code in the box in right or use the default code and will be simulated XSS Attack, which will automatically be displayed with sanitized result.
                            </div>
                            <div class="col-md-6">
                            <form method="post" action=''>
                            <center>
                                <input class="btn btn-primary" type="submit" name="submit" value="Generate XSS Attack">
                            </center><br/>
                                <input type="text" name="xss-example" class="form-control" value="<script>alert('XSS Attack')</script>" required />
                            </form>
<?php
if (isset($_POST['submit'])) {
    echo '<br />Displaying result in sanitized type: <br />';
    @$xss_sanitized = $_POST['xss-example'];
    echo '
	<div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        ' . $xss_sanitized . '
        <i class="icon icon-badges-votes-10"></i>
    </div>
	';
}
?>
                            </div>
                           </div>
                        </div>
						
						<div class="tab-pane" id="proxy-demo">
                            <div class="row">
                            <div class="col-md-6">
                                If you want to try the Proxy Protection just click the button in right and you will be redirected to Web Proxy, from which you can enter the site URL and test the Proxy Protection.
                            </div>
                            <div class="col-md-6">
                                <center>
                                <a href="http://kproxy.com" target="_blank" type="button" class="btn btn-primary"><i class="fa fa-arrow-circle-right"></i> Test the Proxy Protection</a>
                            </center><br/>
                            </div>
                            </div>
                        </div>
						
                    </div>
            </div>
        </section> 
    
    <section id="guarantee" class="long-block light">
        <div class="container">
            <div class="col-md-12 col-lg-9">
				<i class="icon fa fa-shield fa-4x pull-left"></i>
                <article class="pull-left">
                    <h2><strong>SECURE</strong> YOUR WEBSITE NOW!</h2>
                    <p class="thin">Do not wait for your site to be hacked, protect it with phpGuard PRO.</p>
                </article>
            </div>
			
            <div class="col-md-12 col-lg-3">
                <a href="#" target="_blank" class="btn btn-default">Get phpGuard PRO</a>
            </div>
        </div>
    </section>
    
    <div class="back-to-top"><i class="fa fa-angle-up fa-3x"></i></div>
    
    <!--[if lt IE 9]>
        <script type="text/javascript" src="assets/js/jquery-1.11.0.min.js"></script>
    <![endif]-->  
    <!--[if (gte IE 9) | (!IE)]><!-->  
        <script type="text/javascript" src="assets/js/jquery-2.1.0.min.js"></script>
    <!--<![endif]-->  
    
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.nav.js"></script>
    <script type="text/javascript" src="assets/js/jquery.appear.js"></script>
    <script type="text/javascript" src="assets/js/jquery.plugin.js"></script>
    <script type="text/javascript" src="assets/js/waypoints.min.js"></script>
    <script type="text/javascript" src="assets/js/waypoints-sticky.min.js"></script>
    <script type="text/javascript" src="assets/js/headhesive.min.js"></script>
    <script type="text/javascript" src="assets/js/scripts.js"></script>

</body>

</html>