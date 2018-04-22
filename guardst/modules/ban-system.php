<?php
//Ban System
$table = $prefix . 'bans';
@$querybanned = mysqli_query($connect, "SELECT * FROM `$table` WHERE ip='$ip'");
@$banned = mysqli_num_rows($querybanned);
if ($banned > "0") {
    $bannedpage_url = $phpguard_path . "/pages/banned.php";
    echo '<meta http-equiv="refresh" content="0;url=' . $bannedpage_url . '" />';
}

//Blocking Cuuntry
$table = $prefix . 'bans-country';
@$querybanned = mysqli_query($connect, "SELECT * FROM `$table` WHERE country='$country'");
@$banned = mysqli_num_rows($querybanned);
if ($banned > "0") {
    $bannedcpage_url = $phpguard_path . "/pages/blocked-country.php";
    echo '<meta http-equiv="refresh" content="0;url=' . $bannedcpage_url . '" />';
}
?>