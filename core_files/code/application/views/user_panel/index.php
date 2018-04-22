<ol class="breadcrumb">
  <li><a href="<?php echo base_url() ?>"><?php echo lang("tab_1") ?></a></li>
  <li class="active"><?php echo lang("tab_17") ?></li>
</ol>

<p><?php echo lang("ctn_92") ?></p>

<div class="panel panel-default">
	<div class="panel-heading"><?php echo lang("ctn_93") ?></div>
	<div class="panel-body">
	<?php echo form_open_multipart(base_url("user_panel/go"), array("class" => "form-horizontal")) ?>
	<div class="form-group">

			    <label for="email-in" class="col-md-3 label-heading"><?php echo lang("ctn_94") ?></label>
			    <div class="col-md-6">
			    	<img src="<?php echo base_url() ?><?php echo $this->settings->info->upload_path_relative ?>/<?php echo $this->user->info->avatar ?>" /><br />
			    	<?php if(!$this->settings->info->avatar_upload) : ?>
				    	<input type="file" name="userfile" size="20" />
				    <?php endif; ?>
			    </div>
	  	</div>

		<div class="form-group">

			    <label for="email-in" class="col-md-3 label-heading"><?php echo lang("ctn_95") ?></label>
			    <div class="col-md-6">
			    	<input type="email" class="form-control" id="email-in" name="email" value="<?php echo $this->user->info->email ?>">
			    </div>
	  	</div>

	  	<div class="form-group">

			    <label for="name-in" class="col-md-3 label-heading"><?php echo lang("ctn_96") ?></label>
			    <div class="col-md-6">
			    	<input type="text" class="form-control" id="name-in" name="name" value="<?php echo $this->user->info->name ?>">
			    </div>
	  	</div>

	  	<div class="form-group">

			    <label for="name-in" class="col-md-3 label-heading"><?php echo lang("ctn_117") ?></label>
			    <div class="col-md-6">
			    	<textarea class="form-control" name="profile_text"><?php echo $this->user->info->profile_text ?></textarea>
			    </div>
	  	</div>
	  	<div class="form-group">

			    <label for="name-in" class="col-md-3 label-heading"><?php echo lang("ctn_118") ?></label>
			    <div class="col-md-6">
			    	<input type="checkbox" class=" align-left" id="name-in" name="profile_comments" value="1" <?php if($this->user->info->profile_comments) echo "checked" ?>>
			    </div>
	  	</div>

	  	<input type="submit" name="s" class="btn btn-primary" value="<?php echo lang("ctn_97") ?>" />

	  	<?php echo form_close() ?>
	</div>
</div>

<div class="panel panel-default">
	<div class="panel-heading"><?php echo lang("ctn_98") ?></div>
	<div class="panel-body">
	<?php echo form_open(base_url("user_panel/changepw"), array("class" => "form-horizontal")) ?>
		<div class="form-group">

			    <label for="password-in" class="col-md-3 label-heading"><?php echo lang("ctn_99") ?></label>
			    <div class="col-md-6">
			    	<input type="password" class="form-control" id="password-in" name="password" >
			    </div>
	  	</div>

	  	<div class="form-group">

			    <label for="npassword-in" class="col-md-3 label-heading"><?php echo lang("ctn_100") ?></label>
			    <div class="col-md-6">
			    	<input type="password" class="form-control" id="npassword-in" name="npassword" >
			    </div>
	  	</div>
	  	<div class="form-group">

			    <label for="npassword-in2" class="col-md-3 label-heading"><?php echo lang("ctn_101") ?></label>
			    <div class="col-md-6">
			    	<input type="password" class="form-control" id="npassword-in2" name="npassword2" >
			    </div>
	  	</div>

	  	<input type="submit" name="s" class="btn btn-primary" value="<?php echo lang("ctn_102") ?>" />

	  	<?php echo form_close() ?>
	</div>
</div>
