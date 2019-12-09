<?php get_header(); ?>

<?php
global $post;
$post_meta=get_post_meta($post->ID);
foreach($post_meta as $key=>$value)
  $post_meta[$key]=$value[0];

the_post();

if (is_front_page())
  include("homepage.php");
elseif ($post->post_name=="contact" || $post->post_name=="kontakt")
  include("page-t-contact.php");
else {
  $introClass="";
  $pageClass="";
 if ($post->post_name=="service")
    $introClass="services";
    if ($post->post_name=="tools-and-services")
    $introClass="services";
if ($post->post_name=="support")
    $introClass="services";
    if ($post->post_name=="support-en")
    $introClass="services";
  if ($post->post_name=="why-nubiq")
    $introClass="whynubiq";
      if ($post->post_name=="why-choose-nubiq")
    $introClass="whynubiq";
  if ($post->post_name=="safety-first")
    $introClass="safety";
if ($post->post_name=="datensicherheit-iso-zertifizierungen")
    $introClass="safety";
    if ($post->post_name=="data-protection-and-iso-certifications")
    $introClass="safety";
  if ($post->post_name=="faq")
    $introClass="faq";
    if ($post->post_name=="faq-en")
    $introClass="faq";
  if ($post->post_name=="pricing-paas")
    $introClass="faq";
    if ($post->post_name=="pricing-paas-en")
    $introClass="faq";
  if ($post->post_name=="impressum")
    $introClass="impressum";
  if ($post->post_name=="impressum_datenschutz")
    $introClass="impressum";
 if ($post->post_name=="imprint-and-data-protection")
    $introClass="impressum";
 if ($post->post_name=="allgemeine-geschaeftsbedingungen")
    $introClass="conditions";
 if ($post->post_name=="terms-and-conditions")
    $introClass="conditions";

  include("page-t-custom.php");
}


/*if ($post->post_name=="service")
  include("page-t-service.php");
if ($post->post_name=="impressum")
  include("page-t-impressum.php");
if ($post->post_name=="faq")
  include("page-t-faq.php");
if ($post->post_name=="pricing")
  include("page-t-faq.php");
if ($post->post_name=="safety-first")
  include("page-t-safety.php");*/


get_footer();
