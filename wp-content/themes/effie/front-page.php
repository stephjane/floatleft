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

<section class="flicast">
	<div class="container">
		<div class="content-section content-section__image-right">
			<div class="content">
				<?php include("img/black.svg"); ?>
				<h3><?php echo get_field('flicast_header', $id); ?></h3>
				<div>
					<a href="<?php echo get_field('flicast_button_url', $id); ?>" class="btn btn__black"><?php echo get_field('flicast_button_text', $id); ?></a>
				</div>
			</div>
			<div class="image">
				<img src="<?php echo get_field('flicast_image', $id); ?>" alt="">
			</div>
		</div>
		<div class="padding__lg">
			<h5>Supported on</h5>
			<div class="device-logos">
			<?php if( have_rows('device_logos', $id) ): ?>
				<?php while( have_rows('device_logos', $id) ): the_row();?>
					<img src="<?php echo get_sub_field('logo'); ?>" alt="">
			<?php endwhile; endif;?>
			</div>
		</div>
	</div>
</section>

<section class="amp">
	<div class="container">
		<div class="amp__header">
			<h2><?php echo get_field('amp_header', $id); ?></h2>
			<a href="<?php echo get_field('amp_button_url', $id); ?>" class="btn btn__white"><?php echo get_field('amp_button_text', $id); ?></a>
		</div>
	</div>
	<div class="container">
		<div class="amp__content">
			<div>
				<?php if( have_rows('amp_description_list', $id) ): ?>
				<ul>
					<?php while( have_rows('amp_description_list', $id) ): the_row();
					$text = get_sub_field('list_item');?>
						<li><?php include("img/list-arrow.svg"); ?><span><?php echo $text; ?></span></li>
					<?php endwhile; endif;?>
				</ul>
			</div>
			<div>
				<img data-aos-duration="1000"
				data-aos-easing="ease-in-out"
				data-aos-mirror="true" 
				data-aos="fade-left" 
				data-aos-anchor-placement="top-bottom"
				src="<?php echo get_field('amp_image', $id); ?>" alt="">
			</div>
		</div>
	</div>
</section>

<?php include 'partials/projects.php'; ?>

<?php include 'partials/quote.php'; ?>

<section class="partners-section">
	<div class="container">
		<div>
			<h2><?php echo get_field('sa_header', $id); ?></h2>
			<h5><?php echo get_field('sa_description', $id); ?></h5>
			<span>
				<a href="<?php echo get_field('sa_button_url', $id); ?>" class="btn btn__primary"><?php echo get_field('sa_button_text', $id); ?></a>
			</span>
		</div>
		<div>
			<img src="<?php echo get_bloginfo('template_directory'); ?>/img/jwplayer.png" alt="">
			<img src="<?php echo get_bloginfo('template_directory'); ?>/img/google.png" alt="">
			<img src="<?php echo get_bloginfo('template_directory'); ?>/img/amazon.png" alt="">
			<img src="<?php echo get_bloginfo('template_directory'); ?>/img/adobe.png" alt="">
			<img src="<?php echo get_bloginfo('template_directory'); ?>/img/nielsen.png" alt="">
			<img src="<?php echo get_bloginfo('template_directory'); ?>/img/spotx.png" alt="">
		</div>
	</div>
</section>

<section class="news">
	<div class="container">
		<div class="news__header">
			<h2><?php echo get_field('article_section_header', $id); ?></h2>
			<a href="/news" class="btn btn__black">See More</a>
		</div>
		<div class="articles" id="post-container" data-number="3"></div>
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