<ol class="breadcrumb">
    <li><a href="<?php echo base_url() ?>"><?php echo lang("tab_1") ?></a></li>
  <li><a href="<?php echo base_url("admin") ?>"><?php echo lang("atab_1") ?></a></li>  
  <li class="active"><?php echo lang("atab_7") ?></li>
</ol>

<div class="panel panel-default">
	<div class="panel-heading"><?php echo lang("actn_32") ?></div>
	<div class="panel-body">
	<?php echo form_open(base_url("admin/add_user_pro"), array("class" => "form-horizontal")) ?>
		<div class="form-group">

			    <label for="email-in" class="col-md-3 label-heading"><?php echo lang("actn_33") ?></label>
			    <div class="col-md-6">
			    	<input type="email" class="form-control" id="email-in" name="email" value="">
			    </div>
	  	</div>

	  	<div class="form-group">

			    <label for="username-in" class="col-md-3 label-heading"><?php echo lang("actn_235") ?></label>
			    <div class="col-md-6">
			    	<input type="text" class="form-control" id="username-in" name="username" value="">
			    </div>
	  	</div>

	  	<div class="form-group">

			    <label for="password-in" class="col-md-3 label-heading"><?php echo lang("actn_34") ?></label>
			    <div class="col-md-6">
			    	<input type="password" class="form-control" id="password-in" name="password" value="">
			    </div>
	  	</div>

	  	<div class="form-group">

			    <label for="cpassword-in" class="col-md-3 label-heading"><?php echo lang("actn_35") ?></label>
			    <div class="col-md-6">
			    	<input type="password" class="form-control" id="cpassword-in" name="password2" value="">
			    </div>
	  	</div>

	  	<div class="form-group">

			    <label for="name-in" class="col-md-3 label-heading"><?php echo lang("actn_36") ?></label>
			    <div class="col-md-6">
			    	<input type="text" class="form-control" id="name-in" name="name" value="">
			    </div>
	  	</div>

	  	<div class="form-group">

			    <label for="name-in" class="col-md-3 label-heading"><?php echo lang("actn_37") ?></label>
			    <div class="col-md-6">
			    	<select name="groupid" class="form-control">
			    	<?php foreach($groups->result() as $r) : ?>
			    		<option value="<?php echo $r->ID ?>"><?php echo $r->name ?></option>
			    	<?php endforeach; ?>
			    	</select>
			    </div>
	  	</div>

	  	<div class="form-group">

			    <label for="name-in" class="col-md-3 label-heading"><?php echo lang("actn_38") ?></label>
			    <div class="col-md-3">
			    	<select class="form-control" name="year">
					<?php
						for($i=date("Y");$i>date("Y")-100;$i--) {
								echo"<option value='$i'>$i</option>";
						}
					?>
					</select>
			    </div>
			    <div class="col-md-3">
			    	<select class="form-control" name="month">
					  <?php
					  	$array = array(lang("c_month1") => 1, lang("c_month2") => 2, lang("c_month3") => 3, lang("c_month4") => 4, lang("c_month5") => 5, lang("c_month6") => 6, lang("c_month7") => 7, lang("c_month8") => 8, lang("c_month9") => 9, lang("c_month10") => 10, lang("c_month11") => 11, lang("c_month12") => 12);
					  	foreach($array as $v=>$k) {
					  			echo"<option value='{$k}'>{$v}</option>";
					  	}
					  ?>
					</select>
			    </div>
			    <div class="col-md-3">
			    	<select class="form-control" name="day">
					  <?php 
					  	for($i=1;$i<=31;$i++) {
						  		echo"<option value='{$i}'>{$i}</option>";
					  	}
					  ?>
					</select>
			    </div>
	  	</div>

  		<input type="submit" name="s" class="btn btn-primary" value="<?php echo lang("actn_39") ?>" />

	  	<?php echo form_close() ?>

	</div>
</div>