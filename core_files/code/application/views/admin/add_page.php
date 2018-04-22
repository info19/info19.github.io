<ol class="breadcrumb">
  <li><a href="<?php echo base_url() ?>"><?php echo lang("tab_1") ?></a></li>
  <li><a href="<?php echo base_url("admin") ?>"><?php echo lang("atab_1") ?></a></li>  
  <li class="active"><?php echo lang("atab_4") ?></li>
</ol>

<div class="panel panel-default">
	<div class="panel-heading"><?php echo lang("actn_13") ?></div>
	<div class="panel-body">
	<?php echo form_open(base_url("admin/add_page_pro"), array("class" => "form-horizontal")) ?>
		<div class="form-group">
			<label for="name-in" class="col-md-3 label-heading"><?php echo lang("actn_14") ?></label>
			<div class="col-md-6">
				<input type="text" class="form-control" id="name-in" name="title" value="">
			</div>
	  	</div>
	  	<div class="form-group">
			<label for="name-in" class="col-md-3 label-heading"><?php echo lang("actn_15") ?></label>
			<div class="col-md-6">
				<select name="catid" class="form-control">
				<?php foreach($categories->result() as $r) : ?>
					<option value='<?php echo $r->ID ?>'><?php echo $r->name ?></option>
				<?php endforeach; ?>
				</select>
			</div>
	  	</div>
	  	<div class="form-group">
			<label for="name-in" class="col-md-3 label-heading"><?php echo lang("actn_16") ?></label>
			<div class="col-md-6">
				<input type="checkbox" name="locked" value="1">
				<span class="help-box"><?php echo lang("actn_17") ?></span>
			</div>
	  	</div>
	  	<div class="form-group">
			<label for="name-in" class="col-md-3 label-heading"><?php echo lang("actn_18") ?></label>
			<div class="col-md-6">
				<select name="groupid" class="form-control">
					<option value="0">None</option>
			    	<?php foreach($groups->result() as $r) : ?>
				    	<option value="<?php echo $r->ID ?>"><?php echo $r->name ?></option>
			    	<?php endforeach; ?>
			    	</select>
				<span class="help-box"><?php echo lang("actn_19") ?></span>
			</div>
	  	</div>
	  	<div class="form-group">
			<label for="name-in" class="col-md-3 label-heading"><?php echo lang("actn_20") ?></label>
			<div class="col-md-12">
				<textarea name="body"></textarea>
			</div>
	  	</div>
	  		<input type="submit" name="s" class="btn btn-primary" value="<?php echo lang("actn_21") ?>" />

	  	<?php echo form_close() ?>
	</div>
</div>	