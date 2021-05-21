<?php get_header(); $id = $post->ID; $cats = wp_get_post_categories($id);?>
<?php 
  if(get_the_post_thumbnail_url()) {
    $feature_img = get_the_post_thumbnail_url();
  }
 ?>
<section class="hero hero__article" id="smoothcontainer">
  <div class="container relative">
    <div class="abs-fill bg__img" style="background-image: url('<?php echo $feature_img; ?>"></div>
  </div>
</section>
<div class="container">
  <div class="row blog-post">
    <div class="post-header">
      <h1><?php echo the_title(); ?></h1>
      <p class="date"><?php echo get_the_date(); ?></p>
      <p class="tags"><?php foreach($cats as $cat) { $c = get_category($cat); ?>
        <span><?php echo $c->name; ?></span>
      <?php } ?></p>
    </div>

    <?php 
      if ( have_posts() ) : while ( have_posts() ) : the_post();
        get_template_part( 'content-single', get_post_format() );
      endwhile; endif; 
    ?>

	</div>
</div>
<section class="padding__med">
  <div class="container">
    <?php $relatedCat = $cats[0]; ?>
    <h3 class="padding__sm">Related Reading</h3>
    <div class="articles" id="post-container" data-number="3" data-cat="<?php echo $relatedCat; ?>" data-exclude="<?php echo $id; ?>"></div>
  </div>
</section>

<?php get_footer(); ?>