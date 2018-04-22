<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php echo $this->settings->info->site_name ?></title>         
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap -->
        <link href="<?php echo base_url();?>bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">

         <!-- Styles -->
        <link href="<?php echo base_url();?>styles/new.css" rel="stylesheet" type="text/css">
        <?php if($this->settings->info->css_file) : ?>
        <link href="<?php echo base_url();?>styles/<?php echo $this->settings->info->css_file ?>" rel="stylesheet" type="text/css">
        <?php endif; ?>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,500,600,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css" />

        <!-- SCRIPTS -->
        <script type="text/javascript">
        var global_base_url = "<?php echo base_url() ?>";
        </script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="<?php echo base_url();?>bootstrap/js/bootstrap.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>


        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="<?php echo base_url();?>scripts/events.js"></script>
        <?php if(!$this->settings->info->twitter_widget_disable) : ?>
       	<?php if($this->settings->info->twitter_widget_global || (!$this->settings->info->twitter_widget_global && uri_string() == "")) : ?>
	        <script src="<?php echo base_url();?>scripts/get_tweets.js"></script>
	    <?php endif; ?>
	    <?php endif; ?>

        <script type="text/javascript">
            $(document).ready(function() {
                $( document ).tooltip();
            });
                
        </script>

        <!-- CODE INCLUDES -->
        <?php echo $cssincludes ?> 
        <?php echo $this->settings->info->css_extra_files ?>
    </head>
    <body>
        <header class="top-bar">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 logo-padding">
                        <?php if(empty($this->settings->info->site_logo)) : ?>
                        <img src="<?php echo base_url() ?>images/logo.png" alt="logo" />
                    <?php else :?>
                        <img src="<?php echo base_url() ?><?php echo $this->settings->info->upload_path_relative ?>/<?php echo $this->settings->info->site_logo ?>" alt="logo" />
                    <?php endif; ?>
                    </div>
                </div>
            </div>
        </header>
        <div class="nav-bar">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 nav-padding">
                        <ul class="top-nav">
                            <li><a href="<?php echo base_url() ?>"><?php echo lang("nav_1") ?></a></li>
                            <li><a href="<?php echo base_url("news") ?>"><?php echo lang("nav_5") ?></a></li>
                            <li><a href="<?php echo base_url("pages") ?>"><?php echo lang("nav_7") ?></a></li>
                            <?php if(!$this->settings->info->mailbox) : ?>
                                <li><a href="<?php echo base_url("mail") ?>"><?php echo lang("nav_6") ?></a></li>
                            <?php endif; ?>
                            <li><a href="<?php echo base_url("feedback") ?>"><?php echo lang("nav_8") ?></a></li>
                            <?php if(!$this->user->loggedin) : ?>
                                <li><a href="<?php echo base_url("register") ?>"><?php echo lang("nav_2") ?></a></li>
                                <li class="lock"><img src="<?php echo base_url() ?>images/lock.png" alt="login"></li>
                                <li><a href="<?php echo base_url("login") ?>" class="login-link"><?php echo lang("nav_3") ?></a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="bread-bar">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 bread-padding">
                    </div>
                    <div class="col-md-2 search-padding">
                    <?php echo form_open(base_url("pages/search")) ?>
                        <div class="input-group">
                          <input type="text" class="form-control" name="search" placeholder="<?php echo lang("ctn_116") ?> ...">
                          <span class="input-group-btn"><button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search light-gray-icon"></span></button></span>
                        </div>  
                    <?php echo form_close() ?>   
                    </div>
                </div>
            </div>
        </div>

        <div class="container top-margin">
            <div class="row">
            <div class="col-md-3">

            <?php if(isset($sidebar)) : ?>
                <?php echo $sidebar ?>
            <?php endif; ?>

            <div class="widget col-md-12">
            <?php if($this->user->loggedin) : ?>
                <div class="widget-padding">
                    <div class="widget-title"><?php echo lang("lay_1") ?></div>
                    <div class="row">
                    <div class="col-md-4"><img src="<?php echo base_url() ?><?php echo $this->settings->info->upload_path_relative ?>/<?php echo $this->user->info->avatar ?>" alt="guest" class="avatar"></div>
                    <div class="col-md-8">
                        <p class="welcome-msg"><?php echo lang("lay_18") ?> <?php echo $this->user->info->name ?></p>
                        <p class="widget-up-info"><a href="<?php echo base_url("profile/" . $this->user->info->username) ?>"><?php echo $this->user->info->username ?></a><br /><?php echo $this->common->getAccessLevel($this->user->info->access_level) ?></p>
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 up-icons-area">
                        <div class="row">
                            <div class="col-md-3 mail-padding">
                                <a class="login-icons mail-icon" href="<?php echo base_url("mail") ?>" title="<?php echo lang("lay_6") ?>"><?php echo lang("lay_6") ?></a>
                            </div>
                            <div class="col-md-3">
                                <a class="login-icons gear-icon" href="<?php echo base_url("user_panel") ?>" title="<?php echo lang("lay_7") ?>"><?php echo lang("lay_7") ?></a>
                            </div>
                            <div class="col-md-3">
                                <a class="login-icons lock-icon" href="<?php echo base_url("login/logout/" . $this->security->get_csrf_hash());?>" title="<?php echo lang("lay_8") ?>"><?php echo lang("lay_8") ?></a>
                            </div>
                            <?php if($this->user->info->access_level > 0) : ?>
                            <div class="col-md-3">
                                <a class="login-icons spanner-icon" href="<?php echo base_url("admin") ?>" title="<?php echo lang("lay_19") ?>"><?php echo lang("lay_19") ?></a>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php
                    $event = $this->event_model->get_event($this->user->info->ID);
                ?>
                <?php if($event->num_rows() > 0) : ?>
                    <?php
                        foreach($event->result() as $r) {
                            if($r->type == 1) : ?>
                                <div id="messages-event-<?php echo $r->ID ?>"><?php echo lang("lay_3") ?> <a href="<?php echo base_url("mail") ?>"><?php echo lang("lay_4") ?></a>. [<a href='javascript:void(0)' onclick='close_event(<?php echo $r->ID ?>)'>X</a>]</div>
                            <?php
                            else : ?>
                                <div id="messages-event-<?php echo $r->ID ?>"><?php echo lang("lay_3") ?> <a href="<?php echo base_url("profile/" . $this->user->info->username) ?>"><?php echo lang("ctn_128") ?></a>. [<a href='javascript:void(0)' onclick='close_event(<?php echo $r->ID ?>)'>X</a>]</div>
                            <?php
                            endif; 
                        }

                    ?>
                <?php endif; ?>
            <?php else: ?>
                <?php echo form_open(base_url("login/pro")) ?>
                 <div class="widget-padding">
                    <div class="widget-title"><?php echo lang("lay_1") ?></div>
                    <div class="row">
                        <div class="col-md-12">
                        <div class="input-group">
                            <span class="input-group-addon">@</span>
                            <input type="text" name="email" class="form-control" placeholder="<?php echo lang("lay_16") ?>">
                        </div><br />

                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-hand-right"></span></span>
                            <input type="password" name="pass" class="form-control"  placeholder="<?php echo lang("lay_17") ?>">
                        </div><br />
                        <div class="row login-margin">
                            <div class="col-md-8">
                            <input type="checkbox" class="" name="remember" value="1"> <?php echo lang("lay_9") ?>
                            </div>
                            <div class="col-md-4">
                            <input type="submit" class="btn btn-primary floatRight purpleButton" value="<?php echo lang("lay_10") ?>">
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                <?php echo form_close() ?>
            <?php endif; ?>
            </div>

            <?php if(!$this->settings->info->twitter_widget_disable) : ?>
            <?php if($this->settings->info->twitter_widget_global || (!$this->settings->info->twitter_widget_global && uri_string() == "")) : ?>
            <div class="widget col-md-12 top-margin">
                <div class="widget-padding">
                    <div class="widget-title"><?php echo lang("lay_11") ?></div>
                </div>
                <div id="loader"><img src="<?php echo base_url() ?>images/ajax-loader.gif" alt="loading" /></div>
                <div id="tweets">
                </div>
            </div>
            <?php endif; ?>
            <?php endif; ?>


            <?php if(!$this->settings->info->news_widget_disable) : ?>
            <?php if($this->settings->info->news_widget_global || (!$this->settings->info->news_widget_global && uri_string() == "")) : ?>
            <div class="widget col-md-12 top-margin">
                <div class="widget-padding">
                    <div class="widget-title"><?php echo lang("lay_12") ?></div>
                </div>
                <?php $news = $this->news_model->get_recent_news($this->settings->info->news_display_limit); ?>
                    <?php $nc = 0; ?>
                    <?php foreach($news->result() as $r) : ?>
                        <?php $title = substr($r->title, 0, 20); ?>
                        <?php 
                          $r->body = substr(strip_tags($r->body), 0, 75);
                        ?>
                        <?php if($nc == 0) {
                            $class = "news-top-border";
                        } else {
                            $class= "";
                        }
                        ?>
                        <?php $nc++; ?>
                        <div class="row news-title <?php echo $class ?>">
                            <div class="col-md-12 news-padding">
                            <?php echo $title ?>
                            </div>
                        </div>
                        <div class="row news-bottom-border">
                            <div class="col-md-3 news-padding">
                                <img src="<?php echo base_url() ?><?php echo $this->settings->info->upload_path_relative ?>/<?php echo $r->image ?>" width="50" height="50" alt="thum" class="whiteborder" />
                            </div>
                            <div class="col-md-9 arial-font news-text news-padding"><?php echo $r->body ?> ... <a href='<?php echo base_url("news/view/" . $r->ID) ?>'><?php echo lang("lay_21") ?></a></div>
                        </div>
                    <?php endforeach;?>

                <p class="align-center top-margin"><span class="border-button"><a href="<?php echo base_url("news") ?>"><?php echo lang("lay_22") ?></a></span></p>

            </div>
            <?php endif; ?>
            <?php endif; ?>

            <?php if(!$this->settings->info->advert_widget_disable) : ?>
            <?php if($this->settings->info->advert_widget_global || (!$this->settings->info->advert_widget_global && uri_string() == "")) : ?>
            <div class="widget col-md-12 top-margin">
                <div class="widget-padding twitter-last">
                    <div class="widget-title"><?php echo lang("lay_13") ?></div>

                <?php echo $this->settings->info->advert_code ?>
                </div>
            </div>
            <?php endif; ?>
            <?php endif; ?>

            </div>
            <div class="col-md-9">
                <div class="content">
                <?php $gl = $this->session->flashdata('globalmsg'); ?>
                <?php if(!empty($gl)) :?>
                            <div class="row">
                                <div class="col-md-12">
                                        <div class="alert alert-success"><b><?php echo lang("lay_14") ?></b> <?php echo $this->session->flashdata('globalmsg') ?></div>
                                </div>
                            </div>
                <?php endif; ?>
                <?php if($this->user->loggedin && empty($this->user->info->username)) : ?>
                    <?php $this->template->loadAjax("username/index.php", 
                        array(
                        )
                    );
                    ?>
                <?php else : ?>
                    <?php echo $content ?>

            <?php endif; ?>
                </div>
            </div>
            </div>
        </div>

        <footer>

            <div class="container">
                <div class="row">
                <div class="col-md-3">
                    <h2><?php echo lang("lay_20") ?></h2>
                    <p><?php echo lang("lay_15") ?></p>
                </div>
                <div class="col-md-9 social-icons">
                <?php if(!empty($this->settings->info->wordpress_name)) : ?>
                    <a class="wordpress-icon social-icon" href="<?php echo $this->settings->info->wordpress_name ?>">WordPress</a>
                <?php endif; ?>
                <?php if(!empty($this->settings->info->google_name)) : ?>
                <a class="google_icon social-icon" href="<?php echo $this->settings->info->google_name ?>">Google</a>
                <?php endif; ?>
                <?php if(!empty($this->settings->info->skype_name)) : ?>
                <a class="skype_icon social-icon" href="skype:<?php echo $this->settings->info->skype_name ?>">Skype</a>
                <?php endif; ?>
                <?php if(!empty($this->settings->info->facebook_name)) : ?>
                <a class="facebook_icon social-icon" href="<?php echo $this->settings->info->facebook_name ?>">Facebook</a>
                <?php endif; ?>
                <?php if(!empty($this->settings->info->twitter_name)) : ?>
                <a class="twitter_icon social-icon" href="https://twitter.com/<?php echo $this->settings->info->twitter_name ?>">Twitter</a>
                <?php endif; ?>
                </div>
                </div>

                <div class="row">
                </div>
            </div>

        </footer>
    </body>
</html>