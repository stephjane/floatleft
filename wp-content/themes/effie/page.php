<?php get_header(); ?>
<section class="hero hero__page" id="smoothcontainer">
	<div class="hero__content m-header scene_element scene_element--fadeinup">
    <h1 class="m-header scene_element scene_element--fadeinup"><span><?php echo the_title(); ?></span></h1>
	</div>
</section>

<div class="container">
  <div class="row blog-post">
      <?php 
        if ( have_posts() ) : while ( have_posts() ) : the_post();
          get_template_part( 'content-single', get_post_format() );
        endwhile; endif; 
      ?>
  </div>
</div>

  <?php

    // Check value exists.
    if( have_rows('sections') ):

        // Loop through rows.
        while ( have_rows('sections') ) : the_row();

            // Case: Paragraph layout.
            if( get_row_layout() == 'icons_row' ):
              $icons = get_sub_field('icons');
            ?>
              <section>
                <div class="container">
                  <div class="icons-row">
                    <?php while( have_rows($icons) ): the_row(); ?>
                        <div class="icons-row--type"
                        data-aos-duration="800"
                        data-aos-easing="ease-in-out"
                        data-aos-mirror="true" 
                        data-aos="zoom-in-up" 
                        data-aos-anchor-placement="top-bottom"
                        >
                            <div class="icon icon__bg-primary">
                                <img src="<?php echo get_sub_field('icon_image') ?>">
                            </div>
                            <h5><?php echo get_sub_field('icon_title') ?></h5>
                        </div>
                    <?php endwhile; ?>
                  </div>
                </div>
              </section>
            <?php
            // Case: Download layout.
            elseif( get_row_layout() == 'carousel' ): 
              $header = get_sub_field('section_header');
            ?>
              <section class="projects" id="projects">
                <div class="container">
                  <div class="projects__header text-center">
                    <h2><?php echo $header; ?></h2>
                  </div>
                  <?php if( have_rows('slides') ): ?>
                    <div class="slider-container logos">
                      <?php while( have_rows('slides') ): the_row(); ?>
                        <div>
                          <img class="project__image" src="<?php echo get_sub_field('slide_trigger_image'); ?>">
                        </div>
                      <?php endwhile; ?>
                    </div>
                  <?php endif; ?>

                  <?php if( have_rows('slides') ): ?>
                    <div class="slider-container projects-row">
                    <?php while( have_rows('slides') ): the_row(); ?>
                      <div>
                        <img class="project__image" src="<?php echo get_sub_field('slide_image'); ?>">
                      </div>
                    <?php endwhile; ?>
                    </div>
                  <?php endif; ?>
                </div>
              </section>

            <?php
            // Case: Download layout.
            elseif( get_row_layout() == 'quote' ): 
              $quoteText = get_sub_field('quote_text');
              $quoteAttribute = get_sub_field('quote_attribute');
              $quoteImage = get_sub_field('quote_image');
            ?>
        
            <section class="quote bg__grey-dark">
              <img class="mark" src="<?php echo get_bloginfo('template_directory'); ?>/img/quote.png" alt="">
              <div class="container">
                <div class="quote__content">
                  <div>
                    <h4 class="font__white"><?php echo $quoteText; ?></h4>
                    <h5>- <?php echo $quoteAttribute; ?></h5>
                  </div>
                  <?php if($quoteImage) { ?>
                    <div>
                      <img src="<?php echo $quoteImage ?>" alt="">
                    </div>
                  <?php } ?>
                </div>
              </div>
            </section>

            <?php
            elseif( get_row_layout() == 'content_with_image' ): 
              $position = get_sub_field('image_position');
              $background = get_sub_field('background_color');
              $header = get_sub_field('cs_header');
              $description = get_sub_field('cs_description');
              $button = get_sub_field('cs_button_text');
              $url = get_sub_field('cs_button_url');
              $image = get_sub_field('cs_image');
            ?>

            <section class="bg__<?php echo $background ?> padding__md"
              data-aos-duration="600"
              data-aos-easing="ease-in-out"
              data-aos-mirror="true" 
              data-aos="fade-<?php echo ($position == 'right' ? 'left' : 'right')?>"
              data-aos-anchor-placement="top-center"
              >
                <div class="container hug-<?php echo $position; ?>">
                  <div class="content-section content-section__image-<?php echo $position; ?>">
                    <div class="image">
                        <img src=<?php echo $image; ?> > 
                    </div>
                    <div class="content">
                      <div>
                        <h2><?php echo $header ?></h2>
                        <h5><?php echo $description ?></h5>
                      </div>
                      <span>
                        <a href="<?php echo $url; ?>" class="btn btn__black"><?php echo $button ?></a>
                      </span>
                    </div>
                  </div>
                </div>
            </section>
            <?php
            endif;

        // End loop.
        endwhile;

    // No value.
    else :
        // Do something...
    endif; ?>



<?php get_footer(); ?>
</html>