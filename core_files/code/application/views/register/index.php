<ol class="breadcrumb">
	<li><a href="<?php echo base_url() ?>"><?php echo lang("tab_1") ?></a></li>
	<li class="active"><?php echo lang("tab_16") ?></li>
</ol>

<p><?php echo lang("ctn_79") ?></p>

<?php if(!empty($fail)) : ?>
	<div class="alert alert-danger"><?php echo $fail ?></div>
<?php endif; ?>

<div class="panel panel-default">
	<div class="panel-heading"><?php echo lang("ctn_80") ?></div>
	<div class="panel-body">
	<?php echo form_open(base_url("register"), array("class" => "form-horizontal")) ?>
		<div class="form-group">

			    <label for="email-in" class="col-md-3 label-heading"><?php echo lang("ctn_81") ?></label>
			    <div class="col-md-6">
			    	<input type="email" class="form-control" id="email-in" name="email" value="<?php if(isset($email)) echo $email; ?>">
			    </div>
	  	</div>

	  	<div class="form-group">

			    <label for="username-in" class="col-md-3 label-heading"><?php echo lang("ctn_109") ?></label>
			    <div class="col-md-6">
			    	<input type="text" class="form-control" id="username" name="username" value="<?php if(isset($username)) echo $username; ?>">
			    </div>
			    <div class="col-md-3">
			    	<input type="button" class="btn btn-warning" value="<?php echo lang("ctn_111") ?>" onclick="checkUsername()" />
			    	<div id="username_check"></div>
			    </div>
	  	</div>

	  	<div class="form-group">

			    <label for="password-in" class="col-md-3 label-heading"><?php echo lang("ctn_82") ?></label>
			    <div class="col-md-6">
			    	<input type="password" class="form-control" id="password-in" name="password" value="">
			    </div>
	  	</div>

	  	<div class="form-group">

			    <label for="cpassword-in" class="col-md-3 label-heading"><?php echo lang("ctn_83") ?></label>
			    <div class="col-md-6">
			    	<input type="password" class="form-control" id="cpassword-in" name="password2" value="">
			    </div>
	  	</div>

	  	<div class="form-group">

			    <label for="name-in" class="col-md-3 label-heading"><?php echo lang("ctn_84") ?></label>
			    <div class="col-md-6">
			    	<input type="text" class="form-control" id="name-in" name="name" value="">
			    </div>
	  	</div>

	  	<div class="form-group">

			    <label for="name-in" class="col-md-3 label-heading"><?php echo lang("ctn_85") ?></label>
			    <div class="col-md-3">
			    	<select class="form-control" name="year">
					<?php
						for($i=date("Y");$i>date("Y")-100;$i--) {
							if($i === $year) {
								echo"<option value='$i' selected>$i</option>";
							} else {
								echo"<option value='$i'>$i</option>";
							}
						}
					?>
					</select>
			    </div>
			    <div class="col-md-3">
			    	<select class="form-control" name="month">
					  <?php
					  	$array = array(lang("c_month1") => 1, lang("c_month2") => 2, lang("c_month3") => 3, lang("c_month4") => 4, lang("c_month5") => 5, lang("c_month6") => 6, lang("c_month7") => 7, lang("c_month8") => 8, lang("c_month9") => 9, lang("c_month10") => 10, lang("c_month11") => 11, lang("c_month12") => 12);
					  	foreach($array as $v=>$k) {
					  		if($k === $month) {
					  			echo"<option value='{$k}' selected>{$v}</option>";
					  		} else {
					  			echo"<option value='{$k}'>{$v}</option>";
					  		}
					  	}
					  ?>
					</select>
			    </div>
			    <div class="col-md-3">
			    	<select class="form-control" name="day">
					  <?php 
					  	for($i=1;$i<=31;$i++) {
					  		if($i === $day) {
					  			echo"<option value='{$i}' selected>{$i}</option>";
					  		} else {
						  		echo"<option value='{$i}'>{$i}</option>";
					  		}
					  	}
					  ?>
					</select>
			    </div>
	  	</div>

  		<div class="form-group">

		    <label for="name-in" class="col-md-3 label-heading"><?php echo lang("ctn_86") ?></label>
		    <div class="col-md-6">
		    	<p><?php echo $cap['image'] ?></p>
				<input type="text" class="form-control" id="captcha-in" name="captcha" placeholder="<?php echo lang("ctn_87") ?>" value="">
		    </div>
  		</div>

  		<div class="form-group">

		    <label for="name-in" class="col-md-3 label-heading"><?php echo lang("ctn_88") ?></label>
		    <div class="col-md-6">
		    	<textarea class="form-control" rows="3"><?php echo lang("ctn_89") ?></textarea>
				<div class="checkbox">
				  <label>
				  <?php if(isset($tou) && $tou === 1) : ?>
				    <input type="checkbox" value="1" name="tou" checked>
				  <?php else : ?>
				  	<input type="checkbox" value="1" name="tou">
				  <?php endif; ?>
				    <?php echo lang("ctn_90") ?>
				  </label>
				</div>
		    </div>
  		</div>

  		<input type="submit" name="s" class="btn btn-primary" value="<?php echo lang("ctn_91") ?>" />

	  	<?php echo form_close() ?>

	</div>
</div>