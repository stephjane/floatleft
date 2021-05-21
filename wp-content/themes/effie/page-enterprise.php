<?php get_header();
$id = $post->ID;
?>

<section class="hero" id="smoothcontainer">
	<div class="hero__content m-header scene_element scene_element--fadeinuphero">
		<h1><?php echo get_field('hero_header_first_line', $id); ?></br><span><?php echo get_field('hero_header_bold_line', $id); ?></span></h1>
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

<section>
    <div class="container">
        <div class="content-section content-section__image-right">
            <div class="content">
                <div>
                    <h2><?php echo get_field('page_intro_header', $id); ?></h2>
                    <h5><?php echo get_field('page_intro_description', $id); ?></h5>
                    <a href="<?php echo get_field('page_intro_button_url', $id); ?>" class="btn btn__black"><?php echo get_field('page_intro_button_text', $id); ?></a>
                </div>
            </div>
            <div class="image">
                <img src="<?php echo get_field('page_intro_image', $id); ?>" alt="">
            </div>
        </div>
    </div>
</section>

<?php if( have_rows('content_sections', $id) ): ?>
    <?php while( have_rows('content_sections', $id) ): the_row(); ?>
    <section class="bg__<?php echo get_sub_field('background_color'); ?>">
        <div class="container">
            <div class="content-section content-section__image-<?php echo get_sub_field('image_position'); ?>">
                <div class="image">
                    <img src=<?php echo get_sub_field('cs_image'); ?> > 
                </div>
                <div class="content">
                    <div>
                        <h2><?php echo get_sub_field('cs_header'); ?></h2>
                        <h5><?php echo get_sub_field('cs_description'); ?></h5>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php endwhile; ?>
<?php endif; ?>

<section class="padding__med">
    <?php include 'partials/cards.php'; ?>
</section>

<section class="padding__med">
    <div class="container">
        <h5>Supported on</h5>
        <div class="device-logos">
			<?php if( have_rows('device_logos', $id) ): ?>
				<?php while( have_rows('device_logos', $id) ): the_row();?>
					<img src="<?php echo get_sub_field('logo'); ?>" alt="">
			<?php endwhile; endif;?>
		</div>
    </div>
</section>

<?php include 'partials/quote.php'; ?>

<?php include 'partials/projects.php'; ?>

<section class="padding__sm">
    <div class="container">
        <?php echo get_field('pre_footer_page_content', $id); ?>
    </div>
</section>

<?php include 'partials/cta.php'; ?>

<?php get_footer();?>

</html>