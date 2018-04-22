<ol class="breadcrumb">
  <li><a href="<?php echo base_url() ?>"><?php echo lang("tab_1") ?></a></li>
  <li><a href="<?php echo base_url("news") ?>"><?php echo lang("tab_12") ?></a></li>
  <li class="active"><?php echo lang("tab_13") ?></li>
</ol>

<div class="panel panel-default">
	<div class="panel-body">
		<div class='row'>
		<?php 
			foreach($categories->result() as $r) {
				echo"<div class='col-md-6 margin-bottom'><i class='glyphicon glyphicon-folder-open small-margin'></i> <a href='".base_url("news/index/" . $r->ID)."'>{$r->name}</a></span></div>";
			}
		?>
		</div>
	</div>
</div>