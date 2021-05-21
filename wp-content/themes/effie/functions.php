<?php
// WordPress Titles
add_theme_support( 'title-tag' );
add_theme_support( 'post-thumbnails' );
add_action('wp_ajax_filter', 'filter_function');
add_action('wp_ajax_nopriv_filter', 'filter_function');

wp_deregister_script('jquery');
add_action( 'wp_enqueue_scripts', 'enqueue_scripts' );
function enqueue_scripts(){
  wp_register_script('slick', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', 'jquery', '1.8.1', true);
  wp_register_script('scroll', '//unpkg.com/aos@2.3.1/dist/aos.js', 'jquery', '1.8.1', true);
  wp_register_script('smooth', get_template_directory_uri() . '/js/smoothState/jquery.smoothState.min.js', 'jquery', null, false);
  wp_enqueue_script('app', get_template_directory_uri() . '/dist/app-min.js', array('jquery', 'slick', 'smooth', 'scroll'), null, true);
  wp_enqueue_script('vue', 'https://cdn.jsdelivr.net/npm/vue@2.5.17/dist/vue.js', null, '2.5.17', true);
  wp_enqueue_script('builder', get_template_directory_uri() . '/js/builder.js', 'vue', null, true);
}

function filter_function(){
  $catArray = $_POST['categoryIDs'];

	$args = array(
		'orderby' => 'date',
    'order'	=> 'DESC', // ASC or DESC
    'post_type' => 'portfolio',
    'posts_per_page' => -1,
    'category__and' => $catArray,
	);
 
  $queryStaff = new WP_Query( $args );

  if ( $queryStaff->have_posts() ) : while ( $queryStaff->have_posts() ) : $queryStaff->the_post();?>
    <div class="person" data-name='<?php the_title();?>' data-bio='<?php the_content();?>' data-cat='<?php wp_get_post_categories($post->ID); ?>' data-img="<?php the_post_thumbnail_url() ;?>">
      <div class="person__image">
        <div class="abs-fill bg-img" style="background-image:url('<?php the_post_thumbnail_url() ;?>')"></div>
      </div>
      <div class="person__name">
        <h6><?php the_title() ;?></h6>
      </div>
    </div>
  <?php endwhile; endif; ?>
  <?php wp_reset_query();
	die();
}

add_action('wp_ajax_load', 'load');
add_action('wp_ajax_nopriv_load', 'load');

function load() {
  $offset = $_POST['offset'];
  $ppp = $_POST['ppp'];
  $cat = $_POST['cat'];
  $exclude = $_POST['exclude'];

  $args = array(
		'orderby' => 'date',
    'order'	=> 'DESC', // ASC or DESC
    'post_type' => 'post',
    'post_status' => 'publish',
    'cat' => $cat,
    'posts_per_page' => $ppp,
    'post__not_in' => array($exclude),
    'offset' => $offset
  );

  $query = new WP_Query( $args );

  $postsArray = array();

  if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
    $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
  ?>
    <div class="article">
      <div class="bg__gradient-light"></div>
      <div class="article__image">
          <div class="abs-fill bg__img" style="background-image:url('<?php echo $featured_img_url; ?>"></div>
      </div>
      <div class="article__title">
          <h5><?php the_title();?></h5>
      </div>
      <div class="article__body">
          <p><?php the_content();?></p>
      </div>
      <div class="article__footer">
        <a href="<?php the_permalink(); ?>" class="link link__arrow-right">Read<?php include("img/arrow-right.svg"); ?></a>
      </div>
    </div>
    
  <?php endwhile; endif;
  die();
}

//options page in dashboard
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page();
	
}

function wp_get_menu_array($current_menu) {
  $array_menu = wp_get_nav_menu_items($current_menu);
  $menu = array();
  foreach ($array_menu as $m) {
      if (empty($m->menu_item_parent)) {
          $menu[$m->ID] = array();
          $menu[$m->ID]['ID'] = $m->ID;
          $menu[$m->ID]['title'] = $m->title;
          $menu[$m->ID]['url'] = $m->url;
          $menu[$m->ID]['children'] = array();
      }
  }
  $submenu = array();
  foreach ($array_menu as $m) {
      if ($m->menu_item_parent) {
          $submenu[$m->ID] = array();
          $submenu[$m->ID]['ID'] = $m->ID;
          $submenu[$m->ID]['title'] = $m->title;
          $submenu[$m->ID]['url'] = $m->url;
          $menu[$m->menu_item_parent]['children'][$m->ID] = $submenu[$m->ID];
      }
  }
  return $menu;
}

