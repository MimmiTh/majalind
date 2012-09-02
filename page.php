<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Maja Lind
 * @since Maja Lind 1.0
 */

get_header(); ?>

		<div id="main" class="clearfix">
			
			<h1 class="page-title"><?php the_title(); ?></h1>

			<div id="primary" role="main" class="page">
				
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'page' ); ?>

					<?php comments_template( '', true ); ?>

				<?php endwhile; // end of the loop. ?>

			</div><!-- #primary -->

</div><!-- #main -->
<?php get_footer(); ?>
