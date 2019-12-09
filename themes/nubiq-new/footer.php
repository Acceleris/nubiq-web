

		<footer>
			<a class="backtotop" href="#"></a>
			<!--<h1><a href="">Nubiq</a></h1>-->
			<h1><a href="<?php echo esc_url(home_url('/')); ?>">Nubiq</a></h1>
				<?php $current_language_slug = pll_current_language(); ?>
				<?php if ( $current_language_slug == 'de' ) { ?>
					<div class="copy"><?=get_option("nubiq_footer_text_de")?> | <a href="<?=get_option("nubiq_impressum_link_de")?>"><?=pll__("Impressum & Datenschutz")?></a> | <a href="https://nubiq.ch/de/allgemeine-geschaeftsbedingungen/"><?=pll__("AGB")?></a></div>
				<?php } else { ?>
					<div class="copy"><?=get_option("nubiq_footer_text_en")?> | <a href="<?=get_option("nubiq_impressum_link_en")?>"><?=pll__("About & Data Protection")?></a> | <a href="https://nubiq.ch/terms-and-conditions/"><?=pll__("Conditions")?></a></div>
				<?php } ?>
		</footer>

		<div class="main-menu">
			<a href="" class="close"></a>
			<?=wp_nav_menu(["menu"=>"primary", "container"=>false])?>
		</div>

		<script src="//code.jquery.com/jquery-3.2.0.js"></script>
		<script src="<?=get_template_directory_uri()?>/layout.js"></script>
		<script src="<?=get_template_directory_uri()?>/static/js/layout.js"></script>

		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-57787090-3"></script>
		<script>
			window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());

			gtag('config', 'UA-57787090-3');
		</script>
		<?php wp_footer(); ?>
	</body>
</html>
