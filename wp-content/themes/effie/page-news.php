<?php get_header();
$id = $post->ID;
?>

<section class="hero hero__two hero__news" id="smoothcontainer">
	<div class="hero__content m-header scene_element scene_element--fadeinup">
        <h1 class="m-header scene_element scene_element--fadeinup"><span><?php echo get_field('hero_header_bold_line', $id) ?></span></h1>
	</div>
	<div class="hero__image">
		<img src="<?php echo get_field('hero_image', $id) ?>">
	</div>
</section>

<section class="news bg__white padding__lg m-header scene_element scene_element--fadeinup">
	<div class="container">
		<div class="articles" id="post-container" data-number="6"></div>
	</div>
    <div class="btn__container text-center">
		<div class="btn btn__black" id="load-more">read more</div>
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