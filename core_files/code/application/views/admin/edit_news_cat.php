<ol class="breadcrumb">
  <li><a href="<?php echo base_url() ?>"><?php echo lang("tab_1") ?></a></li>
  <li><a href="<?php echo base_url("admin") ?>"><?php echo lang("atab_1") ?></a></li>  
  <li class="active"><?php echo lang("atab_11") ?></li>
</ol>

<p><?php echo lang("actn_58") ?></p>

<table class="table table-bordered">
	<tr><td><b><?php echo lang("actn_59") ?></b></td><td><b><?php echo lang("actn_60") ?></b></td></tr>
	<?php foreach($categories->result() as $r) : ?>
		<tr><td><?php echo $r->name ?></td><td><a href="<?php echo base_url("admin/delete_news_cat/" . $r->ID . "/" . $this->security->get_csrf_hash()) ?>"><?php echo lang("actn_61") ?></a> - <a href="<?php echo base_url("admin/edit_news_cat_pro/" . $r->ID) ?>"><?php echo lang("actn_62") ?></a></td></tr>
	<?php endforeach; ?>

</table>