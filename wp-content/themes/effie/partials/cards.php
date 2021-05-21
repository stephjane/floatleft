<?php if( have_rows('cards', $id) ): ?>
<section>
    <div class="container padding__sm">
        <h2><?php echo get_field('cards_header', $id); ?></h2>
    </div>
    <div class="container">
        <div class="cards">
            <?php while( have_rows('cards', $id) ): the_row(); ?>
            <div class="card">
                <img src="<?php echo get_sub_field('icon', $id); ?>" alt="">
                <h3><?php echo get_sub_field('title', $id); ?></h3>
                <p><?php echo get_sub_field('description', $id); ?></p>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>
<?php endif; ?>