<?php
/*
Template Name: Press
*/
?>
<?php get_header(); ?>

	<div id="main" class="clearfix">
		
		<h1 class="page-title"><?php the_title(); ?></h1>
		
		<div id="primary" role="main" class="page">
			
			<?php if (have_posts()) : while (have_posts()) : the_post();?>
					<div class="entrytext">
						<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
					</div>
			
			<?php endwhile; endif; ?>
			
			<footer class="entry-meta">
				<?php edit_post_link( __( 'Redigera', 'maja_lind' ), '<p class="edit-link">', '</p>' ); ?>
			</footer>
			
		</div><!--#primary-->
		
		<div class="press-area">
			<?php $args = array( 'post_type' => 'press', 'posts_per_page' => 100 );
				$loop = new WP_Query( $args );
				while ( $loop->have_posts() ) : $loop->the_post();
					$image = wp_get_attachment_image_src( get_post_thumbnail_id(  $post->ID ), "full" );
					echo '<div class="press-img">';
					echo '<a href="' . $image[0] . '">';
					the_post_thumbnail('press-img');
					echo '<div class="description">';
					the_content();
					echo '</div>';
					echo '</a>';
					echo '</div>';
				endwhile; ?>
		</div>
		
	</div><!-- #main -->
<?php get_footer(); ?>
