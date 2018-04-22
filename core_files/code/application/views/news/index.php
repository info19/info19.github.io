<ol class="breadcrumb">
  <li><a href="<?php echo base_url() ?>"><?php echo lang("tab_1") ?></a></li>
  <?php if($catid > 0) : ?>
  <li><a href="<?php echo base_url("news") ?>"><?php echo lang("tab_12") ?></a></li>
  <li><a href="<?php echo base_url("news/categories") ?>"><?php echo lang("tab_13") ?></a></li>
  <li class="active"><?php echo $catname ?></li> 
  <?php else: ?>
  <li class="active"><?php echo lang("tab_12") ?></li>
  <?php endif; ?>
</ol>

<?php foreach($news->result() as $r) : ?>
  <div class="panel panel-default">
  <div class="panel-body">
  <div class="media">
  <a class="pull-left" href="#">
    <img class="media-object image-border" src="<?php echo base_url() ?><?php echo $this->settings->info->upload_path_relative ?>/<?php echo $r->image ?>" alt="news" >
  </a>
  <div class="media-body">
    <h4 class="media-heading"><a href='<?php echo base_url("news/view/" . $r->ID) ?>' class='news-title-link'><?php echo $r->title ?></a></h4>
    <div class="news-sub-text"><?php echo date("jS F Y", $r->timestamp) ?> / <a href='<?php echo base_url("news/index/" . $r->catid) ?>'><?php echo $r->cat_name ?></a> / <?php echo lang("ctn_62") ?> <a href="<?php echo base_url("profile/" . $r->username) ?>"><?php echo $r->username ?></a> / <a href='<?php echo base_url("news/view/" . $r->ID) ?>'><?php echo $r->comments ?> <?php echo lang("ctn_63") ?></a> </div>
    <?php 
      $r->body = substr(strip_tags($r->body), 0, 355);
    ?>
    <div class="news-body"> <?php echo $r->body ?> ...</div>
    <p><a href='<?php echo base_url("news/view/" . $r->ID) ?>'><?php echo lang("ctn_64") ?></a>
    </p>
    <div class="social-buttons">
      <div class="social-media-button"><div class="fb-share-button" data-href="<?php echo base_url("news/view/" . $r->ID) ?>" data-type="button_count"></div></div>
      <div class="social-media-button"><a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php echo base_url("news/view/" . $r->ID) ?>" data-text="<?php echo $r->title ?>">Tweet</a></div>
      <div class="clearfix"></div>
    </div>
  </div>
</div>
</div>
</div>

<?php endforeach; ?>

<div class="align-center">
  <?php echo $this->pagination->create_links(); ?>
</div>

