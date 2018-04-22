<ol class="breadcrumb">
  <li><a href="<?php echo base_url() ?>"><?php echo lang("tab_1") ?></a></li>
  <li><a href="<?php echo base_url("admin") ?>"><?php echo lang("atab_1") ?></a></li>  
  <li class="active"><?php echo lang("atab_8") ?></li>
</ol>

<div class="panel panel-default">
	<div class="panel-heading"><?php echo lang("actn_40") ?></div>
	<div class="panel-body">
	<?php echo form_open(base_url("admin/add_user_group_pro"), array("class" => "form-horizontal")) ?>
		<div class="form-group">

			    <label for="name-in" class="col-md-3 label-heading"><?php echo lang("actn_41") ?></label>
			    <div class="col-md-6">
			    	<input type="text" class="form-control" id="name-in" name="name" value="">
			    </div>
	  	</div>
	  	<div class="form-group">

			    <label for="name-in" class="col-md-3 label-heading"><?php echo lang("actn_42") ?></label>
			    <div class="col-md-6">
			    	<select name="access_level">
			    		<option value="0"><?php echo lang("ul_1") ?></option>
			    		<option value="1"><?php echo lang("ul_2") ?></option>
			    		<option value="2"><?php echo lang("ul_3") ?></option>
			    		<option value="3"><?php echo lang("ul_4") ?></option>
			    	</select>
			    </div>
	  	</div>
	  	<input type="submit" name="s" class="btn btn-primary" value="<?php echo lang("actn_43") ?>" />

	  	<?php echo form_close() ?>

	</div>
</div>