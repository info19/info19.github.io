<ol class="breadcrumb">
  <li><a href="<?php echo base_url() ?>"><?php echo lang("tab_1") ?></a></li>
  <li><a href="<?php echo base_url("admin") ?>"><?php echo lang("atab_1") ?></a></li>  
  <li class="active"><?php echo lang("atab_10") ?></li>
</ol>

<p><?php echo lang("actn_51") ?></p>
<div class="align-center">
  <?php echo $this->pagination->create_links(); ?>
</div>

<table width="100%" class="table table-bordered table-hover">
	<tr class='table-header'><td class="col-md-2"><b><?php echo lang("actn_52") ?></b></td><td class="col-md-3"><b><?php echo lang("actn_53") ?></b></td><td class="col-md-2"><b><?php echo lang("actn_54") ?></b></td></tr>
	<?php
		foreach($news->result() as $r) {
			$r->body = strip_tags($r->body);
			$r->body = substr($r->body,0,150);
			echo"<tr class='table-row'><td>{$r->title}</td><td>{$r->body}</td><td><a href='".base_url("admin/delete_news/" . $r->ID . "/" . $this->security->get_csrf_hash())."' onclick=\"return confirm('".lang("actn_55") ."')\">". lang("actn_56")."</a> - <a href='".base_url("admin/edit_news_pro/" . $r->ID . "/") ."'>".lang("actn_57")."</a></td></tr>";
		}
	?>
</table>

<div class="align-center">
  <?php echo $this->pagination->create_links(); ?>
</div>