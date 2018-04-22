<ol class="breadcrumb">
  <li><a href="<?php echo base_url() ?>"><?php echo lang("tab_1") ?></a></li>
  <li><a href="<?php echo base_url("admin") ?>"><?php echo lang("atab_1") ?></a></li>  
  <li class="active"><?php echo lang("atab_12") ?></li>
</ol>

<div class="panel panel-default">
	<div class="panel-heading"><?php echo lang("actn_90") ?></div>
	<div class="panel-body">
	<?php echo form_open(base_url("admin/edit_page_pro_pro/" . $page->ID), array("class" => "form-horizontal")) ?>
		<div class="form-group">
			<label for="name-in" class="col-md-3 label-heading"><?php echo lang("actn_91") ?></label>
			<div class="col-md-6">
				<input type="text" class="form-control" id="name-in" name="title" value="<?php echo $page->title ?>">
			</div>
	  	</div>
	  	<div class="form-group">
			<label for="name-in" class="col-md-3 label-heading"><?php echo lang("actn_92") ?></label>
			<div class="col-md-6">
				<select name="catid" class="form-control">
				<?php foreach($categories->result() as $r) : ?>
					<?php if($r->ID == $page->catid) : ?>
						<option value='<?php echo $r->ID ?>' selected><?php echo $r->name ?></option>
					<?php else : ?>
						<option value='<?php echo $r->ID ?>'><?php echo $r->name ?></option>
					<?php endif; ?>
				<?php endforeach; ?>
				</select>
			</div>
	  	</div>
	  	<div class="form-group">
			<label for="name-in" class="col-md-3 label-heading"><?php echo lang("actn_93") ?></label>
			<div class="col-md-6">
				<input type="checkbox" name="locked" value="1" <?php if($page->locked) echo "checked" ?>>
				<span class="help-box"><?php echo lang("actn_94") ?></span>
			</div>
	  	</div>
	  	<div class="form-group">
			<label for="name-in" class="col-md-3 label-heading"><?php echo lang("actn_95") ?></label>
			<div class="col-md-6">
				<select name="groupid" class="form-control">
				<option value="0">None</option>
			    	<?php foreach($groups->result() as $r) : ?>
			    		<?php if($r->ID == $user->groupid) : ?>
			    			<option value="<?php echo $r->ID ?>" selected><?php echo $r->name ?></option>
			    		<?php else : ?>
				    		<option value="<?php echo $r->ID ?>"><?php echo $r->name ?></option>
				    	<?php endif; ?>
			    	<?php endforeach; ?>
			    	</select>
				<span class="help-box"><?php echo lang("actn_96") ?></span>
			</div>
	  	</div>
	  	<div class="form-group">
			<label for="name-in" class="col-md-3 label-heading"><?php echo lang("actn_97") ?></label>
			<div class="col-md-12">
				<textarea name="body"><?php echo $page->body ?></textarea>
			</div>
	  	</div>
	  		<input type="submit" name="s" class="btn btn-primary" value="<?php echo lang("actn_98") ?>" />

	  	<?php echo form_close() ?>
	</div>
</div>	