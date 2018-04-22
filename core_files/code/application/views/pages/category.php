<ol class="breadcrumb">
  <li><a href="<?php echo base_url() ?>"><?php echo lang("tab_1") ?></a></li>
  <li><a href="<?php echo base_url("pages") ?>"><?php echo lang("tab_15") ?></a></li>
  <li class="active"><?php echo $category->name ?></li>
</ol>

<div class="align-center">
  <?php echo $this->pagination->create_links(); ?>
</div>

<?php foreach($pages->result() as $page) : ?>
<div class="panel panel-default">
	<div class="panel-body">
	<h4><a href=""><?php echo $page->title ?></a></h4>
		<?php
			if($page->locked) {
				if(!$this->user->loggedin) {
					$page->body = lang("ctn_74");
				}
			}
			if($page->groupid > 0) {
				if($page->groupid != $this->user->info->groupid) {
					$page->body = lang("ctn_75") . " " . $page->group;
				}
			}
			$body = substr(strip_tags($page->body), 0, 500); 
			echo nl2br($body) . " ...";
		?>
	</div>
	<div class="panel-footer"><a href="<?php echo base_url("pages/view/" . $page->ID) ?>" class="btn btn-primary"><?php echo lang("ctn_73") ?></a></div>
</div>
<?php endforeach; ?>

<div class="align-center">
  <?php echo $this->pagination->create_links(); ?>
</div>