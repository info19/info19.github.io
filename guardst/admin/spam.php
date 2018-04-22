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
$table = $prefix . 'spam-settings';
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

									<h2 class="panel-title">Spam - Protection Module</h2>
								</header>
								<div class="panel-body">
<?php
if ($row['protection'] == 'Yes') {
    echo '
<div class="jumbotron">
        <h1 style="color: #47A447;"><i class="fa fa-check-circle-o"></i> Enabled</h1>
        <p>The site is protected from <b>Spammers</b></p>
</div>
';
} else {
    echo '
<div class="jumbotron">
        <h1 style="color: #d2322d;"><i class="fa fa-times-circle-o"></i> Disabled</h1>
        <p>The site is not protected from <b>Spammers</b></p>
</div>
';
}
?>

								</div>
							</section>

                            <section class="panel">
								<header class="panel-heading">
									<div class="panel-actions">
										<a href="#" class="fa fa-caret-down"></a>
										<a href="#" class="fa fa-times"></a>
									</div>

									<h2 class="panel-title">Spam Databases (DNSBL)</h2>
                                    <p class="panel-subtitle">The Spam Databases will be used to detect if visitor is listed as spammer in any of them.</p>
								</header>
								<div class="panel-body">
                                    
                    <center><a href="#add" class="mb-xs mt-xs mr-xs modal-with-zoom-anim btn btn-primary"><i class="fa fa-plus-circle"></i> Add Spam Database (DNSBL)</a></center>
                                    
                                    
                                    <div id="add" class="zoom-anim-dialog modal-block modal-header-color modal-block-primary mfp-hide">
										<section class="panel">
											<header class="panel-heading">
												<h2 class="panel-title">Add Spam Database (DNSBL)</h2>
											</header>
											<div class="panel-body">
                                                <form class="form-horizontal mb-lg" method="POST">
												<div class="form-group">
                                                        <label class="col-sm-3 control-label">Spam Database (DNSBL):</label>
														<div class="col-sm-9">
															<input type="text" class="form-control" name="database" value="" required/>
														</div>
												</div>
                                                
											</div>
											<footer class="panel-footer">
												<div class="row">
													<div class="row">
													<div class="col-md-8 text-left">
									                &nbsp;&nbsp;&nbsp; <input class="btn btn-primary" name="add-database" type="submit" value="Add">
													</div>
                                                    </form>
                                                    <div class="col-md-4 text-right">
														<button class="btn btn-default modal-dismiss">Close</button> &nbsp;&nbsp;
													</div>
												</div>
												</div>
											</footer>
										</section>
									</div>
                                    </form>
                                    
<?php
if (isset($_POST['add-database'])) {
    $table      = $prefix . 'dnsbl-databases';
    $database   = $_POST['database'];
    $queryvalid = mysqli_query($connect, "SELECT * FROM `$table` WHERE `database`='$database' LIMIT 1");
    $validator  = mysqli_num_rows($queryvalid);
    if ($validator > "0") {
        echo '<meta http-equiv="refresh" content="0;url=spam">';
    } else {
        $query = mysqli_query($connect, "INSERT INTO `$table` (`database`) VALUES ('$database')");
        echo '<meta http-equiv="refresh" content="0;url=spam">';
    }
}
?>
                                    
<table class="table table-bordered table-striped table-hover mb-none" id="datatable-default">
									<thead>
										<tr>
											<th>Spam Database</th>
											<th>Actions</th>
										</tr>
									</thead>
									<tbody>
<?php
$table = $prefix . 'dnsbl-databases';
$query = mysqli_query($connect, "SELECT * FROM `$table`");
while ($row = mysqli_fetch_assoc($query)) {
    echo '
										<tr>
                                            <td>' . $row['database'] . '</td>
											<td>
                                            <a href="?delete-id=' . $row['id'] . '" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a>
											</td>
										</tr>
';
}

if (isset($_GET['delete-id'])) {
    $id    = (int) $_GET["delete-id"];
    $table = $prefix . 'dnsbl-databases';
    $query = mysqli_query($connect, "DELETE FROM `$table` WHERE id='$id'");
    echo "<meta http-equiv=Refresh content=0;url=spam>";
}
?>
									</tbody>
								</table>
                                
                                <br />
                                <div class="alert alert-info">
								        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<strong>It is not recommended to add more than 3 blacklists because your site will load more slowly and is likely to be overloaded!</strong>
								</div>
                                
								</div>
							</section>
						</div>
						<div class="col-md-3">
							<section class="panel">
								<header class="panel-heading">
									<div class="panel-actions">
										<a href="#" class="fa fa-caret-down"></a>
										<a href="#" class="fa fa-times"></a>
									</div>

									<h2 class="panel-title">What is Spam</h2>
								</header>
								<div class="panel-body">
                                     <b>Electronic Spamming</b> is the use of electronic messaging systems to send unsolicited messages (spam), especially advertising, as well as sending messages repeatedly on the same site. 
								</div>
							</section>
                            
                            <section class="panel">
								<header class="panel-heading">
									<div class="panel-actions">
										<a href="#" class="fa fa-caret-down"></a>
										<a href="#" class="fa fa-times"></a>
									</div>

									<h2 class="panel-title">What is DNSBL</h2>
								</header>
								<div class="panel-body">
                                     A <b>DNS-based Blackhole List (DNSBL)</b> or <b>Real-time Blackhole List (RBL)</b> is a list of IP addresses which are most often used to publish the addresses of computers or networks linked to spamming.<br /><br />
                                    
                                    All <b>Blacklists</b> can be found here: <b><a href="http://www.dnsbl.info/dnsbl-list.php" target="_blank">http://www.dnsbl.info/dnsbl-list.php</a></b>
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
$table = $prefix . 'spam-settings';
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
									</div>
									<footer class="panel-footer">
										<button class="btn btn-primary" name="save" type="submit">Save</button>
										<button type="reset" class="btn btn-default">Reset</button>
									</footer>
							</section>
</form>
<?php
if (isset($_POST['save'])) {
    $table = $prefix . 'spam-settings';
    
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
    
    $query = mysqli_query($connect, "UPDATE `$table` SET protection='$protection', logging='$logging', autoban='$autoban', mail='$mail', redirect='$redirect' WHERE id=1");
    echo '<meta http-equiv="refresh" content="0;url=spam">';
}
?>

						</div>
					</div>
					<!-- end: page -->
				</section>
<?php
footer();
?>