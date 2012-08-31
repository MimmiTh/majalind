<?php
/**
 * @package Maja Lind
 * @since Maja Lind 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalänk till %s', 'maja_lind' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php maja_lind_posted_on(); ?>
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
		<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
			<?php
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( __( ', ', 'maja_lind' ) );
				if ( $categories_list && maja_lind_categorized_blog() ) :
			?>
			<span class="cat-links">
				<?php printf( __( 'Postad i %1$s', 'maja_lind' ), $categories_list ); ?>
			</span>
			<?php endif; // End if categories ?>

			<?php
				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', __( ', ', 'maja_lind' ) );
				if ( $tags_list ) :
			?>
			<span class="sep"> | </span>
			<span class="tag-links">
				<?php printf( __( 'Taggar %1$s', 'maja_lind' ), $tags_list ); ?>
			</span>
			<?php endif; // End if $tags_list ?>
		<?php endif; // End if 'post' == get_post_type() ?>

		<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
		<span class="sep"> | </span>
		<span class="comments-link"><?php comments_popup_link( __( 'Skriv en kommentar', 'maja_lind' ), __( '1 kommentar', 'maja_lind' ), __( '% kommentarer', 'maja_lind' ) ); ?></span>
		<?php endif; ?>

		<?php edit_post_link( __( 'Redigera', 'maja_lind' ), '<span class="sep"> | </span><span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-meta -->
</article><!-- #post-<?php the_ID(); ?> -->
