<ol class="breadcrumb">
  <li><a href="<?php echo base_url() ?>"><?php echo lang("tab_1") ?></a></li>
  <li><a href="<?php echo base_url("admin") ?>"><?php echo lang("atab_1") ?></a></li>  
  <li class="active"><?php echo lang("atab_18") ?></li>
</ol>

<div class="panel panel-default">
	<div class="panel-heading"><?php echo lang("actn_150") ?></div>
	<div class="panel-body">
	<?php echo form_open(base_url("admin/search_user_pro"), array("class" => "form-horizontal")) ?>
		<div class="form-group">

			    <label for="email-in" class="col-md-3 label-heading"><?php echo lang("actn_151") ?></label>
			    <div class="col-md-6">
			    	<input type="text" class="form-control" id="email-in" name="search" value="">
			    </div>
	  	</div>

	  	<div class="form-group">

			    <label for="email-in" class="col-md-3 label-heading"><?php echo lang("actn_152") ?></label>
			    <div class="col-md-6">
			    	<select name="type" class="form-control">
			    	<option value="0"><?php echo lang("actn_153") ?></option>
			    	<option value="1"><?php echo lang("actn_154") ?></option>
			    	<option value="2"><?php echo lang("actn_155") ?></option>
			    </select>
			    </div>
	  	</div>

	  	<input type="submit" name="s" class="btn btn-primary" value="<?php echo lang("actn_156") ?>" />

	  	<?php echo form_close() ?>
	</div>
</div>