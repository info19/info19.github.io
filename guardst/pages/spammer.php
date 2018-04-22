<?php
include "header.php";
$table = $prefix . 'pages-layolt';
$query = mysqli_query($connect, "SELECT * FROM `$table` WHERE page='Spam'");
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
                <p>Please contact the webmaster of the site, if you think something is wrong.</p>
                <p>To check in which Spam Database (DNSBL) you attend click the button below:</p>
                <a href="http://www.dnsbl-check.info/?checkip=<?php
echo $_SERVER['REMOTE_ADDR'];
?>" type="button" class="btn btn-primary btn-lg" target="_blank">Check</a>
				</center>
              </div>
            </div>
          </div>
        </div>
      </div>

<?php
include "footer.php";
?>