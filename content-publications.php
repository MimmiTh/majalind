<?php
/**
 * @package Maja Lind
 * @since Maja Lind 1.0
 */
if ( has_post_thumbnail() ) { ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="publication-single-left">
		<?php the_post_thumbnail(); ?>
	</div>
	<div class="publication-single-right">
		<header class="entry-header">
			<h1 class="entry-title"><?php the_title(); ?></h1>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php the_content(); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'maja_lind' ), 'after' => '</div>' ) ); ?>
		</div><!-- .entry-content -->

		<footer class="entry-meta">
			<?php the_category(', ');?> <?php edit_post_link( __( 'Redigera inlägg', 'maja_lind' ), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- .entry-meta -->
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
<?php } else { ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<header class="entry-header">
			<h1 class="entry-title"><?php the_title(); ?></h1>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php the_content(); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'maja_lind' ), 'after' => '</div>' ) ); ?>
		</div><!-- .entry-content -->

		<footer class="entry-meta">
			<?php the_category(', ');?> <?php edit_post_link( __( 'Redigera inlägg', 'maja_lind' ), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- .entry-meta -->
</article><!-- #post-<?php the_ID(); ?> -->
<?php } ?>
