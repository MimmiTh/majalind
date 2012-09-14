<?php
/*
Template Name: Publikationer
*/
?>

<?php get_header(); ?>

	<div id="main" class="clearfix">
		
		<h1 class="page-title"><?php the_title(); ?></h1>
		
		<div id="primary" role="main" class="publications">

	
			<?php $args = array( 'post_type' => 'publications', 'posts_per_page' => 100 );
			$loop = new WP_Query( $args );
			while ( $loop->have_posts() ) : $loop->the_post();
				if ( has_post_thumbnail() ) {
					echo '<div class="publication clearfix">';
					echo '<div class="publications-left">';
					the_post_thumbnail();
					echo '</div>';
					echo '<div class="publications-right">';
					echo '<h2>'; ?>
					<a href="<?php echo the_permalink(); ?>"><?php the_title(); ?></a>
					<?php echo '</h2>';
					the_excerpt();
					echo '</div>';
					echo '</div>';

				} else {
					echo '<div class="publication clearfix">';
					echo '<div class="publication-content">';
					echo '<h2>'; ?>
					<a href="<?php echo the_permalink(); ?>"><?php the_title(); ?></a>
					<?php echo '</h2>';
					the_excerpt();
					echo '</div>';
					echo '</div>';
				}
			endwhile; ?>

		</div>
	</div>

<?php get_footer(); ?>
