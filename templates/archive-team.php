<?php
/**
 * Team Archive
 *
 * @package 	tour-operator
 * @category	team
 */

get_header(); ?>

	<?php lsx_content_wrap_before(); ?>

	<section id="primary" class="content-area <?php echo esc_attr( lsx_main_class() ); ?>">

		<?php lsx_content_before(); ?>

		<main id="main" class="site-main" role="main">

		<?php 
		/**
		 * Hooked
		 * 
		 *  - lsx_archive_header() - 100
		 *  - lsx_archive_description() - 100
		 */
			lsx_content_top();
		?>

		<?php if ( have_posts() ) : ?>

			<div class="row">
				<?php while ( have_posts() ) : the_post(); ?>
					<div class="panel col-sm-12">
						<?php to_team_content( 'content', 'team' ); ?>
					</div>
				<?php endwhile; ?>
			</div>
			<?php lsx_paging_nav(); ?>
			
		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		<?php lsx_content_bottom(); ?>
		
		<?php to_sharing(); ?>

		</main><!-- #main -->

		<?php lsx_content_after(); ?>
		
	</section><!-- #primary -->

<?php lsx_content_wrap_after(); ?>	

<?php get_sidebar(); ?>

<?php get_footer();