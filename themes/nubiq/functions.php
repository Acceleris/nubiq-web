<?php


// disable windows live writer tags
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'rsd_link');


add_action('after_setup_theme', 'nubiq_theme_setup');
function nubiq_theme_setup() {
  register_nav_menu('primary', __('Primary Menu', 'theme-slug'));
  //register_nav_menu('nubiq_foot1', __('Footer Menu Home', 'theme-slug'));
  //register_nav_menu('nubiq_foot2', __('Footer Menu About', 'theme-slug'));
  //register_nav_menu('nubiq_foot3', __('Footer Menu Contact', 'theme-slug'));
}

function create_post_type() {
	register_post_type( 'nubiq_quotes',
		array(
			'labels' => array(
			'name' => __( 'Quotes' ),
			'singular_name' => __( 'Quote' )
		),
			'public' => true,
			'has_archive' => true,
			'menu_icon' => "dashicons-format-quote"
		)
	);
}
add_action( 'init', 'create_post_type' );

// admin global settings
add_action('admin_menu', 'nubiq_admin_menu');
function nubiq_admin_menu() {
  add_menu_page('Nubiq Theme Options', 'Nubiq Theme', 'manage_options', 'nubiq-options', 'nubiq_admin_options' );
  
}
function nubiq_admin_options() {
  include(__DIR__.DIRECTORY_SEPARATOR."admin_options.php");
}

function nubiq_select($name, $value, $options) {
  echo "<select name=\"$name\">\n";
  foreach($options as $ovalue=>$option) {
    echo "<option value=\"".htmlspecialchars($ovalue)."\"";
    if ($value==$ovalue)
      echo " selected";
    echo ">".htmlspecialchars($option)."</option>";
  }
  echo "</select>\n";
}


//add_action('plugins_loaded', 'nubiq_init');
function nubiq_init() {

  pll_register_string("impressum", "Impressum", "NUBIQ");
  pll_register_string("formsend", "SEND", "NUBIQ");
  pll_register_string("formname", "NAME", "NUBIQ");
  pll_register_string("formemail", "EMAIL", "NUBIQ");
  pll_register_string("formsubject", "SUBJECT", "NUBIQ");
  pll_register_string("formmsg", "MESSSAGE", "NUBIQ");
  pll_register_string("contactfrom", "Contact from Nubiq", "NUBIQ");
  pll_register_string("messagesent2", "Your message has been successfully sent", "NUBIQ");
  pll_register_string("messagesent", "Thank you for your message!", "NUBIQ");


}

add_action('admin_init', 'nubiq_admin_init');
function nubiq_admin_init() {

  $post_id = !empty($_GET['post']) ? $_GET['post'] : (!empty($_POST['post_ID']) ? $_POST['post_ID'] : null);
  if ($post_id) {
      $postmeta=get_post_meta($post_id);

    $tr=pll_get_post_translations($post_id);
    if ($post_id==get_option("page_on_front") || in_array(get_option("page_on_front"), $tr)) {
      remove_post_type_support( 'page', 'editor' );
      add_meta_box('nubiq_intro', 'Intro', 'nubiq_intro_metabox', 'page', 'normal', 'high');
      add_meta_box('nubiq_iso', 'ISO', 'nubiq_iso_metabox', 'page', 'normal', 'high');
      add_meta_box('nubiq_about', 'About', 'nubiq_about_metabox', 'page', 'normal', 'high');
      add_meta_box('nubiq_services', 'Services', 'nubiq_services_metabox', 'page', 'normal', 'high');
      add_meta_box('nubiq_quotes', 'Quotes', 'nubiq_quotes_metabox', 'page', 'normal', 'high');
      add_meta_box('nubiq_join', 'Join', 'nubiq_join_metabox', 'page', 'normal', 'high');
      add_meta_box('nubiq_contact', 'Join', 'nubiq_contact_metabox', 'page', 'normal', 'high');
      add_action('save_post', 'nubiq_admin_savehome', 10, 2 );
    } else {
      add_meta_box('nubiq_intro', 'Intro', 'nubiq_intro_metabox', 'page', 'nubiq_intro', 'high');
      add_meta_box('nubiq_subtitle', 'Content Head', 'nubiq_subtitle_metabox', 'page', 'nubiq_intro', 'high');
      add_meta_box('nubiq_page_list', 'Page Links', 'nubiq_page_list', 'page', 'normal', 'high');
      //add_meta_box('nubiq_page_type', 'Page Type', 'nubiq_page_type', 'page', 'normal', 'high');
      add_action('save_post', 'nubiq_admin_saveotherpage', 10, 2 );
    }
  }
  
  // meta boxes for custom post types
  add_meta_box('nubiq_c_quotes', 'Quote Content', 'nubiq_quotes_box', 'nubiq_quotes', 'normal', 'high');

  
}

function nubiq_edit_form_after_title() {
  global $post, $wp_meta_boxes;
  do_meta_boxes( get_current_screen(), 'nubiq_intro', $post );
  unset( $wp_meta_boxes['post']['nubiq_intro'] );
}
add_action( 'edit_form_after_title', 'nubiq_edit_form_after_title' );

$nubiq_intro_meta=array(
//   "nubiq_intro_photo"=>array("label"=>"Photo", "type"=>"photo"),
  "nubiq_intro_title"=>array("label"=>"Title", "type"=>"text"),
  "nubiq_intro_subtitle"=>array("label"=>"Subtitle", "type"=>"text"),
  "nubiq_intro_1"=>array("label"=>"Subtext", "type"=>"text"),
);
$nubiq_iso_meta=array(
  "nubiq_iso_photo"=>array("label"=>"Photo", "type"=>"photo"),
  "nubiq_iso_l_title"=>array("label"=>"Left Title", "type"=>"text"),
  "nubiq_iso_l_subtitle"=>array("label"=>"Left Subtitle", "type"=>"text"),
  "nubiq_iso_l_text"=>array("label"=>"Left Text", "type"=>"text"),
  "nubiq_iso_title"=>array("label"=>"Title", "type"=>"text"),
  "nubiq_iso_subtitle"=>array("label"=>"Subtitle", "type"=>"text"),
  "nubiq_iso_text"=>array("label"=>"Text", "type"=>"textarea"),
  "nubiq_iso_link_title"=>array("label"=>"Link Title", "type"=>"text"),
  "nubiq_iso_link_url"=>array("label"=>"Link URL", "type"=>"text"),
);
$nubiq_about_meta=array(
  "nubiq_about_photo"=>array("label"=>"Photo", "type"=>"photo"),
  "nubiq_about_title"=>array("label"=>"Title", "type"=>"text"),
  "nubiq_about_subtitle"=>array("label"=>"Subtitle", "type"=>"text"),
  "nubiq_about_text"=>array("label"=>"Text", "type"=>"textarea"),
  "nubiq_about_link_title"=>array("label"=>"Link Title", "type"=>"text"),
  "nubiq_about_link_url"=>array("label"=>"Link URL", "type"=>"text"),
);
$nubiq_services_meta=array(
  "nubiq_services_photo"=>array("label"=>"Photo", "type"=>"photo"),
  "nubiq_services_title"=>array("label"=>"Title", "type"=>"text"),
  "nubiq_services_subtitle"=>array("label"=>"Subtitle", "type"=>"text"),
  "nubiq_services_text"=>array("label"=>"Text", "type"=>"textarea"),
  "nubiq_services_link_title"=>array("label"=>"Link Title", "type"=>"text"),
  "nubiq_services_link_url"=>array("label"=>"Link URL", "type"=>"text"),
);
$nubiq_join_meta=array(
  "nubiq_join_title"=>array("label"=>"Title", "type"=>"text"),
  "nubiq_join_subtitle"=>array("label"=>"Subtitle", "type"=>"text"),
  "nubiq_join_text"=>array("label"=>"Text", "type"=>"textarea"),
  "nubiq_join_link_title"=>array("label"=>"Link Title", "type"=>"text"),
  "nubiq_join_link_url"=>array("label"=>"Link URL", "type"=>"text"),
);
$nubiq_quotes_meta=array(
  "nubiq_quotes_more"=>array("label"=>"(edit quotes <a target=\"_blank\" href=\"edit.php?post_type=nubiq_quotes\">here</a>)", "type"=>"description"),
);
$nubiq_contact_meta=array(
  "nubiq_contact_title"=>array("label"=>"Title", "type"=>"text"),
);
$nubiq_quotes_meta_c=array(
  "nubiq_quote_text"=>array("label"=>"Content", "type"=>"textarea"),
  "nubiq_quote_author"=>array("label"=>"Author", "type"=>"text"),
);
$nubiq_subtitle_meta=array(
  "nubiq_title"=>array("label"=>"Title", "type"=>"text"),
  "nubiq_subtitle"=>array("label"=>"Subtitle", "type"=>"text"),
);

$nubiq_page_list_meta=array();
for($i=0;$i<20;$i++) {
  $nubiq_page_list_meta["nubiq_list{$i}_icon"]=array("label"=>"Icon", "type"=>"photo");
  $nubiq_page_list_meta["nubiq_list{$i}_title"]=array("label"=>"Title", "type"=>"text");
  $nubiq_page_list_meta["nubiq_list{$i}_text"]=array("label"=>"Text", "type"=>"textarea");
}


function nubiq_intro_metabox() { nubiq_metabox($GLOBALS["nubiq_intro_meta"]); }
function nubiq_iso_metabox() { nubiq_metabox($GLOBALS["nubiq_iso_meta"]); }
function nubiq_about_metabox() { nubiq_metabox($GLOBALS["nubiq_about_meta"]); }
function nubiq_services_metabox() { nubiq_metabox($GLOBALS["nubiq_services_meta"]); }
function nubiq_quotes_metabox() { nubiq_metabox($GLOBALS["nubiq_quotes_meta"]); }
function nubiq_join_metabox() { nubiq_metabox($GLOBALS["nubiq_join_meta"]); }
function nubiq_contact_metabox() { nubiq_metabox($GLOBALS["nubiq_contact_meta"]); }
function nubiq_quotes_box() { nubiq_metabox($GLOBALS["nubiq_quotes_meta_c"]); }
function nubiq_subtitle_metabox() { nubiq_metabox($GLOBALS["nubiq_subtitle_meta"]); }
function nubiq_page_list() { nubiq_metabox($GLOBALS["nubiq_page_list_meta"]); }

function nubiq_metabox($fields) {
  include(__DIR__.DIRECTORY_SEPARATOR."admin_fields.php");
}


function nubiq_admin_savehome() {
  global $post;
  $postmeta=get_post_meta($post->ID);
  $fields=$GLOBALS["nubiq_intro_meta"]+$GLOBALS["nubiq_iso_meta"]+
          $GLOBALS["nubiq_about_meta"]+$GLOBALS["nubiq_services_meta"]+
          $GLOBALS["nubiq_join_meta"]+$GLOBALS["nubiq_contact_meta"];
  
  foreach($fields as $id=>$field)
    update_post_meta($post->ID, $id, $_POST[$id]);
}
function nubiq_admin_saveotherpage($id, $post) {
  //$postmeta=get_post_meta($post->ID);
  if ($post->post_type=="page")
    $fields=$GLOBALS["nubiq_intro_meta"]+$GLOBALS["nubiq_subtitle_meta"]+
            $GLOBALS["nubiq_page_list_meta"];
  elseif ($post->post_type=="nubiq_quotes")
    $fields=$GLOBALS["nubiq_quotes_meta_c"];

  if ($fields)
  foreach($fields as $id=>$field)
    update_post_meta($post->ID, $id, $_POST[$id]);
}

add_action( 'phpmailer_init', 'nubiq_phpmailer_init' );
function nubiq_phpmailer_init($phpmailer) {
  if (!$phpmailer->SMTPOptions)
    $phpmailer->SMTPOptions=array();
  $phpmailer->SMTPOptions['ssl']=array(
    'verify_peer' => false,
    'verify_peer_name' => false,
    'allow_self_signed' => true
  );
  // $phpmailer->AuthType="PLAIN";
}
