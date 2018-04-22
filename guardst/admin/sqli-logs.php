<?php
include "core.php";
head();
?>
				<section role="main" class="content-body">
					<header class="page-header">
						<h2>SQLi Logs</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="dashboard">
										<i class="fa fa-home"></i>
									</a>
								</li>
                                <li><span>SQLi Logs &nbsp;&nbsp;&nbsp;</span></li>
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

									<h2 class="panel-title">SQLi Logs</h2>
								</header>
								<div class="panel-body">
                                    
<table class="table table-bordered table-striped table-hover mb-none" id="datatable-tabletools" data-swf-path="assets/vendor/jquery-datatables/extras/TableTools/swf/copy_csv_xls_pdf.swf">
									<thead>
										<tr>
								          <th>ID</th>
						                  <th>IP Address</th>
						                  <th>Date</th>
										  <th>Browser</th>
										  <th>OS</th>
										  <th>Country</th>
						                  <th>Type</th>
										  <th>Actions</th>
										</tr>
									</thead>
									<tbody>
<?php
$table = $prefix . 'logs';
$sql   = mysqli_query($connect, "SELECT * FROM `$table` WHERE type='SQLi' ORDER by id DESC");
while ($row = mysqli_fetch_assoc($sql)) {
    echo '
										<tr>
                                          <td>' . $row['id'] . '</td>
						                  <td>' . $row['ip'] . '</td>
						                  <td>' . $row['date'] . '</td>
										  <td>' . get_browserimg($row['browser']) . ' ' . $row['browser'] . '</td>
										  <td>' . get_osimg($row['os']) . ' ' . $row['os'] . '</td>
										  <td><img src="http://api.hostip.info/flag.php?ip=' . $row['ip'] . '" width="30px" height="15px" style="border: 1px solid #696969"> ' . visitor_country($row['ip']) . '</td>
						                  <td>';
    if ($row['type'] == 'SQLi') {
        echo '
						                    <i class="fa fa-code"></i> ' . $row['type'] . '
						                    ';
    } else {
        if ($row['type'] == 'Proxy') {
            echo '
						                    <i class="fa fa-globe"></i> ' . $row['type'] . ' 
						                    ';
        } else {
            if ($row['type'] == 'Mass Requests') {
                echo '
						                    <i class="fa fa-retweet"></i> ' . $row['type'] . '
						                    ';
            } else {
                if ($row['type'] == 'Spammer') {
                    echo '
						                    <i class="fa fa-keyboard-o"></i> ' . $row['type'] . '
						                    ';
                }
            }
        }
    }
    echo '
										  </td>
										  <td>
											<a href="#log' . $row['id'] . '" class="mb-xs mt-xs mr-xs modal-with-zoom-anim btn btn-primary"><i class="fa fa-tasks"></i> Details</a>
											';
    if (get_banned($row['ip']) == 'Yes') {
        echo '
										    <a href="bans-ip?delete-id=' . get_bannedid($row['ip']) . '" class="btn btn-success"><i class="fa fa-ban"></i> Unban</a>
									        ';
    } else {
        echo '
										    <a href="bans-ip?ip=' . $row['ip'] . '&reason=' . $row['type'] . '" class="btn btn-warning"><i class="fa fa-ban"></i> Ban</a>
									        ';
    }
    echo '
											<a href="?delete-id=' . $row['id'] . '" class="btn btn-danger"><i class="fa fa-times"></i> Delete</a>
										  </td>
										</tr>
';
}
?>
									</tbody>
								    </table>

							</div>
                                    
<?php
@$id = $row['id'];
if (isset($_GET['delete-id'])) {
    $id    = (int) $_GET["delete-id"];
    $table = $prefix . 'logs';
    $query = mysqli_query($connect, "DELETE FROM `$table` WHERE id='$id' and type='SQLi' ");
    echo "<meta http-equiv=Refresh content=0;url=sqli-logs>";
}

$table = $prefix . 'logs';
$sql   = mysqli_query($connect, "SELECT * FROM `$table` WHERE type='SQLi' ORDER by id DESC");
while ($row = mysqli_fetch_assoc($sql)) {
    echo '
									<div id="log' . $row['id'] . '" class="zoom-anim-dialog modal-block modal-header-color modal-block-primary mfp-hide">
										<section class="panel">
											<header class="panel-heading">
												<h2 class="panel-title">Log #' . $row['id'] . '</h2>
											</header>
											<div class="panel-body">
												<div class="form-group">
														<label class="col-sm-3 control-label"><i class="fa fa-list-ul"></i> Log ID: </label>
														<div class="col-sm-9">
															<input type="text" class="form-control" value="' . $row['id'] . '" readonly /><br />
														</div>
                                                        
                                                        <label class="col-sm-3 control-label"><i class="fa fa-user"></i> IP Address:</label>
														<div class="col-sm-9">
															<input type="text" class="form-control" value="' . $row['ip'] . '" readonly /><br />
														</div>
                                                        
                                                        <label class="col-sm-3 control-label"><i class="fa fa-calendar-o"></i> Date & Time: </label>
														<div class="col-sm-9">
															<input type="text" class="form-control" value="' . $row['date'] . ' at ' . $row['time'] . '" readonly /><br />
														</div>
                                                        
                                                        <label class="col-sm-3 control-label"> <i class="fa fa-globe"></i> Browser: </label>
														<div class="col-sm-9">
                                                            <input type="text" class="form-control" value="' . $row['browser'] . ' ' . $row['browser_version'] . '" readonly /><br />
														</div>
                                                        
                                                        <label class="col-sm-3 control-label"><i class="fa fa-desktop"></i> Operating System: </label>
														<div class="col-sm-9">
															<input type="text" class="form-control" value="' . $row['os'] . ' ' . $row['os_version'] . '" readonly /><br />
														</div>
                                                        
                                                        <label class="col-sm-3 control-label"><i class="fa fa-map-marker"></i> Country: </label>
														<div class="col-sm-9">
                                                            <input type="text" class="form-control" value="' . visitor_country($row['ip']) . '" readonly /><br />
														</div><br />
                                                        
                                                        <label class="col-sm-3 control-label"><i class="fa fa-map-marker"></i> City: </label>
														<div class="col-sm-9">
                                                            <input type="text" class="form-control" value="';
    $query = @unserialize(file_get_contents('http://ip-api.com/php/' . $row['ip']));
    echo '' . $query['city'] . '';
    echo '" readonly /><br />
														</div><br />
                                                        
                                                        <label class="col-sm-3 control-label"><i class="fa fa-ban"></i> AutoBanned: </label>
														<div class="col-sm-9">
															<input type="text" class="form-control" value="' . get_banned($row['ip']) . '" readonly /><br />
														</div><br />
                                                        
                                                        <label class="col-sm-3 control-label"><i class="fa fa-pencil-square-o"></i> Type: </label>
														<div class="col-sm-9">
															<input type="text" class="form-control" value="' . $row['type'] . '" readonly /><br />
														</div>
                                                        
                                                        <label class="col-sm-3 control-label"><i class="fa fa-clipboard"></i> Attacked Page: </label>
														<div class="col-sm-9">
															<input type="text" class="form-control" value="' . $row['page'] . '" readonly /><br />
														</div>
                                                        
                                                        <label class="col-sm-3 control-label"><i class="fa fa-external-link"></i> Referer URL: </label>
														<div class="col-sm-9">
															<input type="text" class="form-control" value="' . $row['referer_url'] . '" readonly /><br />
														</div>
													</div>
											</div>
											<footer class="panel-footer">
												<div class="row">
													<div class="row">
													<div class="col-md-8 text-left">
														';
    if (get_banned($row['ip']) == 'Yes') {
        echo '
									&nbsp;&nbsp;&nbsp; <a href="bans-ip?delete-id=' . get_bannedid($row['ip']) . '" class="btn btn-success">Unban</a>
								';
    } else {
        echo '
									&nbsp;&nbsp;&nbsp; <a href="bans-ip?ip=' . $row['ip'] . '&reason=' . $row['type'] . '" class="btn btn-warning">Ban</a>
								';
    }
    echo '
							<a href="logs?delete-id=' . $row['id'] . '" class="btn btn-danger">Delete</a>
													</div>
                                                    <div class="col-md-4 text-right">
														<button class="btn btn-default modal-dismiss">Close</button> &nbsp;&nbsp;
													</div>
												</div>
												</div>
											</footer>
										</section>
									</div>
';
}
?>
                                    
								</div>
							</section>

						</div>
					</div>
					<!-- end: page -->
				</section>
<?php
footer();
?>