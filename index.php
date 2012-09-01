<?php get_header(); ?>

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
					echo '<h2>';
					the_title();
					echo '</h2>';				
					the_content();
					echo '<a class="slide-button" href="'.get_post_meta($post->ID, '_url', true).'">'.get_post_meta($post->ID, '_linktext', true).'</a>';
					echo '</div>';
					echo '</li>';
				endwhile; 
			?>
		</ul><!--.slides -->
	</div><!--#content-slider .flexslider -->

	<div id ="main" class="clearfix">
		<div id="primary" role="main">
				
			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>				
						<?php
						
							/* Include the Post-Format-specific template for the content.
							 * If you want to overload this in a child theme then include a file
							 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
							 */
							 
							get_template_part( 'content', get_post_format() );
						?>
				<?php endwhile; ?>
			<?php elseif ( current_user_can( 'edit_posts' ) ) : ?>
				<?php get_template_part( 'no-results', 'index' ); ?>
			<?php endif; ?>

		</div><!-- #primary -->

		<?php get_sidebar(); ?>

	</div><!-- #main -->

<?php get_footer(); ?>
