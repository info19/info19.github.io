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
$table = $prefix . 'sqli-settings';
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

									<h2 class="panel-title">SQL Injection - Protection Module</h2>
								</header>
								<div class="panel-body">
<?php
if ($row['protection'] == 'Yes') {
    echo '
<div class="jumbotron">
        <h1 style="color: #47A447;"><i class="fa fa-check-circle-o"></i> Enabled</h1>
        <p>The site is protected from <b>SQL Injection Attacks (SQLi)</b></p>
</div>
';
} else {
    echo '
<div class="jumbotron">
        <h1 style="color: #d2322d;"><i class="fa fa-times-circle-o"></i> Disabled</h1>
        <p>The site is not protected from <b>SQL Injection Attacks (SQLi)</b></p>
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

									<h2 class="panel-title">SQLi Patterns</h2>
                                    <p class="panel-subtitle">The patterns will be used to detect if someone is trying to input sqli commands.</p>
								</header>
								<div class="panel-body">
                                    
                                    <center><a href="#add" class="mb-xs mt-xs mr-xs modal-with-zoom-anim btn btn-primary"><i class="fa fa-plus-circle"></i> Add Pattern</a></center>
                                    
                                    
                                    <div id="add" class="zoom-anim-dialog modal-block modal-header-color modal-block-primary mfp-hide">
										<section class="panel">
											<header class="panel-heading">
												<h2 class="panel-title">Add Pattern</h2>
											</header>
											<div class="panel-body">
                                                <form class="form-horizontal mb-lg" method="POST">
												<div class="form-group">
                                                        <label class="col-sm-3 control-label">Pattern:</label>
														<div class="col-sm-9">
															<input type="text" class="form-control" name="pattern" value="" required/>
														</div>
												</div>
                                                
											</div>
											<footer class="panel-footer">
												<div class="row">
													<div class="row">
													<div class="col-md-8 text-left">
									                &nbsp;&nbsp;&nbsp; <input class="btn btn-primary" name="add-pattern" type="submit" value="Add">
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
if (isset($_POST['add-pattern'])) {
    $table      = $prefix . 'sqli-patterns';
    $pattern    = $_POST['pattern'];
    $queryvalid = mysqli_query($connect, "SELECT * FROM `$table` WHERE pattern='$pattern' LIMIT 1");
    $validator  = mysqli_num_rows($queryvalid);
    if ($validator > "0") {
        echo '<meta http-equiv="refresh" content="0;url=sql-injection">';
    } else {
        $query = mysqli_query($connect, "INSERT INTO `$table` (pattern) VALUES ('$pattern')");
        echo '<meta http-equiv="refresh" content="0;url=sql-injection">';
    }
}
?>
                                    
<table class="table table-bordered table-striped table-hover mb-none" id="datatable-default">
									<thead>
										<tr>
											<th>Pattern</th>
											<th>Actions</th>
										</tr>
									</thead>
									<tbody>
<?php
$table = $prefix . 'sqli-patterns';
$query = mysqli_query($connect, "SELECT * FROM `$table`");
while ($row = mysqli_fetch_assoc($query)) {
    echo '
										<tr>
                                            <td>' . $row['pattern'] . '</td>
											<td>
                                            <a href="?delete-id=' . $row['id'] . '" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a>
											</td>
										</tr>
';
}

if (isset($_GET['delete-id'])) {
    $id    = (int) $_GET["delete-id"];
    $table = $prefix . 'sqli-patterns';
    $query = mysqli_query($connect, "DELETE FROM `$table` WHERE id='$id'");
    echo "<meta http-equiv=Refresh content=0;url=sql-injection>";
}
?>
									</tbody>
								</table>
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

									<h2 class="panel-title">What is SQL Injection</h2>
								</header>
								<div class="panel-body">
                                     <b>SQL Injection</b> is a technique where malicious users can inject SQL commands into an SQL statement, via web page input. Injected SQL commands can alter SQL statement and compromise the security of a web application.
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
$table = $prefix . 'sqli-settings';
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
    $table = $prefix . 'sqli-settings';
    
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
    echo '<meta http-equiv="refresh" content="0;url=sql-injection">';
}
?>

						</div>
					</div>
					<!-- end: page -->
				</section>
<?php
footer();
?>