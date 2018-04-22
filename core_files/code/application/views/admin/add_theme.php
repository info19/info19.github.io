<ol class="breadcrumb">
  <li><a href="<?php echo base_url() ?>"><?php echo lang("tab_1") ?></a></li>
  <li><a href="<?php echo base_url("admin") ?>"><?php echo lang("atab_1") ?></a></li>  
  <li class="active"><?php echo lang("atab_6") ?></li>
</ol>

<div class="panel panel-default">
	<div class="panel-heading"><?php echo lang("actn_25") ?></div>
	<div class="panel-body">
	<?php echo form_open(base_url("admin/add_theme_pro"), array("class" => "form-horizontal")) ?>
		<div class="form-group">
			<label for="name-in" class="col-md-3 label-heading"><?php echo lang("actn_26") ?></label>
			<div class="col-md-6">
				<input type="text" class="form-control" id="name-in" name="name" value="">
			</div>
	  	</div>
	  	<div class="form-group">
			<label for="name-in" class="col-md-3 label-heading"><?php echo lang("actn_27") ?></label>
			<div class="col-md-6">
				<input type="text" class="form-control" id="name-in" name="css_file" value="">
				<span class="help-box"><?php echo lang("actn_28") ?></span>
			</div>
	  	</div>
	  	<div class="form-group">
			<label for="name-in" class="col-md-3 label-heading"><?php echo lang("actn_29") ?></label>
			<div class="col-md-6">
				<textarea name="css_extra_files" class="form-control"></textarea>
				<span class="help-box"><?php echo lang("actn_30") ?></span>
			</div>
	  	</div>
	  		<input type="submit" name="s" class="btn btn-primary" value="<?php echo lang("actn_31") ?>" />

	  	<?php echo form_close() ?>
	</div>
</div>	