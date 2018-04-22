<ol class="breadcrumb">
  <li><a href="<?php echo base_url() ?>"><?php echo lang("tab_1") ?></a></li>
  <li><a href="<?php echo base_url("mail") ?>"><?php echo lang("tab_8") ?></a></li>
  <li class="active"><?php echo lang("tab_11") ?></li>
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
<?php
	if($mail->userid != $this->user->info->ID) {
		$mail->username = $mail->username;
	} else {
		$mail->username = $mail->username2;
	}
?>

<div class="panel panel-default">
  <div class="panel-body">
<h4 class="mail-title"><?php echo $mail->title ?></h4>
<div class="small-text"><?php echo lang("ctn_54") ?> <?php echo date("jS M Y", $mail->timestamp) ?> <?php echo lang("ctn_55") ?> <a href="<?php echo base_url("profile/" . $mail->username) ?>"><?php echo $mail->username ?></a></div>
<?php foreach($replies->result() as $r) : ?>
<div class="media">
<hr class="news-comments-sep" />
  <a class="pull-left" href="#">
    <img class="media-object image-border" src="<?php echo base_url() ?><?php echo $this->settings->info->upload_path_relative ?>/<?php echo $r->avatar ?>" alt="avie" >
  </a>
  <div class="media-body">
    <div class="news-sub-text"><?php echo date("jS F Y h:i", $r->timestamp) ?> / <?php echo lang("ctn_55") ?> <?php echo $r->name ?> (<a href="<?php echo base_url("profile/" . $r->username) ?>"><?php echo $r->username ?></a>) </div>
    <p><?php echo nl2br($r->body) ?></p>
  </div>
</div>
<?php endforeach; ?>

<div class="align-center">
  <?php echo $this->pagination->create_links(); ?>
</div>

</div>
</div>

<?php if($mail->delete_userid || $mail->delete_toid) : ?>
<p><b><?php echo lang("ctn_56") ?></b></p>
<?php else : ?>
<div class="panel panel-default decent-margin-top">
  <div class="panel-heading"><?php echo lang("ctn_57") ?></div>
  <div class="panel-body">
    <?php echo form_open(base_url("mail/reply/" . $mail->ID), array("class" => "form-horizontal")) ?>
    <div class="form-group">
        <label for="name-in" class="col-md-3 label-heading"><?php echo lang("ctn_58") ?></label>
        <div class="col-md-6">
          <textarea class="form-control" name="reply" rows="3"></textarea>
        </div>
    </div>

    <div class="form-group">

        <label for="name-in" class="col-md-3 label-heading"><?php echo lang("ctn_59") ?></label>
        <div class="col-md-6">
          <p><?php echo $cap['image'] ?></p>
        <input type="text" class="form-control" id="captcha-in" name="captcha" placeholder="<?php echo lang("ctn_60") ?>" value="">
        </div>
    </div>

    <input type="submit" name="s" class="btn btn-primary" value="<?php echo lang("ctn_61") ?>" />

    <?php echo form_close() ?>
  </div>
</div>
<?php endif; ?>