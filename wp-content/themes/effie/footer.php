<footer>
<?php 
  $footer_nav_items = wp_get_nav_menu_items('footer');
  $social_nav_items = wp_get_nav_menu_items('social');
?>
  <div class="content">
    <div class="container">
      <div class="form">
        <?php include("img/Fl_logo_horizontal.svg"); ?>
        <h5>Sign up for our newsletter</h5>
        <?php echo do_shortcode(get_field('form_shortcode', 'option')); ?>
      </div>
      <div class="events">
        <h5>Upcoming Events</h5>
        <?php the_field('event_details', 'option'); ?>
      </div>
      <div class="d-grid">
        <div class="links">
          <?php foreach( $footer_nav_items as $item ) { ?>
            <a href="<?php echo $item->url; ?>"><span><?php echo $item->title; ?></span></a>
          <?php } ?>
        </div>
        <div class="social">
           <?php foreach( $social_nav_items as $item ) { ?>
            <a target="_blank" href="<?php echo $item->url; ?>"><?php include("img/$item->title.svg"); ?></a>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
  <div class="bg__grey-dark copyright">
    <div class="container">
      <p class="font__white">© Float Left Interactive 2020</p>
    </div>
  </div>
  <?php wp_footer(); ?>
</footer>
</body>