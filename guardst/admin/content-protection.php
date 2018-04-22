<?php
include "core.php";
head();
?>
				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Content Protection</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="dashboard">
										<i class="fa fa-home"></i>
									</a>
								</li>
                                <li><span>Content Protection &nbsp;&nbsp;&nbsp;</span></li>
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

									<h2 class="panel-title">Content Protection</h2>
									<p class="panel-subtitle">Protect your valuable content, source code, links and images.</p>
								</header>
								<div class="panel-body">
								
                                <form action="" method="post" class="form-horizontal form-bordered">
								<button type="button submit" name="save" class="mb-xs mt-xs mr-xs btn btn-success btn-lg btn-block"><i class="fa fa-floppy-o"></i>&nbsp;&nbsp;Save</button><br />
			
<?php
$table = $prefix . 'content-protection';
@$query = mysqli_query($connect, "SELECT * FROM `$table`");
while ($row = mysqli_fetch_assoc($query)) {
?>
								<div class="col-md-4">
								<section class="panel">
									<header class="panel-heading bg-primary">
										<div class="panel-heading-icon bg-primary mt-sm">
<?php
    if ($row['function'] == "rightclick") {
        echo '<i class="fa fa-mouse-pointer"></i>';
    } elseif ($row['function'] == "rightclick_images") {
        echo '<i class="fa fa-hand-pointer-o"></i>';
    } elseif ($row['function'] == "cut") {
        echo '<i class="fa fa-scissors"></i>';
    } elseif ($row['function'] == "copy") {
        echo '<i class="fa fa-files-o"></i>';
    } elseif ($row['function'] == "paste") {
        echo '<i class="fa fa-clipboard"></i>';
    } elseif ($row['function'] == "drag") {
        echo '<i class="fa fa-arrows"></i>';
    } elseif ($row['function'] == "drop") {
        echo '<i class="fa fa-plus-square-o"></i>';
    } elseif ($row['function'] == "printscreen") {
        echo '<i class="fa fa-desktop"></i>';
    } elseif ($row['function'] == "print") {
        echo '<i class="fa fa-print"></i>';
    } elseif ($row['function'] == "view_source") {
        echo '<i class="fa fa-code"></i>';
    } elseif ($row['function'] == "offline_mode") {
        echo '<i class="fa fa-times-circle"></i>';
    } elseif ($row['function'] == "iframe_out") {
        echo '<i class="fa fa-object-group"></i>';
    } elseif ($row['function'] == "exit_confirmation") {
        echo '<i class="fa fa-sign-out"></i>';
    } elseif ($row['function'] == "selecting") {
        echo '<i class="fa fa-arrows-h"></i>';
    }
?>
										</div>
									</header>
									<div class="panel-body">
										<h3 class="text-weight-semibold mt-none text-center">
<?php
    if ($row['function'] == "rightclick") {
        echo 'Right Click - Context Menu';
    } elseif ($row['function'] == "rightclick_images") {
        echo 'Right Click - Context Menu on Images';
    } elseif ($row['function'] == "cut") {
        echo 'Cut';
    } elseif ($row['function'] == "copy") {
        echo 'Copy';
    } elseif ($row['function'] == "paste") {
        echo 'Paste';
    } elseif ($row['function'] == "drag") {
        echo 'Drag';
    } elseif ($row['function'] == "drop") {
        echo 'Drop';
    } elseif ($row['function'] == "printscreen") {
        echo 'PrintScreen Button';
    } elseif ($row['function'] == "print") {
        echo 'Print';
    } elseif ($row['function'] == "view_source") {
        echo 'View Source Code';
    } elseif ($row['function'] == "offline_mode") {
        echo 'Offline Use of the Website';
    } elseif ($row['function'] == "iframe_out") {
        echo 'Website shows in Frames (Iframe)';
    } elseif ($row['function'] == "exit_confirmation") {
        echo 'Confirmation on Exit';
    } elseif ($row['function'] == "selecting") {
        echo 'Selecting';
    }
?>
										</h3>
										<p class="text-center">
<?php
    if ($row['function'] == "rightclick") {
        echo 'Prevent the default right menu from popping up.';
    } elseif ($row['function'] == "rightclick_images") {
        echo 'Prevent people being able to download your images.';
    } elseif ($row['function'] == "cut") {
        echo 'Disable the Cut option to prevent Copying information from your site';
    } elseif ($row['function'] == "copy") {
        echo 'Disable the Copy option to prevent Copying information from your site';
    } elseif ($row['function'] == "paste") {
        echo 'Disable the Paste option to prevent Pasting information on your site';
    } elseif ($row['function'] == "drag") {
        echo 'Prevent Dragging information and objects on your site';
    } elseif ($row['function'] == "drop") {
        echo 'Prevent Dropping information and objects on your site';
    } elseif ($row['function'] == "printscreen") {
        echo 'Prevent users to not take screenshots of their screen';
    } elseif ($row['function'] == "print") {
        echo 'Prevent the user from printing pages from your website';
    } elseif ($row['function'] == "view_source") {
        echo 'If you don\'t want users to view the code of your webpage disable the View Source Option';
    } elseif ($row['function'] == "offline_mode") {
        echo 'This option will prevent users to use downloaded pages of your website in offline (local) mode';
    } elseif ($row['function'] == "iframe_out") {
        echo 'You can disable it to ensure that your page never gets loaded into someone else\'s frame';
    } elseif ($row['function'] == "exit_confirmation") {
        echo 'Shows confirmation dialog before user leaving the page';
    } elseif ($row['function'] == "selecting") {
        echo 'Prevent selection on your website.';
    }
?>
										</p>
									    <hr>
										<div class="form-group">
												<label class="control-label col-md-3">Activated</label>
												<div class="col-md-9">
													<div class="switch switch-success">
														<input type="checkbox" name="<?php
    echo $row['function'];
?>-enabled" data-plugin-ios-switch <?php
    if ($row['enabled'] == 'Yes') {
        echo 'checked="checked"';
    }
?>/>
													</div>
												</div>
									    </div>
										<div class="form-group">
												<label class="control-label col-md-3">Alert</label>
												<div class="col-md-9">
													<div class="switch switch-success">
														<input type="checkbox" name="<?php
    echo $row['function'];
?>-alert" data-plugin-ios-switch <?php
    if ($row['alert'] == 'Yes') {
        echo 'checked="checked"';
    }
?> 
														<?php
    if ($row['function'] == 'drag' OR $row['function'] == 'drop' OR $row['function'] == 'iframe_out' OR $row['function'] == 'selecting') {
        echo 'disabled="disabled"';
    }
?>/>
													</div>
												</div>
									    </div>
										<div class="form-group">
												<label class="control-label col-md-3">Alert Message</label>
													<div class="col-md-6">
													<input type="text" name="<?php
    echo $row['function'];
?>-message" value="<?php
    echo $row['message'];
?>" class="form-control input-rounded" id="inputRounded" 
													<?php
    if ($row['function'] == 'drag' OR $row['function'] == 'drop' OR $row['function'] == 'iframe_out' OR $row['function'] == 'selecting') {
        echo 'disabled';
    }
?>>
												</div>
									    </div>
									</div>
								</section>
							    </div>
<?php
}
?>
                                
								</form>

								
<?php
if (isset($_POST['save'])) {
    $table = $prefix . 'content-protection';
    
    if (isset($_POST['rightclick-enabled'])) {
        $enabled = 'Yes';
    } else {
        $enabled = 'No';
    }
    if (isset($_POST['rightclick-alert'])) {
        $alert = 'Yes';
    } else {
        $alert = 'No';
    }
    $message = $_POST['rightclick-message'];
    $update  = mysqli_query($connect, "UPDATE `$table` SET enabled='$enabled', alert='$alert', message='$message' WHERE id=1");
    
    if (isset($_POST['rightclick_images-enabled'])) {
        $enabled = 'Yes';
    } else {
        $enabled = 'No';
    }
    if (isset($_POST['rightclick_images-alert'])) {
        $alert = 'Yes';
    } else {
        $alert = 'No';
    }
    $message = $_POST['rightclick_images-message'];
    $update  = mysqli_query($connect, "UPDATE `$table` SET enabled='$enabled', alert='$alert', message='$message' WHERE id=2");
    
    if (isset($_POST['cut-enabled'])) {
        $enabled = 'Yes';
    } else {
        $enabled = 'No';
    }
    if (isset($_POST['cut-alert'])) {
        $alert = 'Yes';
    } else {
        $alert = 'No';
    }
    $message = $_POST['cut-message'];
    $update  = mysqli_query($connect, "UPDATE `$table` SET enabled='$enabled', alert='$alert', message='$message' WHERE id=3");
    
    if (isset($_POST['copy-enabled'])) {
        $enabled = 'Yes';
    } else {
        $enabled = 'No';
    }
    if (isset($_POST['copy-alert'])) {
        $alert = 'Yes';
    } else {
        $alert = 'No';
    }
    $message = $_POST['copy-message'];
    $update  = mysqli_query($connect, "UPDATE `$table` SET enabled='$enabled', alert='$alert', message='$message' WHERE id=4");
    
    if (isset($_POST['paste-enabled'])) {
        $enabled = 'Yes';
    } else {
        $enabled = 'No';
    }
    if (isset($_POST['paste-alert'])) {
        $alert = 'Yes';
    } else {
        $alert = 'No';
    }
    $message = $_POST['paste-message'];
    $update  = mysqli_query($connect, "UPDATE `$table` SET enabled='$enabled', alert='$alert', message='$message' WHERE id=5");
    
    if (isset($_POST['drag-enabled'])) {
        $enabled = 'Yes';
    } else {
        $enabled = 'No';
    }
    if (isset($_POST['drag-alert'])) {
        $alert = 'Yes';
    } else {
        $alert = 'No';
    }
    $message = $_POST['drag-message'];
    $update  = mysqli_query($connect, "UPDATE `$table` SET enabled='$enabled', alert='$alert', message='$message' WHERE id=6");
    
    if (isset($_POST['drop-enabled'])) {
        $enabled = 'Yes';
    } else {
        $enabled = 'No';
    }
    if (isset($_POST['drop-alert'])) {
        $alert = 'Yes';
    } else {
        $alert = 'No';
    }
    $message = $_POST['drop-message'];
    $update  = mysqli_query($connect, "UPDATE `$table` SET enabled='$enabled', alert='$alert', message='$message' WHERE id=7");
    
    if (isset($_POST['printscreen-enabled'])) {
        $enabled = 'Yes';
    } else {
        $enabled = 'No';
    }
    if (isset($_POST['printscreen-alert'])) {
        $alert = 'Yes';
    } else {
        $alert = 'No';
    }
    $message = $_POST['printscreen-message'];
    $update  = mysqli_query($connect, "UPDATE `$table` SET enabled='$enabled', alert='$alert', message='$message' WHERE id=8");
    
    if (isset($_POST['print-enabled'])) {
        $enabled = 'Yes';
    } else {
        $enabled = 'No';
    }
    if (isset($_POST['print-alert'])) {
        $alert = 'Yes';
    } else {
        $alert = 'No';
    }
    $message = $_POST['print-message'];
    $update  = mysqli_query($connect, "UPDATE `$table` SET enabled='$enabled', alert='$alert', message='$message' WHERE id=9");
    
    if (isset($_POST['view_source-enabled'])) {
        $enabled = 'Yes';
    } else {
        $enabled = 'No';
    }
    if (isset($_POST['view_source-alert'])) {
        $alert = 'Yes';
    } else {
        $alert = 'No';
    }
    $message = $_POST['view_source-message'];
    $update  = mysqli_query($connect, "UPDATE `$table` SET enabled='$enabled', alert='$alert', message='$message' WHERE id=10");
    
    if (isset($_POST['offline_mode-enabled'])) {
        $enabled = 'Yes';
    } else {
        $enabled = 'No';
    }
    if (isset($_POST['offline_mode-alert'])) {
        $alert = 'Yes';
    } else {
        $alert = 'No';
    }
    $message = $_POST['offline_mode-message'];
    $update  = mysqli_query($connect, "UPDATE `$table` SET enabled='$enabled', alert='$alert', message='$message' WHERE id=11");
    
    if (isset($_POST['iframe_out-enabled'])) {
        $enabled = 'Yes';
    } else {
        $enabled = 'No';
    }
    if (isset($_POST['iframe_out-alert'])) {
        $alert = 'Yes';
    } else {
        $alert = 'No';
    }
    $message = $_POST['iframe_out-message'];
    $update  = mysqli_query($connect, "UPDATE `$table` SET enabled='$enabled', alert='$alert', message='$message' WHERE id=12");
    
    if (isset($_POST['exit_confirmation-enabled'])) {
        $enabled = 'Yes';
    } else {
        $enabled = 'No';
    }
    if (isset($_POST['exit_confirmation-alert'])) {
        $alert = 'Yes';
    } else {
        $alert = 'No';
    }
    $message = $_POST['exit_confirmation-message'];
    $update  = mysqli_query($connect, "UPDATE `$table` SET enabled='$enabled', alert='$alert', message='$message' WHERE id=13");
    
    if (isset($_POST['selecting-enabled'])) {
        $enabled = 'Yes';
    } else {
        $enabled = 'No';
    }
    if (isset($_POST['selecting-alert'])) {
        $alert = 'Yes';
    } else {
        $alert = 'No';
    }
    $message = $_POST['selecting-message'];
    $update  = mysqli_query($connect, "UPDATE `$table` SET enabled='$enabled', alert='$alert', message='$message' WHERE id=14");
    
    echo '<meta http-equiv="refresh" content="0;url=content-protection">';
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