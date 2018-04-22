<ol class="breadcrumb">
  <li><a href="<?php echo base_url() ?>"><?php echo lang("tab_1") ?></a></li>
  <li class="active"><?php echo lang("tab_5") ?></li>
</ol>

<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-default">
			<div class="panel-heading"><?php echo lang("ctn_16") ?></div>
			<div class="panel-body">
				<?php echo form_open(base_url("login/pro")) ?>
				<p class="sans-big-text"><?php echo lang("ctn_17") ?></p>
    			<div class="input-group">
      				<span class="input-group-addon">@</span>
      				<input type="text" name="email" class="form-control">
    			</div><br />

    			<p class="sans-big-text"><?php echo lang("ctn_18") ?></p>
    			<div class="input-group">
      				<span class="input-group-addon"><span class="glyphicon glyphicon-hand-right"></span></span>
      				<input type="password" name="pass" class="form-control">
    			</div><br />
    			<div class="input-group">
    			<input type="checkbox" class="" name="remember" value="1"> <?php echo lang("ctn_19") ?>
    			<input type="submit" class="btn btn-primary floatRight purpleButton" value="<?php echo lang("ctn_20") ?>">
    			</div>
    			<?php echo form_close() ?>
			</div>
		</div>
    <?php if(!$this->settings->info->disable_social_login) : ?>
    <div class="row">
  <div class="col-md-4"><p><a href="<?php echo base_url("login/twitter_login") ?>"><img src="<?php echo base_url() ?>images/sign-in-with-twitter-gray.png" alt="twitter"></a></p></div>
    <div class="col-md-4"><p><a href="<?php echo base_url("login/facebook_login") ?>"><img src="<?php echo base_url() ?>images/pressed_404.png" alt="facebook" width="158" height="38" ></a></p></div>
    <div class="col-md-4"><p><a href="<?php echo base_url("login/google_login") ?>"><img src="<?php echo base_url() ?>images/White-signin_Long_base_20dp.png" ></a></p></div>
    </div>
  <?php endif; ?>

    <a href="<?php echo base_url("login/forgotpw") ?>"><?php echo lang("ctn_21") ?></a>
	</div>
</div>
