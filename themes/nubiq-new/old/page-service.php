<?php get_header(); ?>

<?php include("intro.php"); ?>

<p>Tools and Services</p>

<section class="page-content">
	<h1><?=$page_meta["nubiq_title"]?></h1>
	<h2><?=$page_meta["nubiq_subtitle"]?></h2>
	<div class="text-content">
		<?php the_content()?>
	</div>
	<?php
		$hasList = false;
		$listHasIcons = false;
		for( $i = 0; $i < 20; $i++ ) {
			if ( $page_meta[ "nubiq_list{$i}_icon" ] *1 )
				$listHasIcons=true;
			if ($page_meta["nubiq_list{$i}_title"])
				$hasList=true;
		}
		if ($hasList) {?>
			<ul class="service-list <?=!$listHasIcons?'certifed':''?>">
				<?php
				for($i=0;$i<20;$i++)
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

<?php get_footer(); ?>
