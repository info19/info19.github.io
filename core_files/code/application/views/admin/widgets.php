<ol class="breadcrumb">
  <li><a href="<?php echo base_url() ?>"><?php echo lang("tab_1") ?></a></li>
  <li><a href="<?php echo base_url("admin") ?>"><?php echo lang("atab_1") ?></a></li>  
  <li class="active"><?php echo lang("atab_21") ?></li>
</ol>
<?php echo form_open(base_url("admin/widget_pro"), array("class" => "form-horizontal")) ?>
<div class="panel panel-default">
	<div class="panel-heading"><?php echo lang("actn_204") ?></div>
	<div class="panel-body">
		<div class="form-group">
			<label for="name-in" class="col-md-3 label-heading"><?php echo lang("actn_205") ?></label>
			<div class="col-md-6">
				<input type="checkbox" class=" align-left" id="name-in" name="twitter_widget_global" value="1" <?php if($this->settings->info->twitter_widget_global) echo "checked" ?>>
				<span class="help-block"><?php echo lang("actn_206") ?></span>
			</div>
	  	</div>
	  	<div class="form-group">
			<label for="name-in" class="col-md-3 label-heading"><?php echo lang("actn_207") ?></label>
			<div class="col-md-6">
				<input type="checkbox" class=" align-left" id="name-in" name="twitter_widget_disable" value="1" <?php if($this->settings->info->twitter_widget_disable) echo "checked" ?>>
				<span class="help-block"><?php echo lang("actn_208") ?></span>
			</div>
	  	</div>
	</div>
</div>
<div class="panel panel-default">
	<div class="panel-heading"><?php echo lang("actn_209") ?></div>
	<div class="panel-body">
		<div class="form-group">
			<label for="name-in" class="col-md-3 label-heading"><?php echo lang("actn_210") ?></label>
			<div class="col-md-6">
				<input type="text" class="form-control" id="name-in" name="news_display_limit" value="<?php echo $this->settings->info->news_display_limit ?>">
				<span class="help-block"><?php echo lang("actn_211") ?></span>
			</div>
	  	</div>
		<div class="form-group">
			<label for="name-in" class="col-md-3 label-heading"><?php echo lang("actn_212") ?></label>
			<div class="col-md-6">
				<input type="checkbox" class=" align-left" id="name-in" name="news_widget_global" value="1" <?php if($this->settings->info->news_widget_global) echo "checked" ?>>
				<span class="help-block"><?php echo lang("actn_213") ?></span>
			</div>
	  	</div>
	  	<div class="form-group">
			<label for="name-in" class="col-md-3 label-heading"><?php echo lang("actn_207") ?></label>
			<div class="col-md-6">
				<input type="checkbox" class=" align-left" id="name-in" name="news_widget_disable" value="1" <?php if($this->settings->info->news_widget_disable) echo "checked" ?>>
				<span class="help-block"><?php echo lang("actn_214") ?></span>
			</div>
	  	</div>
	</div>
</div>
<div class="panel panel-default">
	<div class="panel-heading"><?php echo lang("actn_215") ?></div>
	<div class="panel-body">
		<div class="form-group">
			<label for="name-in" class="col-md-3 label-heading"><?php echo lang("actn_216") ?></label>
			<div class="col-md-6">
				<textarea class="form-control" name="advert_code"><?php echo $this->settings->info->advert_code ?></textarea>
				<span class="help-block"><?php echo lang("actn_217") ?></span>
			</div>
	  	</div>
		<div class="form-group">
			<label for="name-in" class="col-md-3 label-heading"><?php echo lang("actn_218") ?></label>
			<div class="col-md-6">
				<input type="checkbox" class=" align-left" id="name-in" name="advert_widget_global" value="1" <?php if($this->settings->info->advert_widget_global) echo "checked" ?>>
				<span class="help-block"><?php echo lang("actn_219") ?></span>
			</div>
	  	</div>
	  	<div class="form-group">
			<label for="name-in" class="col-md-3 label-heading"><?php echo lang("actn_220") ?></label>
			<div class="col-md-6">
				<input type="checkbox" class=" align-left" id="name-in" name="advert_widget_disable" value="1" <?php if($this->settings->info->advert_widget_disable) echo "checked" ?>>
				<span class="help-block"><?php echo lang("actn_221") ?></span>
			</div>
	  	</div>
	</div>
</div>

<input type="submit" name="s" class="btn btn-primary" value="<?php echo lang("actn_222") ?>" />

	  	<?php echo form_close() ?>