<ol class="breadcrumb">
  <li><a href="<?php echo base_url() ?>"><?php echo lang("tab_1") ?></a></li>
  <li><a href="<?php echo base_url("admin") ?>"><?php echo lang("atab_1") ?></a></li>  
  <li class="active"><?php echo lang("atab_19") ?></li>
</ol>

<p><?php echo lang("actn_157") ?></p>

<div class="panel panel-default">
	<div class="panel-heading"><?php echo lang("actn_158") ?></div>
	<div class="panel-body">
	<?php echo form_open_multipart(base_url("admin/settings_pro"), array("class" => "form-horizontal")) ?>
		<div class="form-group">
		    <label for="email-in" class="col-md-3 label-heading"><?php echo lang("actn_159") ?></label>
		    <div class="col-md-6">
	    	<?php if(empty($this->settings->info->site_logo)) : ?>
				<img src="<?php echo base_url() ?>images/logo.png" alt="logo" class="logo" />
			<?php else :?>
				<img src="<?php echo base_url() ?><?php echo $this->settings->info->upload_path_relative ?>/<?php echo $this->settings->info->site_logo ?>" alt="logo" class="logo" />
			<?php endif; ?><br />
		    	<input type="file" name="userfile" size="20" />
		    </div>
	  	</div>
		<div class="form-group">
			<label for="name-in" class="col-md-3 label-heading"><?php echo lang("actn_160") ?></label>
			<div class="col-md-6">
				<input type="text" class="form-control" id="name-in" name="site_name" value="<?php echo $this->settings->info->site_name ?>">
			</div>
	  	</div>
	  	<div class="form-group">
			<label for="name-in" class="col-md-3 label-heading"><?php echo lang("actn_161") ?></label>
			<div class="col-md-6">
				<input type="text" class="form-control" id="name-in" name="site_email" value="<?php echo $this->settings->info->support_email ?>">
			</div>
	  	</div>
	  	<div class="form-group">
			<label for="name-in" class="col-md-3 label-heading"><?php echo lang("actn_162") ?></label>
			<div class="col-md-6">
				<input type="text" class="form-control" id="name-in" name="upload_path" value="<?php echo $this->settings->info->upload_path ?>">
				<span class="help-block"><?php echo lang("actn_163") ?></span>
			</div>
	  	</div>
	  	<div class="form-group">
			<label for="name-in" class="col-md-3 label-heading"><?php echo lang("actn_164") ?></label>
			<div class="col-md-6">
				<input type="text" class="form-control" id="name-in" name="upload_path_relative" value="<?php echo $this->settings->info->upload_path_relative ?>">
				<span class="help-block"><?php echo lang("actn_165") ?></span>
			</div>
	  	</div>
	  	<div class="form-group">
			<label for="name-in" class="col-md-3 label-heading"><?php echo lang("actn_223") ?></label>
			<div class="col-md-6">
				<input type="checkbox" class=" align-left" id="name-in" name="disable_social_login" value="1" <?php if($this->settings->info->disable_social_login) echo "checked" ?>>
				<span class="help-block"><?php echo lang("actn_224") ?></span>
			</div>
	  	</div>
	  	<div class="form-group">
			<label for="name-in" class="col-md-3 label-heading"><?php echo lang("actn_225") ?></label>
			<div class="col-md-6">
				<input type="checkbox" class=" align-left" id="name-in" name="fp_social" value="1" <?php if($this->settings->info->fp_social) echo "checked" ?>>
				<span class="help-block"><?php echo lang("actn_226") ?></span>
			</div>
	  	</div>
	  	<div class="form-group">
			<label for="name-in" class="col-md-3 label-heading"><?php echo lang("actn_166") ?></label>
			<div class="col-md-6">
				<input type="checkbox" class=" align-left" id="name-in" name="page_voting" value="1" <?php if($this->settings->info->page_voting) echo "checked" ?>>
				<span class="help-block"><?php echo lang("actn_167") ?></span>
			</div>
	  	</div>
	  	<div class="form-group">
			<label for="name-in" class="col-md-3 label-heading"><?php echo lang("actn_168") ?></label>
			<div class="col-md-6">
				<input type="checkbox" class=" align-left" id="name-in" name="avatar_upload" value="1" <?php if($this->settings->info->avatar_upload) echo "checked" ?>>
				<span class="help-block"><?php echo lang("actn_169") ?></span>
			</div>
	  	</div>
	  	<div class="form-group">
			<label for="name-in" class="col-md-3 label-heading"><?php echo lang("actn_170") ?></label>
			<div class="col-md-6">
				<input type="checkbox" class=" align-left" id="name-in" name="registration" value="1" <?php if($this->settings->info->registration) echo "checked" ?>>
				<span class="help-block"><?php echo lang("actn_171") ?></span>
			</div>
	  	</div>
	  	<div class="form-group">
			<label for="name-in" class="col-md-3 label-heading"><?php echo lang("actn_172") ?></label>
			<div class="col-md-6">
				<input type="checkbox" class=" align-left" id="name-in" name="news_comments" value="1" <?php if($this->settings->info->news_comments) echo "checked" ?>>
				<span class="help-block"><?php echo lang("actn_173") ?></span>
			</div>
	  	</div>
	  	<div class="form-group">
			<label for="name-in" class="col-md-3 label-heading"><?php echo lang("actn_174") ?></label>
			<div class="col-md-6">
				<input type="checkbox" class=" align-left" id="name-in" name="guest_feedback" value="1" <?php if($this->settings->info->guest_feedback) echo "checked" ?>>
				<span class="help-block"><?php echo lang("actn_175") ?></span>
			</div>
	  	</div>
	  	<div class="form-group">
			<label for="name-in" class="col-md-3 label-heading"><?php echo lang("actn_239") ?></label>
			<div class="col-md-6">
				<input type="checkbox" class=" align-left" id="name-in" name="guest_profile" value="1" <?php if($this->settings->info->guest_profile) echo "checked" ?>>
				<span class="help-block"><?php echo lang("actn_175") ?></span>
			</div>
	  	</div>
	  	<div class="form-group">
			<label for="name-in" class="col-md-3 label-heading"><?php echo lang("actn_240") ?></label>
			<div class="col-md-6">
				<input type="checkbox" class=" align-left" id="name-in" name="profile_comments" value="1" <?php if($this->settings->info->profile_comments) echo "checked" ?>>
				<span class="help-block"><?php echo lang("actn_175") ?></span>
			</div>
	  	</div>
	  	<div class="form-group">
			<label for="name-in" class="col-md-3 label-heading"><?php echo lang("actn_176") ?></label>
			<div class="col-md-6">
				<input type="checkbox" class=" align-left" id="name-in" name="mailbox" value="1" <?php if($this->settings->info->mailbox) echo "checked" ?>>
				<span class="help-block"><?php echo lang("actn_177") ?></span>
			</div>
	  	</div>
	  	<div class="form-group">
			<label for="name-in" class="col-md-3 label-heading"><?php echo lang("actn_178") ?></label>
			<div class="col-md-6">
				<select name="themeid" class="form-control">
				<?php foreach($themes->result() as $r) : ?>
					<option value="<?php echo $r->ID ?>" <?php if($r->ID == $this->settings->info->themeid) echo "selected" ?>><?php echo $r->name ?></option>
				<?php endforeach; ?>
				</select>
				<span class="help-block"><?php echo lang("actn_179") ?></span>
			</div>
	  	</div>

	  	<input type="submit" name="s" class="btn btn-primary" value="<?php echo lang("actn_180") ?>" />

	  	<?php echo form_close() ?>
	</div>
</div>