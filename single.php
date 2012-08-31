<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Maja Lind
 * @since Maja Lind 1.0
 */

get_header(); ?>

		<div id="main" class="clearfix">
			<div id="primary" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'single' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() )
						comments_template( '', true );
				?>

			<?php endwhile; // end of the loop. ?>

			</div><!-- #primary-->

<?php get_sidebar('blog'); ?>

</div><!-- #main -->
<?php get_footer(); ?>
