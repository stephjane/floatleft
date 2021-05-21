<?php get_header();
$id = $post->ID;
?>

<section class="hero hero__two" id="smoothcontainer">
	<div class="hero__content m-header scene_element scene_element--fadeinup">
        <h1 class="m-header scene_element scene_element--fadeinup"><?php echo get_field('hero_header_first_line', $id); ?></br><span><?php echo get_field('hero_header_bold_line', $id) ?></span></h1>
        <?php if(get_field('hero_button_url', $id)) { ?>
            <div>
                <a href="<?php echo get_field('hero_button_url', $id); ?>" class="btn btn__white"><?php echo get_field('hero_button_text', $id); ?></a>
            </div>
        <?php } ?>
    </div>
    <div class="hero__image">
        <img src="<?php echo get_field('hero_image', $id) ?>">
    </div>
</section>

<section class="page__intro m-header scene_element scene_element--fadeinup">
    <div class="container">
        <div class="content">
            <h2 class="padding__sm"><?php echo get_field('page_intro_header', $id) ?></h2>
            <h5><?php echo get_field('page_intro_description', $id) ?></h5>
            <a href="<?php echo get_field('page_intro_button_url', $id) ?>" class="btn btn__primary margin__med"><?php echo get_field('page_intro_button_text', $id) ?></a>
        </div>
    </div>
</section>

<section class="padding__sm">
    <div class="container text-center">
        <h2><?php echo get_field('icon_header', $id) ?></h2>
    </div>
    <?php include 'partials/icons.php'; ?>
</section>

<section class="padding__lg bg__grey-dark">
    <div class="container text-center">
        <h2 class="padding__sm font__white"><?php echo get_field('dark_cta_header', $id) ?></h2>
        <a href="<?php echo get_field('dark_cta_button_url', $id) ?>" class="btn btn__white"><?php echo get_field('dark_cta_button_text', $id) ?></a>
    </div>
</section>

<section class="partners padding__med bg__offwhite" id="partners">
    <div class="container">
        <h2 class="padding__sm font__gre-dark"><?php echo get_field('partners_grid_header', $id) ?></h2>
    </div>
    <div class="container">
        <div class="partner-cards padding__sm">
        <?php if( have_rows('partners_grid', $id) ): ?>
            <?php while( have_rows('partners_grid', $id) ): the_row(); ?>
                <a target="_blank" href="<?php echo get_sub_field('partner_url') ?>"><img src="<?php echo get_sub_field('partner_logo') ?>"></a>
        <?php endwhile; endif; ?>
        </div>
    </div>
</section>

<section class="contact-section bg__white padding__lg" id="partners_form">
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