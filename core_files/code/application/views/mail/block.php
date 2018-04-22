<ol class="breadcrumb">
  <li><a href="<?php echo base_url() ?>"><?php echo lang("tab_1") ?></a></li>
  <li><a href="<?php echo base_url("mail") ?>"><?php echo lang("tab_8") ?></a></li>
  <li class="active"><?php echo lang("tab_10") ?></li>
</ol>

  <div class="panel panel-default">
  <div class="panel-body">
<ul class="nav nav-pills">
  <li><a href="<?php echo base_url("mail") ?>"><?php echo lang("ctn_31") ?></a></li>
  <li><a href="<?php echo base_url("mail/create") ?>"><?php echo lang("ctn_32") ?></a></li>
  <li class="active"><a href="<?php echo base_url("mail/block") ?>"><?php echo lang("ctn_33") ?></a></li>
</ul>
</div>
</div>

<p><?php echo lang("ctn_46") ?></p>

<div class="panel panel-default">
	<div class="panel-heading"><?php echo lang("ctn_47") ?></div>
	<div class="panel-body">
	<?php echo form_open(base_url("mail/block_user"), array("class" => "form-horizontal")) ?>
		<div class="form-group">

			    <label for="email-in" class="col-md-3 label-heading"><?php echo lang("ctn_48") ?></label>
			    <div class="col-md-6">
			    	<input type="text" class="form-control" id="email-in" name="username" placeholder="<?php echo lang("ctn_49") ?>">
			    </div>
	  	</div>
	  	<input type="submit" name="s" class="btn btn-primary" value="<?php echo lang("ctn_50") ?>" />

	  	<?php echo form_close() ?>
	</div>
</div>

<table class="table">
<tr><td><b><?php echo lang("ctn_51") ?></b></td><td><b><?php echo lang("ctn_52") ?></b></td><td><b><?php echo lang("ctn_53") ?></b></td></tr>
<?php foreach($blocks->result() as $r) : ?>
<tr><td><?php echo $r->username ?></td><td> <?php echo $r->name ?></td><td><a href="<?php echo base_url("mail/delete_block/" . $r->ID . "/" . $this->security->get_csrf_hash()) ?>"><?php echo lang("ctn_53") ?></a></td></tr>
<?php endforeach; ?>
</table>