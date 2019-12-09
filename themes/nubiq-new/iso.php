<?php
$hasList = true;
$listHasIcons = true;

for($i=0;$i<20;$i++) {
  if ($post_meta["nubiq_list{$i}_icon"]*1)
    $listHasIcons = true;
  if ($post_meta["nubiq_list{$i}_title"])
    $hasList = true;
}

if ($hasList) { ?>
  <ul class="service-list <?=!$listHasIcons?'certifed':''?>">
    <?php for($i=0;$i<20;$i++)
      if ($post_meta["nubiq_list{$i}_title"]) {?>
        <li>
          <div class="base">
          <?php if($listHasIcons && $post_meta["nubiq_list{$i}_icon"]) { ?>
            <img src="<?=wp_get_attachment_url($post_meta["nubiq_list{$i}_icon"])?>" alt="" />
            <?php } ?>
            <h4><?=$post_meta["nubiq_list{$i}_title"]?></h4>
          </div>
          <? if(!$listHasIcons) { ?>
            <div class="overlay">
              <h4><?=$post_meta["nubiq_list{$i}_title"]?></h4>
              <p><?=$post_meta["nubiq_list{$i}_text"]?></p>
            </div>
          <? } ?>
        </li>
      <?php } ?>
    </ul>
  <?php }
}
?>
