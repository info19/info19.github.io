<ol class="breadcrumb">
  <li><a href="<?php echo base_url() ?>"><?php echo lang("tab_1") ?></a></li>
  <li class="active"><?php echo lang("tab_17") ?></li>
</ol>

<p>This is the install file for the UZY User Management System. You should delete this file after you have setup your application to avoid other user's trying to mess up your settings.</p>

 <?php echo form_open(base_url("install/install_pro")) ?>
<div class="panel panel-default">
	<div class="panel-heading">Install</div>
	<div class="panel-body">
		
		<div class="form-group">
			<div class="row">
				<div class="col-md-6">
			    	<label for="username-in">Admin Email <span class="required full-rounded-corners">REQUIRED</span></label>
			    	<input type="text" class="form-control" id="username-in" name="email" placeholder="Enter email" />
			    </div>
			</div>
	  	</div>
	  	<div class="form-group">
			<div class="row">
				<div class="col-md-6">
			    	<label for="password-in">Admin Password</label>
			    	<input type="password" class="form-control" id="password-in" name="password" />
			    </div>
			</div>
	  	</div>
	  	<div class="form-group">
			<div class="row">
				<div class="col-md-6">
			    	<label for="password2-in">Repeat Admin Password</label>
			    	<input type="password" class="form-control" id="password2-in" name="password2" />
			    </div>
			</div>
	  	</div>
	  	<div class="form-group">
			<div class="row">
				<div class="col-md-6">
			    	<label for="sn-in">Site Name</label>
			    	<input type="text" class="form-control" id="sn-in" name="site_name" value="UZY" />
			    </div>
			</div>
	  	</div>
	  	<div class="form-group">
			<div class="row">
				<div class="col-md-6">
			    	<label for="se-in">Support Email</label>
			    	<input type="text" class="form-control" id="se-in" name="support_email" value="" />
			    	<span class='help-block'>Used to send Email Alerts to users when receiving feedback responses.</span>
			    </div>
			</div>
	  	</div>

	<input type="submit" class="btn btn-primary" name="s" value="Install">
	<?php echo form_close() ?>
	</div>
</div>

				