<?php
$options=array(
  "login_link"=>array("label"=>"Login Link", "type"=>"text"),
  "impressum_link_en"=>array("label"=>"Impressum Link EN", "type"=>"text"),
  "impressum_link_de"=>array("label"=>"Impressum Link DE", "type"=>"text"),
  "footer_text_en"=>array("label"=>"Footer Text EN", "type"=>"text"),
  "footer_text_de"=>array("label"=>"Footer Text DE", "type"=>"text")
);
if ($_SERVER["REQUEST_METHOD"]=="POST") {
  foreach($options as $option=>$optVals)
    if (isset($_POST["$option"]))
      update_option("nubiq_$option", $_POST["$option"]);
  echo "<script>window.open(location.href, \"_self\")</script>";
}
$values=array();
foreach($options as $option=>$optVals)
  $values[$option]=get_option("nubiq_$option");

$query_images=new WP_Query(array(
  'post_type'=>'attachment',
  'post_mime_type'=>'image',
  'post_status'=>'inherit',
  'posts_per_page'=>1000
));
$photolist=array();
foreach($query_images->posts as $photo)
  $photolist[$photo->ID]=$photo->post_name;

?>
<br />
<form method="post" action="admin.php?page=nubiq-options" class="nubiq_form postbox">
  <h2>Nubiq Theme Global Options</h2>
  <div class="inside">
<?php foreach($options as $option=>$optVals) {?>
  <div class="nubiq_field"><label><?=$optVals["label"]?></label><div>
<?php if($optVals["type"]=="photo") {?>
<?php nubiq_select($option, $values[$option], $photolist); ?>
<?php } else {?>
    <input type="<?=$optVals["type"]?>" name="<?=$option?>" value="<?=htmlspecialchars($values[$option])?>" />
<?php } ?>
  </div></div>
<?php } ?>
  <button class="button">Save</button>
  </div>
</form>

<style>
  .nubiq_form {
    width: 66%;
  }
  .nubiq_form .nubiq_field {
    display: block;
    overflow: hidden;
    padding: 2px 0;
  }
  .nubiq_form .nubiq_field>label {
    float: left;
    width: 200px;
    text-align: right;
    line-height: 30px;
  }
  .nubiq_form .nubiq_field>div {
    margin-left: 205px;
    margin-right: 10px;
  }
  .nubiq_form .nubiq_field>div>input[type=email],
  .nubiq_form .nubiq_field>div>select,
  .nubiq_form .nubiq_field>div>textarea,
  .nubiq_form .nubiq_field>div>input[type=text] {
    width: 100%;
    box-sizing: border-box;
  }
  .nubiq_form .nubiq_description {
    padding: 30px;
    text-align: center;
  }
  .nubiq_form h2 {
    font-size: 14px;
    padding: 8px 12px;
    margin: 0;
    line-height: 1.4;
    border-bottom: 1px solid #e5e5e5;
  }
</style>