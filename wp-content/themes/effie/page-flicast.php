<?php get_header();
$id = $post->ID;
?>

<section class="hero" id="smoothcontainer">
	<div class="hero__content m-header scene_element scene_element--fadeinuphero">
		<h1><?php echo get_field('hero_header_first_line', $id); ?></h1>
		<img class="logo-img" src="<?php echo get_bloginfo('template_directory'); ?>/img/fcwhite.png" alt="">
		<?php if(get_field('hero_button_url', $id)) { ?>
            <div>
                <a href="<?php echo get_field('hero_button_url', $id); ?>" class="btn btn__white"><?php echo get_field('hero_button_text', $id); ?></a>
            </div>
		<?php } ?>
	</div>
	<div class="hero__image">
		<img src="<?php echo get_field('hero_image', $id); ?>" alt="">
	</div>
</section>

<?php if( have_rows('content_sections', $id) ): ?>
	<?php while( have_rows('content_sections', $id) ): the_row();
		$position = get_sub_field('image_position');
	?>
	<section class="bg__<?php echo get_sub_field('background_color'); ?> padding__md"
	data-aos-duration="600"
	data-aos-easing="ease-in-out"
	data-aos-mirror="true" 
	data-aos="fade-<?php echo ($position == 'right' ? 'left' : 'right')?>"
	data-aos-anchor-placement="top-center"
	>
        <div class="container hug-<?php echo $position; ?>">
            <div class="content-section content-section__image-<?php echo $position; ?>">
                <div class="image">
                    <img src=<?php echo get_sub_field('cs_image'); ?> > 
                </div>
                <div class="content">
                    <div>
                        <h2><?php echo get_sub_field('cs_header'); ?></h2>
                        <h5><?php echo get_sub_field('cs_description'); ?></h5>
					</div>
					<span>
						<a href="<?php echo get_sub_field('cs_button_url'); ?>" class="btn btn__black"><?php echo get_sub_field('cs_button_text'); ?></a>
					</span>
                </div>
            </div>
        </div>
    </section>
    <?php endwhile; ?>
<?php endif; ?>

<?php include 'partials/quote.php'; ?>

<section class="amp">
	<div class="container">
		<div class="amp__header">
			<h2><?php echo get_field('amp_header', $id); ?></h2>
			<a href="<?php echo get_field('amp_button_url', $id); ?>" class="btn btn__white"><?php echo get_field('amp_button_text', $id); ?></a>
		</div>
	</div>
	<div class="container">
		<div class="amp__content">
			<div>
				<?php if( have_rows('amp_description_list', $id) ): ?>
				<ul>
					<?php while( have_rows('amp_description_list', $id) ): the_row();
					$text = get_sub_field('list_item');?>
						<li><?php include("img/list-arrow.svg"); ?><span><?php echo $text; ?></span></li>
					<?php endwhile; endif;?>
				</ul>
			</div>
			<div>
				<img data-aos-duration="1000"
				data-aos-easing="ease-in-out"
				data-aos-mirror="true" 
				data-aos="fade-left" 
				data-aos-anchor-placement="top-bottom"
				src="<?php echo get_field('amp_image', $id); ?>" alt="">
			</div>
		</div>
	</div>
</section>

<?php include 'partials/projects.php'; ?>

<section class="padding__sm">
    <div class="container">
        <?php echo get_field('pre_footer_page_content', $id); ?>
    </div>
</section>

<?php include 'partials/cta.php'; ?>

<?php get_footer();?>

</html>