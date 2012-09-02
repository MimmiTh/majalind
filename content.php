<?php
/**
 * Inläggen i loopens innehåll.
 * 
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">		
		<h2 class="entry-title">
			<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalänk till %s', 'maja_lind' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
		</h2>
		<?php if ( 'post' == get_post_type() ) : ?>
			<div class="entry-meta date">
				<p><?php the_date(); ?></p>
			</div><!-- .entry-meta -->
		<?php endif; ?>		
	</header><!-- .entry-header -->
	
	<?php switch ( $wp_query->current_post ) {
        case 0 :
            the_post_thumbnail( 'post-img' );
            break;
        default :
    } ?>
    
	<div class="entry-content">
		<?php the_content( __( 'Läs mer <span class="meta-nav">&rarr;</span>', 'maja_lind' ) ); ?>
		<a href=" <?php the_permalink(); ?>" class="read-more">Läs mer &raquo;</a>
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Sidor:', 'maja_lind' ), 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->

	<footer class="entry-meta">
		<?php edit_post_link( __( 'Redigera', 'maja_lind' ), '<p class="edit-link">', '</p>' ); ?>
	</footer><!-- .entry-meta -->
	
</article><!-- #post-<?php the_ID(); ?> -->
