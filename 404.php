<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package Maja Lind
 * @since Maja Lind 1.0
 */

get_header(); ?>

	<div id="main" class="clearfix">
		<div id="primary" role="main" class="page">

			<article id="post-0" class="post error404 not-found page">
				<header class="entry-header">
					<h1 class="entry-title"><?php _e( 'Hoppsan! Sidan kunde inte hittas.', 'maja_lind' ); ?></h1>
				</header><!-- .entry-header -->

				<div class="entry-content">
					<p><?php _e( 'Det verkar som att inget kunde hittas här. Testa någon av länkarna här nedanför, eller gör en sökning!', 'maja_lind' ); ?></p>

					<?php get_search_form(); ?>

					<?php the_widget( 'WP_Widget_Recent_Posts' ); ?>

					<div class="widget">
						<h2 class="widgettitle"><?php _e( 'Mest använda kategorier', 'maja_lind' ); ?></h2>
						<ul>
						<?php wp_list_categories( array( 'orderby' => 'count', 'order' => 'DESC', 'show_count' => 1, 'title_li' => '', 'number' => 10 ) ); ?>
						</ul>
					</div><!-- .widget -->

					<?php
					the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" );
					?>

				</div><!-- .entry-content -->
			</article><!-- #post-0 .post .error404 .not-found -->

		</div><!-- #content -->
	</div><!-- #primary .site-content -->

<?php get_footer(); ?>
