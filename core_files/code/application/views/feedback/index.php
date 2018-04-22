<ol class="breadcrumb">
  <li><a href="<?php echo base_url() ?>"><?php echo lang("tab_1") ?></a></li>
  <li class="active"><?php echo lang("tab_3") ?></li>
</ol>

<p><?php echo lang("ctn_2") ?></p>

<div class="panel panel-default">
	<div class="panel-heading"><?php echo lang("ctn_3") ?></div>
	<div class="panel-body">
	<?php echo form_open(base_url("feedback/go"), array("class" => "form-horizontal")) ?>
		<div class="form-group">

			    <label for="email-in" class="col-md-3 label-heading"><?php echo lang("ctn_4") ?></label>
			    <div class="col-md-6">
			    	<input type="email" class="form-control" id="email-in" name="email" value="<?php echo $email ?>">
			    </div>
	  	</div>

	  	<div class="form-group">

			    <label for="name-in" class="col-md-3 label-heading"><?php echo lang("ctn_5") ?></label>
			    <div class="col-md-6">
			    	<input type="text" class="form-control" id="name-in" name="name" value="<?php echo $name ?>">
			    </div>
	  	</div>

	  	<div class="form-group">

			    <label for="title-in" class="col-md-3 label-heading"><?php echo lang("ctn_6") ?></label>
			    <div class="col-md-6">
			    	<input type="text" class="form-control" id="title-in" name="title" value="">
			    </div>
	  	</div>

	  	<div class="form-group">

			    <label for="title-in" class="col-md-3 label-heading"><?php echo lang("ctn_7") ?></label>
			    <div class="col-md-6">
			    	<textarea class="form-control" rows="3" name="message"></textarea>
			    </div>
	  	</div>

	  	<div class="form-group">

		    <label for="name-in" class="col-md-3 label-heading"><?php echo lang("ctn_8") ?></label>
		    <div class="col-md-6">
		    	<p><?php echo $cap['image'] ?></p>
				<input type="text" class="form-control" id="captcha-in" name="captcha" placeholder="<?php echo lang("ctn_9") ?>" value="">
		    </div>
  		</div>

	  	<input type="submit" name="s" class="btn btn-primary" value="<?php echo lang("ctn_10") ?>" />

	  	<?php echo form_close() ?>
	</div>
</div>