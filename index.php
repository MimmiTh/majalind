<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Maja Lind
 * @since Maja Lind 1.0
 */

get_header(); ?>

		<div id="content-slider" class="flexslider">
			<ul class="slides">
			<?php $args = array( 'post_type' => 'slide', 'posts_per_page' => 5 );
				$loop = new WP_Query( $args );
				while ( $loop->have_posts() ) : $loop->the_post();
				echo '<li class="slide clearfix">';
				echo '<div class="slide-left">';
				the_post_thumbnail('slide-img');
				echo '</div>';
				echo '<div class="slide-right">';						
				the_title();
				the_content();
				echo '<a href="'.get_post_meta($post->ID, '_url', true).'">'.get_post_meta($post->ID, '_linktext', true).'</a>';
				echo '</div>';
				echo '</li>';
			endwhile; ?>
			</ul>
		</div>

		<div id ="main" class="clearfix">
			<div id="primary" role="main">
				
			<?php if ( have_posts() ) : ?>

				<?php maja_lind_content_nav( 'nav-above' ); ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>
				
					<?php
					
						/* Include the Post-Format-specific template for the content.
						 * If you want to overload this in a child theme then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'content', get_post_format() );
					?>

				<?php endwhile; ?>

				<?php maja_lind_content_nav( 'nav-below' ); ?>

			<?php elseif ( current_user_can( 'edit_posts' ) ) : ?>

				<?php get_template_part( 'no-results', 'index' ); ?>

			<?php endif; ?>

			</div><!-- #primary -->

<?php get_sidebar(); ?>

</div><!-- #main -->

<?php get_footer(); ?>
