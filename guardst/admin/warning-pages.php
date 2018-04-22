<?php
include "core.php";
head();
?>
				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Warning Pages</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="dashboard">
										<i class="fa fa-home"></i>
									</a>
								</li>
                                <li><span>Warning Pages &nbsp;&nbsp;&nbsp;</span></li>
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

									<h2 class="panel-title">Warning Pages</h2>
									<p class="panel-subtitle">Here you can edit the Warning Pages Layout.</p>
								</header>
								<div class="panel-body">

								<form action="" method="post">
								
  <div class="col-md-3">
  <div class="well">
    <ul class="nav nav-pills nav-stacked" id="myTabs">
      <li class="active"><a href="#sqli-layout" data-toggle="pill"><i class="fa fa-code"></i> SQL Injection</a></li>
      <li><a href="#massrequests-layout" data-toggle="pill"><i class="fa fa-retweet"></i> Mass Requests</a></li>
      <li><a href="#proxy-layout" data-toggle="pill"><i class="fa fa-globe"></i> Proxy</a></li>
	  <li><a href="#spam-layout" data-toggle="pill"><i class="fa fa-keyboard-o"></i> Spam</a></li>
	  <li><a href="#banned-layout" data-toggle="pill"><i class="fa fa-ban"></i> Banned</a></li>
	  <li><a href="#bannedc-layout" data-toggle="pill"><i class="fa fa-ban"></i> Banned Countries</a></li>
    </ul>
  </div>
  </div>

  <!-- Content -->
  <div class="col-md-9">
    <div class="tab-content">
	
<?php
$table = $prefix . 'pages-layolt';
$sql   = mysqli_query($connect, "SELECT * FROM `$table` WHERE page='Blocked'");
$row   = mysqli_fetch_assoc($sql);
?>
      <div class="tab-pane active" id="sqli-layout">
	  <fieldset>
	        <center>
			
			<label>Image:</label><br />
			<img src="<?php
echo $row['image'];
?>" width="100px" height="100px" title="SQL Injection Page Logo" style="margin-bottom: 5px;"/><br />
	        <input name="image2" class="form-control" type="text" value="<?php
echo $row['image'];
?>" required><br />
						  
            <label>Page Text:</label>
	        <textarea name="text2" class="form-control" rows="5" type="text" required><?php
echo $row['text'];
?></textarea>
			
			</center>
	  </fieldset>
	  </div>
	  
<?php
$table = $prefix . 'pages-layolt';
$sql   = mysqli_query($connect, "SELECT * FROM `$table` WHERE page='Mass_Requests'");
$row   = mysqli_fetch_assoc($sql);
?>
      <div class="tab-pane" id="massrequests-layout">
	  <fieldset>
	        <center>
	    
	        <label>Image:</label><br />
			<img src="<?php
echo $row['image'];
?>" width="100px" height="100px" title="Mass Requests Page Logo" style="margin-bottom: 5px;"/><br />
	        <input name="image3" class="form-control" type="text" value="<?php
echo $row['image'];
?>" required><br />
						  
            <label>Page Text:</label>
	        <textarea name="text3" class="form-control" rows="5" type="text" required><?php
echo $row['text'];
?></textarea>
	        
			</center>
	  </fieldset>
	  </div>
	  
<?php
$table = $prefix . 'pages-layolt';
$sql   = mysqli_query($connect, "SELECT * FROM `$table` WHERE page='Proxy'");
$row   = mysqli_fetch_assoc($sql);
?>
      <div class="tab-pane" id="proxy-layout">
	  <fieldset>
	        <center>
	  
	        <label>Image:</label><br />
			<img src="<?php
echo $row['image'];
?>" width="100px" height="100px" title="Proxy Page Logo" style="margin-bottom: 5px;"/><br />
	        <input name="image4" class="form-control" type="text" value="<?php
echo $row['image'];
?>" required><br />
						  
            <label>Page Text:</label>
	        <textarea name="text4" class="form-control" rows="5" type="text" required><?php
echo $row['text'];
?></textarea>
	  
	        </center>
	  </fieldset>
	  </div>
	  
<?php
$table = $prefix . 'pages-layolt';
$sql   = mysqli_query($connect, "SELECT * FROM `$table` WHERE page='Spam'");
$row   = mysqli_fetch_assoc($sql);
?>
	  <div class="tab-pane" id="spam-layout">
	  <fieldset>
	        <center>
			
	        <label>Image:</label><br />
			<img src="<?php
echo $row['image'];
?>" width="100px" height="100px" title="Spam Page Logo" style="margin-bottom: 5px;"/><br />
	        <input name="image5" class="form-control" type="text" value="<?php
echo $row['image'];
?>" required><br />
						  
            <label>Page Text:</label>
	        <textarea name="text5" class="form-control" rows="5" type="text" required><?php
echo $row['text'];
?></textarea>
	  
	        </center>
	  </fieldset>
	  </div>
	  
<?php
$table = $prefix . 'pages-layolt';
$sql   = mysqli_query($connect, "SELECT * FROM `$table` WHERE page='Banned'");
$row   = mysqli_fetch_assoc($sql);
?>
	  <div class="tab-pane" id="banned-layout">
	  <fieldset>
	        <center>
	  
	        <label>Image:</label><br />
			<img src="<?php
echo $row['image'];
?>" width="100px" height="100px" title="Banned Page Logo" style="margin-bottom: 5px;"/><br />
	        <input name="image" class="form-control" type="text" value="<?php
echo $row['image'];
?>" required><br />
						  
            <label>Page Text:</label>
	        <textarea name="text" class="form-control" rows="5" type="text" required><?php
echo $row['text'];
?></textarea>
			
			</center>
	  </fieldset>
	  </div>
<?php
$table = $prefix . 'pages-layolt';
$sql   = mysqli_query($connect, "SELECT * FROM `$table` WHERE page='Banned_Country'");
$row   = mysqli_fetch_assoc($sql);
?>
	  <div class="tab-pane" id="bannedc-layout">
	  <fieldset>
	        <center>
	  
	        <label>Image:</label><br />
			<img src="<?php
echo $row['image'];
?>" width="100px" height="100px" title="Banned Page Logo" style="margin-bottom: 5px;"/><br />
	        <input name="image6" class="form-control" type="text" value="<?php
echo $row['image'];
?>" required><br />
						  
            <label>Page Text:</label>
	        <textarea name="text6" class="form-control" rows="5" type="text" required><?php
echo $row['text'];
?></textarea>
			
			</center>
	  </fieldset>
	  </div>
    </div>
  </div>
                                

								
								</div>
								<footer class="panel-footer">
										<input type="submit" class="btn btn-primary" name="update" value="Save" />
										<button type="reset" class="btn btn-default">Reset</button>
								</footer>
								</form>
<?php
if (isset($_POST['update'])) {
    @$text = addslashes($_POST['text']);
    @$image = addslashes($_POST['image']);
    
    @$text2 = addslashes($_POST['text2']);
    @$image2 = addslashes($_POST['image2']);
    
    @$text3 = addslashes($_POST['text3']);
    @$image3 = addslashes($_POST['image3']);
    
    @$text4 = addslashes($_POST['text4']);
    @$image4 = addslashes($_POST['image4']);
    
    @$text5 = addslashes($_POST['text5']);
    @$image5 = addslashes($_POST['image5']);
    
    @$text6 = addslashes($_POST['text6']);
    @$image6 = addslashes($_POST['image6']);
    
    $table         = $prefix . 'pages-layolt';
    $update_banned = mysqli_query($connect, "UPDATE `$table` SET 
`text` = '$text', 
`image` = '$image' 
WHERE page='Banned'");
    
    $update_blocked = mysqli_query($connect, "UPDATE `$table` SET 
`text` = '$text2', 
`image` = '$image2' 
WHERE page='Blocked'");
    
    $update_ddos = mysqli_query($connect, "UPDATE `$table` SET 
`text` = '$text3', 
`image` = '$image3' 
WHERE page='Mass_Requests'");
    
    $update_proxy = mysqli_query($connect, "UPDATE `$table` SET 
`text` = '$text4', 
`image` = '$image4' 
WHERE page='Proxy'");
    
    $update_spam = mysqli_query($connect, "UPDATE `$table` SET 
`text` = '$text5', 
`image` = '$image5' 
WHERE page='Spam'");
    
    $update_bannedc = mysqli_query($connect, "UPDATE `$table` SET 
`text` = '$text6', 
`image` = '$image6' 
WHERE page='Banned_Country'");
    
    echo '<meta http-equiv="refresh" content="0;url=warning-pages">';
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