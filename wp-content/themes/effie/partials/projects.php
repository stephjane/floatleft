<section class="projects" id="projects">
	<div class="container">
		<div class="projects__header text-center">
			<h2><?php echo get_field('projects_header', $id); ?></h2>
		</div>
		<?php if( have_rows('projects', $id) ): ?>
			<div class="slider-container logos">
				<?php while( have_rows('projects', $id) ): the_row(); ?>
					<div>
						<img class="project__image" src="<?php echo get_sub_field('client_logo'); ?>">
					</div>
				<?php endwhile; ?>
			</div>
		<?php endif; ?>

		<?php if( have_rows('projects', $id) ): ?>
			<div class="slider-container projects-row">
			<?php while( have_rows('projects', $id) ): the_row(); ?>
				<div>
					<img class="project__image" src="<?php echo get_sub_field('project_image'); ?>">
				</div>
			<?php endwhile; ?>
			</div>
		<?php endif; ?>
	</div>
</section>