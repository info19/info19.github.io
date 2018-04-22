<ol class="breadcrumb">
  <li><a href="<?php echo base_url() ?>"><?php echo lang("tab_1") ?></a></li>
  <li class="active"><?php echo lang("tab_8") ?></li>
</ol>

  <div class="panel panel-default">
  <div class="panel-body">
<ul class="nav nav-pills">
  <li class="active"><a href="<?php echo base_url("mail") ?>"><?php echo lang("ctn_31") ?></a></li>
  <li><a href="<?php echo base_url("mail/create") ?>"><?php echo lang("ctn_32") ?></a></li>
  <li><a href="<?php echo base_url("mail/block") ?>"><?php echo lang("ctn_33") ?></a></li>
</ul>
</div>
</div>

<?php if($mail->num_rows() > 0) : ?>
<table class="table">
<tr><td><b><?php echo lang("ctn_34") ?></b></td><td><b><?php echo lang("ctn_35") ?></b></td><td><b><?php echo lang("ctn_36") ?></b></td><td><b><?php echo lang("ctn_37") ?></b></td></tr>
<?php foreach($mail->result() as $r) : ?>
	<?php 
		if($this->user->info->ID == $r->userid) {
			$r->username = $r->username2;
			$unread = $r->unread_userid;
		} else {
			$r->username = $r->username;
			$unread = $r->unread_toid;
		}

		if($unread) {
			$class = "active";
		} else {
			$class = "";
		}

		if($r->replies % 10 == 0) {
			$rep = $r->replies-1;
		} else {
			$rep = $r->replies;
		}
		$page = floor( ($rep)/10) *10;
	?>

	<tr class="<?php echo $class ?>"><td><a href="<?php echo base_url("mail/message/" . $r->ID . "/" . $page) ?>"><?php echo $r->title ?></a> (<?php echo $r->replies ?>)</td><td><a href="<?php echo base_url("profile/" . $r->username) ?>"><?php echo $r->username ?></a></td><td><?php echo date("jS M Y", $r->timestamp) ?></td><td>[<a href="<?php echo base_url("mail/delete/" . $this->security->get_csrf_hash() . "/" . $r->ID) ?>">X</a>]</td></tr>
<?php endforeach; ?>
</table>

<?php else : ?>
<p class="decent-margin-top"><?php echo lang("ctn_38") ?></p>
<?php endif; ?>