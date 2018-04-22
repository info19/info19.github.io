<ol class="breadcrumb">
  <li><a href="<?php echo base_url() ?>"><?php echo lang("tab_1") ?></a></li>
  <li><a href="<?php echo base_url("admin") ?>"><?php echo lang("atab_1") ?></a></li>  
  <li class="active"><?php echo lang("atab_17") ?></li>
</ol>

<div class="panel panel-default">
	<div class="panel-heading"><?php echo $r->title ?></div>
	<div class="panel-body">
	<p><?php echo $r->message ?></p>
	<p><?php echo lang("actn_140") ?> <?php echo $r->fname ?> (<?php echo $r->femail ?>) <?php echo lang("actn_141") ?> <?php echo date("jS F Y h:i", $r->timestamp) ?></p>
	<?php if($r->userid > 0) : ?>
		<p><?php echo lang("actn_142") ?> <b><?php echo $r->name ?></b> (<?php echo $r->email ?>)</p>
	<?php endif; ?>
	</div>
	<div class="panel-footer">
	<?php echo lang("actn_145") ?><br />
	<?php echo form_open(base_url("admin/feedback_reply_pro/" . $r->ID), array("class" => "form-horizontal")) ?>
		<div class="form-group">

			    <label for="title-in" class="col-md-3 label-heading"><?php echo lang("actn_146") ?></label>
			    <div class="col-md-6">
			    	<input type="text" class="form-control" id="title-in" name="title" value="">
			    </div>
	  	</div>
	  	<div class="form-group">

			    <label for="title-in" class="col-md-3 label-heading"><?php echo lang("actn_147") ?></label>
			    <div class="col-md-6">
			    	<textarea class="form-control" rows="3" name="message"></textarea>
			    </div>
	  	</div>
	  	<input type="submit" name="s" class="btn btn-primary" value="<?php echo lang("actn_148") ?>" />

	  	<?php echo form_close() ?>
	</div>
</div>	