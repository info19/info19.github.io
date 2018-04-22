<?php
include "header.php";
$table = $prefix . 'pages-layolt';
$query = mysqli_query($connect, "SELECT * FROM `$table` WHERE page='Mass_Requests'");
$row   = mysqli_fetch_array($query);
?>
	  <div class="page-header">
        <div class="row">
          <div class="col-lg-12">
            <div class="bs-example">
              <div class="jumbotron">
                <center>
				<p><font size="6px" color="red"><?php
echo $row['text'];
?></font><br />
				<br /><img src="<?php
echo $row['image'];
?>" width="200px" height="200px" /></p>
                <p>Please wait a few seconds between the requests!</p>
                <p>Please contact the webmaster of the site, if you think something is wrong.</p>
                <a href="<?php
echo "http://" . $_SERVER['HTTP_HOST'];
?>" type="button" class="btn btn-primary btn-lg">Continue to the Website</a>
				</center>
              </div>
            </div>
          </div>
        </div>
      </div>

<?php
include "footer.php";
?>