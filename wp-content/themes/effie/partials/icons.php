<?php if( have_rows('icon_row', $id) ): ?>
<section>
    <div class="container">
        <div class="icons-row">
        <?php while( have_rows('icon_row', $id) ): the_row(); ?>
            <div class="icons-row--type"
            data-aos-duration="800"
            data-aos-easing="ease-in-out"
            data-aos-mirror="true" 
            data-aos="zoom-in-up" 
            data-aos-anchor-placement="top-bottom"
            >
                <div class="icon icon__bg-primary">
                    <img src="<?php echo get_sub_field('icon') ?>">
                </div>
                <h5><?php echo get_sub_field('icon_title') ?></h5>
            </div>
        <?php endwhile; ?>
        </div>
    </div>
</section>
<?php endif; ?>
