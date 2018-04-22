<?php
include "core.php";
head();

@$string        = file_get_contents("http://phpguard.esy.es/product-versions.json");
$json_a        = json_decode($string, true);
$latestversion = $json_a['phpGuard-PRO']['version'];
?>
				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Check For Update</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="dashboard">
										<i class="fa fa-home"></i>
									</a>
								</li>
                                <li><span>Check For Update &nbsp;&nbsp;&nbsp;</span></li>
							</ol>
						</div>
					</header>

					<!-- start: page -->
					<div class="row">
						<div class="col-md-12">
<?php
if ($version == $latestversion) {
    echo '<section class="panel panel-success">';
} else {
    echo '<section class="panel panel-danger">';
}
?>			
								<header class="panel-heading">
									<div class="panel-actions">
										<a href="#" class="fa fa-caret-down"></a>
										<a href="#" class="fa fa-times"></a>
									</div>

<?php
if ($version == $latestversion) {
    echo '<h2 class="panel-title"><i class="fa fa-check-circle-o"></i> Up-To-Date</h2>';
} else {
    echo '<h2 class="panel-title"><i class="fa fa-exclamation-triangle"></i> Out-To-Date</h2>';
}
?>	
									
								</header>
								<div class="panel-body">

<center><div class="jumbotron">
        <h1 style="color: #0088cc;"><img src="assets/images/shield.png" width="100px" height="120px"> phpGuard PRO</h1>
<ul class="breadcrumb">
  <li>Installed Version: <span class="label label-primary"><?php
echo $version;
?></span></li>
  <li>Latest Version: <span class="label label-success"><?php
echo $latestversion;
?></span>
  </li>
</ul>
        <hr>
<?php
if ($version == $latestversion) {
    echo '<p>You have the <b>latest version</b> of <b>phpGuard PRO</b> installed.</p>';
} else {
    echo '<p>You must update <b>phpGuard PRO</b> to the <b>latest version</b>.</p><br />
<a href="http://codecanyon.net/downloads?ref=extreemer" title="Download the Update" target="_blank" class="btn btn-success btn-lg">
<i class="fa fa-download"></i> Download Update
</a>
';
}
?>	
        
</div></center>
								</div>
							</section>
						</div>
					</div>
					<!-- end: page -->
				</section>
<?php
footer();
?>