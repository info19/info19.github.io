<ol class="breadcrumb">
  <li><a href="<?php echo base_url() ?>"><?php echo lang("tab_1") ?></a></li>
  <li><a href="<?php echo base_url("login") ?>"><?php echo lang("tab_5") ?></a></li>
  <li class="active"><?php echo lang("tab_7") ?></li>
</ol>


<p><?php echo lang("ctn_26") ?></p>

<?php echo form_open(base_url("login/resetpw_pro/" . $token . "/" . $userid)) ?>
<div class="panel panel-default">
	<div class="panel-heading"><?php echo lang("ctn_27") ?></div>
	<div class="panel-body">
	  	<div class="form-group">
		  	<div class="row">
				<div class="col-md-6">
			    	<label for="password-in"><?php echo lang("ctn_28") ?></label>
			    	<input type="password" class="form-control" id="password-in" name="npassword" />
			    </div>
			</div>
	  	</div>
	  	<div class="form-group">
		  	<div class="row">
				<div class="col-md-6">
			    	<label for="password-in"><?php echo lang("ctn_29") ?></label>
			    	<input type="password" class="form-control" id="password-in" name="npassword2" />
			    </div>
			</div>
	  	</div>

	  	<input type="submit" class="btn btn-primary" name="s" value="<?php echo lang("ctn_30") ?>">

	</div>
</div>
<?php echo form_close() ?>
