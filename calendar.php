 <?php
/*
Template Name: Kalender
*/
?>

<?php get_header(); ?>

		<div id="main" class="clearfix">
			
				<h1 class="page-title">Kalender</h1>

			<div id="primary" role="main" class="page calendar">
				
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'page' ); ?>

					<?php comments_template( '', true ); ?>

				<?php endwhile; // end of the loop. ?>

			</div><!-- #primary -->

</div><!-- #main -->
<?php get_footer(); ?>
