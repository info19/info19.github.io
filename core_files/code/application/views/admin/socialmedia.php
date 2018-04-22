<ol class="breadcrumb">
  <li><a href="<?php echo base_url() ?>"><?php echo lang("tab_1") ?></a></li>
  <li><a href="<?php echo base_url("admin") ?>"><?php echo lang("atab_1") ?></a></li>  
  <li class="active"><?php echo lang("atab_20") ?></li>
</ol>

<p><?php echo lang("actn_181") ?></p>

<div class="panel panel-default">
	<div class="panel-heading"><?php echo lang("actn_182") ?></div>
	<div class="panel-body">
	<?php echo form_open_multipart(base_url("admin/socialmedia_pro"), array("class" => "form-horizontal")) ?>
		<div class="form-group">
			<label for="name-in" class="col-md-3 label-heading"><?php echo lang("actn_183") ?></label>
			<div class="col-md-6">
				<input type="text" class="form-control" id="name-in" name="twitter_name" value="<?php echo $this->settings->info->twitter_name ?>">
				<span class="help-block"><?php echo lang("actn_184") ?></span>
			</div>
	  	</div>
	  	<div class="form-group">
			<label for="name-in" class="col-md-3 label-heading"><?php echo lang("actn_185") ?></label>
			<div class="col-md-6">
				<input type="text" class="form-control" id="name-in" name="twitter_display_limit" value="<?php echo $this->settings->info->twitter_display_limit ?>">
				<span class="help-block"><?php echo lang("actn_186") ?></span>
			</div>
	  	</div>
	  	<div class="form-group">
			<label for="name-in" class="col-md-3 label-heading"><?php echo lang("actn_236") ?></label>
			<div class="col-md-6">
				<input type="text" class="form-control" id="name-in" name="update_tweets" value="<?php echo $this->settings->info->update_tweets ?>">
				<span class="help-block"><?php echo lang("actn_237") ?></span>
			</div>
	  	</div>
	  	<div class="form-group">
			<label for="name-in" class="col-md-3 label-heading"><?php echo lang("actn_187") ?></label>
			<div class="col-md-6">
				<input type="text" class="form-control" id="name-in" name="twitter_consumer_key" value="<?php echo $this->settings->info->twitter_consumer_key ?>">
				<span class="help-block"><?php echo lang("actn_188") ?></span>
			</div>
	  	</div>
	  	<div class="form-group">
			<label for="name-in" class="col-md-3 label-heading"><?php echo lang("actn_189") ?></label>
			<div class="col-md-6">
				<input type="text" class="form-control" id="name-in" name="twitter_consumer_secret" value="<?php echo $this->settings->info->twitter_consumer_secret ?>">
				<span class="help-block"><?php echo lang("actn_190") ?></span>
			</div>
	  	</div>
	  	<div class="form-group">
			<label for="name-in" class="col-md-3 label-heading"><?php echo lang("actn_191") ?></label>
			<div class="col-md-6">
				<input type="text" class="form-control" id="name-in" name="twitter_access_token" value="<?php echo $this->settings->info->twitter_access_token ?>">
				<span class="help-block"><?php echo lang("actn_192") ?></span>
			</div>
	  	</div>
	  	<div class="form-group">
			<label for="name-in" class="col-md-3 label-heading"><?php echo lang("actn_193") ?></label>
			<div class="col-md-6">
				<input type="text" class="form-control" id="name-in" name="twitter_access_secret" value="<?php echo $this->settings->info->twitter_access_secret ?>">
				<span class="help-block"><?php echo lang("actn_194") ?></span>
			</div>
	  	</div>
	  	<div class="form-group">
			<label for="name-in" class="col-md-3 label-heading"><?php echo lang("actn_227") ?></label>
			<div class="col-md-6">
				<input type="text" class="form-control" id="name-in" name="facebook_app_id" value="<?php echo $this->settings->info->facebook_app_id ?>">
				<span class="help-block"><?php echo lang("actn_228") ?></span>
			</div>
	  	</div>
	  	<div class="form-group">
			<label for="name-in" class="col-md-3 label-heading"><?php echo lang("actn_229") ?></label>
			<div class="col-md-6">
				<input type="text" class="form-control" id="name-in" name="facebook_app_secret" value="<?php echo $this->settings->info->facebook_app_secret ?>">
				<span class="help-block"><?php echo lang("actn_230") ?></span>
			</div>
	  	</div>
	  	<div class="form-group">
			<label for="name-in" class="col-md-3 label-heading"><?php echo lang("actn_231") ?></label>
			<div class="col-md-6">
				<input type="text" class="form-control" id="name-in" name="google_client_id" value="<?php echo $this->settings->info->google_client_id ?>">
				<span class="help-block"><?php echo lang("actn_232") ?></span>
			</div>
	  	</div>
	  	<div class="form-group">
			<label for="name-in" class="col-md-3 label-heading"><?php echo lang("actn_233") ?></label>
			<div class="col-md-6">
				<input type="text" class="form-control" id="name-in" name="google_client_secret" value="<?php echo $this->settings->info->google_client_secret ?>">
				<span class="help-block"><?php echo lang("actn_234") ?></span>
			</div>
	  	</div>
	  	<div class="form-group">
			<label for="name-in" class="col-md-3 label-heading"><?php echo lang("actn_195") ?></label>
			<div class="col-md-6">
				<input type="text" class="form-control" id="name-in" name="skype_name" value="<?php echo $this->settings->info->skype_name ?>">
				<span class="help-block"><?php echo lang("actn_196") ?></span>
			</div>
	  	</div>
	  	<div class="form-group">
			<label for="name-in" class="col-md-3 label-heading"><?php echo lang("actn_197") ?></label>
			<div class="col-md-6">
				<input type="text" class="form-control" id="name-in" name="facebook_name" value="<?php echo $this->settings->info->facebook_name ?>">
				<span class="help-block"><?php echo lang("actn_198") ?></span>
			</div>
	  	</div>
	  	<div class="form-group">
			<label for="name-in" class="col-md-3 label-heading"><?php echo lang("actn_199") ?></label>
			<div class="col-md-6">
				<input type="text" class="form-control" id="name-in" name="google_name" value="<?php echo $this->settings->info->google_name ?>">
				<span class="help-block"><?php echo lang("actn_200") ?></span>
			</div>
	  	</div>
	  	<div class="form-group">
			<label for="name-in" class="col-md-3 label-heading"><?php echo lang("actn_201") ?></label>
			<div class="col-md-6">
				<input type="text" class="form-control" id="name-in" name="wordpress_name" value="<?php echo $this->settings->info->wordpress_name ?>">
				<span class="help-block"><?php echo lang("actn_202") ?></span>
			</div>
	  	</div>

	<input type="submit" name="s" class="btn btn-primary" value="<?php echo lang("actn_203") ?>" />

	  	<?php echo form_close() ?>
	</div>
</div>  	