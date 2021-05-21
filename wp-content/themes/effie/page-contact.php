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

<?php include 'partials/icons.php'; ?>

<section class="contact-section bg__white padding__lg" id="contact-form">
    <div class="container">
        <div class="contact-section__header text-center">
            <?php echo get_field('form_header', $id) ?>
        </div>
        <div>
            <?php echo do_shortcode(get_field('form_shortcode', $id)); ?>
        </div>
    </div>
</section>

<section class="padding__sm">
    <div class="container">
        <?php echo get_field('pre_footer_page_content', $id); ?>
    </div>
</section>

<?php get_footer();?>

</html>