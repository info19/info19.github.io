<ol class="breadcrumb">
  <li><a href="<?php echo base_url() ?>"><?php echo lang("tab_1") ?></a></li>
  <li><a href="<?php echo base_url("admin") ?>"><?php echo lang("atab_1") ?></a></li>  
  <li class="active"><?php echo lang("atab_15") ?></li>
</ol>

<?php if($search) : ?>
<p><?php echo lang("actn_112") ?></p>
<?php else:  ?>
<p><?php echo lang("actn_113") ?></p>
<?php endif; ?>

<table class="table table-bordered">
	<tr><td><b><?php echo lang("actn_114") ?></b></td><td><b><?php echo lang("actn_235") ?></b></td><td><b><?php echo lang("actn_115") ?></b></td><td><b><?php echo lang("actn_116") ?></b></td><td><b><?php echo lang("actn_117") ?></b></td></tr>
	<?php foreach($users->result() as $r) : ?>
		<tr><td><?php echo $r->email ?>
		<?php if($r->oauth_provider) : ?>
			<br />Oauth Provider: <?php echo $r->oauth_provider ?>
		<?php endif; ?>
		</td><td><a href="<?php echo base_url("profile/" . $r->username) ?>"><?php echo $r->username ?></a></td><td><?php echo $r->name ?></td><td><?php echo $r->group ?></td><td><a href='<?php echo base_url("admin/delete_user/" . $r->ID . "/" . $this->security->get_csrf_hash()) ?>' onclick="return confirm('<?php echo lang("actn_118") ?>')"><?php echo lang("actn_119") ?></a> - <a href='<?php echo base_url("admin/edit_user_pro/" . $r->ID) ?>'><?php echo lang("actn_120") ?></a></td></tr>
	<?php endforeach; ?>
</table>

<div class="align-center">
	<?php if(isset($this->pagination)) : ?>
  <?php echo $this->pagination->create_links(); ?>
<?php endif; ?>
</div>