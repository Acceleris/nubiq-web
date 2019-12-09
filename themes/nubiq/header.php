<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <base href="http<?=$_SERVER["HTTPS"] && $_SERVER["HTTPS"]!="off"?'s':''?>://<?=$_SERVER["HTTP_HOST"]?>/" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=1.0, minimum-scale=1.0, maximum-scale=1.0">
    <title><?php wp_title(' - ', true, 'right') ?> You develop. We operate.</title>
    <link rel="stylesheet" href="<?=get_template_directory_uri()?>/style.css" />
    <link rel="stylesheet" href="<?=get_template_directory_uri()?>/static/css/layout.css" />

    

    <!--[if IE]><link rel="shortcut icon" href="~/Themes/Nubiq/Content/img/nubiq/favicon/favicon.ico" type="image/x-icon" /><![endif]-->
    <link rel="apple-touch-icon" sizes="180x180" href="<?=get_template_directory_uri()?>/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?=get_template_directory_uri()?>/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?=get_template_directory_uri()?>/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?=get_template_directory_uri()?>/favicon/manifest.json">
    <link rel="mask-icon" href="<?=get_template_directory_uri()?>/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="theme-color" content="#ffffff">
    
    
<?php wp_head(); ?>
  </head>
  <body>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-57787090-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-57787090-3');
</script>

<header>
	<div class="head-inner">
		<!--<h1><a href="https://nubiq.ch"/>Nubiq</a></h1>-->
		<h1><a href="<?php echo esc_url(home_url('/')); ?>"/>Nubiq</a></h1>
		
		<a href="https://nubiq.ch/contact/" class="button" ;>Free Trial</a>
		<style class="responsive">
.button {
  background-color: #d4d10f;
  border: none;
  color: black;
	  width: 102px;
  max-width: 100%;
  padding: 10px;
	  
  text-align: center;
  text-decoration: none;
  float: none
	display: center;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
 

}
</style>
		
		<nav>
			<ul class="lang"><?php pll_the_languages(); ?></ul>
			<a href="<?=get_option("nubiq_login_link")?>" class="login"><?=pll__("Login")?></a>
			<a href="" class="menu-handle">Menu</a>
			<?=wp_nav_menu(["menu"=>"primary", "container"=>false])?>
		</nav>
	</div>
</header>
