<ol class="breadcrumb">
  <li><a href="<?php echo base_url() ?>"><?php echo lang("tab_1") ?></a></li>
  <li><a href="<?php echo base_url("admin") ?>"><?php echo lang("atab_1") ?></a></li>  
  <li class="active"><?php echo lang("atab_16") ?></li>
</ol>

<p><?php echo lang("actn_121") ?></p>

<table class="table table-bordered">
	<tr><td><b><?php echo lang("actn_122") ?></b></td><td><b><?php echo lang("actn_123") ?></b></td></tr>
	<?php foreach($groups->result() as $r) : ?>
		<tr><td><?php echo $r->name ?></td><td><a href="<?php echo base_url("admin/delete_user_group/" . $r->ID . "/" . $this->security->get_csrf_hash()) ?>" onclick="return confirm('<?php echo lang("actn_124") ?>')"><?php echo lang("actn_125") ?></a> - <a href="<?php echo base_url("admin/edit_user_group_pro/" . $r->ID) ?>"><?php echo lang("actn_126") ?></a></td></tr>
	<?php endforeach; ?>
</table>