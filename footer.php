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
				<p>Tema designat av <a href="http://mimmithorneus.se/">Mimmi Thorneus</a><br>Facebook- och Twitter-ikon från <a href="http://sharevectors.com">Share Vectors</a></p>
			</div><!-- .site-info -->
		<?php endif; // end sidebar widget area ?>
	</footer><!-- #colophon .site-footer -->
	
 </div><!-- #wrapper -->
</div><!-- #page .hfeed .site -->

<?php wp_footer(); ?>

</body>
</html>
