<ol class="breadcrumb">
  <li><a href="<?php echo base_url() ?>"><?php echo lang("tab_1") ?></a></li>
  <li><a href="<?php echo base_url("pages") ?>"><?php echo lang("tab_15") ?></a></li>
  <li class="active"><?php echo $page->title ?></li>
</ol>

<div class="panel panel-default">
	<div class="panel-heading"><a href="<?php echo base_url("pages/view/" . $page->ID) ?>"><?php echo $page->title ?></a></div>
	<div class="panel-body">
		<?php
			echo ($page->body);
		?>
	</div>
	<?php if(!$this->settings->info->page_voting) : ?>
	<div class="panel-footer">
			<p><i class="glyphicon glyphicon-thumbs-up"></i> <a href='javascript: void(0)' onclick="vote_page(1, <?php echo $page->ID ?>,'<?php echo $this->security->get_csrf_hash() ?>')"><?php echo lang("ctn_76") ?></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="glyphicon glyphicon-thumbs-down"></i> <a href='javascript: void(0)' onclick="vote_page(0, <?php echo $page->ID ?>,'<?php echo $this->security->get_csrf_hash() ?>')"><?php echo lang("ctn_77") ?></a></p>
			<div id="page-votes"><p><small><?php echo $page->useful_votes ?>/<?php echo $page->total_votes ?> <?php echo lang("ctn_78") ?></small></p></div>
	</div>
	<?php endif; ?>
</div>