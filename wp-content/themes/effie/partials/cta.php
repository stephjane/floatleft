<section class="cta relative">
	<div class="abs-fill bg__img" style="background-image:url('<?php echo get_field('cta_background_image', $id); ?>"></div>
	<div class="bg__overlay abs-fill"></div>
	<div class="container">
		<h1><?php echo get_field('cta_header', $id); ?></h1>
		<h3><?php echo get_field('cta_subheader', $id); ?></h3>
		<a href="<?php echo get_field('cta_button_url', $id); ?>" class="btn btn__primary"><?php echo get_field('cta_button_text', $id); ?></a>
	</div>
</section>