<?php
include "core.php";
head();
?>
				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Password Generator</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="dashboard">
										<i class="fa fa-home"></i>
									</a>
								</li>
                                <li><span>Password Generator &nbsp;&nbsp;&nbsp;</span></li>
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

									<h2 class="panel-title">Quick Password Generator</h2>
									<p class="panel-subtitle">Creates a quick password of numbers &amp; lowercase letters.</p>
								</header>
								<div class="panel-body">
                            <div class="row">
                            <div class="col-md-2">
                                <form method="post">
                                    <button type="submit" name="quick-generate" class="btn btn-primary">Generate<br />(8 Characters)</button>
                                    <input name="length" type="hidden" value="8">
                                </form>
                            </div>
							<div class="col-md-2">
                                <form method="post">
                                    <button type="submit" name="quick-generate" class="btn btn-primary">Generate<br />(12 Characters)</button>
                                    <input name="length" type="hidden" value="12">
                                </form>
                            </div>
                            <div class="col-md-2">
                                <form method="post">
                                    <button type="submit" name="quick-generate" class="btn btn-primary">Generate<br />(16 Characters)</button>
                                    <input name="length" type="hidden" value="16">
                                </form>
                            </div>
<?php
if (isset($_POST['quick-generate'])) {
    $chars     = "abcdefghijklmnopqrstuvwxyz0123456789";
    $length    = $_POST['length'];
    $gpassword = substr(str_shuffle($chars), 0, $length);
}
?>
							<div class="col-md-6">Generated Password: <input type="text" size="16" maxlength="16" class="form-control" placeholder="No generated password" value="<?php
echo @$gpassword;
?>" readonly></div>
                            </div>
								</div>
							</section>
                            
                            <section class="panel">
								<header class="panel-heading">
									<div class="panel-actions">
										<a href="#" class="fa fa-caret-down"></a>
										<a href="#" class="fa fa-times"></a>
									</div>

									<h2 class="panel-title">Advanced Password Generator</h2>
									<p class="panel-subtitle">Create highly secure passwords that are difficult to crack or guess.</p>
								</header>
								<div class="panel-body">

                                    <div class="row">
                                        <div class="col-md-8">
<?php
$passwords = array();
if (isset($_POST['advanced-generate'])) {
    $length         = $_POST['length'];
    $lcase_letters  = "abcdefghijklmnopqrstuvwxyz";
    $upcase_letters = strtoupper($lcase_letters);
    $digits         = "0123456789";
    $spec_chars     = $_POST['spec-chars'];
    $amount         = $_POST['amount'];
    $chars          = "";
    
    if (isset($_POST['lcase-letters']) && $_POST['lcase-letters'] == 'On')
        $chars .= $lcase_letters;
    
    if (isset($_POST['upcase-letters']) && $_POST['upcase-letters'] == 'On')
        $chars .= $upcase_letters;
    
    if (isset($_POST['digits']) && $_POST['digits'] == 'On')
        $chars .= $digits;
    
    if (isset($_POST['spec-chars']))
        $chars .= $spec_chars;
    
    for ($x = 1; $x <= $amount; $x++) {
        $len = strlen($chars);
        $pw  = "";
        for ($y = 1; $y <= $length; $y++) {
            $pw .= substr($chars, rand(0, $len - 1), 1);
            $pw = str_shuffle($pw);
        }
        $passwords[] = $pw;
    }
}
?>
                                        <form method="post" class="form-horizontal form-bordered">
								
										<div class="form-group">
											<label class="col-sm-4 control-label">Amount</label>
											<div class="col-sm-8">
												<div class="row">
                                                    <div class="m-md slider-primary" data-plugin-slider data-plugin-options='{ "value": 50, "range": "min", "max": 100 }' data-plugin-slider-output="#listenSlider">
														<input name="amount" id="listenSlider" type="hidden" value="50" />
													</div>
													<p class="output">Make <b>50</b> passwords</p>
                                                </div>
											</div>
										</div>
                                        <div class="form-group">
											<label class="col-sm-4 control-label">Length</label>
											<div class="col-sm-8">
												<div class="row">
                                                    <div class="m-md slider-primary" data-plugin-slider data-plugin-options='{ "value": 16, "range": "min", "max": 32 }' data-plugin-slider-output="#listenSlider2">
														<input name="length" id="listenSlider2" type="hidden" value="16" />
													</div>
													<p class="output2">of <b>16</b> characters each</p>
                                                </div>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-4 control-label">Characters To Include</label>
											<div class="col-sm-8">
												<div class="switch switch-sm switch-success">
														<input type="checkbox" name="lcase-letters" data-plugin-ios-switch checked="checked" value="On"/>
												</div> Lower-case letters&nbsp;&nbsp;&nbsp;<kbd>abcdefghijklmnopqrstuvwxyz</kbd><br />
                                                <div class="switch switch-sm switch-success">
														<input type="checkbox" name="upcase-letters" data-plugin-ios-switch checked="checked" value="On"/>
												</div> Upper-case letters&nbsp;&nbsp;&nbsp;<kbd>ABCDEFGHIJKLMNOPQRSTUVWXYZ</kbd><br />
                                                <div class="switch switch-sm switch-success">
														<input type="checkbox" name="digits" data-plugin-ios-switch checked="checked" value="On"/>
												</div> Digits&nbsp;&nbsp;&nbsp;<kbd>0123456789</kbd><br /><br />
                                                <input class="form-control" name="spec-chars" value="!#$%&()*+-=?[]{}|~">
                                                Special characters to include (e.g. <kbd>!#$%&()*+-=?[]{}|~</kbd>). Repeat characters to increase frequency in the password(s).
											</div>
                                            
										</div>
                                        </div>
                                        <div class="col-md-4">
                                            Generated Password(s):
                                            <div class="well">
                                            <?php
if (isset($_POST['advanced-generate'])) {
    $i = 1;
    foreach ($passwords as $pass) {
        echo "<b>" . $i . ". </b>" . $pass . "<br />";
        $i++;
    }
}
?>
                                            </div>
                                        </div>
                                    </div>
                                    
								</div>
                                <footer class="panel-footer">
										<button type="submit" name="advanced-generate" class="btn btn-primary">Generate</button>
                                        <button type="reset" class="btn btn-default">Reset</button>
								</footer>
                                </form>
							</section>
                            
                            <section class="panel">
								<header class="panel-heading">
									<div class="panel-actions">
										<a href="#" class="fa fa-caret-down"></a>
										<a href="#" class="fa fa-times"></a>
									</div>

									<h2 class="panel-title">Strong Password Definition</h2>
									<p class="panel-subtitle">Tips for creating strong and secured password.</p>
								</header>
								<div class="panel-body">

                                    <div class="row">
                                        <div class="col-md-5">
                                        <b>A strong password:</b>
                                            <ul>
                                                <li>…has at least <strong>15 characters</strong></li>
                                                <li>…has <strong>uppercase letters</strong></li>
                                                <li>…has <strong>lowercase letters</strong></li>
                                                <li>…has <strong>numbers</strong></li>
                                                <li>…is <strong>not</strong> like your <strong>previous passwords</strong></li>
                                                <li>…is <strong>not</strong> your <strong>name</strong></li>
                                                <li>…is <strong>not</strong> your <strong>login</strong></li>
                                            </ul>
                                        </div>
                                        <div class="col-md-7">
                                            <ul>
                                                <li>…is <strong>not</strong> your <strong>friend’s name</strong></li>
                                                <li>…is <strong>not</strong> your <strong>family member’s name</strong></li>
                                                <li>…is <strong>not</strong> a dictionary <strong>word</strong></li>
                                                <li>…is <strong>not</strong> a <strong>common name</strong></li>
                                                <li>…is <strong>not</strong> a <strong>keyboard pattern</strong>, such as <kbd>qwerty</kbd>, <kbd>asdfghjkl</kbd>, or <kbd>12345678</kbd></li>
                                                <li>…has <strong>symbols</strong>, such as <kbd>` ! " ? $ ? % ^ &amp; * ( ) _ - + = { [ } ] : ; @ ' ~ # | \ &lt; , &gt; . ? /</kbd></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <br />
                                    <div class="well">
        <strong>To prevent your passwords from being hacked by social engineering, brute force or dictionary attack method, you should notice that:</strong>
        <ol>
		<li>Do not use the same password for multiple important accounts.</li>
		<li>Use a password that has at least 15 characters, use at least one number, one uppercase letter, one lowercase letter and one special symbol.</li>
		<li>Do not use the names of your families, friends or pets in your passwords.</li>
        <li>Do not use postcodes, house numbers, phone numbers, birthdates, ID card numbers, social security numbers, and so on in your passwords.</li>
		<li>Do not use any dictionary word in your passwords.</li>
		<li>Do not let your Web browsers( FireFox, Chrome, Safari, Opera, IE ) store your passwords, since all passwords saved in Web browsers can be revealed easily.</li>
		<li>Do not log in to important accounts on the computers of others, or when connected to a public Wi-Fi hotspot, Tor, free VPN or web proxy.</li>
		<li>Do not send sensitive information online via HTTP or FTP connections, because messages in these connections can be sniffed with very little effort. You should use encrypted connections such as HTTPS and SFTP whenever possible.</li>
		<li>It's recommended to change your passwords every 10 weeks.</li>
		<li>It's recommended that you remember a few master passwords, store other passwords in a plain text file and encrypt this file with 7-Zip, GPG or a disk encryption software such as BitLocker, or manage your passwords with a password management software such as iPassword Generator.</li>
		<li>Turn on 2-step authentication whenever possible.</li>
		<li>Do not store your critical passwords in the cloud.</li>
		<li>Access important websites( e.g. Paypal ) from bookmarks directly, otherwise please check its domain name carefully, it's a good idea to check the popularity of a website with Alexa toolbar to ensure that it's not a phishing site before entering your password.</li>
		<li>Protect your computer with firewall and antivirus software, only download software from reputable sites, and verify the MD5 or SHA1 checksum of the installation package whenever possible, it can be done easily online at OnlineMD5.com.</li>
		<li>If you're a webmaster, do not store the users passwords in the database, you should store the ( MD5 or SHA1 )hash values of passwords instead.</li>
        </ol>
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
									Use the <strong>Password Generator</strong> to create highly secure passwords that are difficult to crack or guess. Just select the criteria for the passwords you need, and click "Generate Password(s)". Remember, the more options you choose, the more secure the passwords will be.
								</div>
							</section>
                            
                            <section class="panel">
								<header class="panel-heading">
									<div class="panel-actions">
										<a href="#" class="fa fa-caret-down"></a>
										<a href="#" class="fa fa-times"></a>
									</div>

									<h2 class="panel-title">How To Remember Your Passwords</h2>
								</header>
								<div class="panel-body">
                                    <ul>
                                        <li>Use a password manager</li>
                                        <li>…or write down your passwords.</li>
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