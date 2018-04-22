<?php
include "core.php";
head();
?>
				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Security Check</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="dashboard">
										<i class="fa fa-home"></i>
									</a>
								</li>
                                <li><span>Security Check &nbsp;&nbsp;&nbsp;</span></li>
							</ol>
						</div>
					</header>

					<!-- start: page -->
					<div class="row">
						<div class="col-md-9">
							<section class="panel">
								<header class="panel-heading">
									<div class="panel-actions">
										<a href="#" class="fa fa-caret-down"></a>
										<a href="#" class="fa fa-times"></a>
									</div>

									<h2 class="panel-title">Security Check</h2>
									<p class="panel-subtitle">Checking for enabled vulnerable PHP Functions.</p>
								</header>
								<div class="panel-body">
							    <div class="tabs tabs-primary">
								<ul class="nav nav-tabs nav-justified">
									<li class="active">
										<a href="#f1" data-toggle="tab" class="text-center">Command Execution</a>
									</li>
									<li>
										<a href="#f2" data-toggle="tab" class="text-center">PHP Code Execution</a>
									</li>
									<li>
										<a href="#f3" data-toggle="tab" class="text-center">Information Disclosure</a>
									</li>
									<li>
										<a href="#f4" data-toggle="tab" class="text-center">Filesystem Functions</a>
									</li>
									<li>
										<a href="#f5" data-toggle="tab" class="text-center">Other</a>
									</li>			
								</ul>
								<div class="tab-content">
									<div id="f1" class="tab-pane active">
									    <div class="well">Executing commands and returning the complete output</div>
										    <blockquote class="b-thick <?php
if (function_exists('exec')) {
    echo "danger";
} else {
    echo 'success';
}
?>">
									    		<p>exec <pre>Returns last line of commands output</pre></p>
									    	</blockquote>
											<blockquote class="b-thick <?php
if (function_exists('passthru')) {
    echo "danger";
} else {
    echo 'success';
}
?>">
									    		<p>passthru <pre>Passes commands output directly to the browser</pre></p>
									    	</blockquote>
											<blockquote class="b-thick <?php
if (function_exists('system')) {
    echo "danger";
} else {
    echo 'success';
}
?>">
									    		<p>system <pre>Passes commands output directly to the browser and returns last line</pre></p>
									    	</blockquote>
											<blockquote class="b-thick <?php
if (function_exists('shell_exec')) {
    echo "danger";
} else {
    echo 'success';
}
?>">
									    		<p>shell_exec <pre>Returns commands output</pre></p>
									    	</blockquote>
											<blockquote class="b-thick <?php
if (function_exists('popen')) {
    echo "danger";
} else {
    echo 'success';
}
?>">
									    		<p>popen <pre>Opens read or write pipe to process of a command</pre></p>
									    	</blockquote>
											<blockquote class="b-thick <?php
if (function_exists('proc_open')) {
    echo "danger";
} else {
    echo 'success';
}
?>">
									    		<p>proc_open <pre>Similar to popen() but greater degree of control</pre></p>
									    	</blockquote>
											<blockquote class="b-thick <?php
if (function_exists('pcntl_exec')) {
    echo "danger";
} else {
    echo 'success';
}
?>">
									    		<p>pcntl_exec <pre>Executes a program</pre></p>
									    	</blockquote>
									</div>
									
									<div id="f2" class="tab-pane">
										<div class="well">Apart from eval there are other ways to execute PHP code: include/require can be used for remote code execution in the form of Local File Include and Remote File Include vulnerabilities.</div>
										    <blockquote class="b-thick danger">
									    		<p>eval <pre>Evaluate a string as PHP code</pre></p>
									    	</blockquote>
											<blockquote class="b-thick <?php
if (function_exists('assert')) {
    echo "danger";
} else {
    echo 'success';
}
?>">
									    		<p>assert <pre>Identical to eval()</pre></p>
									    	</blockquote>
                                            <blockquote class="b-thick <?php
if (function_exists('preg_replace')) {
    echo "danger";
} else {
    echo 'success';
}
?>">
									    		<p>preg_replace <pre>Does an eval() on match</pre></p>
									    	</blockquote>
											<blockquote class="b-thick <?php
if (function_exists('create_function')) {
    echo "danger";
} else {
    echo 'success';
}
?>">
									    		<p>create_function <pre>Create an anonymous (lambda-style) function</pre></p>
									    	</blockquote>
											<blockquote class="b-thick danger">
									    		<p>include <pre>Includes and evaluates the specified file</pre></p>
									    	</blockquote>
											<blockquote class="b-thick danger">
									    		<p>include_once <pre>Includes and evaluates the specified file during the execution of script</pre></p>
									    	</blockquote>
											<blockquote class="b-thick danger">
									    		<p>require <pre>Identical to include</pre></p>
									    	</blockquote>
											<blockquote class="b-thick danger">
									    		<p>require_once <pre>Identical to require except PHP will check if the file has already been included, and if so, not include (require) it again.</pre></p>
									    	</blockquote>
											<blockquote class="b-thick <?php
if (function_exists('allow_url_fopen')) {
    echo "danger";
} else {
    echo 'success';
}
?>">
									    		<p>allow_url_fopen <pre>This option enables the URL-aware fopen wrappers that enable accessing URL object like files - File inclusion vulnerability</pre></p>
									    	</blockquote>
											<blockquote class="b-thick <?php
if (function_exists('allow_url_include')) {
    echo "danger";
} else {
    echo 'success';
}
?>">
									    		<p>allow_url_include <pre>This option allows the use of URL-aware fopen wrappers with the following functions: include, include_once, require, require_once - File inclusion vulnerability</pre></p>
									    	</blockquote>
									</div>
									
									<div id="f3" class="tab-pane">
									    <div class="well">Most of these function calls are not sinks. But rather it maybe a vulnerability if any of the data returned is viewable to an attacker. If an attacker can see phpinfo() it is definitely a vulnerability.</div>
										    <blockquote class="b-thick <?php
if (function_exists('phpinfo')) {
    echo "danger";
} else {
    echo 'success';
}
?>">
									    		<p>phpinfo <pre>Outputs information about PHP's configuration</pre></p>
									    	</blockquote>
											<blockquote class="b-thick <?php
if (function_exists('expose_php')) {
    echo "danger";
} else {
    echo 'success';
}
?>">
									    		<p>expose_php <pre>Adds your PHP version to the response headers and this could be used for security exploits</pre></p>
									    	</blockquote>
											<blockquote class="b-thick <?php
if (function_exists('display_errors')) {
    echo "danger";
} else {
    echo 'success';
}
?>">
									    		<p>display_errors <pre>Shows PHP errors to the client and this could be used for security exploits</pre></p>
									    	</blockquote>
											<blockquote class="b-thick <?php
if (function_exists('display_startup_errors')) {
    echo "danger";
} else {
    echo 'success';
}
?>">
									    		<p>display_startup_errors <pre>Shows PHP startup sequence errors to the client and this could be used for security exploits</pre></p>
									    	</blockquote>
											<blockquote class="b-thick <?php
if (function_exists('posix_getlogin')) {
    echo "danger";
} else {
    echo 'success';
}
?>">
									    		<p>posix_getlogin <pre>Return login name</pre></p>
									    	</blockquote>
											<blockquote class="b-thick <?php
if (function_exists('posix_ttyname')) {
    echo "danger";
} else {
    echo 'success';
}
?>">
									    		<p>posix_ttyname <pre>Determine terminal device name</pre></p>
									    	</blockquote>
											<blockquote class="b-thick <?php
if (function_exists('getenv')) {
    echo "danger";
} else {
    echo 'success';
}
?>">
									    		<p>getenv <pre>Gets the value of an environment variable</pre></p>
									    	</blockquote>
											<blockquote class="b-thick <?php
if (function_exists('get_current_user')) {
    echo "danger";
} else {
    echo 'success';
}
?>">
									    		<p>get_current_user <pre>Gets the name of the owner of the current PHP script</pre></p>
									    	</blockquote>
											<blockquote class="b-thick <?php
if (function_exists('proc_get_status')) {
    echo "danger";
} else {
    echo 'success';
}
?>">
									    		<p>proc_get_status <pre>Get information about a process opened by proc_open()</pre></p>
									    	</blockquote>
											<blockquote class="b-thick <?php
if (function_exists('get_cfg_var')) {
    echo "danger";
} else {
    echo 'success';
}
?>">
									    		<p>get_cfg_var <pre>Gets the value of a PHP configuration option</pre></p>
									    	</blockquote>
											<blockquote class="b-thick <?php
if (function_exists('disk_free_space')) {
    echo "danger";
} else {
    echo 'success';
}
?>">
									    		<p>disk_free_space <pre>Returns available space on filesystem or disk partition</pre></p>
									    	</blockquote>
											<blockquote class="b-thick <?php
if (function_exists('disk_total_space')) {
    echo "danger";
} else {
    echo 'success';
}
?>">
									    		<p>disk_total_space <pre>Returns the total size of a filesystem or disk partition</pre></p>
									    	</blockquote>
											<blockquote class="b-thick <?php
if (function_exists('diskfreespace')) {
    echo "danger";
} else {
    echo 'success';
}
?>">
									    		<p>diskfreespace <pre>Alias of disk_free_space()</pre></p>
									    	</blockquote>
											<blockquote class="b-thick <?php
if (function_exists('getcwd')) {
    echo "danger";
} else {
    echo 'success';
}
?>">
									    		<p>getcwd <pre>Gets the current working directory</pre></p>
									    	</blockquote>
											<blockquote class="b-thick <?php
if (function_exists('getmygid')) {
    echo "danger";
} else {
    echo 'success';
}
?>">
									    		<p>getmygid <pre>Get PHP script owner's GID</pre></p>
									    	</blockquote>
											<blockquote class="b-thick <?php
if (function_exists('getmyinode')) {
    echo "danger";
} else {
    echo 'success';
}
?>">
									    		<p>getmyinode <pre>Gets the inode of the current script</pre></p>
									    	</blockquote>
											<blockquote class="b-thick <?php
if (function_exists('getmypid')) {
    echo "danger";
} else {
    echo 'success';
}
?>">
									    		<p>getmypid <pre>Gets PHP's process ID</pre></p>
									    	</blockquote>
											<blockquote class="b-thick <?php
if (function_exists('getmyuid')) {
    echo "danger";
} else {
    echo 'success';
}
?>">
									    		<p>getmyuid <pre>Gets PHP script owner's UID</pre></p>
									    	</blockquote>
									</div>
									
									<div id="f4" class="tab-pane">
									    <div class="well">According to RATS all filesystem functions in PHP are nasty. Some of these don't seem very useful to the attacker. Others are more useful than you might think. For instance if allow_url_fopen=On then a url can be used as a file path, so a call to copy($_GET['s'], $_GET['d']); can be used to upload a PHP script anywhere on the system. Also if a site is vulnerable to a request send via GET everyone of those file system functions can be abused to channel and attack to another host through your server.</div>
										    <blockquote class="b-thick <?php
if (function_exists('fopen')) {
    echo "danger";
} else {
    echo 'success';
}
?>">
									    		<p>fopen <pre>Opens file or URL</pre></p>
									    	</blockquote>
											<blockquote class="b-thick <?php
if (function_exists('tmpfile')) {
    echo "danger";
} else {
    echo 'success';
}
?>">
									    		<p>tmpfile <pre>Creates a temporary file</pre></p>
									    	</blockquote>
											<blockquote class="b-thick <?php
if (function_exists('bzopen')) {
    echo "danger";
} else {
    echo 'success';
}
?>">
									    		<p>bzopen <pre>Opens a bzip2 compressed file</pre></p>
									    	</blockquote>
											<blockquote class="b-thick <?php
if (function_exists('gzopen')) {
    echo "danger";
} else {
    echo 'success';
}
?>">
									    		<p>gzopen <pre>Open gz-file</pre></p>
									    	</blockquote>
											<blockquote class="b-thick danger">
									    		<p>SplFileObject->__construct <pre>Write to filesystem (partially in combination with reading)</pre></p>
									    	</blockquote>
											<blockquote class="b-thick <?php
if (function_exists('chgrp')) {
    echo "danger";
} else {
    echo 'success';
}
?>">
									    		<p>chgrp <pre>Changes file group</pre></p>
									    	</blockquote>
											<blockquote class="b-thick <?php
if (function_exists('chmod')) {
    echo "danger";
} else {
    echo 'success';
}
?>">
									    		<p>chmod <pre>Changes file mode</pre></p>
									    	</blockquote>
											<blockquote class="b-thick <?php
if (function_exists('chown')) {
    echo "danger";
} else {
    echo 'success';
}
?>">
									    		<p>chown <pre>Changes file owner</pre></p>
									    	</blockquote>
											<blockquote class="b-thick <?php
if (function_exists('copy')) {
    echo "danger";
} else {
    echo 'success';
}
?>">
									    		<p>copy <pre>Copies file</pre></p>
									    	</blockquote>
											<blockquote class="b-thick <?php
if (function_exists('file_put_contents')) {
    echo "danger";
} else {
    echo 'success';
}
?>">
									    		<p>file_put_contents <pre></pre></p>
									    	</blockquote>
											<blockquote class="b-thick <?php
if (function_exists('lchgrp')) {
    echo "danger";
} else {
    echo 'success';
}
?>">
									    		<p>lchgrp <pre>Changes group ownership of symlink</pre></p>
									    	</blockquote>
											<blockquote class="b-thick <?php
if (function_exists('lchown')) {
    echo "danger";
} else {
    echo 'success';
}
?>">
									    		<p>lchown <pre>Changes user ownership of symlink</pre></p>
									    	</blockquote>
											<blockquote class="b-thick <?php
if (function_exists('link')) {
    echo "danger";
} else {
    echo 'success';
}
?>">
									    		<p>link <pre>Create a hard link</pre></p>
									    	</blockquote>
											<blockquote class="b-thick <?php
if (function_exists('mkdir')) {
    echo "danger";
} else {
    echo 'success';
}
?>">
									    		<p>mkdir <pre>Makes directory</pre></p>
									    	</blockquote>
											<blockquote class="b-thick <?php
if (function_exists('move_uploaded_file')) {
    echo "danger";
} else {
    echo 'success';
}
?>">
									    		<p>move_uploaded_file <pre>Moves an uploaded file to a new location</pre></p>
									    	</blockquote>
											<blockquote class="b-thick <?php
if (function_exists('rename')) {
    echo "danger";
} else {
    echo 'success';
}
?>">
									    		<p>rename <pre>Renames a file or directory</pre></p>
									    	</blockquote>
											<blockquote class="b-thick <?php
if (function_exists('rmdir')) {
    echo "danger";
} else {
    echo 'success';
}
?>">
									    		<p>rmdir <pre>Removes directory</pre></p>
									    	</blockquote>
											<blockquote class="b-thick <?php
if (function_exists('symlink')) {
    echo "danger";
} else {
    echo 'success';
}
?>">
									    		<p>symlink <pre>Creates a symbolic link</pre></p>
									    	</blockquote>
											<blockquote class="b-thick <?php
if (function_exists('tempnam')) {
    echo "danger";
} else {
    echo 'success';
}
?>">
									    		<p>tempnam <pre>Create file with unique file name</pre></p>
									    	</blockquote>
											<blockquote class="b-thick <?php
if (function_exists('touch')) {
    echo "danger";
} else {
    echo 'success';
}
?>">
									    		<p>touch <pre>Sets access and modification time of file</pre></p>
									    	</blockquote>
											<blockquote class="b-thick <?php
if (function_exists('unlink')) {
    echo "danger";
} else {
    echo 'success';
}
?>">
									    		<p>unlink <pre>Deletes a file</pre></p>
									    	</blockquote>
											<blockquote class="b-thick <?php
if (function_exists('ftp_get')) {
    echo "danger";
} else {
    echo 'success';
}
?>">
									    		<p>ftp_get <pre>Downloads a file from the FTP server</pre></p>
									    	</blockquote>
											<blockquote class="b-thick <?php
if (function_exists('ftp_nb_get')) {
    echo "danger";
} else {
    echo 'success';
}
?>">
									    		<p>ftp_nb_get <pre>Read from filesystem</pre></p>
									    	</blockquote>
											<blockquote class="b-thick <?php
if (function_exists('file_exists')) {
    echo "danger";
} else {
    echo 'success';
}
?>">
									    		<p>file_exists <pre>Checks whether a file or directory exists</pre></p>
									    	</blockquote>
											<blockquote class="b-thick <?php
if (function_exists('file_get_contents')) {
    echo "danger";
} else {
    echo 'success';
}
?>">
									    		<p>file_get_contents <pre>Reads entire file into a string</pre></p>
									    	</blockquote>
											<blockquote class="b-thick <?php
if (function_exists('file')) {
    echo "danger";
} else {
    echo 'success';
}
?>">
									    		<p>file <pre>Reads entire file into an array</pre></p>
									    	</blockquote>
											<blockquote class="b-thick <?php
if (function_exists('fileatime')) {
    echo "danger";
} else {
    echo 'success';
}
?>">
									    		<p>fileatime <pre>Gets last access time of file</pre></p>
									    	</blockquote>
											<blockquote class="b-thick <?php
if (function_exists('filectime')) {
    echo "danger";
} else {
    echo 'success';
}
?>">
									    		<p>filectime <pre>Gets inode change time of file</pre></p>
									    	</blockquote>
											<blockquote class="b-thick <?php
if (function_exists('filegroup')) {
    echo "danger";
} else {
    echo 'success';
}
?>">
									    		<p>filegroup <pre>Gets file group</pre></p>
									    	</blockquote>
											<blockquote class="b-thick <?php
if (function_exists('fileinode')) {
    echo "danger";
} else {
    echo 'success';
}
?>">
									    		<p>fileinode <pre>Gets file inode</pre></p>
									    	</blockquote>
											<blockquote class="b-thick <?php
if (function_exists('filemtime')) {
    echo "danger";
} else {
    echo 'success';
}
?>">
									    		<p>filemtime <pre>Gets file modification time</pre></p>
									    	</blockquote>
											<blockquote class="b-thick <?php
if (function_exists('fileowner')) {
    echo "danger";
} else {
    echo 'success';
}
?>">
									    		<p>fileowner <pre>Gets file owner</pre></p>
									    	</blockquote>
											<blockquote class="b-thick <?php
if (function_exists('fileperms')) {
    echo "danger";
} else {
    echo 'success';
}
?>">
									    		<p>fileperms <pre>Gets file permissions</pre></p>
									    	</blockquote>
											<blockquote class="b-thick <?php
if (function_exists('filesize')) {
    echo "danger";
} else {
    echo 'success';
}
?>">
									    		<p>filesize <pre>Gets file size</pre></p>
									    	</blockquote>
											<blockquote class="b-thick <?php
if (function_exists('filetype')) {
    echo "danger";
} else {
    echo 'success';
}
?>">
									    		<p>filetype <pre>Gets file type</pre></p>
									    	</blockquote>
											<blockquote class="b-thick <?php
if (function_exists('glob')) {
    echo "danger";
} else {
    echo 'success';
}
?>">
									    		<p>glob <pre>Find pathnames matching a pattern</pre></p>
									    	</blockquote>
											<blockquote class="b-thick <?php
if (function_exists('is_dir')) {
    echo "danger";
} else {
    echo 'success';
}
?>">
									    		<p>is_dir <pre>Tells whether filename is a directory</pre></p>
									    	</blockquote>
											<blockquote class="b-thick <?php
if (function_exists('is_executable')) {
    echo "danger";
} else {
    echo 'success';
}
?>">
									    		<p>is_executable <pre>Tells whether filename is executable</pre></p>
									    	</blockquote>
											<blockquote class="b-thick <?php
if (function_exists('is_file')) {
    echo "danger";
} else {
    echo 'success';
}
?>">
									    		<p>is_file <pre>Tells whether filename is a regular file</pre></p>
									    	</blockquote>
											<blockquote class="b-thick <?php
if (function_exists('is_link')) {
    echo "danger";
} else {
    echo 'success';
}
?>">
									    		<p>is_link <pre>Tells whether filename is a symbolic link</pre></p>
									    	</blockquote>
											<blockquote class="b-thick <?php
if (function_exists('is_readable')) {
    echo "danger";
} else {
    echo 'success';
}
?>">
									    		<p>is_readable <pre>Tells whether a file exists and is readable</pre></p>
									    	</blockquote>
											<blockquote class="b-thick <?php
if (function_exists('is_uploaded_file')) {
    echo "danger";
} else {
    echo 'success';
}
?>">
									    		<p>is_uploaded_file <pre>Tells whether file was uploaded via HTTP POST</pre></p>
									    	</blockquote>
											<blockquote class="b-thick <?php
if (function_exists('is_writable')) {
    echo "danger";
} else {
    echo 'success';
}
?>">
									    		<p>is_writable <pre>Tells whether filename is writable</pre></p>
									    	</blockquote>
											<blockquote class="b-thick <?php
if (function_exists('linkinfo')) {
    echo "danger";
} else {
    echo 'success';
}
?>">
									    		<p>linkinfo <pre>Gets information about a link</pre></p>
									    	</blockquote>
											<blockquote class="b-thick <?php
if (function_exists('lstat')) {
    echo "danger";
} else {
    echo 'success';
}
?>">
									    		<p>lstat <pre>Gives information about a file or symbolic link</pre></p>
									    	</blockquote>
											<blockquote class="b-thick <?php
if (function_exists('parse_ini_file')) {
    echo "danger";
} else {
    echo 'success';
}
?>">
									    		<p>parse_ini_file <pre>Parse a configuration file</pre></p>
									    	</blockquote>
											<blockquote class="b-thick <?php
if (function_exists('pathinfo')) {
    echo "danger";
} else {
    echo 'success';
}
?>">
									    		<p>pathinfo <pre>Returns information about a file path</pre></p>
									    	</blockquote>
											<blockquote class="b-thick <?php
if (function_exists('readfile')) {
    echo "danger";
} else {
    echo 'success';
}
?>">
									    		<p>readfile <pre>Outputs a file</pre></p>
									    	</blockquote>
											<blockquote class="b-thick <?php
if (function_exists('readlink')) {
    echo "danger";
} else {
    echo 'success';
}
?>">
									    		<p>readlink <pre>Returns target of a symbolic link</pre></p>
									    	</blockquote>
											<blockquote class="b-thick <?php
if (function_exists('realpath')) {
    echo "danger";
} else {
    echo 'success';
}
?>">
									    		<p>realpath <pre>Returns canonicalized absolute pathname</pre></p>
									    	</blockquote>
											<blockquote class="b-thick <?php
if (function_exists('stat')) {
    echo "danger";
} else {
    echo 'success';
}
?>">
									    		<p>stat <pre>Gives information about a file</pre></p>
									    	</blockquote>
											<blockquote class="b-thick <?php
if (function_exists('gzfile')) {
    echo "danger";
} else {
    echo 'success';
}
?>">
									    		<p>gzfile <pre>Read entire gz-file into an array</pre></p>
									    	</blockquote>
											<blockquote class="b-thick <?php
if (function_exists('readgzfile')) {
    echo "danger";
} else {
    echo 'success';
}
?>">
									    		<p>readgzfile <pre>Output a gz-file</pre></p>
									    	</blockquote>
											<blockquote class="b-thick <?php
if (function_exists('ftp_put')) {
    echo "danger";
} else {
    echo 'success';
}
?>">
									    		<p>ftp_put <pre>Uploads a file to FTP server</pre></p>
									    	</blockquote>
											<blockquote class="b-thick <?php
if (function_exists('ftp_nb_put')) {
    echo "danger";
} else {
    echo 'success';
}
?>">
									    		<p>ftp_nb_put <pre>Stores a file on FTP server (non-blocking)</pre></p>
									    	</blockquote>
											<blockquote class="b-thick <?php
if (function_exists('highlight_file')) {
    echo "danger";
} else {
    echo 'success';
}
?>">
									    		<p>highlight_file <pre>Syntax highlighting of a file</pre></p>
									    	</blockquote>
											<blockquote class="b-thick <?php
if (function_exists('show_source')) {
    echo "danger";
} else {
    echo 'success';
}
?>">
									    		<p>show_source <pre>Alias of highlight_file()</pre></p>
									    	</blockquote>
									</div>
									
									<div id="f5" class="tab-pane">
									    <div class="well"></div>
										    <blockquote class="b-thick <?php
if (function_exists('extract')) {
    echo "danger";
} else {
    echo 'success';
}
?>">
									    		<p>extract <pre>Opens the door for register_globals attacks</pre></p>
									    	</blockquote>
                                            <blockquote class="b-thick <?php
if (function_exists('parse_str')) {
    echo "danger";
} else {
    echo 'success';
}
?>">
									    		<p>parse_str <pre>Works like extract if only one argument is given</pre></p>
									    	</blockquote>
											<blockquote class="b-thick <?php
if (function_exists('putenv')) {
    echo "danger";
} else {
    echo 'success';
}
?>">
									    		<p>putenv <pre>Sets value of an environment variable</pre></p>
									    	</blockquote>
											<blockquote class="b-thick <?php
if (function_exists('ini_set')) {
    echo "danger";
} else {
    echo 'success';
}
?>">
									    		<p>ini_set <pre>Sets value of a configuration option</pre></p>
									    	</blockquote>
											<blockquote class="b-thick <?php
if (function_exists('ini_set')) {
    echo "danger";
} else {
    echo 'success';
}
?>">
									    		<p>mail <pre>Has CRLF Injection in the 3rd parameter, opens the door for spam. </pre></p>
									    	</blockquote>
											<blockquote class="b-thick <?php
if (function_exists('ini_set')) {
    echo "danger";
} else {
    echo 'success';
}
?>">
									    		<p>header <pre>On old systems CRLF injection could be used for xss or other purposes, now it is still a problem if they do a header("location: ..."); and they do not die();. The script keeps executing after a call to header(), and will still print output normally. This is nasty if you are trying to protect an administrative area. </pre></p>
									    	</blockquote>
											<blockquote class="b-thick <?php
if (function_exists('proc_nice')) {
    echo "danger";
} else {
    echo 'success';
}
?>">
									    		<p>proc_nice <pre>Change the priority of current process</pre></p>
									    	</blockquote>
											<blockquote class="b-thick <?php
if (function_exists('proc_terminate')) {
    echo "danger";
} else {
    echo 'success';
}
?>">
									    		<p>proc_terminate <pre>Kills a process opened by proc_open</pre></p>
									    	</blockquote>
											<blockquote class="b-thick <?php
if (function_exists('proc_close')) {
    echo "danger";
} else {
    echo 'success';
}
?>">
									    		<p>proc_close <pre>Close a process opened by proc_open() and return the exit code of that process</pre></p>
									    	</blockquote>
											<blockquote class="b-thick <?php
if (function_exists('pfsockopen')) {
    echo "danger";
} else {
    echo 'success';
}
?>">
									    		<p>pfsockopen <pre>Open persistent Internet or Unix domain socket connection</pre></p>
									    	</blockquote>
											<blockquote class="b-thick <?php
if (function_exists('fsockopen')) {
    echo "danger";
} else {
    echo 'success';
}
?>">
									    		<p>fsockopen <pre>Open Internet or Unix domain socket connection</pre></p>
									    	</blockquote>
											<blockquote class="b-thick <?php
if (function_exists('apache_child_terminate')) {
    echo "danger";
} else {
    echo 'success';
}
?>">
									    		<p>apache_child_terminate <pre>Terminate apache process after request</pre></p>
									    	</blockquote>
											<blockquote class="b-thick <?php
if (function_exists('posix_kill')) {
    echo "danger";
} else {
    echo 'success';
}
?>">
									    		<p>posix_kill <pre>Send a signal to a process</pre></p>
									    	</blockquote>
											<blockquote class="b-thick <?php
if (function_exists('posix_setpgid')) {
    echo "danger";
} else {
    echo 'success';
}
?>">
									    		<p>posix_setpgid <pre>Set process group id for job control</pre></p>
									    	</blockquote>
											<blockquote class="b-thick <?php
if (function_exists('posix_setsid')) {
    echo "danger";
} else {
    echo 'success';
}
?>">
									    		<p>posix_setsid <pre>Make current process a session leader</pre></p>
									    	</blockquote>
											<blockquote class="b-thick <?php
if (function_exists('posix_setuid')) {
    echo "danger";
} else {
    echo 'success';
}
?>">
									    		<p>posix_setuid <pre>Set UID of current process</pre></p>
									    	</blockquote>
									</div>
								</div>
							    </div>

								</div>  
							</section>

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
                                    On this page you can see which vulnerable PHP Functions are enabled on your host.<br />
									If you decide you can disable them from the php.ini file on your host.
								</div>
							</section>
							
							<section class="panel">
								<header class="panel-heading">
									<div class="panel-actions">
										<a href="#" class="fa fa-caret-down"></a>
										<a href="#" class="fa fa-times"></a>
									</div>

									<h2 class="panel-title">How to Disable PHP Functions</h2>
								</header>
								<div class="panel-body">
                                    <ol>
									<li>Find the php.ini file on your host</li>
									<li>Open the php.ini file</li>
									<li>Find disable_functions and set new list as follows: <pre>disable_functions =exec,passthru,shell_exec,system,proc_open,popen,curl_exec,curl_multi_exec,parse_ini_file,show_source</pre></li>
									<li>I also recommend to disable <pre>allow_url_include and allow_url_fopen</pre> for security reasons</li>
									<li>Save and close the file. Restart the HTTPD Server (Apache)</li>
									</ol>
								</div>
							</section>

						</div>
					</div>
					<!-- end: page -->
				</section>
<?php
footer();
?>