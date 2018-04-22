<?php
include "core.php";
head();
?>
				<section role="main" class="content-body">
					<header class="page-header">
						<h2>IP Whitelist</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="dashboard">
										<i class="fa fa-home"></i>
									</a>
								</li>
                                <li><span>IP Whitelist &nbsp;&nbsp;&nbsp;</span></li>
							</ol>
						</div>
					</header>

					<!-- start: page -->
					<div class="row">
						<div class="col-md-9">
							<section class="panel">
								<header class="panel-heading">
									<div class="panel-actions">
										<a href="#" class="fa fa-caret-down"></a>
										<a href="#" class="fa fa-times"></a>
									</div>

									<h2 class="panel-title">IP Whitelist</h2>
									<p class="panel-subtitle">List of IP addresses that are considered to be free.</p>
								</header>
								<div class="panel-body">
<table class="table table-bordered table-striped mb-none" id="datatable-tabletools" data-swf-path="assets/vendor/jquery-datatables/extras/TableTools/swf/copy_csv_xls_pdf.swf">
									<thead>
										<tr>
											<th>ID</th>
											<th>IP Address</th>
											<th>Actions</th>
										</tr>
									</thead>
									<tbody>
<?php
$table = $prefix . 'ip-whitelist';
$query = mysqli_query($connect, "SELECT * FROM `$table`");
while ($row = mysqli_fetch_assoc($query)) {
    echo '
										<tr>
											<td>' . $row['id'] . '</td>
                                            <td>' . $row['ip'] . '</td>
											<td>
                                            <a href="?edit-id=' . $row['id'] . '" class="btn btn-primary"><i class="fa fa-pencil"></i> Edit</a>
                                            <a href="?delete-id=' . $row['id'] . '" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a>
											</td>
										</tr>
';
}

if (isset($_GET['delete-id'])) {
    $id    = (int) $_GET["delete-id"];
    $table = $prefix . 'ip-whitelist';
    $query = mysqli_query($connect, "DELETE FROM `$table` WHERE id='$id'");
    echo "<meta http-equiv=Refresh content=0;url=ip-whitelist>";
}
?>
									</tbody>
								</table>
                                    
								</div>
							</section>

						</div>
                        <div class="col-md-3">
							<form class="form-horizontal" action="" method="post">
								<section class="panel">
									<header class="panel-heading">
										<div class="panel-actions">
											<a href="#" class="fa fa-caret-down"></a>
											<a href="#" class="fa fa-times"></a>
										</div>

										<h2 class="panel-title">Add IP Address</h2>
										<p class="panel-subtitle">
											Add IP Address to the Whitelist.
										</p>
									</header>
									<div class="panel-body">
										<div class="form-group">
											<label class="col-sm-4 control-label">IP Address: </label>
											<div class="col-sm-8">
												<input type="text" name="ip" class="form-control" required>
											</div>
										</div>
									</div>
									<footer class="panel-footer">
										<button class="btn btn-primary" name="add" type="submit">Submit</button>
										<button type="reset" class="btn btn-default">Reset</button>
									</footer>
								</section>
							</form>
<?php
if (isset($_POST['add'])) {
    $table = $prefix . 'ip-whitelist';
    $ip    = addslashes(htmlspecialchars($_POST['ip']));
    if (!filter_var($ip, FILTER_VALIDATE_IP)) {
        echo '<br />
		<div class="alert alert-danger" style="margin-left: 5px; margin-right: 5px;">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                <p><i class="fa fa-exclamation-triangle" style="font-size: 20px;"></i> &nbsp;&nbsp;The entered IP Address is invalid.</p>
        </div>
		';
    } else {
        $queryvalid = mysqli_query($connect, "SELECT * FROM `$table` WHERE ip='$ip' LIMIT 1");
        $validator  = mysqli_num_rows($queryvalid);
        if ($validator > "0") {
            echo '<br />
		<div class="alert alert-info" style="margin-left: 5px; margin-right: 5px;">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <p><i class="fa fa-info-circle" style="font-size: 20px;"></i> &nbsp;&nbsp;This IP Address is already whitelisted.</p>
        </div>
		';
        } else {
            $query = mysqli_query($connect, "INSERT INTO `$table` (ip) VALUES('$ip')");
            echo '<meta http-equiv="refresh" content="0;url=ip-whitelist">';
        }
    }
}
?>
						</div>
<?php
if (isset($_GET['edit-id'])) {
    $id    = (int) $_GET["edit-id"];
    $table = $prefix . 'ip-whitelist';
    $sql   = mysqli_query($connect, "SELECT * FROM `$table` WHERE id = '$id'");
    $row   = mysqli_fetch_assoc($sql);
    if (empty($id)) {
        echo '<meta http-equiv="refresh" content="0; url=ip-whitelist">';
    }
    if (mysqli_num_rows($sql) == 0) {
        echo '<meta http-equiv="refresh" content="0; url=ip-whitelist">';
    }
?>
                    <div class="col-md-3">
							<form class="form-horizontal" action="" method="post">
								<section class="panel">
									<header class="panel-heading">
										<div class="panel-actions">
											<a href="#" class="fa fa-caret-down"></a>
											<a href="#" class="fa fa-times"></a>
										</div>

										<h2 class="panel-title">Edit IP Address</h2>
									</header>
									<div class="panel-body">
										<div class="form-group">
											<label class="col-sm-4 control-label">IP Address: </label>
											<div class="col-sm-8">
												<input type="text" name="ip" class="form-control" value="<?php
    echo $row['ip'];
?>" required>
											</div>
										</div>
									</div>
									<footer class="panel-footer">
										<button class="btn btn-primary" name="edit" type="submit">Update</button>
										<button type="reset" class="btn btn-default">Reset</button>
									</footer>
								</section>
							</form>
<?php
    if (isset($_POST['edit'])) {
        $table = $prefix . 'ip-whitelist';
        $ip    = addslashes(htmlspecialchars($_POST['ip']));
        if (!filter_var($ip, FILTER_VALIDATE_IP)) {
            echo '<br />
		<div class="alert alert-danger" style="margin-left: 5px; margin-right: 5px;">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                <p><i class="fa fa-exclamation-triangle" style="font-size: 20px;"></i> &nbsp;&nbsp;The entered IP Address is invalid.</p>
        </div>
		';
        } else {
            $queryvalid = mysqli_query($connect, "SELECT * FROM `$table` WHERE ip='$ip' LIMIT 1");
            $validator  = mysqli_num_rows($queryvalid);
            if ($validator > "0") {
                echo '<br />
		<div class="alert alert-info" style="margin-left: 5px; margin-right: 5px;">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <p><i class="fa fa-info-circle" style="font-size: 20px;"></i> &nbsp;&nbsp;This IP Address is already whitelisted.</p>
        </div>
		';
            } else {
                $query = mysqli_query($connect, "UPDATE `$table` SET ip='$ip' WHERE id='$id'");
                echo '<meta http-equiv="refresh" content="0;url=ip-whitelist">';
            }
        }
    }
?>
                        </div>
<?php
}
?>
					</div>
					<!-- end: page -->
				</section>
<?php
footer();
?>