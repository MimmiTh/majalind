<?php
/**
 * @package Maja Lind
 * @since Maja Lind 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h2 class="entry-title">
			<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalänk till %s', 'maja_lind' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
		</h2>

		<?php if ( 'post' == get_post_type() ) : ?>
			<div class="entry-meta">
				<?php the_date(); ?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->
	
	<?php switch ( $wp_query->current_post ) {
        case 0 :
            the_post_thumbnail( 'post-img' );
            break;
        default :
            // All other image code here
    } ?>
    
	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content">
		<?php the_content( __( 'Läs mer <span class="meta-nav">&rarr;</span>', 'maja_lind' ) ); ?>
		<a href="<?php the_permalink ?>" class="read-more">Läs mer &raquo;</a>
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Sidor:', 'maja_lind' ), 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->
	<?php endif; ?>

	<footer class="entry-meta">
		<?php edit_post_link( __( 'Redigera', 'maja_lind' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-meta -->
</article><!-- #post-<?php the_ID(); ?> -->
