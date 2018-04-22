<ol class="breadcrumb">
  <li><a href="<?php echo base_url() ?>"><?php echo lang("tab_1") ?></a></li>
  <li><a href="<?php echo base_url("admin") ?>"><?php echo lang("atab_1") ?></a></li>  
  <li class="active"><?php echo lang("atab_2") ?></li>
</ol>

<p><?php echo lang("actn_1") ?></p>

<div class="panel panel-default">
	<div class="panel-heading"><?php echo lang("actn_2") ?></div>
	<div class="panel-body">
	<?php echo form_open_multipart(base_url("admin/add_news_pro"), array("class" => "form-horizontal")) ?>
		<div class="form-group">
			<label for="name-in" class="col-md-3 label-heading"><?php echo lang("actn_3") ?></label>
			<div class="col-md-6">
				<input type="text" class="form-control" id="name-in" name="subject" value="">
			</div>
	  	</div>
	  	<div class="form-group">
			<label for="name-in" class="col-md-3 label-heading"><?php echo lang("actn_4") ?></label>
			<div class="col-md-6">
				<select name="catid" class="form-control">
				<?php foreach($categories->result() as $r) : ?>
					<option value='<?php echo $r->ID ?>'><?php echo $r->name ?></option>
				<?php endforeach; ?>
				</select>
			</div>
	  	</div>
	  	<div class="form-group">
			<label for="name-in" class="col-md-3 label-heading"><?php echo lang("actn_5") ?></label>
			<div class="col-md-6">
				<input type="checkbox" name="disable_comments" value="1">
			</div>
	  	</div>
	  	<div class="form-group">
			<label for="name-in" class="col-md-3 label-heading"><?php echo lang("actn_6") ?></label>
			<div class="col-md-6">
				<input type="file" name="thumbnail" size="20" />
			</div>
	  	</div>
	  	<div class="form-group">
			<label for="name-in" class="col-md-3 label-heading"><?php echo lang("actn_7") ?></label>
			<div class="col-md-6">
				<input type="file" name="big_image" size="20" />
			</div>
	  	</div>
	  	<div class="form-group">
			<label for="name-in" class="col-md-3 label-heading"><?php echo lang("actn_8") ?></label>
			<div class="col-md-12">
				<textarea name="news_content"></textarea>
			</div>
	  	</div>
	  		<input type="submit" name="s" class="btn btn-primary" value="<?php echo lang("actn_9") ?>" />

	  	<?php echo form_close() ?>
	</div>
</div>	