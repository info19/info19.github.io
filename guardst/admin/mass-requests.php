<?php
include "core.php";
head();
?>
				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Protection Module</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="dashboard">
										<i class="fa fa-home"></i>
									</a>
								</li>
                                <li><span>Protection Module &nbsp;&nbsp;&nbsp;</span></li>
							</ol>
						</div>
					</header>

					<!-- start: page -->
					<div class="row">
						<div class="col-md-9">
<?php
$table = $prefix . 'massrequests-settings';
@$query = mysqli_query($connect, "SELECT * FROM `$table`");
@$row = mysqli_fetch_array($query);
if ($row['protection'] == 'Yes') {
    echo '
                                                     <section class="panel panel-success">
';
} else {
    echo '
                                                     <section class="panel panel-danger">
';
}
?>
							
								<header class="panel-heading">
									<div class="panel-actions">
										<a href="#" class="fa fa-caret-down"></a>
										<a href="#" class="fa fa-times"></a>
									</div>

									<h2 class="panel-title">Mass Requests - Protection Module</h2>
								</header>
								<div class="panel-body">
<?php
if ($row['protection'] == 'Yes') {
    echo '
<div class="jumbotron">
        <h1 style="color: #47A447;"><i class="fa fa-check-circle-o"></i> Enabled</h1>
        <p>The site is protected from <b>Mass Request Attacks (Flood)</b></p>
</div>
';
} else {
    echo '
<div class="jumbotron">
        <h1 style="color: #d2322d;"><i class="fa fa-times-circle-o"></i> Disabled</h1>
        <p>The site is not protected from <b>Mass Request Attacks (Flood)</b></p>
</div>
';
}
?>

								</div>
							</section>
                        
                        <div class="alert alert-info">
								        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<strong>It is not recommended use this module on normal working websites, because it could block some of the traffic of the site. Use it only when you think someone is flooding your site!</strong>
				        </div>

						</div>
						<div class="col-md-3">
							<section class="panel">
								<header class="panel-heading">
									<div class="panel-actions">
										<a href="#" class="fa fa-caret-down"></a>
										<a href="#" class="fa fa-times"></a>
									</div>

									<h2 class="panel-title">What are Mass Requests</h2>
								</header>
								<div class="panel-body">
                                     <b>Mass Requests</b> are repeatedly recharge of website to make a lot of traffic and overloading of the site. <br /><br />
                                    
                                    <b>WARNING</b><br />
                                    Don't use this module on normal working websites, because it could block some of the traffic of the site. Use it only when you think someone is flooding your site!
								</div>
							</section>
                            
<form class="form-horizontal form-bordered" action="" method="post">
                            <section class="panel">
								<header class="panel-heading">
									<div class="panel-actions">
										<a href="#" class="fa fa-caret-down"></a>
										<a href="#" class="fa fa-times"></a>
									</div>

									<h2 class="panel-title">Settings</h2>
								</header>
								<div class="panel-body">
                                    <div class="form-group">
											<label class="col-sm-4 control-label">Protection: </label>
											<div class="col-sm-8">
												<div class="switch switch-success">
														<input type="checkbox" name="protection" data-plugin-ios-switch 
<?php
$table = $prefix . 'massrequests-settings';
@$query = mysqli_query($connect, "SELECT * FROM `$table`");
@$row = mysqli_fetch_array($query);
if ($row['protection'] == 'Yes') {
    echo 'checked="checked" checked';
}
?>
                                                         value="On" />
												</div>
											</div>
										</div>
                                        <div class="form-group">
											<label class="col-sm-4 control-label">Logging: </label>
											<div class="col-sm-8">
												<div class="switch switch-success">
														<input type="checkbox" name="logging" data-plugin-ios-switch 
<?php
if ($row['logging'] == 'Yes') {
    echo 'checked="checked" checked';
}
?>
                                                               value="On" />
												</div>
											</div>
										</div>
                                        <div class="form-group">
											<label class="col-sm-4 control-label">Autoban: </label>
											<div class="col-sm-8">
                                                <div class="switch switch-success">
														<input type="checkbox" name="autoban" data-plugin-ios-switch 
<?php
if ($row['autoban'] == 'Yes') {
    echo 'checked="checked" checked';
}
?>
                                                               value="On" />
												</div>
											</div>
										</div>
                                        <div class="form-group">
											<label class="col-sm-4 control-label">Mail Notifications: </label>
											<div class="col-sm-8">
                                                <div class="switch switch-success">
														<input type="checkbox" name="mail" data-plugin-ios-switch 
<?php
if ($row['mail'] == 'Yes') {
    echo 'checked="checked" checked';
}
?>
                                                               value="On" />
												</div>
											</div>
										</div>
                                        <div class="form-group">
											<label class="col-sm-4 control-label">Redirect URL: </label>
											<div class="col-sm-8">
												<input name="redirect" class="form-control" type="text" value="<?php
echo $row['redirect'];
?>" required>
											</div>
										</div>
                                        <div class="form-group">
											<label class="col-sm-4 control-label">Seconds between Requests: </label>
											<div class="col-sm-8">
												<input name="time" class="form-control" type="text" value="<?php
echo $row['time'];
?>" required>
											</div>
										</div>
									</div>
									<footer class="panel-footer">
										<button class="btn btn-primary" name="save" type="submit">Save</button>
										<button type="reset" class="btn btn-default">Reset</button>
									</footer>
							</section>
</form>
<?php
if (isset($_POST['save'])) {
    $table = $prefix . 'massrequests-settings';
    
    if (isset($_POST['protection'])) {
        $protection = 'Yes';
    } else {
        $protection = 'No';
    }
    
    if (isset($_POST['logging'])) {
        $logging = 'Yes';
    } else {
        $logging = 'No';
    }
    
    if (isset($_POST['autoban'])) {
        $autoban = 'Yes';
    } else {
        $autoban = 'No';
    }
    
    if (isset($_POST['mail'])) {
        $mail = 'Yes';
    } else {
        $mail = 'No';
    }
    
    $redirect = $_POST['redirect'];
    $time     = $_POST['time'];
    
    $query = mysqli_query($connect, "UPDATE `$table` SET protection='$protection', logging='$logging', autoban='$autoban', mail='$mail', redirect='$redirect', time='$time' WHERE id=1");
    echo '<meta http-equiv="refresh" content="0;url=mass-requests">';
}
?>

						</div>
					</div>
					<!-- end: page -->
				</section>
<?php
footer();
?>