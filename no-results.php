<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Maja Lind
 * @since Maja Lind 1.0
 */
?>

<article id="post-0" class="post no-results not-found">
	<header class="entry-header">
		<h1 class="entry-title"><?php _e( 'Inga resultat', 'maja_lind' ); ?></h1>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php if ( is_home() ) { ?>

			<p><?php printf( __( 'Redo att publicera ditt första inlägg? <a href="%1$s">Börja här</a>.', 'maja_lind' ), admin_url( 'post-new.php' ) ); ?></p>

		<?php } elseif ( is_search() ) { ?>

			<p><?php _e( 'Tyvärr matchade inget din sökning. Försök igen med andra nyckelord.', 'maja_lind' ); ?></p>
			<?php get_search_form(); ?>

		<?php } else { ?>

			<p><?php _e( 'Det du letar efter verkar inte gå att hitta här. Kanske ska du testa att söka?', 'maja_lind' ); ?></p>
			<?php get_search_form(); ?>

		<?php } ?>
	</div><!-- .entry-content -->
</article><!-- #post-0 .post .no-results .not-found -->
