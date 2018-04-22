<ol class="breadcrumb">
  <li><a href="<?php echo base_url() ?>"><?php echo lang("tab_1") ?></a></li>
  <li class="active"><?php echo lang("tab_15") ?></li>
</ol>

<?php if($page->num_rows() > 0) : ?>
	<?php $page= $page->row(); ?>
<div class="panel panel-default">
	<div class="panel-heading"><?php echo lang("ctn_72") ?></div>
	<div class="panel-body">
	<h4><a href="<?php echo base_url("pages/view/" . $page->ID)?>"><?php echo $page->title ?></a></h4>
		<?php
			$body = substr(strip_tags($page->body), 0, 500); 
			echo ($body) . " ...";
		?>
	</div>
	<div class="panel-footer"><a href="<?php echo base_url("pages/view/" . $page->ID)?>" class="btn btn-primary"><?php echo lang("ctn_73") ?></a></div>
</div>
<?php endif; ?>

<div class="panel panel-default">
	<div class="panel-body">
		<div class='row'>
		<?php 
			foreach($categories->result() as $r) {
				echo"<div class='col-md-6 decent-margin-bottom'><i class='glyphicon glyphicon-folder-open small-margin'></i> <a href='".base_url("pages/category/" . $r->ID)."'>{$r->name}</a> ($r->total)<br />{$r->description}</div>";
			}
		?>
		</div>
	</div>
</div>