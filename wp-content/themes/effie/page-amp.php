<?php get_header();
$id = $post->ID;
?>

<section class="hero" id="smoothcontainer">
	<div class="hero__content m-header scene_element scene_element--fadeinuphero">
        <h1><?php echo get_field('hero_header_first_line', $id); ?></h1>
        <img class="logo-img" src="<?php echo get_bloginfo('template_directory'); ?>/img/amplogo.png" alt="">
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
    <div class="container padding__sm hug-right">
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
    <section class="bg__<?php echo get_sub_field('background_color'); ?> padding__med">
        <div class="container hug-<?php echo get_sub_field('image_position'); ?>">
            <div class="content-section content-section__image-<?php echo get_sub_field('image_position'); ?>">
                <div class="image">
                    <img src=<?php echo get_sub_field('cs_image'); ?> > 
                </div>
                <div class="content">
                    <div>
                        <h2><?php echo get_sub_field('cs_header'); ?></h2>
                        <h5><?php echo get_sub_field('cs_description'); ?></h5>
                    </div>
                    <?php if(get_sub_field('cs_button_url') && get_sub_field('background_color') == 'white' ): ?>
                        <a href="<?php echo get_sub_field('cs_button_url'); ?>" class="btn btn__black"><?php echo get_sub_field('cs_button_text'); ?></a>
                    <?php endif; ?>
                    <?php if(get_sub_field('cs_button_url') && get_sub_field('background_color') == 'grey-dark' ): ?>
                        <span>
                            <a href="<?php echo get_sub_field('cs_button_url'); ?>" class="btn btn__white"><?php echo get_sub_field('cs_button_text'); ?></a>
                        </span>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    <?php endwhile; ?>
<?php endif; ?>

<?php include 'partials/cards.php'; ?>

<section class="padding__sm">
    <div class="container">
        <?php echo get_field('pre_footer_page_content', $id); ?>
    </div>
</section>

<?php include 'partials/cta.php'; ?>

<?php get_footer();?>

</html>