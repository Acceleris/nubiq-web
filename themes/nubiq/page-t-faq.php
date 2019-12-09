    <section class="intro">
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
    
    <section class="page-content">
      <h1><?=$post_meta["nubiq_title"]?></h1>
      <h2><?=$post_meta["nubiq_subtitle"]?></h2>
      <div class="faq-list text-content">
        <?php the_content()?>
      </div>

      
    </section>
