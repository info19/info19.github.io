<?php
include "core.php";
head();
?>
				<section role="main" class="content-body">
					<header class="page-header">
						<h2>.htaccess Editor</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="dashboard">
										<i class="fa fa-home"></i>
									</a>
								</li>
                                <li><span>.htaccess Editor &nbsp;&nbsp;&nbsp;</span></li>
							</ol>
						</div>
					</header>
<?php
$htaccess = $_SERVER['DOCUMENT_ROOT'] . "/.htaccess";
if (!file_exists($htaccess)) {
    echo '<div class="alert alert-info">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				No created <strong>.htaccess</strong> file on your site and will now be created in the site\'s root folder - <strong>' . $htaccess . '</strong> .
          </div>';
    $content = "";
    $fp      = fopen($htaccess, "wb");
    fwrite($fp, $content);
    fclose($fp);
}
?>
					<!-- start: page -->
					<div class="row">
						<div class="col-md-9">
                            
                            <form method="post" class="form-horizontal form-bordered">
                            
							<section class="panel">
								<header class="panel-heading">
									<div class="panel-actions">
										<a href="#" class="fa fa-caret-down"></a>
										<a href="#" class="fa fa-times"></a>
									</div>

									<h2 class="panel-title">.htaccess Editor</h2>
									<p class="panel-subtitle">Allows you to edit the .htaccess file of your site.</p>
								</header>
								<div class="panel-body">
                                <fieldset>
                                    
                                    <div class="col-md-8">
                                        <textarea class="form-control" name="htaccess" rows="25" type="text"><?php
$htaccess = $_SERVER['DOCUMENT_ROOT'] . "/.htaccess";
@$fh = fopen($htaccess, 'r');
while (@$line = fgets($fh)) {
    echo (@$line);
}
@fclose($fh);
?></textarea>
                                    </div>
                                    <div class="col-md-4">
                                    <p>Please double check them before saving as a mistake could make your site inaccessible.</p>
                                     <ul class="description">
                                         <li><a href="http://www.google.com/search?q=htaccess+tutorial" title="Search for htaccess tutorials" target="_blank">
                                             <img width="16px" src="http://google.com/favicon.ico" alt="google favicon"> htaccess tutorial</a>
                                         </li>
                                         <li><a href="http://httpd.apache.org/docs/current/howto/htaccess.html" title="Read about htaccess at apache.org" target="_blank">
                                             <img width="16px" src="http://apache.org/favicon.ico" alt="apache favicon"> htaccess</a>
                                         </li>
                                         <li><a href="http://httpd.apache.org/docs/current/mod/mod_rewrite.html" title="Read about mod_rewrite at apache.org" target="_blank">
                                             <img width="16px" src="http://apache.org/favicon.ico" alt="apache favicon"> mod_rewrite</a>
                                         </li>
                                     </ul>
                                    </div>
                                    
                                </fieldset>
								</div>
							</section>
                                
                            <input class="btn btn-primary" type="submit" name="ht-edit" value="Save all changes">
                                
                            </form>
                            
<?php
if (isset($_POST['ht-edit'])) {
    
    $fn = $_SERVER['DOCUMENT_ROOT'] . "/.htaccess";
    @$file = fopen($fn, "w+");
    fwrite($file, $_POST['htaccess']);
    fclose($file);
    
    echo '<script type="text/javascript">window.location = "htaccess-editor"</script>';
    
}
?>

						</div>
						<div class="col-md-3">
							<section class="panel">
								<header class="panel-heading">
									<div class="panel-actions">
										<a href="#" class="fa fa-caret-down"></a>
										<a href="#" class="fa fa-times"></a>
									</div>

									<h2 class="panel-title">Information & Tips</h2>
								</header>
								<div class="panel-body">
									A .htaccess (hypertext access) file is a directory-level configuration file supported by several web servers, that allows for decentralized management of web server configuration. They are placed inside the web tree, and are able to override a subset of the server's global configuration for the directory that they are in, and all sub-directories.
								</div>
							</section>
                            
                            <section class="panel">
								<header class="panel-heading">
									<div class="panel-actions">
										<a href="#" class="fa fa-caret-down"></a>
										<a href="#" class="fa fa-times"></a>
									</div>

									<h2 class="panel-title">Common Usage</h2>
								</header>
								<div class="panel-body">
<ul>
<li><b>Authorization, authentication</b></li>
A .htaccess file is often used to specify security restrictions for a directory, hence the filename "access". The .htaccess file is often accompanied by a .htpasswd file which stores valid usernames and their passwords.
<li><b>Rewriting URLs</b></li>
Servers often use .htaccess to rewrite long, overly comprehensive URLs to shorter and more memorable ones.
<li><b>Blocking</b></li>
Use allow/deny to block users by IP address or domain. Also, use to block bad bots, rippers and referrers. Often used to restrict access by Search Engine spiders
<li><b>SSI</b></li>
Enable server-side includes.
<li><b>Directory listing</b></li>
Control how the server will react when no specific web page is specified.
    <li><b>Customized error responses</b></li>
Changing the page that is shown when a server-side error occurs, for example HTTP 404 Not Found or, to indicate to a search engine that a page has moved, HTTP 301 Moved Permanently.
<li><b>MIME types</b></li>
Instruct the server how to treat different varying file types.
<li><b>Cache Control</b></li>
.htaccess files allow a server to control caching by web browsers and proxies to reduce bandwidth usage, server load, and perceived lag.
</ul>
								</div>
							</section>

						</div>
					</div>
					<!-- end: page -->
				</section>
<?php
footer();
?>