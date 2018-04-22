<ol class="breadcrumb">
  <li><a href="<?php echo base_url() ?>"><?php echo lang("tab_1") ?></a></li>
  <li><a href="<?php echo base_url("admin") ?>"><?php echo lang("atab_1") ?></a></li>  
  <li class="active"><?php echo lang("atab_14") ?></li>
</ol>

<div class="panel panel-default">
	<div class="panel-heading"><?php echo lang("actn_105") ?></div>
	<div class="panel-body">
	<?php echo form_open(base_url("admin/edit_theme_pro_pro/" . $theme->ID), array("class" => "form-horizontal")) ?>
		<div class="form-group">
			<label for="name-in" class="col-md-3 label-heading"><?php echo lang("actn_106") ?></label>
			<div class="col-md-6">
				<input type="text" class="form-control" id="name-in" name="name" value="<?php echo $theme->name ?>">
			</div>
	  	</div>
	  	<div class="form-group">
			<label for="name-in" class="col-md-3 label-heading"><?php echo lang("actn_107") ?></label>
			<div class="col-md-6">
				<input type="text" class="form-control" id="name-in" name="css_file" value="<?php echo $theme->css_file ?>">
				<span class="help-box"><?php echo lang("actn_108") ?></span>
			</div>
	  	</div>
	  	<div class="form-group">
			<label for="name-in" class="col-md-3 label-heading"><?php echo lang("actn_109") ?></label>
			<div class="col-md-6">
				<textarea name="css_extra_files" class="form-control"><?php echo $theme->css_extra_files ?></textarea>
				<span class="help-box"><?php echo lang("actn_110") ?></span>
			</div>
	  	</div>
	  		<input type="submit" name="s" class="btn btn-primary" value="<?php echo lang("actn_111") ?>" />

	  	<?php echo form_close() ?>
	</div>
</div>	