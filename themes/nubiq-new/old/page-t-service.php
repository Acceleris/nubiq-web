    <section class="intro">
      <div class="overlay">
		<?php $meta = get_post_meta( get_the_ID() ); ?>
        <div class="io-content size3 large-title">
          <div class="title"><? echo $page_meta["nubiq_intro_title"] ?></div>
          <div class="subtitle"><? echo $page_meta["nubiq_intro_subtitle"] ?></div>
          <div class="arrow"></div>
          <div class="subsubt"><? echo $page_meta["nubiq_intro_1"] ?></div>
        </div>
      </div>
    </section>

    <section class="page-content">
      <h1><?=$page_meta["nubiq_title"]?></h1>
      <h2><?=$page_meta["nubiq_subtitle"]?></h2>
      <div class="text-content">
        <?php the_content()?>
      </div>
<?php
$hasList=false;$listHasIcons=false;
for($i=0;$i<20;$i++) {
  if ($page_meta["nubiq_list{$i}_icon"]*1)
    $listHasIcons=true;
  if ($page_meta["nubiq_list{$i}_title"])
    $hasList=true;
}
if ($hasList) {?>
      <ul class="service-list <?=!$listHasIcons?'certifed':''?>">
<?php for($i=0;$i<20;$i++)
if ($page_meta["nubiq_list{$i}_title"]) {?>
        <li>
          <div class="base">
<?php if($listHasIcons && $page_meta["nubiq_list{$i}_icon"]) {?>
            <img src="<?=wp_get_attachment_url($post_meta["nubiq_list{$i}_icon"])?>" alt="" />
<?php }?>
            <h4><?=$page_meta["nubiq_list{$i}_title"]?></h4>
          </div>
          <div class="overlay">
            <h4><?=$page_meta["nubiq_list{$i}_title"]?></h4>
            <p><?=$page_meta["nubiq_list{$i}_text"]?></p>
          </div>
        </li>
<?php }?>
      </ul>
<?php }?>
    </section>
