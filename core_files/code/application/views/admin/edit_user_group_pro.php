<ol class="breadcrumb">
  <li><a href="<?php echo base_url() ?>"><?php echo lang("tab_1") ?></a></li>
  <li><a href="<?php echo base_url("admin") ?>"><?php echo lang("atab_1") ?></a></li>  
  <li class="active"><?php echo lang("atab_16") ?></li>
</ol>

<div class="panel panel-default">
	<div class="panel-heading"><?php echo lang("actn_127") ?></div>
	<div class="panel-body">
	<?php echo form_open(base_url("admin/edit_user_group_pro_pro/" . $group->ID), array("class" => "form-horizontal")) ?>
		<div class="form-group">

			    <label for="name-in" class="col-md-3 label-heading"><?php echo lang("actn_128") ?></label>
			    <div class="col-md-6">
			    	<input type="text" class="form-control" id="name-in" name="name" value="<?php echo $group->name ?>">
			    </div>
	  	</div>
	  	<div class="form-group">

			    <label for="name-in" class="col-md-3 label-heading"><?php echo lang("actn_129") ?></label>
			    <div class="col-md-6">
			    	<select name="access_level">
			    	<?php $levels = array("0" => lang("ul_1"), "1" => lang("ul_2"), 2 => lang("ul_3"), 3 => lang("ul_4")); ?>
			    		<?php foreach($levels as $k=>$v) : ?>
			    			<?php if($k == $group->access_level) : ?>
			    				<option value='<?php echo $k ?>' selected><?php echo $v ?></option>
			    			<?php else : ?>
			    				<option value='<?php echo $k ?>'><?php echo $v ?></option>
			    			<?php endif; ?>
			    		<?php endforeach; ?>
			    	</select>
			    </div>
	  	</div>
	  	<input type="submit" name="s" class="btn btn-primary" value="<?php echo lang("actn_130") ?>" />

	  	<?php echo form_close() ?>

	</div>
</div>