<?php
/**
 * The Template for displaying single publication posts.
 *
 * @package Maja Lind
 * @since Maja Lind 1.0
 */

get_header(); ?>

		<div id="main" class="clearfix">
			<div id="primary" role="main" class="page">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'publications' ); ?>

			<?php endwhile; // end of the loop. ?>

			</div><!-- #primary-->
			
</div><!-- #main -->
<?php get_footer(); ?>
