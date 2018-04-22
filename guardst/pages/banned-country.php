<?php
include "header.php";
$table = $prefix . 'pages-layolt';
$query = mysqli_query($connect, "SELECT * FROM `$table` WHERE page='Banned_Country'");
$row   = mysqli_fetch_assoc($query);
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
<?php
//Getting Real IP Address
function get_realip()
{
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if (getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if (getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if (getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if (getenv('HTTP_FORWARDED'))
        $ipaddress = getenv('HTTP_FORWARDED');
    else if (getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'Unknown';
    return $ipaddress;
}

//Getting Country
function visitor_country($ip)
{
    $ip_data = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));
    
    if ($ip_data && $ip_data->geoplugin_countryName != null) {
        $result = $ip_data->geoplugin_countryName;
    }
    
    return @$result;
}

$guestip = get_realip();
@$country = visitor_country($guestip);
$table2      = $prefix . 'bans-country';
$querybanned = mysqli_query($connect, "SELECT * FROM `$table2` WHERE country='$country'");
$banned      = mysqli_num_rows($querybanned);
$row         = mysqli_fetch_array($querybanned);
$redirect    = $row['redirect'];
$url         = $row['url'];
if ($redirect == "Yes") {
    echo '<br /><center>You will be redirected</center><br />
<meta http-equiv="refresh" content="4;url=' . $url . '">';
}
?>
                <p>Please contact the webmaster of the site, if you think something is wrong.</p>
               </center>
              </div>
            </div>
          </div>
        </div>
      </div>

<?php
include "footer.php";
?>