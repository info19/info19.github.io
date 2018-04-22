<ol class="breadcrumb">
  <li><a href="<?php echo base_url() ?>"><?php echo lang("tab_1") ?></a></li>
  <li><a href="<?php echo base_url("admin") ?>"><?php echo lang("atab_1") ?></a></li>  
  <li class="active"><?php echo lang("atab_3") ?></li>
</ol>

<div class="panel panel-default">
	<div class="panel-heading"><?php echo lang("actn_10") ?></div>
	<div class="panel-body">
	<?php echo form_open(base_url("admin/add_news_cat_pro"), array("class" => "form-horizontal")) ?>
		<div class="form-group">
			<label for="name-in" class="col-md-3 label-heading"><?php echo lang("actn_11") ?></label>
			<div class="col-md-6">
				<input type="text" class="form-control" id="name-in" name="name" value="">
			</div>
	  	</div>

	  	<input type="submit" name="s" class="btn btn-primary" value="<?php echo lang("actn_12") ?>" />

	  	<?php echo form_close() ?>
	</div>
</div>	