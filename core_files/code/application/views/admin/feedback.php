<ol class="breadcrumb">
  <li><a href="<?php echo base_url() ?>"><?php echo lang("tab_1") ?></a></li>
  <li><a href="<?php echo base_url("admin") ?>"><?php echo lang("atab_1") ?></a></li>  
  <li class="active"><?php echo lang("atab_17") ?></li>
</ol>

<p><?php echo lang("actn_139") ?></p>

<?php foreach($feedback->result() as $r) : ?>
<div class="panel panel-default">
	<div class="panel-heading"><?php echo $r->title ?></div>
	<div class="panel-body">
	<p><?php echo $r->message ?></p>
	<p><?php echo lang("actn_140") ?> <?php echo $r->fname ?> (<?php echo $r->femail ?>) <?php echo lang("actn_141") ?> <?php echo date("jS F Y h:i", $r->timestamp) ?></p>
	<?php if($r->userid > 0) : ?>
		<p><?php echo lang("actn_142") ?> <b><?php echo $r->name ?></b> (<?php echo $r->email ?>)</p>
	<?php endif; ?>
	</div>
	<div class="panel-footer"><a href="<?php echo base_url("admin/feedback_delete/" . $r->ID . "/" . $this->security->get_csrf_hash()) ?>" onclick="return confirm('<?php echo lang("actn_143") ?>')"><?php echo lang("actn_144") ?></a> - <a href="<?php echo base_url("admin/feedback_reply/" . $r->ID) ?>"><?php echo lang("actn_145") ?></a></div>
</div>	
<?php endforeach; ?>

<div class="align-center">
  <?php echo $this->pagination->create_links(); ?>
</div>