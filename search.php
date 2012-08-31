<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package Maja Lind
 * @since Maja Lind 1.0
 */

get_header(); ?>

		<section id="main" class="clearfix">
			<div id="primary" role="main">

			<?php if ( have_posts() ) : ?>

				<header class="page-header">
					<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'maja_lind' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
				</header><!-- .page-header -->

				<?php maja_lind_content_nav( 'nav-above' ); ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'search' ); ?>

				<?php endwhile; ?>

				<?php maja_lind_content_nav( 'nav-below' ); ?>

			<?php else : ?>

				<?php get_template_part( 'no-results', 'search' ); ?>

			<?php endif; ?>

			</div><!-- #primary -->

<?php get_sidebar(); ?>

</section><!-- #main -->
<?php get_footer(); ?>
