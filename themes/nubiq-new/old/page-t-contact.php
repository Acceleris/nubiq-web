<?php

$sent=false;
if($_SERVER["REQUEST_METHOD"]=="POST") {
  $sent=true;
  wp_mail("info@nubiq.ch", pll__("Contact from Nubiq"), 
    "From: $_POST[fullname] <$_POST[email]>\nSubject: $_POST[subject]\n\n" .$_POST["message"],
    ["From: contact@".str_replace("www.", "", $_SERVER["HTTP_HOST"]),
     "Reply-To: $_POST[fullname] <$_POST[email]>"]);
  /*     
  wp_mail("fabrice.guillod@swisssmartmedia.com", pll__("Contact from Nubiq"), 
    "From: $_POST[fullname] <$_POST[email]>\nSubject: $_POST[subject]\n\n" .$_POST["message"],
    ["From: contact@".str_replace("www.", "", $_SERVER["HTTP_HOST"]),
     "Reply-To: $_POST[fullname] <$_POST[email]>"]);
  */
}
?>
    <section class="intro contact">
      <div class="overlay">
        <?php $meta = get_post_meta( get_the_ID() ); ?> 
        <div class="io-content size3 large-title">
          <div class="title"><? echo $meta["nubiq_intro_title"][0] ?></div>
          <div class="subtitle"><? echo $meta["nubiq_intro_subtitle"][0] ?></div>
          <div class="arrow"></div>
          <div class="subsubt"><? echo $meta["nubiq_intro_1"][0] ?></div>
        </div>
      </div>
    </section>
    
<?if($sent) {?>
      <a name="sent"></a>
    <section class="page-content">
      <h1><?=pll__("Thank you for your message!")?></h1>
      <h2><?=pll__("Your message has been successfully sent")?></h2>
      
    </section>
    <section class="home-contact">
      <div class="support-text">
      </div>
    </section>
<?} else {?>
    <section class="page-content">
      <h1><?=$post_meta["nubiq_title"]?></h1>
      <h2><?=$post_meta["nubiq_subtitle"]?></h2>
      
    </section>
    <section class="home-contact">
      <div class="support-text">
        <?php the_post(); the_content()?>
      </div>
      <form method="POST" action="<?=$_SERVER["REQUEST_URI"]?>">
        <p><input type="text" placeholder="<?=pll__("NAME")?>*" name="fullname" required></p>
        <p><input type="email" placeholder="<?=pll__("EMAIL")?>*" name="email" required></p>

		<p><input type="text" placeholder="<?=pll__("SUBJECT")?>*" name="subject" required></p>
<p><textarea placeholder="<?=pll__("MESSSAGE")?>*" name="message" required></textarea></p>
			 

        <p><button class="more-info"><?=pll__("SEND")?></button></p>
      </form>
    </section>
<?}?>
