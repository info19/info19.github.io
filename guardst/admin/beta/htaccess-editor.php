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
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
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
                                        <textarea class="form-control" name="htaccess" rows="7" type="text"><?php
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
                            
                            <section class="panel">
								<header class="panel-heading">
									<div class="panel-actions">
										<a href="#" class="fa fa-caret-down"></a>
										<a href="#" class="fa fa-times"></a>
									</div>

									<h2 class="panel-title">.htaccess Suggestions</h2>
									<p class="panel-subtitle">Useful .htaccess functions.</p>
								</header>
								<div class="panel-body"> 
                                    
                                <fieldset>
                                    <div class="form-group">
                                        <div class="row">
                                            
                                            <div class="col-md-6">
											<label class="col-sm-4 control-label">ServerSignature</label>
											<div class="col-sm-8">
												<div class="switch switch-sm switch-success">
														<input type="checkbox" name="server-signature" data-plugin-ios-switch value="On" 
<?php
$file = $_SERVER['DOCUMENT_ROOT'] . "/.htaccess";

$searchfor = '# phpGuard PRO: Disable ServerSignature on generated error pages';
$contents  = file_get_contents($file);
$pattern   = preg_quote($searchfor, '/');
$pattern   = "/^.*$pattern.*\$/m";
if (preg_match_all($pattern, $contents, $matches)) {
    $title = "Yes";
} else {
    $title = "No";
}

$searchfor = 'ServerSignature Off';
$contents  = file_get_contents($file);
$pattern   = preg_quote($searchfor, '/');
$pattern   = "/^.*$pattern.*\$/m";
if (preg_match_all($pattern, $contents, $matches)) {
    $line = "Yes";
} else {
    $line = "No";
}

if ($title = 'Yes' && $line = 'Yes') {
    echo ' checked ';
}
?>
                                                               />
												</div>
											</div>
                                            </div>
                                                
                                            <div class="col-md-6">
                                                <i>Disable the ServerSignature on server generated error pages.</i>
                                            </div>
                                         </div>
                                       
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            
                                            <div class="col-md-6">
											<label class="col-sm-4 control-label">Indexes</label>
											<div class="col-sm-8">
												<div class="switch switch-sm switch-success">
														<input type="checkbox" name="indexes" data-plugin-ios-switch value="On"
<?php
$file = $_SERVER['DOCUMENT_ROOT'] . "/.htaccess";

$searchfor = '# phpGuard PRO: Disable directory browsing';
$contents  = file_get_contents($file);
$pattern   = preg_quote($searchfor, '/');
$pattern   = "/^.*$pattern.*\$/m";
if (preg_match_all($pattern, $contents, $matches)) {
    $title = "Yes";
} else {
    $title = "No";
}

$searchfor = 'Options All -Indexes';
$contents  = file_get_contents($file);
$pattern   = preg_quote($searchfor, '/');
$pattern   = "/^.*$pattern.*\$/m";
if (preg_match_all($pattern, $contents, $matches)) {
    $line = "Yes";
} else {
    $line = "No";
}

if ($title = 'Yes' && $line = 'Yes') {
    echo ' checked ';
}
?>
                                                               />
												</div>
											</div>
                                            </div>
                                                
                                            <div class="col-md-6">
                                                <i>Disable directory browsing.</i>
                                            </div>
                                         </div>
                                       
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            
                                            <div class="col-md-6">
											<label class="col-sm-4 control-label">mod_gzip</label>
											<div class="col-sm-8">
												<div class="switch switch-sm switch-success">
														<input type="checkbox" name="mod-gzip" data-plugin-ios-switch value="On"/>
												</div>
											</div>
                                            </div>
                                                
                                            <div class="col-md-6">
                                                <i>Use mod_gzip if available.</i>
                                            </div>
                                         </div>
                                       
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            
                                            <div class="col-md-6">
											<label class="col-sm-4 control-label">mod_deflate</label>
											<div class="col-sm-8">
												<div class="switch switch-sm switch-success">
														<input type="checkbox" name="mod-deflate" data-plugin-ios-switch value="On"/>
												</div>
											</div>
                                            </div>
                                                
                                            <div class="col-md-6">
                                                <i>Use mod_deflate if available.</i>
                                            </div>
                                         </div>
                                       
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            
                                            <div class="col-md-6">
											<label class="col-sm-4 control-label">Limit Upload Size</label>
											<div class="col-sm-8">
														<input class="form-control" name="limit-uploadsize" value="">
											</div>
                                            </div>
                                                
                                            <div class="col-md-6">
                                                <i>If set, this value in MB will be used as limit to file uploads.</i>
                                            </div>
                                         </div>
                                       
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            
                                            <div class="col-md-6">
											<label class="col-sm-4 control-label">Admin E-Mail</label>
											<div class="col-sm-8">
														<input class="form-control" name="admin-email" value="">
											</div>
                                            </div>
                                                
                                            <div class="col-md-6">
                                                <i>If set, this will be used as the admin email on server generated error pages.</i>
                                            </div>
                                         </div>
                                       
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            
                                            <div class="col-md-6">
											<label class="col-sm-4 control-label">500 error</label>
											<div class="col-sm-8">
														<input class="form-control" name="500-error" value="">
											</div>
                                            </div>
                                                
                                            <div class="col-md-6">
                                                <i>If set, this path will be used as page to 500 errors (example: /error.php).</i>
                                            </div>
                                         </div>
                                       
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            
                                            <div class="col-md-6">
											<label class="col-sm-4 control-label">403 error</label>
											<div class="col-sm-8">
														<input class="form-control" name="403-error" value="">
											</div>
                                            </div>
                                                
                                            <div class="col-md-6">
                                                <i>If set, this path will be used as page to 403 errors (example: /error.php).</i>
                                            </div>
                                         </div>
                                       
                                    </div>
                                    
                                </fieldset>
								
                                </div>
							</section>
                            
                            <section class="panel">
								<header class="panel-heading">
									<div class="panel-actions">
										<a href="#" class="fa fa-caret-down"></a>
										<a href="#" class="fa fa-times"></a>
									</div>

									<h2 class="panel-title">Maintenance Mode</h2>
									<p class="panel-subtitle">Allows you to close the website for Maintenance, put it Under Construction or redirect the visitors to a Coming Soon page.</p>
								</header>
								<div class="panel-body">     
                                <fieldset>
                                   
                                    <div class="form-group">
                                        <div class="row">
                                            
                                            <div class="col-md-6">
											<label class="col-sm-4 control-label">Maintenance Active</label>
											<div class="col-sm-8">
												<div class="switch switch-sm switch-success">
														<input type="checkbox" name="maintenance" data-plugin-ios-switch value="On"/>
												</div>
											</div>
                                            </div>
                                                
                                            <div class="col-md-6">
                                                <i>Toggles Maintenance Mode.</i>
                                            </div>
                                         </div>
                                       
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            
                                            <div class="col-md-6">
											<label class="col-sm-4 control-label">Allowed IPs</label>
											<div class="col-sm-8">
                                                <textarea class="form-control" name="allowed-ips"></textarea>
											</div>
                                            </div>
                                                
                                            <div class="col-md-6">
                                                <i>List of allowed IPs.
All the IPs not listed will view the 403 error page or be redirected to a page set below.</i>
                                            </div>
                                         </div>
                                       
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            
                                            <div class="col-md-6">
											<label class="col-sm-4 control-label">Redirection</label>
											<div class="col-sm-8">
														<input class="form-control" name="redirection" value="">
											</div>
                                            </div>
                                                
                                            <div class="col-md-6">
                                                <i>If set, this will be used as redirection for disallowed IPs. This could be an external url or a document on your server (local paths begin with a trailing slash)</i>
                                            </div>
                                         </div>
                                       
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
    
    $newrules = "";
    
    //Server Signature
    if (isset($_POST['server-signature']) && $_POST['server-signature'] == 'On') {
        $file = $_SERVER['DOCUMENT_ROOT'] . "/.htaccess";
        
        $searchfor = '# phpGuard PRO: Disable ServerSignature on generated error pages';
        $contents  = file_get_contents($file);
        $pattern   = preg_quote($searchfor, '/');
        $pattern   = "/^.*$pattern.*\$/m";
        if (preg_match_all($pattern, $contents, $matches)) {
            $title = "Yes";
        } else {
            $title = "No";
        }
        
        $searchfor = 'ServerSignature Off';
        $contents  = file_get_contents($file);
        $pattern   = preg_quote($searchfor, '/');
        $pattern   = "/^.*$pattern.*\$/m";
        if (preg_match_all($pattern, $contents, $matches)) {
            $line = "Yes";
        } else {
            $line = "No";
        }
        
        if ($title == "No" && $line == "No") {
            $newrules .= "\n# phpGuard PRO: Disable ServerSignature on generated error pages\n";
            $newrules .= "ServerSignature Off\n";
        }
        
    } else {
        
        $file = $_SERVER['DOCUMENT_ROOT'] . "/.htaccess";
        deleteLineInFile($file, "# phpGuard PRO: Disable ServerSignature on generated error pages");
        deleteLineInFile($file, "ServerSignature Off");
        
    }
    
    //Indexes
    if (isset($_POST['indexes']) && $_POST['indexes'] == 'On') {
        $file = $_SERVER['DOCUMENT_ROOT'] . "/.htaccess";
        
        $searchfor = '# phpGuard PRO: Disable directory browsing';
        $contents  = file_get_contents($file);
        $pattern   = preg_quote($searchfor, '/');
        $pattern   = "/^.*$pattern.*\$/m";
        if (preg_match_all($pattern, $contents, $matches)) {
            $title = "Yes";
        } else {
            $title = "No";
        }
        
        $searchfor = 'Options All -Indexes';
        $contents  = file_get_contents($file);
        $pattern   = preg_quote($searchfor, '/');
        $pattern   = "/^.*$pattern.*\$/m";
        if (preg_match_all($pattern, $contents, $matches)) {
            $line = "Yes";
        } else {
            $line = "No";
        }
        
        if ($title == "No" && $line == "No") {
            $newrules .= "\n# phpGuard PRO: Disable directory browsing\n";
            $newrules .= "Options All -Indexes\n";
        }
        
    } else {
        
        $file = $_SERVER['DOCUMENT_ROOT'] . "/.htaccess";
        deleteLineInFile($file, "# phpGuard PRO: Disable directory browsing");
        deleteLineInFile($file, "Options All -Indexes");
        
    }
    
    //mod_gzip
    if (isset($_POST['mod-gzip']) && $_POST['mod-gzip'] == 'On') {
        $file = $_SERVER['DOCUMENT_ROOT'] . "/.htaccess";
        
        $searchfor = '# phpGuard PRO: Setting mod_gzip';
        $contents  = file_get_contents($file);
        $pattern   = preg_quote($searchfor, '/');
        $pattern   = "/^.*$pattern.*\$/m";
        if (preg_match_all($pattern, $contents, $matches)) {
            $title = "Yes";
        } else {
            $title = "No";
        }
        
        $searchfor = '<ifModule mod_gzip.c>';
        $contents  = file_get_contents($file);
        $pattern   = preg_quote($searchfor, '/');
        $pattern   = "/^.*$pattern.*\$/m";
        if (preg_match_all($pattern, $contents, $matches)) {
            $line = "Yes";
        } else {
            $line = "No";
        }
        $searchfor = 'mod_gzip_on Yes';
        $contents  = file_get_contents($file);
        $pattern   = preg_quote($searchfor, '/');
        $pattern   = "/^.*$pattern.*\$/m";
        if (preg_match_all($pattern, $contents, $matches)) {
            $line2 = "Yes";
        } else {
            $line2 = "No";
        }
        $searchfor = 'mod_gzip_dechunk Yes';
        $contents  = file_get_contents($file);
        $pattern   = preg_quote($searchfor, '/');
        $pattern   = "/^.*$pattern.*\$/m";
        if (preg_match_all($pattern, $contents, $matches)) {
            $line3 = "Yes";
        } else {
            $line3 = "No";
        }
        $searchfor = 'mod_gzip_item_include file \.(html?|txt|css|js|php|pl)$';
        $contents  = file_get_contents($file);
        $pattern   = preg_quote($searchfor, '/');
        $pattern   = "/^.*$pattern.*\$/m";
        if (preg_match_all($pattern, $contents, $matches)) {
            $line4 = "Yes";
        } else {
            $line4 = "No";
        }
        $searchfor = 'mod_gzip_item_include handler ^cgi-script$';
        $contents  = file_get_contents($file);
        $pattern   = preg_quote($searchfor, '/');
        $pattern   = "/^.*$pattern.*\$/m";
        if (preg_match_all($pattern, $contents, $matches)) {
            $line5 = "Yes";
        } else {
            $line5 = "No";
        }
        $searchfor = 'mod_gzip_item_include mime ^text/.*';
        $contents  = file_get_contents($file);
        $pattern   = preg_quote($searchfor, '/');
        $pattern   = "/^.*$pattern.*\$/m";
        if (preg_match_all($pattern, $contents, $matches)) {
            $line6 = "Yes";
        } else {
            $line6 = "No";
        }
        $searchfor = 'mod_gzip_item_include mime ^application/x-javascript.*';
        $contents  = file_get_contents($file);
        $pattern   = preg_quote($searchfor, '/');
        $pattern   = "/^.*$pattern.*\$/m";
        if (preg_match_all($pattern, $contents, $matches)) {
            $line7 = "Yes";
        } else {
            $line7 = "No";
        }
        $searchfor = 'mod_gzip_item_exclude mime ^image/.*';
        $contents  = file_get_contents($file);
        $pattern   = preg_quote($searchfor, '/');
        $pattern   = "/^.*$pattern.*\$/m";
        if (preg_match_all($pattern, $contents, $matches)) {
            $line8 = "Yes";
        } else {
            $line8 = "No";
        }
        $searchfor = 'mod_gzip_item_exclude rspheader ^Content-Encoding:.*gzip.*';
        $contents  = file_get_contents($file);
        $pattern   = preg_quote($searchfor, '/');
        $pattern   = "/^.*$pattern.*\$/m";
        if (preg_match_all($pattern, $contents, $matches)) {
            $line9 = "Yes";
        } else {
            $line9 = "No";
        }
        $searchfor = '</ifModule> #GZ';
        $contents  = file_get_contents($file);
        $pattern   = preg_quote($searchfor, '/');
        $pattern   = "/^.*$pattern.*\$/m";
        if (preg_match_all($pattern, $contents, $matches)) {
            $line10 = "Yes";
        } else {
            $line10 = "No";
        }
        
        if ($title == "No" && $line == "No" && $line2 == "No" && $line3 == "No" && $line4 == "No" && $line5 == "No" && $line6 == "No" && $line7 == "No" && $line8 == "No" && $line9 == "No" && $line10 == "No") {
            $newrules .= "\n\n# phpGuard PRO: Setting mod_gzip\n";
            $newrules .= "<ifModule mod_gzip.c>\n";
            $newrules .= "mod_gzip_on Yes\n";
            $newrules .= "mod_gzip_dechunk Yes\n";
            $newrules .= "mod_gzip_item_include file \.(html?|txt|css|js|php|pl)$\n";
            $newrules .= "mod_gzip_item_include handler ^cgi-script$\n";
            $newrules .= "mod_gzip_item_include mime ^text/.*\n";
            $newrules .= "mod_gzip_item_include mime ^application/x-javascript.*\n";
            $newrules .= "mod_gzip_item_exclude mime ^image/.*\n";
            $newrules .= "mod_gzip_item_exclude rspheader ^Content-Encoding:.*gzip.*\n";
            $newrules .= "</ifModule> #GZ\n";
        }
        
    } else {
        
        $file = $_SERVER['DOCUMENT_ROOT'] . "/.htaccess";
        deleteLineInFile($file, "# phpGuard PRO: Setting mod_gzip");
        deleteLineInFile($file, "<ifModule mod_gzip.c>");
        deleteLineInFile($file, "mod_gzip_on Yes");
        deleteLineInFile($file, "mod_gzip_dechunk Yes");
        deleteLineInFile($file, "mod_gzip_item_include file \.(html?|txt|css|js|php|pl)$");
        deleteLineInFile($file, "mod_gzip_item_include handler ^cgi-script$");
        deleteLineInFile($file, "mod_gzip_item_include mime ^text/.*");
        deleteLineInFile($file, "mod_gzip_item_include mime ^application/x-javascript.*");
        deleteLineInFile($file, "mod_gzip_item_exclude mime ^image/.*");
        deleteLineInFile($file, "mod_gzip_item_exclude rspheader ^Content-Encoding:.*gzip.*");
        deleteLineInFile($file, "</ifModule> #GZ");
        
    }
    
    //mod_deflate
    if (isset($_POST['mod-deflate']) && $_POST['mod-deflate'] == 'On') {
        $file = $_SERVER['DOCUMENT_ROOT'] . "/.htaccess";
        
        $searchfor = '# phpGuard PRO: Setting mod_deflate';
        $contents  = file_get_contents($file);
        $pattern   = preg_quote($searchfor, '/');
        $pattern   = "/^.*$pattern.*\$/m";
        if (preg_match_all($pattern, $contents, $matches)) {
            $title = "Yes";
        } else {
            $title = "No";
        }
        
        $searchfor = '<IfModule mod_deflate.c>';
        $contents  = file_get_contents($file);
        $pattern   = preg_quote($searchfor, '/');
        $pattern   = "/^.*$pattern.*\$/m";
        if (preg_match_all($pattern, $contents, $matches)) {
            $line = "Yes";
        } else {
            $line = "No";
        }
        $searchfor = 'AddOutputFilterByType DEFLATE text/html text/plain text/xml application/xml application/xhtml+xml text/javascript text/css application/x-javascript';
        $contents  = file_get_contents($file);
        $pattern   = preg_quote($searchfor, '/');
        $pattern   = "/^.*$pattern.*\$/m";
        if (preg_match_all($pattern, $contents, $matches)) {
            $line2 = "Yes";
        } else {
            $line2 = "No";
        }
        $searchfor = 'BrowserMatch ^Mozilla/4 gzip-only-text/html';
        $contents  = file_get_contents($file);
        $pattern   = preg_quote($searchfor, '/');
        $pattern   = "/^.*$pattern.*\$/m";
        if (preg_match_all($pattern, $contents, $matches)) {
            $line3 = "Yes";
        } else {
            $line3 = "No";
        }
        $searchfor = 'BrowserMatch ^Mozilla/4.0[678] no-gzip';
        $contents  = file_get_contents($file);
        $pattern   = preg_quote($searchfor, '/');
        $pattern   = "/^.*$pattern.*\$/m";
        if (preg_match_all($pattern, $contents, $matches)) {
            $line4 = "Yes";
        } else {
            $line4 = "No";
        }
        $searchfor = 'BrowserMatch bMSIE !no-gzip !gzip-only-text/html';
        $contents  = file_get_contents($file);
        $pattern   = preg_quote($searchfor, '/');
        $pattern   = "/^.*$pattern.*\$/m";
        if (preg_match_all($pattern, $contents, $matches)) {
            $line5 = "Yes";
        } else {
            $line5 = "No";
        }
        $searchfor = 'Header append Vary User-Agent env=!dont-vary';
        $contents  = file_get_contents($file);
        $pattern   = preg_quote($searchfor, '/');
        $pattern   = "/^.*$pattern.*\$/m";
        if (preg_match_all($pattern, $contents, $matches)) {
            $line6 = "Yes";
        } else {
            $line6 = "No";
        }
        $searchfor = '</ifModule> #DF';
        $contents  = file_get_contents($file);
        $pattern   = preg_quote($searchfor, '/');
        $pattern   = "/^.*$pattern.*\$/m";
        if (preg_match_all($pattern, $contents, $matches)) {
            $line7 = "Yes";
        } else {
            $line7 = "No";
        }
        
        if ($title == "No" && $line == "No" && $line2 == "No" && $line3 == "No" && $line4 == "No" && $line5 == "No" && $line6 == "No" && $line7 == "No") {
            $newrules .= "\n\n# phpGuard PRO: Setting mod_deflate\n";
            $newrules .= "<IfModule mod_deflate.c>\n";
            $newrules .= "AddOutputFilterByType DEFLATE text/html text/plain text/xml application/xml application/xhtml+xml text/javascript text/css application/x-javascript\n";
            $newrules .= "BrowserMatch ^Mozilla/4 gzip-only-text/html\n";
            $newrules .= "BrowserMatch ^Mozilla/4.0[678] no-gzip\n";
            $newrules .= "BrowserMatch bMSIE !no-gzip !gzip-only-text/html\n";
            $newrules .= "Header append Vary User-Agent env=!dont-vary\n";
            $newrules .= "</ifModule> #DF\n";
        }
        
    } else {
        
        $file = $_SERVER['DOCUMENT_ROOT'] . "/.htaccess";
        deleteLineInFile($file, "# phpGuard PRO: Setting mod_deflate");
        deleteLineInFile($file, "<IfModule mod_deflate.c>");
        deleteLineInFile($file, "AddOutputFilterByType DEFLATE text/html text/plain text/xml application/xml application/xhtml+xml text/javascript text/css application/x-javascript");
        deleteLineInFile($file, "BrowserMatch ^Mozilla/4 gzip-only-text/html");
        deleteLineInFile($file, "BrowserMatch ^Mozilla/4.0[678] no-gzip");
        deleteLineInFile($file, "BrowserMatch bMSIE !no-gzip !gzip-only-text/html");
        deleteLineInFile($file, "Header append Vary User-Agent env=!dont-vary");
        deleteLineInFile($file, "</ifModule> #DF");
        
    }
    
    $myFile     = $_SERVER['DOCUMENT_ROOT'] . "/.htaccess";
    $fh         = fopen($myFile, 'a');
    $stringData = $newrules;
    fwrite($fh, $stringData);
    fclose($fh);
    
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
									
								</div>
							</section>
                            
                            <section class="panel">
								<header class="panel-heading">
									<div class="panel-actions">
										<a href="#" class="fa fa-caret-down"></a>
										<a href="#" class="fa fa-times"></a>
									</div>

									<h2 class="panel-title">Purposes</h2>
								</header>
								<div class="panel-body">
                                    
								</div>
							</section>

						</div>
					</div>
					<!-- end: page -->
				</section>
<?php
footer();
?>