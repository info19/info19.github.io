<?php
include "core.php";
head();
?>
				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Site Information</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="dashboard">
										<i class="fa fa-home"></i>
									</a>
								</li>
                                <li><span>Site Information &nbsp;&nbsp;&nbsp;</span></li>
							</ol>
						</div>
					</header>

					<!-- start: page -->

<?php
$site = clean_url($_SERVER['SERVER_NAME']);

require_once('whois.php');

//Alexa Rank Check
function alexaRank($site)
{
    $xml = simplexml_load_file('http://data.alexa.com/data?cli=10&dat=snbamz&url=' . $site);
    @$a = $xml->SD[1]->POPULARITY;
    if ($a != null) {
        $alexa_rank = $xml->SD[1]->POPULARITY->attributes()->TEXT;
        if ($alexa_rank == null)
            $alexa_rank = 'No Rank';
    } else {
        $alexa_rank = 'No Rank';
    }
    
    return $alexa_rank;
}

//Google PageRank Check
function google_page_rank($url)
{
    $ch = getch($url);
    $fp = fsockopen('toolbarqueries.google.com', 80, $errno, $errstr, 30);
    if ($fp) {
        $out = "GET /tbr?client=navclient-auto&ch=$ch&features=Rank&q=info:$url HTTP/1.1\r\n";
        $out .= "User-Agent: Mozilla/5.0 (Windows NT 6.1; rv:28.0) Gecko/20100101 Firefox/28.0\r\n";
        $out .= "Host: toolbarqueries.google.com\r\n";
        $out .= "Connection: Close\r\n\r\n";
        fwrite($fp, $out);
        while (!feof($fp)) {
            $data = fgets($fp, 128);
            //echo $data;
            $pos  = strpos($data, "Rank_");
            if ($pos === false) {
            } else {
                $pager = substr($data, $pos + 9);
                $pager = trim($pager);
                $pager = str_replace("\n", '', $pager);
                return $pager;
            }
        }
        fclose($fp);
    }
}

//Clean URL
function clean_url($site)
{
    $site = strtolower($site);
    $site = str_replace(array(
        'http://',
        'https://',
        'www.',
        '/'
    ), '', $site);
    return $site;
}

//Hash & Getch URL
function HashURL($String)
{
    $Check1 = StrToNum($String, 0x1505, 0x21);
    $Check2 = StrToNum($String, 0, 0x1003F);
    
    $Check1 >>= 2;
    $Check1 = (($Check1 >> 4) & 0x3FFFFC0) | ($Check1 & 0x3F);
    $Check1 = (($Check1 >> 4) & 0x3FFC00) | ($Check1 & 0x3FF);
    $Check1 = (($Check1 >> 4) & 0x3C000) | ($Check1 & 0x3FFF);
    
    $T1 = (((($Check1 & 0x3C0) << 4) | ($Check1 & 0x3C)) << 2) | ($Check2 & 0xF0F);
    $T2 = (((($Check1 & 0xFFFFC000) << 4) | ($Check1 & 0x3C00)) << 0xA) | ($Check2 & 0xF0F0000);
    
    return ($T1 | $T2);
}

function StrToNum($Str, $Check, $Magic)
{
    $Int32Unit = 4294967296; // 2^32
    
    $length = strlen($Str);
    for ($i = 0; $i < $length; $i++) {
        $Check *= $Magic;
        if ($Check >= $Int32Unit) {
            $Check = ($Check - $Int32Unit * (int) ($Check / $Int32Unit));
            //if the check less than -2^31
            $Check = ($Check < -2147483648) ? ($Check + $Int32Unit) : $Check;
        }
        $Check += ord($Str{$i});
    }
    return $Check;
}

function CheckHash($Hashnum)
{
    $CheckByte = 0;
    $Flag      = 0;
    
    $HashStr = sprintf('%u', $Hashnum);
    $length  = strlen($HashStr);
    
    for ($i = $length - 1; $i >= 0; $i--) {
        $Re = $HashStr{$i};
        if (1 === ($Flag % 2)) {
            $Re += $Re;
            $Re = (int) ($Re / 10) + ($Re % 10);
        }
        $CheckByte += $Re;
        $Flag++;
    }
    
    $CheckByte %= 10;
    if (0 !== $CheckByte) {
        $CheckByte = 10 - $CheckByte;
        if (1 === ($Flag % 2)) {
            if (1 === ($CheckByte % 2)) {
                $CheckByte += 9;
            }
            $CheckByte >>= 1;
        }
    }
    
    return '7' . $CheckByte . $HashStr;
}

function getch($url)
{
    return CheckHash(HashURL($url));
}

//Host Info Check
function host_info($site)
{
    $ch = curl_init('http://www.iplocationfinder.com/' . clean_url($site));
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
    $data = curl_exec($ch);
    preg_match('~ISP.*<~', $data, $isp);
    preg_match('~Country.*<~', $data, $country);
    preg_match('~IP:.*<~', $data, $ip);
    
    @$country = explode(':', strip_tags($country[0]));
    @$country = trim(str_replace('Hide your IP address and Location here', '', $country[1]));
    if ($country == '')
        $country = 'Not Available';
    
    @$isp = explode(':', strip_tags($isp[0]));
    @$isp = trim($isp[1]);
    if ($isp == '')
        $isp = 'Not Available';
    
    @$ip = $ip[0];
    $ip = trim(str_replace(array(
        'IP:',
        '<',
        '/label>',
        '/th>td>',
        '/td>'
    ), '', $ip));
    if ($ip == '')
        $ip = 'Not Available';
    $data = $ip . "::" . $country . "::" . $isp . "::";
    return $data;
}

//Headers & HTTP Check
function getHeaders($site)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_URL, $site);
    curl_setopt($ch, CURLOPT_HEADER, true);
    curl_setopt($ch, CURLOPT_NOBODY, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    @curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
    return curl_exec($ch);
}
function getHttp($headers)
{
    $headers   = explode("\r\n", $headers);
    $http_code = explode(' ', $headers[0]);
    return (int) trim($http_code[1]);
}

//Robots.txt Check
function robocheck($site)
{
    if ($site{strlen($site) - 1} != '/')
        $site .= '/';
    $site .= 'robots.txt';
    $headers = explode("\r\n", getHeaders($site));
    
    if (!empty($headers[0])) {
        $httpcode = getHttp($headers[0]);
        if ($httpcode == 200 || $httpcode == 500 || $httpcode == 301 || $httpcode == 302 || $httpcode == 403) {
            $site    = "www.$site";
            $headers = explode("\r\n", getHeaders($site));
            
            if (!empty($headers[0])) {
                $httpcode = getHttp($headers[0]);
                if ($httpcode == 200 || $httpcode == 500 || $httpcode == 301 || $httpcode == 302 || $httpcode == 403) {
                    return 1;
                } else {
                    return 0;
                }
            } else {
                return 0;
            }
        } else {
            return 0;
        }
    } else {
        return 0;
    }
}

//Sitemap Check
function sitemap_check($site)
{
    if ($site{strlen($site) - 1} != '/')
        $site .= '/';
    $site .= 'sitemap.xml';
    $headers = explode("\r\n", getHeaders($site));
    
    if (!empty($headers[0])) {
        $httpcode = getHttp($headers[0]);
        if ($httpcode == 200 || $httpcode == 500 || $httpcode == 301 || $httpcode == 302 || $httpcode == 403) {
            $site    = "www.$site";
            $headers = explode("\r\n", getHeaders($site));
            
            if (!empty($headers[0])) {
                $httpcode = getHttp($headers[0]);
                if ($httpcode == 200 || $httpcode == 500 || $httpcode == 301 || $httpcode == 302 || $httpcode == 403) {
                    return 1;
                } else {
                    return 0;
                }
            } else {
                return 0;
            }
        } else {
            return 0;
        }
    } else {
        return 0;
    }
}

//Google PageRank
$go_rank = google_page_rank($site);
if ($go_rank == "")
    $go_rank = 0;

//Alexa PageRank
$alexa = alexaRank($site);

//Sitemap
$sitemap_r = sitemap_check($site);

//Robots.txt
$robo_r = robocheck($site);

//Whois
$whois      = new Whois;
$whois_data = $whois->whoislookup($site);
$age        = new DomainAge;
$age        = $age->age($site);
if ($age == '')
    $age = "Not Available";

function checkOnline($site)
{
    $curlInit = curl_init($site);
    curl_setopt($curlInit, CURLOPT_CONNECTTIMEOUT, 20);
    curl_setopt($curlInit, CURLOPT_HEADER, true);
    curl_setopt($curlInit, CURLOPT_NOBODY, true);
    curl_setopt($curlInit, CURLOPT_RETURNTRANSFER, true);
    
    //get answer
    $response         = curl_exec($curlInit);
    $GLOBALS['rtime'] = curl_getinfo($curlInit);
    curl_close($curlInit);
    if ($response)
        return true;
    return false;
}

//Title, Description, Keywords
if (checkOnline($site)) {
    $vtime = $rtime['total_time'];
    @$html = file_get_contents("http://" . $site);
    $html = str_ireplace(array(
        "Title",
        "TITLE"
    ), "title", $html);
    $html = str_ireplace(array(
        "Description",
        "DESCRIPTION"
    ), "description", $html);
    $html = str_ireplace(array(
        "Keywords",
        "KEYWORDS"
    ), "keywords", $html);
    $html = str_ireplace(array(
        "Content",
        "CONTENT"
    ), "content", $html);
    $html = str_ireplace(array(
        "Meta",
        "META"
    ), "meta", $html);
    $html = str_ireplace(array(
        "Name",
        "NAME"
    ), "name", $html);
    
    $doc = new DOMDocument();
    @$doc->loadHTML($html);
    $nodes = $doc->getElementsByTagName('title');
    
    @$title = $nodes->item(0)->nodeValue;
    
    $metas = $doc->getElementsByTagName('meta');
    
    for ($i = 0; $i < $metas->length; $i++) {
        $meta = $metas->item($i);
        if ($meta->getAttribute('name') == 'description')
            $description = $meta->getAttribute('content');
        if ($meta->getAttribute('name') == 'keywords')
            $keywords = $meta->getAttribute('content');
    }
    if ($title == '')
        $title = '<h4><span class="label label-default">No Title</span></h4>';
    if (@$description == '')
        $description = '<h4><span class="label label-default">No Description</span></h4>';
    if (@$keywords == '')
        $keywords = '<h4><span class="label label-default">No Keywords</span></h4>';
}

//Host Info
$data         = host_info($site);
$data         = explode("::", $data);
$host_ip      = $data[0];
$host_country = $data[1];
$host_isp     = $data[2];
?>
                    <div class="row">
                        <div class="col-md-6">
							<section class="panel panel-featured">
								<header class="panel-heading">
									<div class="panel-actions">
										<a href="#" class="fa fa-caret-down"></a>
										<a href="#" class="fa fa-times"></a>
									</div>
                                <h2 class="panel-title"><?php
echo clean_url($site);
?></h2>
								</header>
								<div class="panel-body">
                                    <table class="table table-bordered table-hover">
												<thead>
													<tr style="background-color: #F3F4F5;">
														<th>Site Stats</th>
														<th></th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>Response Time</td>
														<td><h4><span class="label label-success"><?php
echo $vtime;
?> sec</span></h4></td>
													</tr>
                                                    <tr>
														<td>Domain Age</td>
														<td><h4><span class="label label-danger"><?php
echo $age;
?></span></h4></td>
													</tr>
                                                    <tr>
														<td>Google PageRank</td>
														<td><h4><span class="label label-warning"><?php
echo $go_rank;
?></span></h4></td>
													</tr>
                                                    <tr>
														<td>Alexa Rank</td>
														<td><h4><span class="label label-primary"><?php
echo $alexa;
?></span></h4></td>
													</tr>
												</tbody>
                                        
                                                <thead>
													<tr style="background-color: #F3F4F5;">
														<th>Meta Tags</th>
														<th>Status</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>Title</td>
														<td><?php
echo $title;
?></td>
													</tr>
                                                    <tr>
														<td>Description</td>
														<td><?php
echo $description;
?></td>
													</tr>
                                                    <tr>
														<td>Keywords</td>
														<td><?php
echo $keywords;
?></td>
													</tr>
												</tbody>
                                        
                                                <thead>
													<tr style="background-color: #F3F4F5;">
														<th>Crawling files</th>
														<th>Status</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>Robots.txt</td>
														<td>
<?php
if ($robo_r == "0") {
    echo '<h4><span class="label label-danger">No</span></h4>';
} else {
    echo '<h4><span class="label label-success">Yes</span></h4>';
}
?>
                                                        </td>
													</tr>
                                                    <tr>
														<td>XML Sitemap</td>
														<td>
<?php
if ($sitemap_r == "0") {
    echo '<h4><span class="label label-danger">No</span></h4>';
} else {
    echo '<h4><span class="label label-success">Yes</span></h4>';
}
?>
                                                        </td>
													</tr>
												</tbody>
								     </table>
								</div>
							</section>
                            
                            <div class="row">
                                        <div class="col-md-6">
                                            <div class="panel-body bg-secondary">
                                                 <div class="widget-summary">
													<div class="widget-summary-col widget-summary-col-icon">
														<div class="summary-icon">
															<i class="fa fa-file"></i>
														</div>
													</div>
													<div class="widget-summary-col">
														<div class="summary">
															<h4 class="title">Files</h4>
															<div class="info">
<?php
$fi = new FilesystemIterator(__DIR__, FilesystemIterator::SKIP_DOTS);
?>
																<strong class="amount"><?php
echo iterator_count($fi);
?></strong>
															</div>
														</div>
														<div class="summary-footer">
														</div>
													</div>
												</div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="panel-body bg-tertiary">
                                                 <div class="widget-summary">
													<div class="widget-summary-col widget-summary-col-icon">
														<div class="summary-icon">
															<i class="fa fa-folder"></i>
														</div>
													</div>
													<div class="widget-summary-col">
														<div class="summary">
															<h4 class="title">Folders</h4>
															<div class="info">
<?php
$dirs = 0;
$x    = __DIR__;
$y    = scandir($x);
foreach ($y as $z) {
    if (is_dir($z)) {
        $dirs++;
    }
}
?>
																<strong class="amount"><?php
echo $dirs;
?></strong>
															</div>
														</div>
														<div class="summary-footer">
														</div>
													</div>
												</div>
                                            </div>
                                        </div>
                                </div><br />
                                <div class="row">
                                        <div class="col-md-6">
                                            <div class="panel-body bg-quartenary">
                                                 <div class="widget-summary">
													<div class="widget-summary-col widget-summary-col-icon">
														<div class="summary-icon">
															<i class="fa fa-picture-o"></i>
														</div>
													</div>
													<div class="widget-summary-col">
														<div class="summary">
															<h4 class="title">Images</h4>
															<div class="info">
<?php
$dir    = __DIR__;
$images = glob("$dir{*.jpg, *.JPG, *.jpeg, *.png, *.bmp, *.gif, *.tif}", GLOB_BRACE);
?>
																<strong class="amount"><?php
echo count($images);
?></strong>
															</div>
														</div>
														<div class="summary-footer">
														</div>
													</div>
												</div>
                                            </div>
                                        </div>
                                </div><br />
						</div>
                        
                        <div class="col-md-6">
      
<?php
if (!function_exists("view_size")) {
    function view_size($size)
    {
        if (!is_numeric($size)) {
            return FALSE;
        } else {
            if ($size >= 1073741824) {
                $size = round($size / 1073741824 * 100) / 100 . " GB";
            } elseif ($size >= 1048576) {
                $size = round($size / 1048576 * 100) / 100 . " MB";
            } elseif ($size >= 1024) {
                $size = round($size / 1024 * 100) / 100 . " KB";
            } else {
                $size = $size . " B";
            }
            return $size;
        }
    }
}

if (is_callable("disk_free_space")) {
    $directory = '/';
    $free      = disk_free_space($directory);
    $total     = disk_total_space($directory);
    if ($free === FALSE) {
        $free = 0;
    }
    if ($total === FALSE) {
        $total = 0;
    }
    if ($free < 0) {
        $free = 0;
    }
    if ($total < 0) {
        $total = 0;
    }
    $used         = $total - $free;
    $free_percent = round(100 / ($total / $free), 2);
    //echo "<br><b>Free ".view_size($free)." of ".view_size($total)." (".$free_percent."%)</b>";
    echo '
                                        <div class="row">
                                        <div class="col-md-6">
                                            <div class="panel-body bg-primary">
                                                 <div class="widget-summary">
													<div class="widget-summary-col widget-summary-col-icon">
														<div class="summary-icon">
															<i class="fa fa-folder-o"></i>
														</div>
													</div>
													<div class="widget-summary-col">
														<div class="summary">
															<h4 class="title">HDD Free Space</h4>
															<div class="info">
																<strong class="amount">' . view_size($free) . '</strong>
															</div>
														</div>
														<div class="summary-footer">
                                                            <a class="text-uppercase"><b>' . $free_percent . '%</b> of <b>' . view_size($total) . '</b></a>
														</div>
													</div>
												</div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="panel-body bg-primary">
                                                 <div class="widget-summary">
													<div class="widget-summary-col widget-summary-col-icon">
														<div class="summary-icon">
															<i class="fa fa-folder"></i>
														</div>
													</div>
													<div class="widget-summary-col">
														<div class="summary">
															<h4 class="title">HDD Total Space</h4>
															<div class="info">
																<strong class="amount">' . view_size($total) . '</strong>
															</div>
														</div>
														<div class="summary-footer">
														</div>
													</div>
												</div>
                                            </div>
                                        </div>
                                    </div><br />
                                    
                                    <div class="progress progress-striped light active m-md">
										<div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="' . $free_percent . '" aria-valuemin="0" aria-valuemax="100" style="width: ' . $free_percent . '%;">
											<b>' . $free_percent . '%</b>
										</div>
									</div>
                                    
                                    <br />

 ';
}
?>
                            
							<section class="panel panel-featured panel-featured-primary">
								<header class="panel-heading">
									<div class="panel-actions">
										<a href="#" class="fa fa-caret-down"></a>
										<a href="#" class="fa fa-times"></a>
									</div>
                                <h2 class="panel-title">WHOIS Information</h2>
								</header>
								<div class="panel-body">
                                    <textarea placeholder="WHOIS Information about <?php
echo $site;
?>" rows="34" class="form-control" readonly><?php
echo $whois_data;
?></textarea>
								</div>
							</section>
						</div>
					</div>
                    
                    <h3 class="mt-none">Host Information</h3>
                    <p>Information about the Web Host, IP Address, Name Servers & More.</p>
						<div class="row">
							<div class="col-md-6 col-lg-6 col-xl-3">
								<section class="panel panel-featured-bottom panel-featured-primary">
									<div class="panel-body">
										<div class="widget-summary">
											<div class="widget-summary-col widget-summary-col-icon">
												<div class="summary-icon bg-primary">
													<i class="fa fa-user"></i>
												</div>
											</div>
											<div class="widget-summary-col">
												<div class="summary">
													<h4 class="title">Domain IP</h4>
													<div class="info">
														<strong class="amount"><?php
echo $host_ip;
?></strong>
													</div>
												</div>
												<div class="summary-footer">
												</div>
											</div>
										</div>
									</div>
								</section>
							</div>
							<div class="col-md-6 col-lg-6 col-xl-3">
								<section class="panel panel-featured-bottom panel-featured-primary">
									<div class="panel-body">
										<div class="widget-summary">
											<div class="widget-summary-col widget-summary-col-icon">
												<div class="summary-icon bg-primary">
													<i class="fa fa-globe"></i>
												</div>
											</div>
											<div class="widget-summary-col">
												<div class="summary">
													<h4 class="title">Country</h4>
													<div class="info">
														<strong class="amount"><?php
echo $host_country;
?></strong>
													</div>
												</div>
												<div class="summary-footer">
												</div>
											</div>
										</div>
									</div>
								</section>
							</div>
							<div class="col-md-6 col-lg-6 col-xl-3">
								<section class="panel panel-featured-bottom panel-featured-primary">
									<div class="panel-body">
										<div class="widget-summary">
											<div class="widget-summary-col widget-summary-col-icon">
												<div class="summary-icon bg-primary">
													<i class="fa fa-tasks"></i>
												</div>
											</div>
											<div class="widget-summary-col">
												<div class="summary">
													<h4 class="title">ISP</h4>
													<div class="info">
														<strong class="amount"><?php
echo $host_isp;
?></strong>
													</div>
												</div>
												<div class="summary-footer">
												</div>
											</div>
										</div>
									</div>
								</section>
							</div>
                            <div class="col-md-6 col-lg-6 col-xl-3">
								<section class="panel panel-featured-bottom panel-featured-primary">
									<div class="panel-body">
										<div class="widget-summary">
											<div class="widget-summary-col widget-summary-col-icon">
												<div class="summary-icon bg-primary">
													<i class="fa fa-database"></i>
												</div>
											</div>
											<div class="widget-summary-col">
												<div class="summary">
													<h4 class="title">Server Software</h4>
													<div class="info">
														<strong class="amount">
                                                            <?php
$version = explode("/", $_SERVER['SERVER_SOFTWARE']);
$softNum = explode(" ", $version[1]);
$soft    = $version[0] . '/' . $softNum[0];
echo $soft;
?>
                                                        </strong>
													</div>
												</div>
												<div class="summary-footer">	
												</div>
											</div>
										</div>
									</div>
								</section>
							</div>
                            <div class="col-md-6 col-lg-6 col-xl-3">
								<section class="panel panel-featured-bottom panel-featured-primary">
									<div class="panel-body">
										<div class="widget-summary">
											<div class="widget-summary-col widget-summary-col-icon">
												<div class="summary-icon bg-primary">
													<i class="fa fa-desktop"></i>
												</div>
											</div>
											<div class="widget-summary-col">
												<div class="summary">
													<h4 class="title">Server OS</h4>
													<div class="info">
														<strong class="amount">
<?php
if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
    echo 'Windows';
} elseif (PHP_OS === 'Linux') {
    echo 'Linux';
} elseif (PHP_OS === 'FreeBSD') {
    echo 'FreeBSD';
} elseif (PHP_OS === 'OpenBSD') {
    echo 'OpenBSD';
} elseif (PHP_OS === 'NetBSD') {
    echo 'NetBSD';
} elseif (PHP_OS === 'SunOS') {
    echo 'SunOS';
} elseif (PHP_OS === 'Unix') {
    echo 'Unix';
} elseif (PHP_OS === 'Darwin') {
    echo 'Darwin';
} elseif (PHP_OS === 'HP-UX') {
    echo 'HP-UX';
} elseif (PHP_OS === 'IRIX64') {
    echo 'IRIX64';
} elseif (PHP_OS === 'CYGWIN_NT-5.1') {
    echo 'CYGWIN';
} elseif (PHP_OS === 'GNU') {
    echo 'GNU';
} elseif (PHP_OS === 'DragonFly') {
    echo 'DragonFly';
} elseif (PHP_OS === 'MSYS_NT-6.1') {
    echo 'MSYS';
} else {
    echo 'Unknown';
}
?>
                                                        </strong>
													</div>
												</div>
												<div class="summary-footer">	
												</div>
											</div>
										</div>
									</div>
								</section>
							</div>
                            <div class="col-md-6 col-lg-6 col-xl-3">
								<section class="panel panel-featured-bottom panel-featured-primary">
									<div class="panel-body">
										<div class="widget-summary">
											<div class="widget-summary-col widget-summary-col-icon">
												<div class="summary-icon bg-primary">
													<i class="fa fa-file-code-o"></i>
												</div>
											</div>
											<div class="widget-summary-col">
												<div class="summary">
													<h4 class="title">PHP Version</h4>
													<div class="info">
														<strong class="amount"><?php
echo phpversion();
?></strong>
													</div>
												</div>
												<div class="summary-footer">
												</div>
											</div>
										</div>
									</div>
								</section>
							</div>
                            <div class="col-md-6 col-lg-6 col-xl-3">
								<section class="panel panel-featured-bottom panel-featured-primary">
									<div class="panel-body">
										<div class="widget-summary">
											<div class="widget-summary-col widget-summary-col-icon">
												<div class="summary-icon bg-primary">
													<i class="fa fa-list-alt"></i>
												</div>
											</div>
											<div class="widget-summary-col">
												<div class="summary">
													<h4 class="title">MySQL Version</h4>
													<div class="info">
														<strong class="amount"><?php
echo mysql_get_server_info();
?></strong>
													</div>
												</div>
												<div class="summary-footer">
													
												</div>
											</div>
										</div>
									</div>
								</section>
							</div>
                            <div class="col-md-6 col-lg-6 col-xl-3">
								<section class="panel panel-featured-bottom panel-featured-primary">
									<div class="panel-body">
										<div class="widget-summary">
											<div class="widget-summary-col widget-summary-col-icon">
												<div class="summary-icon bg-primary">
													<i class="fa fa-plug"></i>
												</div>
											</div>
											<div class="widget-summary-col">
												<div class="summary">
													<h4 class="title">Server Port</h4>
													<div class="info">
														<strong class="amount"><?php
echo $_SERVER['SERVER_PORT'];
?></strong>
													</div>
												</div>
												<div class="summary-footer">
												</div>
											</div>
										</div>
									</div>
								</section>
							</div>
                            <div class="col-md-6 col-lg-6 col-xl-3">
								<section class="panel panel-featured-bottom panel-featured-primary">
									<div class="panel-body">
										<div class="widget-summary">
											<div class="widget-summary-col widget-summary-col-icon">
												<div class="summary-icon bg-primary">
													<i class="fa fa-lock"></i>
												</div>
											</div>
											<div class="widget-summary-col">
												<div class="summary">
													<h4 class="title">OpenSSL Version</h4>
													<div class="info">
														<strong class="amount">
                                                        <?php
if (!extension_loaded('openssl')) {
    echo 'Deactivated';
} elseif (OPENSSL_VERSION_NUMBER < 0x009080bf) {
    echo '<font style="color: red;">Out-of-Date</font>';
} else {
    echo '<font style="color: green;">Latest</font>';
}
?>
                                                        </strong>
													</div>
												</div>
												<div class="summary-footer">
												</div>
											</div>
										</div>
									</div>
								</section>
							</div>
                            <div class="col-md-6 col-lg-6 col-xl-3">
								<section class="panel panel-featured-bottom panel-featured-primary">
									<div class="panel-body">
										<div class="widget-summary">
											<div class="widget-summary-col widget-summary-col-icon">
												<div class="summary-icon bg-primary">
													<i class="fa fa-link"></i>
												</div>
											</div>
											<div class="widget-summary-col">
												<div class="summary">
													<h4 class="title">cURL Extension</h4>
													<div class="info">
														<strong class="amount">
                                                        <?php
if (function_exists('curl_version')) {
    echo '<font style="color: green;">Enabled</font>';
} else {
    echo '<font style="color: red;">Disabled</font>';
}
?>
                                                        </strong>
													</div>
												</div>
												<div class="summary-footer">
												</div>
											</div>
										</div>
									</div>
								</section>
							</div>
                            <div class="col-md-6 col-lg-6 col-xl-3">
								<section class="panel panel-featured-bottom panel-featured-primary">
									<div class="panel-body">
										<div class="widget-summary">
											<div class="widget-summary-col widget-summary-col-icon">
												<div class="summary-icon bg-primary">
													<i class="fa fa-hdd-o"></i>
												</div>
											</div>
											<div class="widget-summary-col">
												<div class="summary">
													<h4 class="title">Server Protocol</h4>
													<div class="info">
														<strong class="amount"><?php
echo $_SERVER['SERVER_PROTOCOL'];
?></strong>
													</div>
												</div>
												<div class="summary-footer">
												</div>
											</div>
										</div>
									</div>
								</section>
							</div>
                            <div class="col-md-6 col-lg-6 col-xl-3">
								<section class="panel panel-featured-bottom panel-featured-primary">
									<div class="panel-body">
										<div class="widget-summary">
											<div class="widget-summary-col widget-summary-col-icon">
												<div class="summary-icon bg-primary">
													<i class="fa fa-sitemap"></i>
												</div>
											</div>
											<div class="widget-summary-col">
												<div class="summary">
													<h4 class="title">Gateway Interface</h4>
													<div class="info">
														<strong class="amount"><?php
echo $_SERVER['GATEWAY_INTERFACE'];
?></strong>
													</div>
												</div>
												<div class="summary-footer">
												</div>
											</div>
										</div>
									</div>
								</section>
							</div>
						</div>
					<!-- end: page -->
				</section>
<?php
footer();
?>