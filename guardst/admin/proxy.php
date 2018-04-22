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
$table = $prefix . 'proxy-settings';
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

									<h2 class="panel-title">Proxy - Protection Module</h2>
								</header>
								<div class="panel-body">
<?php
if ($row['protection'] == 'Yes') {
    echo '
<div class="jumbotron">
        <h1 style="color: #47A447;"><i class="fa fa-check-circle-o"></i> Enabled</h1>
        <p>The site is protected from <b>Proxies</b></p>
</div>
';
} else {
    echo '
<div class="jumbotron">
        <h1 style="color: #d2322d;"><i class="fa fa-times-circle-o"></i> Disabled</h1>
        <p>The site is not protected from <b>Proxies</b></p>
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

									<h2 class="panel-title">Proxies List</h2>
                                    <p class="panel-subtitle">The IPs listed here will be used to detect if visitor is listed as proxy.</p>
								</header>
								<div class="panel-body">
                                    
                    <center>
                        <a href="#add" class="mb-xs mt-xs mr-xs modal-with-zoom-anim btn btn-primary"><i class="fa fa-plus-circle"></i> Add Proxy IP</a>
                        <a href="#upload" class="mb-xs mt-xs mr-xs modal-with-zoom-anim btn btn-primary"><i class="fa fa-file-text-o"></i> Upload Proxy List</a>
                        <a href="?delete-all" class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete All</a>
                    </center>
                                    
                                    
                                    <div id="add" class="zoom-anim-dialog modal-block modal-header-color modal-block-primary mfp-hide">
										<section class="panel">
											<header class="panel-heading">
												<h2 class="panel-title">Add Proxy IP</h2>
											</header>
											<div class="panel-body">
                                                <form class="form-horizontal mb-lg" method="POST">
												<div class="form-group">
                                                        <label class="col-sm-3 control-label">IP Address:</label>
														<div class="col-sm-9">
															<input type="text" class="form-control" name="ip" value="" required/>
														</div>
												</div>
                                                <div class="form-group">
                                                        <label class="col-sm-3 control-label">Port:</label>
														<div class="col-sm-9">
															<input type="text" class="form-control" name="port" value="" required/>
														</div>
												</div>
											</div>
											<footer class="panel-footer">
												<div class="row">
													<div class="row">
													<div class="col-md-8 text-left">
									                &nbsp;&nbsp;&nbsp; <input class="btn btn-primary" name="add-proxy" type="submit" value="Add">
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
                                
                                    <div id="upload" class="zoom-anim-dialog modal-block modal-header-color modal-block-primary mfp-hide">
										<section class="panel">
											<header class="panel-heading">
												<h2 class="panel-title">Upload Proxy List</h2>
											</header>
											<div class="panel-body">
                                                <form class="form-horizontal mb-lg" method="POST" enctype="multipart/form-data">
												<div class="form-group">
                                                        <label class="col-sm-3 control-label">Proxy List:</label>
														<div class="col-sm-9">
															<div class="fileupload fileupload-new" data-provides="fileupload">
														    <div class="input-append">
															<div class="uneditable-input">
																<i class="fa fa-file fileupload-exists"></i>
																<span class="fileupload-preview"></span>
															</div>
															<span class="btn btn-default btn-file">
																<span class="fileupload-exists">Change</span>
																<span class="fileupload-new">Select file</span>
																<input type="file" name="file"/>
															</span>
															<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
														    </div>
													        </div>
                                                            <b>.txt</b> and <b>.csv</b> formats allowed
														</div>
												</div>
											</div>
											<footer class="panel-footer">
												<div class="row">
													<div class="row">
													<div class="col-md-8 text-left">
									                &nbsp;&nbsp;&nbsp; <input class="btn btn-primary" name="upload" type="submit" value="Upload">
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
if (isset($_POST['add-proxy'])) {
    $table      = $prefix . 'proxy-list';
    $ip         = $_POST['ip'];
    $port       = $_POST['port'];
    $queryvalid = mysqli_query($connect, "SELECT * FROM `$table` WHERE ip='$ip' LIMIT 1");
    $validator  = mysqli_num_rows($queryvalid);
    if ($validator > "0" && !filter_var($ip, FILTER_VALIDATE_IP)) {
        echo '<meta http-equiv="refresh" content="0;url=proxy">';
    } else {
        $query = mysqli_query($connect, "INSERT INTO `$table` (ip, port) VALUES ('$ip', '$port')");
        echo '<meta http-equiv="refresh" content="0;url=proxy">';
    }
}

if (isset($_POST['upload'])) {
    $file     = $_FILES['file'];
    $tmp_name = $_FILES['file']['tmp_name'];
    $name     = $_FILES['file']['name'];
    $format   = end(explode(".", $name));
    if ($format != "txt" && $format != "csv") {
        echo '<meta http-equiv="refresh" content="0;url=proxy">';
    } else {
        
        $lfile = fopen($_FILES['file']['tmp_name'], "r");
        while ($batchcode = fgets($lfile)) {
            $ip         = strstr($batchcode, ':', true);
            $port       = substr(strstr($batchcode, ':'), 1);
            $table      = $prefix . 'proxy-list';
            $queryvalid = mysqli_query($connect, "SELECT * FROM `$table` WHERE ip='$batchcode' LIMIT 1");
            $validator  = mysqli_num_rows($queryvalid);
            if ($validator == "0" && filter_var($ip, FILTER_VALIDATE_IP)) {
                $query = mysqli_query($connect, "INSERT INTO `$table` (ip, port) VALUES ('$ip', '$port')");
            }
        }
        fclose($lfile);
        
        echo '<meta http-equiv="refresh" content="0;url=proxy">';
    }
}
?>
                                    
<table class="table table-bordered table-striped table-hover mb-none" id="datatable-tabletools" data-swf-path="assets/vendor/jquery-datatables/extras/TableTools/swf/copy_csv_xls_pdf.swf">
									<thead>
										<tr>
											<th>IP Address</th>
                                            <th>Port</th>
                                            <th>Country</th>
											<th>Actions</th>
										</tr>
									</thead>
									<tbody>
<?php
$table = $prefix . 'proxy-list';
$query = mysqli_query($connect, "SELECT * FROM `$table`");
while ($row = mysqli_fetch_assoc($query)) {
    echo '
										<tr>
                                            <td>' . $row['ip'] . '</td>
                                            <td>' . $row['port'] . '</td>
                                            <td><img src="http://api.hostip.info/flag.php?ip=' . $row['ip'] . '" width="30px" height="15px" style="border: 1px solid #696969"> ' . visitor_country($row['ip']) . '</td>
											<td>
                                            <a href="?delete-id=' . $row['id'] . '" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a>
											</td>
										</tr>
';
}

if (isset($_GET['delete-id'])) {
    $id    = (int) $_GET["delete-id"];
    $table = $prefix . 'proxy-list';
    $query = mysqli_query($connect, "DELETE FROM `$table` WHERE id='$id'");
    echo "<meta http-equiv=Refresh content=0;url=proxy>";
}

if (isset($_GET['delete-all'])) {
    $table = $prefix . 'proxy-list';
    $query = mysqli_query($connect, "TRUNCATE TABLE `$table`");
    echo "<meta http-equiv=Refresh content=0;url=proxy>";
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

									<h2 class="panel-title">What is Proxy</h2>
								</header>
								<div class="panel-body">
                                    <b>Proxy</b> or <b>Proxy Server</b> is basically another computer which serves as a hub through which internet requests are processed. By connecting through one of these servers, your computer sends your requests to the proxy server which then processes your request and returns what you were wanting.
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
$table = $prefix . 'proxy-settings';
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
    $table = $prefix . 'proxy-settings';
    
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
    echo '<meta http-equiv="refresh" content="0;url=proxy">';
}
?>

						</div>
					</div>
					<!-- end: page -->
				</section>
<?php
footer();
?>