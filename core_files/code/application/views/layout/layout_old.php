<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php echo $this->settings->info->site_name ?></title>         
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap -->
        <link href="<?php echo base_url();?>bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">

         <!-- Styles -->
        <link href="<?php echo base_url();?>styles/main.css" rel="stylesheet" type="text/css">
        <?php if($this->settings->info->css_file) : ?>
        <link href="<?php echo base_url();?>styles/<?php echo $this->settings->info->css_file ?>" rel="stylesheet" type="text/css">
        <?php endif; ?>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>

        <!-- SCRIPTS -->
        <script type="text/javascript">
        var global_base_url = "<?php echo base_url() ?>";
        </script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="<?php echo base_url();?>bootstrap/js/bootstrap.min.js"></script>


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

        <!-- CODE INCLUDES -->
        <?php echo $cssincludes ?> 
        <?php echo $this->settings->info->css_extra_files ?>
    </head>
    <body>
        <header class="container top-header">
        	<div class="row">
        		<div class="col-md-8">
        			<?php if(empty($this->settings->info->site_logo)) : ?>
        				<img src="<?php echo base_url() ?>images/logo.png" alt="logo" class="logo" />
        			<?php else :?>
        				<img src="<?php echo base_url() ?><?php echo $this->settings->info->upload_path_relative ?>/<?php echo $this->settings->info->site_logo ?>" alt="logo" class="logo" />
        			<?php endif; ?>
        		</div>
        		<div class="col-md-4 align-right">
        		<?php if(!empty($this->settings->info->wordpress_name)) : ?>
	        		<a class="social-icons wordpress-icon" href="<?php echo $this->settings->info->wordpress_name ?>">WordPress</a>
	        	<?php endif; ?>
	        	<?php if(!empty($this->settings->info->google_name)) : ?>
        		<a class="social-icons google_icon" href="<?php echo $this->settings->info->google_name ?>">Google</a>
        		<?php endif; ?>
        		<?php if(!empty($this->settings->info->skype_name)) : ?>
        		<a class="social-icons skype_icon" href="skype:<?php echo $this->settings->info->skype_name ?>">Skype</a>
        		<?php endif; ?>
        		<?php if(!empty($this->settings->info->facebook_name)) : ?>
        		<a class="social-icons facebook_icon" href="<?php echo $this->settings->info->facebook_name ?>">Facebook</a>
        		<?php endif; ?>
        		<?php if(!empty($this->settings->info->twitter_name)) : ?>
        		<a class="social-icons twitter_icon" href="https://twitter.com/<?php echo $this->settings->info->twitter_name ?>">Twitter</a>
        		<?php endif; ?>
        		</div>
        	</div>

        	<div class="row">
        		<div class="col-md-12">
        			<div class="nav-bar">
        				<ul class="sc-nav">
        					<li <?php if(isset($homeActive)) echo 'class="active"' ?>><a href="<?php echo base_url() ?>"><?php echo lang("nav_1") ?></a>
	        					<ul>
	        					<?php if(!$this->user->loggedin) : ?>
	        						<li><a href="<?php echo base_url("register") ?>"><?php echo lang("nav_2") ?></a></li>
	        						<li><a href="<?php echo base_url("login") ?>"><?php echo lang("nav_3") ?></a></li>
	        					<?php endif; ?>
	        					<?php if($this->user->loggedin) : ?>
	        						<?php if($this->user->info->access_level > 0) : ?>
	        							<li><a href="<?php echo base_url("admin") ?>"><?php echo lang("nav_4") ?></a></li>
	        						<?php endif; ?>
	        					<?php endif; ?>
	        					</ul>
	        				</li>
        					<li <?php if(isset($newsActive)) echo 'class="active"' ?>><a href="<?php echo base_url("news") ?>"><?php echo lang("nav_5") ?></a></li>
        					<?php if(!$this->settings->info->mailbox) : ?>
        						<li <?php if(isset($mailActive)) echo 'class="active"' ?>><a href="<?php echo base_url("mail") ?>"><?php echo lang("nav_6") ?></a></li>
        					<?php endif; ?>
        					<li <?php if(isset($pageActive)) echo 'class="active"' ?>><a href="<?php echo base_url("pages") ?>"><?php echo lang("nav_7") ?></a></li>
        					<li <?php if(isset($contactActive)) echo 'class="active"' ?>><a href="<?php echo base_url("feedback") ?>"><?php echo lang("nav_8") ?></a></li>
        				</ul>
        			</div>
        		</div>
        	</div>
        </header>

        <div class="body-content container">
	        <div class="row">
	        	<div class="col-md-3">
	        	<?php if(isset($sidebar)) : ?>
	        		<?php echo $sidebar ?>
	        	<?php endif; ?>
	        		<div class="sidebar">
		        		<div class="sidebar-top">
		        			<?php echo lang("lay_1") ?>
		    			</div>
		    			<div class="sidebar-body">
		    			<?php if($this->user->loggedin) : ?>
			    			<div class="row">
	        					<div class="col-md-5">
	        						<img src="<?php echo base_url() ?><?php echo $this->settings->info->upload_path_relative ?>/<?php echo $this->user->info->avatar ?>" alt="guest" class="avatar">
	        					</div>
	        					<div class="col-md-7 user-panel-info">
	        						<b><?php echo $this->user->info->name ?></b>
	        						<br /><?php echo $this->common->getAccessLevel($this->user->info->access_level) ?>
	        					</div>
	        				</div>
	        				<?php if(!$this->settings->info->mailbox) : ?>
	        				<div class="row decent-margin-top font-size-12">
	        					<div class="col-md-2">
	        						<div class="mail-icon"><?php echo lang("lay_2") ?></div>
	        					</div> 
	        					<div class="col-md-10">
	        					<?php
	        						$event = $this->event_model->get_event($this->user->info->ID);
	        					?>
	        					<?php if($event->num_rows() > 0) : ?>
	        						<?php $event = $event->row(); ?>
	        						<div id="messages-event"><?php echo lang("lay_3") ?><?php echo $event->count ?> <a href="<?php echo base_url("mail") ?>"><?php echo lang("lay_4") ?></a>. [<a href='javascript:void(0)' onclick='close_event(<?php echo $event->ID ?>)'>X</a>]</div>
	        					<?php else : ?>
	        						<?php echo lang("lay_5") ?><a href="<?php echo base_url("mail") ?>"><?php echo lang("lay_6") ?></a>
	        					<?php endif; ?>
	        					</div>
	        				</div>
	        				<?php endif; ?>
	        				<a href='<?php echo base_url("user_panel") ?>'><?php echo lang("lay_7") ?></a> - <a href='<?php echo base_url("login/logout/" . $this->security->get_csrf_hash());?>'><?php echo lang("lay_8") ?></a>
	        			<?php else: ?>
	        				<div class="row">
	        				<div class="col-md-12 font-size-12">
	        					<?php echo form_open(base_url("login/pro")) ?>
					    			<div class="input-group">
					      				<span class="input-group-addon">@</span>
					      				<input type="text" name="email" class="form-control" placeholder="<?php echo lang("lay_16") ?>">
					    			</div><br />

					    			<div class="input-group">
					      				<span class="input-group-addon"><span class="glyphicon glyphicon-hand-right"></span></span>
					      				<input type="password" name="pass" class="form-control"  placeholder="<?php echo lang("lay_17") ?>">
					    			</div><br />
					    			<div class="row">
						    			<div class="col-md-8">
						    			<input type="checkbox" class="" name="remember" value="1"> <?php echo lang("lay_9") ?>
						    			</div>
						    			<div class="col-md-4">
						    			<input type="submit" class="btn btn-primary floatRight purpleButton" value="<?php echo lang("lay_10") ?>">
						    			</div>
					    			</div>
					    			<?php if($this->settings->info->fp_social) : ?>
						    			<p><a href="<?php echo base_url("login/twitter_login") ?>"><img src="<?php echo base_url() ?>images/sign-in-with-twitter-gray.png" alt="twitter"></a></p>
										<p><a href="<?php echo base_url("login/facebook_login") ?>"><img src="<?php echo base_url() ?>images/pressed_404.png" alt="facebook" width="158" height="38"></a></p>
	    								<p><a href="<?php echo base_url("login/google_login") ?>"><img src="<?php echo base_url() ?>images/White-signin_Long_base_20dp.png" ></a></p>
	    							<?php endif; ?>
    							<?php echo form_close() ?>
	        				</div>
	        				</div>

	        			<?php endif; ?>
		        		</div>

		        		<?php if(!$this->settings->info->twitter_widget_disable) : ?>
		        		<?php if($this->settings->info->twitter_widget_global || (!$this->settings->info->twitter_widget_global && uri_string() == "")) : ?>
		        		<div class="sidebar-top sidebar-block-margin sidebar-top-twitter">
		        			<?php echo lang("lay_11") ?>
		        		</div>
		        		<div class="sidebar-body">
		        			<div id="loader"><img src="<?php echo base_url() ?>images/ajax-loader.gif" alt="loading" /></div>
		                    <div id="tweets">
		                    </div>
		        		</div>
		        		<?php endif; ?>
		        		<?php endif; ?>


		        		<?php if(!$this->settings->info->news_widget_disable) : ?>
		        		<?php if($this->settings->info->news_widget_global || (!$this->settings->info->news_widget_global && uri_string() == "")) : ?>
		        		<div class="sidebar-top sidebar-block-margin">
		        			<?php echo lang("lay_12") ?>
		    			</div>
		    			<div class="sidebar-body">
		    				<?php $news = $this->news_model->get_recent_news($this->settings->info->news_display_limit); ?>
		    				<?php foreach($news->result() as $r) : ?>
		    					<?php $title = substr($r->title, 0, 20); ?>
		    					<div class="row font-size-12 twitter-margin-top">
				    				<div class="col-md-2">
				    					<div class="news-icon">News</div>
				    				</div>
				    				<div class="col-md-10">
				    					<a href='<?php echo base_url("news/view/" . $r->ID) ?>'><?php echo $title ?> ...</a><br />
				    					<p class="small-text small-margin"><?php echo date("jS M Y", $r->timestamp) ?></p>
				    				</div>
				    			</div>
		    				<?php endforeach; ?>
		        		</div>
		        		<?php endif; ?>
		        		<?php endif; ?>

		        		<?php if(!$this->settings->info->advert_widget_disable) : ?>
		        		<?php if($this->settings->info->advert_widget_global || (!$this->settings->info->advert_widget_global && uri_string() == "")) : ?>
		        		<div class="sidebar-top sidebar-block-margin">
		        			<?php echo lang("lay_13") ?>
		    			</div>
		    			<div class="sidebar-body">
		    				<div class="row font-size-12 twitter-margin-top">
				    			<div class="col-md-12">
				    				<?php echo $this->settings->info->advert_code ?>
				    			</div>
				    		</div>
		        		</div>
		        		<?php endif; ?>
		        		<?php endif; ?>

	    			</div>

	        	</div>
	        	<div class="col-md-9">
	        		<div class="content">
	        		 <?php $gl = $this->session->flashdata('globalmsg'); ?>
				        <?php if(!empty($gl)) :?>
				                    <div class="row">
				                        <div class="col-md-12">
				                            <div class="block-normal-noheight full-rounded-corners lightShadow">
				                                <div class="alert alert-success"><b><?php echo lang("lay_14") ?></b> <?php echo $this->session->flashdata('globalmsg') ?></div>
				                            </div>
				                        </div>
				                    </div>
				        <?php endif; ?>
        				<?php echo $content ?>
        			</div>
	        	</div>
	        </div>
        </div>

        <footer class="container">
        	<div class="row">
        		<div class="col-md-12">
        			<div class="footer-bar"><?php echo lang("lay_15") ?></div>
        		</div>
        	</div>

        </footer>
        
    </body>
</html>
