<ol class="breadcrumb">
  <li><a href="<?php echo base_url() ?>"><?php echo lang("tab_1") ?></a></li>
  <li><a href="<?php echo base_url("login") ?>"><?php echo lang("tab_5") ?></a></li>
  <li class="active"><?php echo lang("tab_6") ?></li>
</ol>

<p><?php echo lang("ctn_22") ?></p>

<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-default">
			<div class="panel-heading"><?php echo lang("ctn_23") ?></div>
			<div class="panel-body">
				<?php echo form_open(base_url("login/forgotpw_pro/")) ?>
				<p class="sans-big-text"><?php echo lang("ctn_24") ?></p>
    			<div class="input-group">
      				<span class="input-group-addon">@</span>
      				<input type="text" name="email" class="form-control">
    			</div><br />
    			<input type="submit" class="btn btn-primary purpleButton" value="<?php echo lang("ctn_25") ?>">
    			<?php echo form_close() ?>
			</div>
		</div>
	</div>
</div>

