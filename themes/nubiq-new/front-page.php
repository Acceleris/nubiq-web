<?php get_header(); ?>

<?php
	global $post;
	$post_meta = get_post_meta( $post->ID );
	foreach( $post_meta as $key => $value )
	$post_meta[ $key ] = $value[ 0 ];
?>

<?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'single-post-thumbnail'); ?>
<section class="intro_front-page" style="background-image: url('<?php echo $image[0]; ?>');">
	<div class="overlay">
		<div class="io-content size1">
			<div class="title"><?=$post_meta["nubiq_intro_title"]?></div>
			<div class="subtitle"><?=$post_meta["nubiq_intro_subtitle"]?></div>
			<div class="arrow"></div>
			<div class="subsubt"><?=$post_meta["nubiq_intro_1"]?></div>
		</div>
	</div>
</section>

<section class="home-split side1">
	<div class="sec-img isoc" style="background-image: url('<?=wp_get_attachment_url($post_meta["nubiq_iso_photo"])?>')">
		<div class="overlay">
			<div class="cert-content">
				<div class="iso"><?=$post_meta["nubiq_iso_l_title"]?></div>
				<div class="subtitle"><?=$post_meta["nubiq_iso_l_subtitle"]?></div>
				<div class="arrow"></div>
				<div class="cert-list"><?=$post_meta["nubiq_iso_l_text"]?></div>
				<!--<div class="cert-list">27001 | 27018</div>-->
			</div>
		</div>
	</div>
	<div class="sec-content">
		<div>
			<h1><?=$post_meta["nubiq_iso_title"]?></h1>
			<h2><?=$post_meta["nubiq_iso_subtitle"]?></h2>
			<div class="text-content">
				<p><?=$post_meta["nubiq_iso_text"]?></p>
			</div>
			<a href="<?=$post_meta["nubiq_iso_link_url"]?>" class="more-info"><?=$post_meta["nubiq_iso_link_title"]?></a>
		</div>
	</div>
</section>

<section class="home-split side2">
	<div class="sec-img isoc" style="background-image: url('<?=wp_get_attachment_url($post_meta["nubiq_about_photo"])?>')"></div>
	<div class="sec-content">
		<div>
			<h1><?=$post_meta["nubiq_about_title"]?></h1>
			<h2><?=$post_meta["nubiq_about_subtitle"]?></h2>
			<div class="text-content">
				<p><?=$post_meta["nubiq_about_text"]?></p>
			</div>
			<a href="<?=$post_meta["nubiq_about_link_url"]?>" class="more-info"><?=$post_meta["nubiq_about_link_title"]?></a>
		</div>
	</div>
</section>

<section class="home-split side1">
	<div class="sec-img isoc" style="background-image: url('<?=wp_get_attachment_url($post_meta["nubiq_services_photo"])?>')"></div>
	<div class="sec-content">
		<div>
			<h1><?=$post_meta["nubiq_services_title"]?></h1>
			<h2><?=$post_meta["nubiq_services_subtitle"]?></h2>
			<div class="text-content">
				<p><?=$post_meta["nubiq_services_text"]?></p>
			</div>
			<a href="<?=$post_meta["nubiq_services_link_url"]?>" class="more-info"><?=$post_meta["nubiq_services_link_title"]?></a>
		</div>
	</div>
</section>

<section class="testimonials">
	<ul class="tquotes">
	<?php
		wp_reset_postdata();
		$args = array( 'post_type' => 'nubiq_quotes', 'posts_per_page' => 10 );
		$loop = new WP_Query( $args );
		$i = 0;
		while ( $loop->have_posts() ) : $loop->the_post();
			$i++;
			$meta = get_post_meta( get_the_ID() );
			if ($i == 1) {
				echo "<li class='active'>";
			} else {
				echo "<li>";
			}
			?>
				<div class="tquote">„<?=$meta["nubiq_quote_text"][0]?>"</div>
				<div class="tqted"><?=$meta["nubiq_quote_author"][0]?></div>
			</li>
		<?php endwhile;
		wp_reset_postdata();
	?>
	</ul>
	<ul class="tdots">
		<?php
			$quotes=get_posts(array("post_type"=>"nubiq_quotes", "posts_per_page"=>1000));
			foreach($quotes as $i=>$quote) {
				$meta=get_post_meta($quote->ID);?>
				<li<?=!$i?' class="active"':''?>><a href=""></a></li>
			<?php } ?>
	</ul>
</section>

<section class="home-join">
	<h1><?=$post_meta["nubiq_join_title"]?></h1>
	<h2><?=$post_meta["nubiq_join_subtitle"]?></h2>
	<div class="text-content">
		<p><?=$post_meta["nubiq_join_text"]?></p>
	</div>
	<a href="<?=$post_meta["nubiq_join_link_url"]?>" class="more-info"><?=$post_meta["nubiq_join_link_title"]?></a>
</section>

<section class="home-contact">
	<h1><?=$post_meta["nubiq_contact_title"]?></h1>
	<?php
		$formAction="";
		$posts=get_posts(array(
			'name' => 'kontakt',
			'post_type' => 'page',
			'post_status' => 'publish',
			'posts_per_page' => 1
		));

		if (!$posts)
		$posts=get_posts(array(
			'name' => 'contact',
			'post_type' => 'page',
			'post_status' => 'publish',
			'posts_per_page' => 1
		));

		if ($posts) {
			$translated=pll_get_post($posts[0]->ID);
			if ($translated) {
				$formAction=get_page_link($translated);
			}
		}
	?>

	<form method="POST" action="<?=$formAction?>">
		<p><input type="text" placeholder="<?=pll__("NAME")?>*" name="fullname" required></p>
		<p><input type="email" placeholder="<?=pll__("EMAIL")?>*" name="email" required></p>
		<p><input type="text" placeholder="<?=pll__("SUBJECT")?>*" name="subject" required></p>
		<p><textarea placeholder="<?=pll__("MESSSAGE")?>*" name="message" required></textarea></p>
		<p><button class="more-info"><?=pll__("SEND")?></button></p>
	</form>
</section>

<?php get_footer(); ?>
