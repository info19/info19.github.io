<ol class="breadcrumb">
  <li><a href="<?php echo base_url() ?>"><?php echo lang("tab_1") ?></a></li>
  <li><a href="<?php echo base_url("admin") ?>"><?php echo lang("atab_1") ?></a></li>  
  <li class="active"><?php echo lang("atab_14") ?></li>
</ol>

<p><?php echo lang("actn_99") ?></p>

<table class="table table-bordered">
	<tr><td><b><?php echo lang("actn_100") ?></b></td><td><b><?php echo lang("actn_101") ?></b></td></tr>
	<?php foreach($themes->result() as $r) : ?>
		<tr><td><?php echo $r->name ?></td><td><a href="<?php echo base_url("admin/delete_theme/" . $r->ID . "/" . $this->security->get_csrf_hash()) ?>" onclick="return confirm('<?php echo lang("actn_102") ?>')"><?php echo lang("actn_103") ?></a> - <a href="<?php echo base_url("admin/edit_theme_pro/" . $r->ID) ?>"><?php echo lang("actn_104") ?></a></td></tr>
	<?php endforeach; ?>
</table>
