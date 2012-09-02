 <?php
/*
Template Name: Nyheter
*/
?>

<?php get_header(); ?>

	<div id="main" class="clearfix">
		<div id="primary" role="main">
			
			<?php 
				$posts = new WP_Query();
				$posts->query('showposts=10');
			
				while ($posts->have_posts()) : $posts->the_post(); ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				
						<header class="entry-header">
							<h2 class="entry-title">
								<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalänk till %s', 'maja_lind' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
							</h2>
							<div class="entry-meta date">
								<p><?php the_date();?>
							</div><!-- .entry-meta -->				
						</header><!-- .entry-header -->
					
						<?php the_post_thumbnail( 'post-img' ); ?>
					
						<div class="entry-content">
							<?php the_content( __( 'Läs mer <span class="meta-nav">&rarr;</span>', 'maja_lind' ) ); ?>
							<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Sidor:', 'maja_lind' ), 'after' => '</div>' ) ); ?>
						</div><!-- .entry-content -->
					
						<footer class="entry-meta">
							<?php the_category(', ');?><span class="sep"> - </span><a href="<?php comments_link(); ?>"><?php comments_number( 'Lämna en kommentar', '1 kommentar', '% kommentarer' ); ?></a><?php edit_post_link( __( 'Redigera inlägg', 'maja_lind' ), '<span class="edit-link">', '</span>' ); ?>
						</footer><!-- .entry-meta -->
						
					</article>
				
				<?php endwhile; ?>

		</div><!-- #primary -->
			 
		<?php get_sidebar('blog'); ?>

	</div><!-- #main -->
			
<?php get_footer(); ?>
