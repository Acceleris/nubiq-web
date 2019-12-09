<?php get_header(); ?>

<?php
	global $post;
	$post_meta = get_post_meta( $post->ID );
	foreach( $post_meta as $key => $value )
	$post_meta[ $key ] = $value[ 0 ];
?>

<?php // if (has_post_thumbnail( $post->ID ) ):
	// $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'single-post-thumbnail'); ?>
	<!-- <section class="intro" style="background-image: url('<?php // echo $image[0]; ?>');"> -->
<?php // endif; ?>

<?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'single-post-thumbnail'); ?>
<section class="intro" style="background-image: url('<?php echo $image[0]; ?>');">
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
	<h1><?=$post_meta["nubiq_title"]?></h1>
	<h2><?=$post_meta["nubiq_subtitle"]?></h2>
	<div class="faq-list text-content">
		<?php the_content()?>
		<?php
		if ($post->post_name == "data-protection-and-iso-certifications" OR $post->post_name == "datensicherheit-iso-zertifizierungen") { ?>
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
		<?php } ?>
	</div>
</section>

<?php
	if ( is_page("kontakt") OR is_page("contact") ) {
		include("contact.php");
	}
?>

<?php get_footer(); ?>
