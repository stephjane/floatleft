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

<section class="page__intro">
    <div class="container">
        <div class="content-section__header">
            <h2><?php echo get_field('page_intro_header', $id); ?></h2>
        </div>
        <div class="content-section content-section__image-right">
            <div class="content">
                <div>
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

<section class="timeline" id="timeline">
    <div class="container">
        <h2 class="text-center"><?php echo get_field('timeline_header', $id); ?></h2>
        <?php if( have_rows('timeline_points', $id) ): ?>
        <div class="timeline__container">
            <?php while( have_rows('timeline_points', $id) ): the_row();
                $icon = get_sub_field('icon');
                $title = get_sub_field('point_title');
                $description = get_sub_field('point_description');
            ?>
            <div class="timeline__section">
                <div class="timeline__filler"></div>
                <div class="timeline__point">
                    <div class="line"></div>
                    <div class="icon icon__bg-primary">
                        <img src="<?php echo $icon; ?>" alt="">
                    </div>
                </div>
                <div class="timeline__card"
                data-aos-duration="800"
    			data-aos-easing="ease-in-out"
				data-aos-mirror="true" 
				data-aos="zoom-in-up" 
				data-aos-anchor-placement="top-bottom"
                >
                    <div class="timeline__card--card">
                        <h3><?php echo $title; ?></h3>
                        <p><?php echo $description; ?></p>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
        <?php endif; ?>
    </div>
</section>

<section class="padding__sm">
    <div class="container">
        <?php echo get_field('pre_footer_page_content', $id); ?>
    </div>
</section>

<?php include 'partials/cta.php'; ?>

<?php get_footer();?>

</html>