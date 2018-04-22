<?php
include "core.php";
head();
?>
				<section role="main" class="content-body">
					<header class="page-header">
						<h2>HTML Encrypter</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="dashboard">
										<i class="fa fa-home"></i>
									</a>
								</li>
                                <li><span>HTML Encrypter &nbsp;&nbsp;&nbsp;</span></li>
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

									<h2 class="panel-title">HTML Encrypter</h2>
									<p class="panel-subtitle">Hide all your HTML source code simply with this html encrypter. Prevent your code from being stolen by other webmasters.</p>
								</header>
								<div class="panel-body">
                                <fieldset>
<?php
@$_SESSION['htmltext-session'] = $_POST['htmltext'];
?>
                                    <div class="col-md-8">
                                        <textarea class="form-control" name="htmltext" rows="10" type="text" required><?php
echo $_SESSION['htmltext-session'];
?></textarea>
                                        
<?php
if (isset($_POST['encrypt'])) {
    
    $htmltext = $_POST['htmltext'];
    $a        = "";
    $b        = "";
    for ($i = 0; $i < strlen($htmltext); $i++) {
        $a = (string) dechex(ord($htmltext[$i]));
        switch (strlen($a)) {
            case 1:
                $b .= "\\u000" . $a;
                break;
            case 2:
                $b .= "\\u00" . $a;
                break;
            case 3:
                $b .= "\\u0" . $a;
                break;
            case 4:
                $b .= "\\u" . $a;
                break;
            default:
        }
    }
    $encrypted = "
<script type=\"text/javascript\">
<!-- HTML Encryption provided by phpGuard PRO -->
<!--
document.write('{$b}')
//-->
</script>
";
    
    echo '<br /><br />
<b>Encrypted HTML Code:</b>
<textarea class="form-control" name="htmltext-encrypted" rows="10" type="text" readonly>' . $encrypted . '</textarea>
</script>
';
    
}
?>     
                                    </div>
                                    <div class="col-md-4">
                                    <p>
                                        <ol>
                                        <li>Insert your HTML code you want to encrypt.
                                        <li>Click <b>Encrypt</b> and copy and paste the <b>Encrypted HTML Code</b> to your website.</li>
                                        </ol>
                                    </p>
                                    </div>
                                    
                                </fieldset>
								</div>
							</section>
                                
                            <input class="btn btn-primary" type="submit" name="encrypt" value="Encrypt">
                                
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
									<b>HTML Encryption</b> means you can convert your web page contents to a non-easily understandable format. This may protect your code from being stolen by others upto great extent. The one limitation of it is that your page will be seen on JavaScript enabled browsers only.
								</div>
							</section>
                            
                            <section class="panel">
								<header class="panel-heading">
									<div class="panel-actions">
										<a href="#" class="fa fa-caret-down"></a>
										<a href="#" class="fa fa-times"></a>
									</div>

									<h2 class="panel-title">Explanation of the HTML encoding proccess</h2>
								</header>
								<div class="panel-body">
HTML has special handling for characters like <b><</b> and <b>></b> symbols, so it doesn't work well with those characters where they shouldn't be.
<br /><br />
Having spurious characters can have some weird effects - blocks of text not appearing, broken formatting, and generally just not seeing what you expect to see.
<br /><br />
This can all be fixed by <b>escaping</b> those characters. This process involves scanning the text for those characters, and replacing them with a special character-code that browsers can interpret as the correct symbol, without actually embedding that symbol in your text.
<br /><br />
For example, the escaped character code for <b>></b> is <b>&amp;gt;</b>.
								</div>
							</section>

						</div>
					</div>
					<!-- end: page -->
				</section>
<?php
footer();
?>