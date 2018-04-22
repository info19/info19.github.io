<?php if( !empty( $tweets) AND empty( $tweets->errors ) ) : ?>
    <?php $twitter = current($tweets);
    $count = 0; ?>
    <?php $twitclass = "twitter-area-sep"; ?>
<?php foreach($tweets as $tweet ) : ?>
    <?php if(is_object($tweet)) : ?>

    <?php 
        $count++;
        if( (strtotime($tweet->timestamp)+3600*24) > time() ) {
            $date = "Less than a day ago";
        } elseif( (strtotime($tweet->timestamp)+3600*48) > time() ) {
            $date = "One day ago";
        } elseif ( (strtotime($tweet->timestamp)+3600*48) > time() ) {
            $date = "Two days ago";
        } else {
            $date = date("m-d-Y",strtotime($tweet->timestamp));
        }
        $text = $tweet->tweet;
        $text = preg_replace( '/http:\/\/([a-z0-9_\.\-\+\&\!\#\~\/\,]+)/i', "<a href='http://$1'>http://$1</a>", $tweet->tweet );

        if($count == 1) {
            $class = "twitter-top";
        } else {
            $class = "";
        }

        if($twitclass == "twitter-area") {
            $twitclass = "twitter-area-sep";
        } else {
            $twitclass = "twitter-area";
        }
    ?>
    <div class="row">
        <div class="col-md-12 <?php echo $twitclass . " " . $class ?>">
            <div class="row">
                <div class="col-md-2 align-center tweet-icon">
                    <img src="<?php echo base_url() ?>images/tweet.png" alt="tweet" />
                </div>
                <div class="col-md-10 font-size-13 arial-font">
                    <span class="tweet-username"><?php echo $twitter->name ?></span><br />
                    <span class="tweet-usernameat">@<?php echo $twitter->username ?></span>
                </div>
            </div>
            <p class="tweet-text arial-font"><?php echo $text ?></p>
            <p class="tweet-day"><?php echo $date ?></p>
        </div>
    </div>
    <?php endif; ?>
<?php endforeach; ?>
<div class="row">
        <div class="col-md-12 twitter-last">
        </div>
</div>
<?php endif; ?>