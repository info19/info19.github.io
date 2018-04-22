<ol class="breadcrumb">
  <li><a href="<?php echo base_url() ?>"><?php echo lang("tab_1") ?></a></li>
  <li><a href="<?php echo base_url("admin") ?>"><?php echo lang("atab_1") ?></a></li>  
  <li><a href="<?php echo base_url("admin/edit_news") ?>"><?php echo lang("atab_10") ?></a></li>  
  <li class="active"><?php echo lang("atab_10") ?></li>
</ol>

<div class="panel panel-default">
	<div class="panel-heading"><?php echo lang("actn_66") ?></div>
	<div class="panel-body">
	<?php echo form_open_multipart(base_url("admin/edit_news_pro_pro/" . $news->ID), array("class" => "form-horizontal")) ?>
		<div class="form-group">
			<label for="name-in" class="col-md-3 label-heading"><?php echo lang("actn_67") ?></label>
			<div class="col-md-6">
				<input type="text" class="form-control" id="name-in" name="subject" value="<?php echo $news->title ?>">
			</div>
	  	</div>
	  	<div class="form-group">
			<label for="name-in" class="col-md-3 label-heading"><?php echo lang("actn_68") ?></label>
			<div class="col-md-6">
				<select name="catid" class="form-control">
				<?php foreach($categories->result() as $r) : ?>
					<?php if($r->ID == $news->categoryid) : ?>
						<option value='<?php echo $r->ID ?>' selected><?php echo $r->name ?></option>
					<?php else : ?>
						<option value='<?php echo $r->ID ?>'><?php echo $r->name ?></option>
					<?php endif; ?>
				<?php endforeach; ?>
				</select>
			</div>
	  	</div>
	  	<div class="form-group">
			<label for="name-in" class="col-md-3 label-heading"><?php echo lang("actn_69") ?></label>
			<div class="col-md-6">
				<input type="checkbox" name="disable_comments" value="1" <?php if($news->disable_comments) echo "checked" ?> />
			</div>
	  	</div>
	  	<div class="form-group">
			<label for="name-in" class="col-md-3 label-heading"><?php echo lang("actn_70") ?></label>
			<div class="col-md-6">
				<img src="<?php echo base_url() ?><?php echo $this->settings->info->upload_path_relative ?>/<?php echo $news->image ?>" />
				<input type="file" name="thumbnail" size="20" />
			</div>
	  	</div>
	  	<div class="form-group">
			<label for="name-in" class="col-md-3 label-heading"><?php echo lang("actn_71") ?></label>
			<div class="col-md-6">
			<img src="<?php echo base_url() ?><?php echo $this->settings->info->upload_path_relative ?>/<?php echo $news->big_image ?>" width="300" width="100"/>
				<input type="file" name="big_image" size="20" />
			</div>
	  	</div>
	  	<div class="form-group">
			<label for="name-in" class="col-md-3 label-heading"><?php echo lang("actn_72") ?></label>
			<div class="col-md-12">
				<textarea name="news_content"><?php echo $news->body ?></textarea>
			</div>
	  	</div>
	  		<input type="submit" name="s" class="btn btn-primary" value="<?php echo lang("actn_73") ?>" />

	  	<?php echo form_close() ?>
	</div>
</div>	