    <section class="intro <?=$introClass?>">
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
    
    <section class="page-content <?=$pageClass?>">
      <h1><?=$post_meta["nubiq_title"]?></h1>
      <h2><?=$post_meta["nubiq_subtitle"]?></h2>
      <div class="text-content">
        <?php the_content()?>
      </div>
<?php
$hasList=false;$listHasIcons=false;
for($i=0;$i<20;$i++) {
  if ($post_meta["nubiq_list{$i}_icon"]*1)
    $listHasIcons=true;
  if ($post_meta["nubiq_list{$i}_title"])
    $hasList=true;
}
if ($hasList) {?>
      <ul class="service-list <?=!$listHasIcons?'certifed':''?>">
<?php for($i=0;$i<20;$i++)
if ($post_meta["nubiq_list{$i}_title"]) {?>
        <li>
          <div class="base">
<?php if($listHasIcons && $post_meta["nubiq_list{$i}_icon"]) {?>
            <img src="<?=wp_get_attachment_url($post_meta["nubiq_list{$i}_icon"])?>" alt="" />
<?php }?>
            <h4><?=$post_meta["nubiq_list{$i}_title"]?></h4>
          </div>
<?if(!$listHasIcons) {?>
          <div class="overlay">
            <h4><?=$post_meta["nubiq_list{$i}_title"]?></h4>
            <p><?=$post_meta["nubiq_list{$i}_text"]?></p>
          </div>
<?}?>
        </li>
<?php }?>
      </ul>
<?php }?>
    </section>
