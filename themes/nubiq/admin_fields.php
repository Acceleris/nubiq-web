<?php
global $post;
$postmeta=array();
foreach(get_post_meta($post->ID) as $field=>$value)
  $postmeta[$field]=count($value)>1?$value:$value[0];
unset($field);unset($value);
$photos=new WP_Query(array(
  'post_type'=>'attachment',
  'post_mime_type'=>'image',
  'post_status'=>'inherit',
  'posts_per_page'=>1000
));
$photolist=array("0"=>"(no photo)");
foreach($photos->posts as $photo)
  $photolist[$photo->ID]=$photo->post_name;
?>
<div class="nubiq_fields">
<?php foreach($fields as $id=>$field) {
if ($field["type"]=="description") {?>
  <div class="nubiq_description">
    <?=$field["label"]?>
  </div>
<?php } else {?>
  <div class="nubiq_field">
    <label><?=$field["label"]?></label>
    <div>
<?php if($field["type"]=="photo") {?>
<?php nubiq_select($id, $postmeta[$id], $photolist); ?>
<?php } elseif($field["type"]=="textarea") {?>
      <textarea name="<?=$id?>"><?=htmlspecialchars($postmeta[$id])?></textarea>
<?php } elseif($field["type"]=="textarea2") {?>
      <textarea style="height: 150px" name="<?=$id?>"><?=htmlspecialchars($postmeta[$id])?></textarea>
<?php } elseif($field["type"]=="select") {?>
      <select name="<?=$id?>">
<?php foreach($field["options"] as $optval=>$option) {?>
        <option value="<?=$optval?>" <?=$optval==$postmeta[$id]?'selected':''?>><?=htmlspecialchars($option)?></option>
<?php }?>
      </select>
<?php } else {?>
      <input name="<?=$id?>" type="<?=$field["type"]?>" value="<?=htmlspecialchars($postmeta[$id])?>">
<?php }?>
    </div>
  </div>
<?php } }?>
</div>

<style>
  .nubiq_fields .nubiq_field {
    display: block;
    overflow: hidden;
    padding: 2px 0;
  }
  .nubiq_fields .nubiq_field>label {
    float: left;
    width: 200px;
    text-align: right;
    line-height: 30px;
  }
  .nubiq_fields .nubiq_field>div {
    margin-left: 205px;
    margin-right: 10px;
  }
  .nubiq_fields .nubiq_field>div>input[type=email],
  .nubiq_fields .nubiq_field>div>select,
  .nubiq_fields .nubiq_field>div>textarea,
  .nubiq_fields .nubiq_field>div>input[type=text] {
    width: 100%;
    box-sizing: border-box;
  }
  .nubiq_fields .nubiq_description {
    padding: 30px;
    text-align: center;
  }
</style>