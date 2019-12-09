<p>intro.php</p>

<?php
	global $post;
	$post_meta = get_post_meta( $post->ID );
	foreach( $post_meta as $key => $value )
	$post_meta[ $key ] = $value[ 0 ];
?>

<?php
	if (has_post_thumbnail( $post->ID ) ):
		$image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'single-post-thumbnail'); ?>
		<section class="intro" style="background-image: url('<?php echo $image[0]; ?>');">
	<?php endif;
?>

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
