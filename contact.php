<?php
/*
Template Name: Kontakt
*/
?>

<?php get_header(); ?>

	<div id="main" class="clearfix">
		
		<h1 class="page-title"><?php the_title(); ?></h1>
		
		<div id="primary" role="main" class="contact">
			
			<div id="contact-form">
				<?php echo do_shortcode('[contact-form-7 id="143" title="Kontaktformulär 1"]'); ?>
			</div>
			
			<div id="contact-text">
				<?php if (have_posts()) : while (have_posts()) : the_post();?>
						<div class="entrytext">
							<?php the_content('<p class="serif">Läs mer &raquo;</p>'); ?>
						</div>
				
				<?php endwhile; endif; ?>
				
				<footer class="entry-meta">
					<?php edit_post_link( __( 'Redigera', 'maja_lind' ), '<p class="edit-link">', '</p>' ); ?>
				</footer>
			</div>
			
		</div><!--#primary-->
	</div><!--#main-->
	
<?php get_footer(); ?>
