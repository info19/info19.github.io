<script src="<?php echo base_url();?>scripts/check_username.js"></script>
<ol class="breadcrumb">
  <li><a href="<?php echo base_url() ?>"><?php echo lang("tab_1") ?></a></li>
  <li class="active"><?php echo lang("ctn_106") ?></li>
</ol>

<p><?php echo lang("ctn_107") ?></p>

<div class="panel panel-default">
	<div class="panel-heading"><?php echo lang("ctn_108") ?></div>
	<div class="panel-body">
	<?php echo form_open(base_url("home/add_username/"), array("class" => "form-horizontal")) ?>
	<div class="form-group">

			    <label for="username" class="col-md-3 label-heading"><?php echo lang("ctn_109") ?></label>
			    <div class="col-md-6">
			    	<input type="text" class="form-control" id="username" name="username" value="">
			    </div>
			    <div class="col-md-3">
			    	<input type="button" class="btn btn-warning" value="<?php echo lang("ctn_111") ?>" onclick="checkUsername()" />
			    	<div id="username_check"></div>
			    </div>
	  	</div>
	  	<input type="submit" class="btn btn-primary" value="<?php echo lang("ctn_110") ?>" />
	<?php echo form_close() ?>
	</div>
</div>