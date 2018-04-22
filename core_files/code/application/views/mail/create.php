<ol class="breadcrumb">
  <li><a href="<?php echo base_url() ?>"><?php echo lang("tab_1") ?></a></li>
  <li><a href="<?php echo base_url("mail") ?>"><?php echo lang("tab_8") ?></a></li>
  <li class="active"><?php echo lang("tab_9") ?></li>
</ol>

  <div class="panel panel-default">
  <div class="panel-body">
<ul class="nav nav-pills">
  <li><a href="<?php echo base_url("mail") ?>"><?php echo lang("ctn_31") ?></a></li>
  <li class="active"><a href="<?php echo base_url("mail/create") ?>"><?php echo lang("ctn_32") ?></a></li>
  <li><a href="<?php echo base_url("mail/block") ?>"><?php echo lang("ctn_33") ?></a></li>
</ul>
</div>
</div>

<p class="decent-margin-top decent-margin-bottom"><?php echo lang("ctn_39") ?></p>

<div class="panel panel-default">
	<div class="panel-heading"><?php echo lang("ctn_40") ?></div>
	<div class="panel-body">
	<?php echo form_open(base_url("mail/create_pro"), array("class" => "form-horizontal")) ?>
		<div class="form-group">

			    <label for="email-in" class="col-md-3 label-heading"><?php echo lang("ctn_41") ?></label>
			    <div class="col-md-6">
			    	<input type="text" class="form-control" id="email-in" name="username" placeholder="<?php echo lang("ctn_42") ?>" value="<?php echo $username ?>">
			    </div>
	  	</div>

	  	<div class="form-group">

			    <label for="name-in" class="col-md-3 label-heading"><?php echo lang("ctn_43") ?></label>
			    <div class="col-md-6">
			    	<input type="text" class="form-control" id="name-in" name="title">
			    </div>
	  	</div>

	  	<div class="form-group">

			    <label for="name-in" class="col-md-3 label-heading"><?php echo lang("ctn_44") ?></label>
			    <div class="col-md-6">
			    	<textarea name="body" class="form-control" rows="5"></textarea>
			    </div>
	  	</div>

	  	<input type="submit" name="s" class="btn btn-primary" value="<?php echo lang("ctn_45") ?>" />

	  	<?php echo form_close() ?>
	</div>
</div>