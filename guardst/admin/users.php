<?php
include "core.php";
head();
?>
				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Users</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="dashboard">
										<i class="fa fa-home"></i>
									</a>
								</li>
                                <li><span>Users &nbsp;&nbsp;&nbsp;</span></li>
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

									<h2 class="panel-title">Users</h2>
								</header>
								<div class="panel-body">
<table class="table table-bordered table-striped mb-none" id="datatable-default">
									<thead>
										<tr>
											<th>ID</th>
											<th>Username</th>
                                            <th>E-Mail</th>
											<th>Actions</th>
										</tr>
									</thead>
									<tbody>
<?php
$table = $prefix . 'users';
$query = mysqli_query($connect, "SELECT * FROM `$table`");
while ($row = mysqli_fetch_assoc($query)) {
    echo '
										<tr>
											<td>' . $row['id'] . '</td>
                                            <td><img src="' . $row['avatar'] . '" width="25px" height="25px"> ' . $row['username'] . '</td>
                                            <td>' . $row['email'] . '</td>
											<td>
                                            <a href="?edit-id=' . $row['id'] . '" class="btn btn-primary"><i class="fa fa-pencil"></i> Edit</a>
                                            <a href="?delete-id=' . $row['id'] . '" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a>
											</td>
										</tr>
';
}

if (isset($_GET['delete-id'])) {
    $id    = (int) $_GET["delete-id"];
    $table = $prefix . 'users';
    $query = mysqli_query($connect, "DELETE FROM `$table` WHERE id='$id'");
    echo "<meta http-equiv=Refresh content=0;url=users>";
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

									<h2 class="panel-title">Add User</h2>
								</header>
								<div class="panel-body">
                           <form class="form-horizontal" action="" method="post">
										<div class="form-group">
											<label class="col-sm-4 control-label">Username: </label>
											<div class="col-sm-8">
												<input type="text" name="username" class="form-control" required>
											</div>
										</div>
                                        <div class="form-group">
											<label class="col-sm-4 control-label">E-Mail Address: </label>
											<div class="col-sm-8">
												<input type="text" name="email" class="form-control" required>
											</div>
										</div>
                                        <div class="form-group">
											<label class="col-sm-4 control-label">Password: </label>
											<div class="col-sm-8">
												<input type="password" name="password" class="form-control" required>
											</div>
										</div>
									</div>
									<footer class="panel-footer">
										<button class="btn btn-primary" name="add" type="submit">Add</button>
										<button type="reset" class="btn btn-default">Reset</button>
									</footer>
								</section>
							</form>
<?php
if (isset($_POST['add'])) {
    $table    = $prefix . 'users';
    $username = addslashes($_POST['username']);
    $email    = addslashes(htmlspecialchars($_POST['email']));
    $password = base64_encode($_POST['password']);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo '
		<div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                <p><i class="fa fa-exclamation-triangle" style="font-size: 20px;"></i> &nbsp;&nbsp;The entered <b>E-Mail Address</b> is invalid.</p>
        </div>
		';
    } else {
        $queryvalid = mysqli_query($connect, "SELECT * FROM `$table` WHERE username='$username' OR email='$email' LIMIT 1");
        $validator  = mysqli_num_rows($queryvalid);
        if ($validator > "0") {
            echo '
		<div class="alert alert-warning" style="margin-left: 5px; margin-right: 5px;">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <p><i class="fa fa-info-circle" style="font-size: 20px;"></i> &nbsp;&nbsp;The entered <b>Username / E-Mail Address</b> is already used by other user.</p>
        </div>
		';
        } else {
            $query = mysqli_query($connect, "INSERT INTO `$table` (username, email, password) VALUES('$username', '$email', '$password')");
            echo '<meta http-equiv="refresh" content="0;url=users">';
        }
    }
}
?>
<?php
if (isset($_GET['edit-id'])) {
    $id    = (int) $_GET["edit-id"];
    $table = $prefix . 'users';
    $sql   = mysqli_query($connect, "SELECT * FROM `$table` WHERE id = '$id'");
    $row   = mysqli_fetch_assoc($sql);
    if (empty($id)) {
        echo '<meta http-equiv="refresh" content="0; url=users">';
    }
    if (mysqli_num_rows($sql) == 0) {
        echo '<meta http-equiv="refresh" content="0; url=users">';
    }
?>
                            <section class="panel">
								<header class="panel-heading">
									<div class="panel-actions">
										<a href="#" class="fa fa-caret-down"></a>
										<a href="#" class="fa fa-times"></a>
									</div>

									<h2 class="panel-title">Edit User</h2>
								</header>
								<div class="panel-body">
                           <form class="form-horizontal" action="" method="post">
										<div class="form-group">
											<label class="col-sm-4 control-label">Username: </label>
											<div class="col-sm-8">
												<input type="text" name="username" class="form-control" value="<?php
    echo $row['username'];
?>" required>
											</div>
										</div>
                                        <div class="form-group">
											<label class="col-sm-4 control-label">E-Mail Address: </label>
											<div class="col-sm-8">
												<input type="text" name="email" class="form-control" value="<?php
    echo $row['email'];
?>" required>
											</div>
										</div>
                                        <hr>
                                        <div class="form-group">
											<label class="col-sm-4 control-label">New Password: </label>
											<div class="col-sm-8">
												<input type="text" name="password" class="form-control">
											</div>
										</div>
                                        <br /><i>Fill this field only if you want to change the password.</i>
									</div>
									<footer class="panel-footer">
										<button class="btn btn-primary" name="edit" type="submit">Update</button>
										<button type="reset" class="btn btn-default">Reset</button>
									</footer>
								</section>
							</form>
<?php
    if (isset($_POST['edit'])) {
        $table    = $prefix . 'users';
        $username = addslashes($_POST['username']);
        $email    = addslashes(htmlspecialchars($_POST['email']));
        $password = base64_encode($_POST['password']);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo '<br />
		<div class="alert alert-danger" style="margin-left: 5px; margin-right: 5px;">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                <p><i class="fa fa-exclamation-triangle" style="font-size: 20px;"></i> &nbsp;&nbsp;The entered E-Mail Address is invalid.</p>
        </div>
		';
        } else {
            $query = mysqli_query($connect, "UPDATE `$table` SET username='$username', email='$email' WHERE id='$id'");
            if ($password != null) {
                $query = mysqli_query($connect, "UPDATE `$table` SET password='$password' WHERE id='$id'");
            }
            echo '<meta http-equiv="refresh" content="0;url=users">';
        }
    }
?>
							</section>
<?php
}
?>
                        </div>
					</div>
					<!-- end: page -->
				</section>
<?php
footer();
?>