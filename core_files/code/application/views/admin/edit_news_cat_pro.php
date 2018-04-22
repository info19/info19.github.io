<ol class="breadcrumb">
  <li><a href="<?php echo base_url() ?>"><?php echo lang("tab_1") ?></a></li>
  <li><a href="<?php echo base_url("admin") ?>"><?php echo lang("atab_1") ?></a></li>  
  <li class="active"><?php echo lang("atab_11") ?></li>
</ol>

<div class="panel panel-default">
	<div class="panel-heading"><?php echo lang("actn_63") ?></div>
	<div class="panel-body">
	<?php echo form_open(base_url("admin/edit_news_cat_pro_pro/" . $cat->ID), array("class" => "form-horizontal")) ?>
		<div class="form-group">
			<label for="name-in" class="col-md-3 label-heading"><?php echo lang("actn_64") ?></label>
			<div class="col-md-6">
				<input type="text" class="form-control" id="name-in" name="name" value="<?php echo $cat->name ?>">
			</div>
	  	</div>

	  	<input type="submit" name="s" class="btn btn-primary" value="<?php echo lang("actn_65") ?>" />

	  	<?php echo form_close() ?>
	</div>
</div>	