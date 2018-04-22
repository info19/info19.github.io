<?php
include "core.php";
head();
?>
				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Settings</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="dashboard">
										<i class="fa fa-home"></i>
									</a>
								</li>
                                <li><span>Settings &nbsp;&nbsp;&nbsp;</span></li>
							</ol>
						</div>
					</header>

					<!-- start: page -->
					<div class="row">
						<div class="col-md-12">
							<section class="panel">
								<header class="panel-heading">
									<div class="panel-actions">
										<a href="#" class="fa fa-caret-down"></a>
										<a href="#" class="fa fa-times"></a>
									</div>

									<h2 class="panel-title">Settings</h2>
									<p class="panel-subtitle">The main settings of <b>phpGuard PRO</b>.</p>
								</header>
								<div class="panel-body">
<?php
$table = $prefix . 'settings';
@$query = mysqli_query($connect, "SELECT * FROM `$table`");
@$row = mysqli_fetch_array($query);
?>
                                      <form class="form-horizontal form-bordered" method="post">
											<div class="form-group">
												<label class="col-md-3 control-label" for="inputDefault">E-Mail Address:</label>
												<div class="col-md-6">
													<input type="text" class="form-control" name="email" value="<?php
echo $row['email'];
?>" required>
                                                    The E-Mail address will be used for some of the functions in the script.
												</div>
											</div>
                                            <div class="form-group">
												<label class="control-label col-md-3">RealTime Protection</label>
												<div class="col-md-9">
													<div class="switch switch-success">
														<input type="checkbox" name="realtime_protection" data-plugin-ios-switch 
<?php
if ($row['realtime_protection'] == 'Yes') {
    echo 'checked="checked" checked';
}
?>
                                                        />
                                                       With this module you can <b>Enable</b> or <b>Disable</b> the whole script.
													</div>
												</div>
											</div>
                                            <div class="form-group">
												<label class="control-label col-md-3">Mail Notifications</label>
												<div class="col-md-9">
													<div class="switch switch-success">
														<input type="checkbox" name="mail_notifications" data-plugin-ios-switch 
<?php
if ($row['mail_notifications'] == 'Yes') {
    echo 'checked="checked" checked';
}
?>
                                                        />
                                                        If this is <b>Enabled</b> you will receive notifications on your E-Mail Address
													</div>
												</div>
											</div>
										
                                </div>
                                <footer class="panel-footer">
										<button class="btn btn-primary" name="save" type="submit">Save</button>
										<button type="reset" class="btn btn-default">Reset</button>
								</footer>
                                </form>
<?php
if (isset($_POST['save'])) {
    $table = $prefix . 'settings';
    
    $email = $_POST['email'];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo '<br /><div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<strong>The entered E-Mail Address is not valid!</strong>
              </div>
        ';
    } else {
        
        if (isset($_POST['realtime_protection'])) {
            $realtime_protection = 'Yes';
        } else {
            $realtime_protection = 'No';
        }
        
        if (isset($_POST['mail_notifications'])) {
            $mail_notifications = 'Yes';
        } else {
            $mail_notifications = 'No';
        }
        
        $query = mysqli_query($connect, "UPDATE `$table` SET email='$email', realtime_protection='$realtime_protection', mail_notifications='$mail_notifications' WHERE id=1");
        echo '<meta http-equiv="refresh" content="0;url=settings">';
    }
}
?>
							</section>

						</div>
					</div>
					<!-- end: page -->
				</section>
<?php
footer();
?>