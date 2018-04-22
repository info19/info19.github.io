<?php
//Proxy Protection
$table = $prefix . 'proxy-settings';
@$query = mysqli_query($connect, "SELECT * FROM `$table`");
@$row = mysqli_fetch_assoc($query);
if ($row['protection'] == "Yes") {
    
    $table2 = $prefix . 'proxy-list';
    @$query2 = mysqli_query($connect, "SELECT * FROM `$table2` WHERE ip='$ip'");
    @$row2 = mysqli_num_rows($query2);
    if ($row2 > "0" OR @fsockopen($ip, 80, $errstr, $errno, 1)) {
            $type = "Proxy";
        
        //AutoBan
        if ($row['autoban'] == "Yes") {
            $autoban = 'Yes';
            $btable  = $prefix . 'bans';
            @$bansvalid = mysqli_query($connect, "SELECT * FROM `$btable` WHERE ip='$ip' LIMIT 1");
            @$bansvalidator = mysqli_num_rows($bansvalid);
            if ($bansvalidator <= "0") {
                $log = mysqli_query($connect, "INSERT INTO `$btable` (ip, date, time, reason, autoban) VALUES ('$ip', '$date', '$time', '$type', 'Yes')");
            }
        }
        $autoban = 'No';
        
        //Logging the Attack
        if ($row['logging'] == "Yes") {
            $ltable = $prefix . 'logs';
            @$queryvalid = mysqli_query($connect, "SELECT * FROM `$ltable` WHERE ip='$ip' and page='$page' and type='$type' LIMIT 1");
            @$validator = mysqli_num_rows($queryvalid);
            if ($validator <= "0") {
                $log = mysqli_query($connect, "INSERT INTO `$ltable` (ip, date, time, page, type, autoban, browser, browser_version, os, os_version, referer_url) VALUES ('$ip', '$date', '$time', '$page', '$type', '$autoban', '$browser', '$browser_version', '$os', '$os_version', '$referer_url')");
            }
        }
        
        //E-Mail Notification
        if ($srow['mail_notifications'] == "Yes" && $row['mail'] == "Yes") {
            $email   = "notifications@phpguard.com";
            $to      = $srow['email'];
            $subject = 'phpGuard PRO - ' . $type . '';
            $message = '
					<p style="padding:0; margin:0 0 11pt 0;line-height:160%; font-size:18px;">Details of Log - ' . $type . '</p>
					<p>IP Address: <b>' . $ip . '</b></p>
					<p>Date: <b>' . $date . '</b> at <b>' . $time . '</b></p>
					<p>Browser & Version:  <b>' . $browser . ' ' . $browser_version . '</b></p>
					<p>Operating System:  <b>' . $os . '</b></p>
                    <p>OS Version:  <b>' . $os_version . '</b></p>
					<p>Banned: <b>' . $autoban . '</b></p>
					<p>Type of the attack:  <b>' . $type . '</b> </p>
					<p>Page:  <b>' . $page . '</b> </p>
                    <p>Referer URL:  <b>' . $referer_url . '</b> </p>
                    <p>Site URL:  <b>' . $site_url . '</b> </p>
                    <p>phpGuard PRO URL:  <b>' . $phpguard_path . '</b> </p>
				    ';
            $headers = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
            $headers .= 'To: ' . $to . ' <' . $to . '>' . "\r\n";
            $headers .= 'From: ' . $email . ' <' . $email . '>' . "\r\n";
            @mail($to, $subject, $message, $headers);
        }
        echo '<meta http-equiv="refresh" content="0;url=' . $row['redirect'] . '" />';
        
    }
}
?>