<?php if(get_field('quote', $id)) { ?>
	<section class="quote bg__grey-dark">
		<img class="mark" src="<?php echo get_bloginfo('template_directory'); ?>/img/quote.png" alt="">
		<div class="container">
			<div class="quote__content">
				<div>
					<h4 class="font__white">“<?php echo get_field('quote', $id); ?>”</h4>
					<h5>- <?php echo get_field('attribute', $id); ?></h5>
				</div>
				<?php if(get_field('quote_image', $id)) { ?>
					<div>
						<img src="<?php echo get_field('quote_image', $id); ?>" alt="">
					</div>
				<?php } ?>
			</div>
		</div>
	</section>
<?php } ?>