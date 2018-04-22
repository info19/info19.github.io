<ol class="breadcrumb">
  <li><a href="<?php echo base_url() ?>"><?php echo lang("tab_1") ?></a></li>
  <li class="active"><?php echo lang("ctn_119") ?></li>
</ol>

<div class="panel panel-default">
	<div class="panel-heading"><?php echo $user->username ?><?php echo lang("ctn_120") ?></div>
	<div class="panel-body">
		<div class="media">
			<div class="pull-right">
		 	<a href="<?php echo base_url("mail/create/" . $user->username) ?>" class="btn btn-primary"><?php echo lang("ctn_121") ?></a>
		  </div>
		  <a class="pull-left" href="<?php echo base_url("profile/" . $user->username) ?>">
		    <img class="media-object" src="<?php echo base_url() ?><?php echo $this->settings->info->upload_path_relative ?>/<?php echo $user->avatar ?>" alt="..." title="user">
		  </a>
		  <div class="media-body">
		    <h4 class="media-heading"><?php echo lang("ctn_122") ?> <?php echo $user->username ?><?php echo lang("ctn_120") ?></h4>
		    <p>Name: <?php echo $user->name ?><br />
		    <?php echo lang("ctn_123") ?> <?php echo $this->common->getAccessLevel($user->access_level) ?><br />
		    <?php echo lang("ctn_124") ?> <?php echo $user->groupname ?>
		    <?php if(!empty($user->profile_text)) : ?><br /><br /><?php echo $user->profile_text ?><?php endif; ?> </p>
		  </div>
		</div>
	</div>
	<div class="panel-footer"></div>
</div>

<?php if(!$this->settings->info->profile_comments && !$user->profile_comments) : ?>
<div class="panel panel-default">
	<div class="panel-heading"><?php echo lang("ctn_125") ?></div>
	<div class="panel-body">
		<?php foreach($comments->result() as $r) : ?>
			<div class="media">
			<div class="pull-right">
			<?php if($this->user->loggedin && ($r->profileid == $this->user->info->ID || $r->userid == $this->user->info->ID || $this->user->info->access_level >= 2)) : ?>
		 		<a href="<?php echo base_url("profile/delete_comment/" . $r->ID . "/" . $this->security->get_csrf_hash()) ?>" class="btn btn-danger btn-sm"><?php echo lang("ctn_126") ?></a>
		 	<?php endif; ?>
		  </div>
		  <a class="pull-left align-center" href="<?php echo base_url("profile/" . $r->username) ?>">
		    <img class="media-object" src="<?php echo base_url() ?><?php echo $this->settings->info->upload_path_relative ?>/<?php echo $r->avatar ?>" alt="..." title="user"><?php echo $r->username ?>
		  </a>
		  <div class="media-body">
		    <p><?php echo $r->comment ?></p>
		    <p class="small-text"><?php echo date("jS F Y", $r->timestamp) ?></p>
		  </div>
		</div>
		<hr>
		<?php endforeach; ?>

		<div class="align-center">
		  <?php echo $this->pagination->create_links(); ?>
		</div>

		<?php if($this->user->loggedin) : ?>
			<div class="media">
			  <a class="pull-left align-center" href="<?php echo base_url("profile/" . $this->user->info->username) ?>">
			    <img class="media-object" src="<?php echo base_url() ?><?php echo $this->settings->info->upload_path_relative ?>/<?php echo $this->user->info->avatar ?>" alt="..." title="user">
			  </a>
			  <div class="media-body">
			    <?php echo form_open(base_url("profile/comment/" . $user->ID)) ?>
			    <textarea name="comment" class="form-control"></textarea><br />
			    <input type="submit" name="s" class="btn btn-primary" value="<?php echo lang("ctn_127") ?>" />
			    <?php echo form_close() ?>
			  </div>
			</div>
		<?php endif; ?>
	</div>
	<div class="panel-footer"></div>
</div>
<?php endif; ?>