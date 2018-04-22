<?php
include "core.php";
head();
?>
				<section role="main" class="content-body">
					<header class="page-header">
						<h2>PHP Encoder</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="dashboard">
										<i class="fa fa-home"></i>
									</a>
								</li>
                                <li><span>PHP Encoder &nbsp;&nbsp;&nbsp;</span></li>
							</ol>
						</div>
					</header>

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

									<h2 class="panel-title">PHP Encoder</h2>
									<p class="panel-subtitle">Protect PHP source code from easy observation, theft and change by compiling to bytecode.</p>
								</header>
								<div class="panel-body">
                                <fieldset>
<?php
@$_SESSION['phpcode-session'] = $_POST['phpcode'];

function encode_normal($code)
{
    $input   = stripslashes($_POST['phpcode']);
    $output  = $input;
    $output  = gzdeflate("" . $output . "", 9);
    $output  = base64_encode($output);
    $output  = "<?php eval(gzinflate(base64_decode('$output'))); ?>";
    $ilength = strlen($input);
    $olength = strlen($output);
    return $output;
}

function encode_advanced($code, $repeats)
{
    $input  = stripslashes($_POST['phpcode']);
    $output = $input;
    for ($counter = 0; $counter < $repeats - 1; $counter++) {
        $output = gzdeflate("" . $output . "", 9);
        $output = base64_encode($output);
        $output = "<?php eval(gzinflate(base64_decode('$output'))); ?>";
    }
    $output  = gzdeflate("" . $output . "", 9);
    $output  = base64_encode($output);
    $output  = "<?php eval(gzinflate(base64_decode('\n$output'))); ?>";
    $ilength = strlen($input);
    $olength = strlen($output);
    return $output;
}

?>
                                    <div class="col-md-8">
                                        <textarea class="form-control" name="phpcode" rows="10" type="text" required><?php
echo $_SESSION['phpcode-session'];
?></textarea>
                                        <br />
                                        <div class="col-md-12">
                                            
                                        <div class="col-md-6">
                                        <select name="type" required>
                                        <option value="normal" selected>Normal Strength - Encoded</option>
                                        <option value="advanced">Advanced Strength - Encoded</option>
                                        </select>
                                        </div>
                                            
                                        <div class="col-md-6">
                                        <div class="form-group">
											<label class="col-sm-4 control-label">Repeats</label>
											<div class="col-sm-8">
												<div class="row">
                                                    <div class="m-md slider-primary" data-plugin-slider data-plugin-options='{ "value": 10, "range": "min", "max": 50 }' data-plugin-slider-output="#listenSlider">
														<input name="repeats" id="listenSlider" type="hidden" value="10" />
													</div>
													<p class="output">Make <b>10</b> repeats<br />(<i>Only for the Advanced Encoding</i>)</p>
                                                </div>
											</div>
										</div>
                                        </div>
                                        
                                        </div>
                                        
<?php
if (isset($_POST['encrypt'])) {
    
    $phpcode = stripslashes($_POST['phpcode']);
    $type    = $_POST['type'];
    $repeats = $_POST['repeats'];
    
    if ($type == "normal") {
        echo '<br /><br />
<b>Encoded PHP Code:</b>
<textarea class="form-control" name="phpcode-encoded" rows="10" type="text" readonly>' . encode_normal($phpcode) . '</textarea>
</script>
';
    } else {
        echo '<br /><br />
<b>Encoded PHP Code:</b>
<textarea class="form-control" name="phpcode-encoded" rows="10" type="text" readonly>' . encode_advanced($phpcode, $repeats) . '</textarea>
</script>
';
    }
    
}
?>     
                                    </div>
                                    <div class="col-md-4">
                                    <p>
                                        <ol>
                                        <li>Insert your PHP code you want to encode.
                                        <li>Click <b>Encode</b> and copy and paste the <b>Encoded PHP Code</b> to your website.</li>
                                        </ol>
                                    </p>
                                    </div>
                                    
                                </fieldset>
								</div>
							</section>
                                
                            <input class="btn btn-primary" type="submit" name="encrypt" value="Encode">
                                
                            </form>

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
									This tool will encrypt your PHP script using Base64 Encoding.
<br /><br />
Take note that not all PHP scripts can be successfully encoded using this tool. It is recommended that you will test the script first in the development server before deploying it on the production server. This will avoid any possibility of having some encoding bugs undetected after encoding. 
								</div>
							</section>
                            
                            <section class="panel">
								<header class="panel-heading">
									<div class="panel-actions">
										<a href="#" class="fa fa-caret-down"></a>
										<a href="#" class="fa fa-times"></a>
									</div>

									<h2 class="panel-title">Encoding Benefits</h2>
								</header>
								<div class="panel-body">
PHP scripts can be easily read, changed and run on any PHP enabled system. Encoding PHP offers important benefits.
<br /><br />
<ul>
<li><b>Product Developers:</b></li> Protect and license your code before distribution. Time restricting is ideal for protecting evaluation copies, and server/domain based locking helps secure revenue from multiple domain deployments.
<li><b>Website Designers:</b></li> Protect your creative work and a revenue stream from future script updates.
<li><b>Website Owners:</b></li> Hide sensitive data and protect scripts from unauthorised changes that may go unnoticed indefinitely, and be a serious security and data protection risk.
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