<ol class="breadcrumb">
  <li><a href="<?php echo base_url() ?>"><?php echo lang("tab_1") ?></a></li>
  <li><a href="<?php echo base_url("news") ?>"><?php echo lang("tab_12") ?></a></li>
  <li class="active"><?php echo lang("tab_14") ?></li>
</ol>

  <div class="panel panel-default">
  <div class="panel-body">
<p><img src="<?php echo base_url() ?><?php echo $this->settings->info->upload_path_relative ?>/<?php echo $news->big_image ?>" alt="news" class="image-border" /></p>
<h4><?php echo $news->title ?></h4>
<div class="news-sub-text"> <?php echo date("jS F Y", $news->timestamp) ?> / <a href=''><?php echo $news->cat_name ?></a> / <?php echo lang("ctn_62") ?> <a href="<?php echo base_url("profile/" . $news->username) ?>"><?php echo $news->username ?></a> / <a href=''><?php echo $news->comments ?> <?php echo lang("ctn_63") ?></a> </div>
<p><?php echo nl2br($news->body) ?> </p>
<p>
    <div class="social-media-button"><div class="fb-share-button" data-href="<?php echo base_url("news/view/" . $news->ID) ?>" data-type="button_count"></div></div>
    <div class="social-media-button"><a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php echo base_url("news/view/" . $news->ID) ?>" data-text="<?php echo $news->title ?>">Tweet</a></div>
    <div class="clearfix"></div>
</p>
</div>
</div>


<?php if(!$news->disable_comments && !$this->settings->info->news_comments) : ?>
    <div class="panel panel-default">
  <div class="panel-body">
<h4><?php echo lang("ctn_65") ?></h4>

<?php foreach($comments->result() as $r) : ?>
<div class="media">
  <a class="pull-left" href="#">
    <img class="media-object image-border" src="<?php echo base_url() ?><?php echo $this->settings->info->upload_path_relative ?>/<?php echo $r->avatar ?>" alt="avie" >
  </a>
  <div class="media-body">
    <div class="news-sub-text"><?php echo date("jS F Y", $r->timestamp) ?> / <?php echo lang("ctn_62") ?> <a href="<?php echo base_url("profile/" . $r->username) ?>"><?php echo $r->username ?></a> 
    <?php if($this->user->loggedin && $this->user->info->access_level > 0): ?>
      <a href="<?php echo base_url("news/delete_comment/" . $r->ID . "/" . $news->ID) ?>"><?php echo lang("ctn_66") ?></a>
    <?php endif; ?>
    </div>
    <p><?php echo nl2br($r->comment) ?></p>
  </div>
</div>

<hr class="news-comments-sep" />
<?php endforeach; ?>

<div class="align-center">
  <?php echo $this->pagination->create_links(); ?>
</div>

</div>
</div>

<div class="panel panel-default decent-margin-top">
  <div class="panel-heading"><?php echo lang("ctn_67") ?></div>
  <div class="panel-body">
    <?php echo form_open(base_url("news/comment/" . $news->ID), array("class" => "form-horizontal")) ?>
    <div class="form-group">
        <label for="name-in" class="col-md-3 label-heading"><?php echo lang("ctn_68") ?></label>
        <div class="col-md-6">
          <textarea class="form-control" name="comment" rows="3"></textarea>
        </div>
    </div>

    <div class="form-group">

        <label for="name-in" class="col-md-3 label-heading"><?php echo lang("ctn_69") ?></label>
        <div class="col-md-6">
          <p><?php echo $cap['image'] ?></p>
        <input type="text" class="form-control" id="captcha-in" name="captcha" placeholder="<?php echo lang("ctn_70") ?>" value="">
        </div>
    </div>

    <input type="submit" name="s" class="btn btn-primary" value="<?php echo lang("ctn_71") ?>" />

    <?php echo form_close() ?>
  </div>
</div>
<?php endif; ?>