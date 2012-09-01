<?php
/**
 * Temats footer.
 *
 * Innehåller footer med widgets samt sluttaggar för wrapper, page, body och html.
 *
 */
?>
	<footer id="colophon" class="site-footer clearfix" role="contentinfo">
		<?php do_action( 'before_sidebar' ); ?>
		<?php if ( ! dynamic_sidebar( 'footer' ) ) : ?>
			<div class="site-info">
				<?php do_action( 'maja_lind_credits' ); ?>
				<a href="http://wordpress.org/" title="<?php esc_attr_e( 'A Semantic Personal Publishing Platform', 'maja_lind' ); ?>" rel="generator"><?php printf( __( 'Proudly powered by %s', 'maja_lind' ), 'WordPress' ); ?></a>
				<span class="sep"> | </span>
				<?php printf( __( 'Theme: %1$s by %2$s.', 'maja_lind' ), 'maja_lind', '<a href="http://automattic.com/" rel="designer">Automattic</a>' ); ?>
			</div><!-- .site-info -->
		<?php endif; // end sidebar widget area ?>
	</footer><!-- #colophon .site-footer -->
	
 </div><!-- #wrapper -->
</div><!-- #page .hfeed .site -->

<?php wp_footer(); ?>

</body>
</html>
