<ol class="breadcrumb">
  <li><a href="<?php echo base_url() ?>"><?php echo lang("tab_1") ?></a></li>
  <li><a href="<?php echo base_url("admin") ?>"><?php echo lang("atab_1") ?></a></li>  
  <li class="active"><?php echo lang("atab_12") ?></li>
</ol>

<p><?php echo lang("actn_74") ?></p>

<table class="table table-bordered">
	<tr><td><b><?php echo lang("actn_75") ?></b></td><td><b><?php echo lang("actn_76") ?></b></td><td><b><?php echo lang("actn_77") ?></b></td><td><b><?php echo lang("actn_78") ?></b></td></tr>
	<?php foreach($pages->result() as $r) : ?>
		<?php $snippet = substr(strip_tags($r->body), 0, 255); ?>
		<tr><td><?php echo $r->title ?></td><td><?php echo $snippet ?></td><td><?php echo $r->catname ?></td><td><a href="<?php echo base_url("admin/delete_page/" . $r->ID . "/" . $this->security->get_csrf_hash()) ?>" onclick="return confirm('<?php echo lang("actn_79") ?>')"><?php echo lang("actn_80") ?></a> - <a href="<?php echo base_url("admin/edit_page_pro/" . $r->ID) ?>"><?php echo lang("actn_81") ?></a></td></tr>
	<?php endforeach; ?>
</table>

<div class="align-center">
  <?php echo $this->pagination->create_links(); ?>
</div>
