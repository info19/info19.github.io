<?php
include "core.php";
head();
?>
				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Bans</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="dashboard">
										<i class="fa fa-home"></i>
									</a>
								</li>
                                <li><span>Bans &nbsp;&nbsp;&nbsp;</span></li>
							</ol>
						</div>
					</header>

					<!-- start: page -->
					<div class="row">
						<div class="col-md-9">
<?php
if (isset($_GET['edit-id'])) {
    $id     = (int) $_GET["edit-id"];
    $table  = $prefix . 'bans';
    $result = mysqli_query($connect, "SELECT * FROM `$table` WHERE id = '$id'");
    $row    = mysqli_fetch_assoc($result);
    if (empty($id)) {
        echo '<meta http-equiv="refresh" content="0; url=bans-ip">';
        exit();
    }
    if (mysqli_num_rows($result) == 0) {
        echo '<meta http-equiv="refresh" content="0; url=bans-ip">';
        exit();
    }
?>         
<form class="form-horizontal form-bordered" action="" method="post">
								<section class="panel">
									<header class="panel-heading">
										<div class="panel-actions">
											<a href="#" class="fa fa-caret-down"></a>
											<a href="#" class="fa fa-times"></a>
										</div>

										<h2 class="panel-title">Edit - IP Address Ban #<?php
    echo $id;
?></h2>
									</header>
									<div class="panel-body">
										<div class="form-group">
											<label class="col-sm-4 control-label">IP Address: </label>
											<div class="col-sm-8">
												<input name="ip" class="form-control" type="text" value="<?php
    echo $row['ip'];
?>" required>
											</div>
										</div>
                                        <div class="form-group">
											<label class="col-sm-4 control-label">Reason: </label>
											<div class="col-sm-8">
												<input name="reason" class="form-control" type="text" value="<?php
    echo $row['reason'];
?>">
											</div>
										</div>
                                        <div class="form-group">
											<label class="col-sm-4 control-label">Redirecting to page / site: </label>
											<div class="col-sm-8">
	<select name="redirect" class="form-control" required>
        <option value="No" <?php
    if ($row['redirect'] == 'No') {
        echo 'selected';
    }
?>>No</option>
        <option value="Yes" <?php
    if ($row['redirect'] == 'Yes') {
        echo 'selected';
    }
?>>Yes</option>
    </select>
											</div>
										</div>
                                        <div class="form-group">
											<label class="col-sm-4 control-label">Redirect URL: </label>
											<div class="col-sm-8">
												<input name="url" class="form-control" type="text" value="<?php
    echo $row['url'];
?>">
											</div>
										</div>
                                        <div class="form-group">
											<label class="col-sm-4 control-label">Banned On: </label>
											<div class="col-sm-8">
												<input name="date" class="form-control" type="text" value="<?php
    echo $row['date'];
?>" readonly>
											</div>
										</div>
                                        <div class="form-group">
											<label class="col-sm-4 control-label">Banned At: </label>
											<div class="col-sm-8">
												<input name="time" class="form-control" type="text" value="<?php
    echo $row['time'];
?>" readonly>
											</div>
										</div>
                                        <div class="form-group">
											<label class="col-sm-4 control-label">AutoBanned: </label>
											<div class="col-sm-8">
												<input name="autoban" class="form-control" type="text" value="<?php
    echo $row['autoban'];
?>" readonly>
											</div>
										</div>
									</div>
									<footer class="panel-footer">
										<button class="btn btn-primary" name="edit-ban" type="submit">Update</button>
										<button type="reset" class="btn btn-default">Reset</button>
									</footer>
								</section>
							</form>
<?php
    if (isset($_POST['edit-ban'])) {
        $ip       = $_POST['ip'];
        $redirect = $_POST['redirect'];
        $url      = $_POST['url'];
        $reason   = $_POST['reason'];
        $table    = $prefix . 'bans';
        $update   = mysqli_query($connect, "UPDATE `$table` SET ip='$ip', redirect='$redirect', url='$url', reason='$reason' WHERE id='$id'");
        echo '<meta http-equiv="refresh" content="0;url=bans-ip?edit-id=' . $id . '">';
    }
    
}
?>
                            
							<section class="panel">
								<header class="panel-heading">
									<div class="panel-actions">
										<a href="#" class="fa fa-caret-down"></a>
										<a href="#" class="fa fa-times"></a>
									</div>

									<h2 class="panel-title">IP Address Bans</h2>
									<p class="panel-subtitle">Block IP Addresses from accessing your website.</p>
								</header>
								<div class="panel-body">
<table class="table table-bordered table-striped mb-none" id="datatable-tabletools" data-swf-path="assets/vendor/jquery-datatables/extras/TableTools/swf/copy_csv_xls_pdf.swf">
									<thead>
										<tr>
										  <th><i class="fa fa-list-ul"></i> ID</th>
						                  <th><i class="fa fa-user"></i> IP Address</th>
										  <th><i class="fa fa-calendar-o"></i> Banned On</th>
										  <th><i class="fa fa-share"></i> Redirect</th>
										  <th><i class="fa fa-magic"></i> Autobanned</th>
										  <th><i class="fa fa-cog"></i> Actions</th>
										</tr>
									</thead>
									<tbody>
<?php
$table = $prefix . 'bans';
$query = mysqli_query($connect, "SELECT * FROM `$table`");
while ($row = mysqli_fetch_assoc($query)) {
    echo '
										<tr>
											<td>' . $row['id'] . '</td>
						                    <td>' . $row['ip'] . '</td>
										    <td>' . $row['date'] . '</td>
										    <td>' . $row['redirect'] . '</td>
										    <td>' . $row['autoban'] . '</td>
											<td>
                                            <a href="?edit-id=' . $row['id'] . '" class="btn btn-primary"><i class="fa fa-pencil"></i> Edit</a>
                                            <a href="?delete-id=' . $row['id'] . '" class="btn btn-success"><i class="fa fa-trash"></i> Unban</a>
											</td>
										</tr>
';
}

if (isset($_GET['delete-id'])) {
    $id    = (int) $_GET["delete-id"];
    $table = $prefix . 'bans';
    $query = mysqli_query($connect, "DELETE FROM `$table` WHERE id='$id'");
    echo "<meta http-equiv=Refresh content=0;url=bans-ip>";
}
?>
									</tbody>
								</table>
                                    
								</div>
							</section>
                            
						</div>
						<div class="col-md-3">
							
									<?php
@$ip = $_GET['ip'];
@$reason = $_GET['reason'];
@$url = $_POST['url'];
if (empty($ip)) {
    @$ip = $_POST['ip'];
} else {
    $ip;
}
if (empty($reason)) {
    @$reason = $_POST['reason'];
} else {
    $reason;
}
?>

<form class="form-horizontal form-bordered" action="" method="post">
								<section class="panel">
									<header class="panel-heading">
										<div class="panel-actions">
											<a href="#" class="fa fa-caret-down"></a>
											<a href="#" class="fa fa-times"></a>
										</div>

										<h2 class="panel-title">Ban IP Address</h2>
									</header>
									<div class="panel-body">
										<div class="form-group">
											<label class="col-sm-4 control-label">IP Address: </label>
											<div class="col-sm-8">
												<input name="ip" class="form-control" type="text" value="<?php
echo $ip;
?>" required>
											</div>
										</div>
                                        <div class="form-group">
											<label class="col-sm-4 control-label">Reason: </label>
											<div class="col-sm-8">
												<input name="reason" class="form-control" type="text" value="<?php
echo $reason;
?>">
											</div>
										</div>
                                        <div class="form-group">
											<label class="col-sm-4 control-label">Redirecting to page / site: </label>
											<div class="col-sm-8">
	<select name="redirect" class="form-control" required>
        <option value="No" selected>No</option>
        <option value="Yes">Yes</option>
    </select>
											</div>
										</div>
                                        <div class="form-group">
											<label class="col-sm-4 control-label">Redirect URL: </label>
											<div class="col-sm-8">
												<input name="url" class="form-control" type="text" value="<?php
echo $url;
?>">
											</div>
										</div>
									</div>
									<footer class="panel-footer">
										<button class="btn btn-danger" name="ban-ip" type="submit">Ban</button>
										<button type="reset" class="btn btn-default">Reset</button>
									</footer>
								</section>
							</form>

<?php
if (isset($_POST['ban-ip'])) {
    $ip       = addslashes(htmlspecialchars($_POST['ip']));
    $date     = date("d F Y");
    $time     = date("H:i");
    $reason   = addslashes(htmlspecialchars($_POST['reason']));
    $redirect = $_POST['redirect'];
    $url      = addslashes(htmlspecialchars($_POST['url']));
    if ($ip == NULL) {
        echo '<br />
		<div class="alert alert-danger" style="margin-left: 5px; margin-right: 5px;">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <p><i class="fa fa-exclamation-triangle" style="font-size: 20px;"></i> &nbsp;&nbsp;Please enter an IP Address which will be banned.</p>
        </div>
		';
    } else {
        if (!filter_var($ip, FILTER_VALIDATE_IP)) {
            echo '<br />
		<div class="alert alert-danger" style="margin-left: 5px; margin-right: 5px;">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <p><i class="fa fa-exclamation-triangle" style="font-size: 20px;"></i> &nbsp;&nbsp;The entered IP Address is invalid.</p>
        </div>
		';
        } else {
            if ($redirect == 'Yes' and $url == NULL) {
                echo '<br />
		<div class="alert alert-danger" style="margin-left: 5px; margin-right: 5px;">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <p><i class="fa fa-exclamation-triangle" style="font-size: 20px;"></i> &nbsp;&nbsp;Please enter a link to which will be redirected the banned user.</p>
        </div>
		';
            } else {
                $table      = $prefix . "bans";
                $queryvalid = mysqli_query($connect, "SELECT * FROM `$table` WHERE ip='$ip' LIMIT 1");
                $validator  = mysqli_num_rows($queryvalid);
                if ($validator > "0") {
                    echo '<br />
		<div class="alert alert-info" style="margin-left: 5px; margin-right: 5px;">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <p><i class="fa fa-info-circle" style="font-size: 20px;"></i> &nbsp;&nbsp;This IP Address is already banned.</p>
        </div>
		';
                } else {
                    $table = $prefix . "bans";
                    $query = mysqli_query($connect, "INSERT INTO `$table` (ip, date, time, reason, redirect, url) VALUES('$ip', '$date', '$time', '$reason', '$redirect', '$url')");
                    echo "<meta http-equiv=Refresh content=0;url=bans-ip>";
                }
            }
        }
    }
}
?>
                            
                            </div>
                        </div>

					</div>
					<!-- end: page -->
				</section>
<?php
footer();
?>