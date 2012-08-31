<?php
/**
 * The Sidebar on the blog
 *
 * @package Maja Lind
 * @since Maja Lind 1.0
 */
?>

<div id="secondary" class="widget-area sidebar" role="complementary">
			<?php do_action( 'before_sidebar' ); ?>
			<?php if ( ! dynamic_sidebar( 'sidebar-blog' ) ) : ?>

				<aside id="search" class="widget widget_search">
					<?php get_search_form(); ?>
				</aside>
				
				<aside id="categories" class="widget">
					<ul>
						<?php wp_list_categories(); ?> 
					</ul>
				</aside>

				<aside id="archives" class="widget">
					<h1 class="widget-title"><?php _e( 'Archives', 'maja_lind' ); ?></h1>
					<ul>
						<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
					</ul>
				</aside>

			<?php endif; // end sidebar widget area ?>
		</div><!-- #secondary .widget-area -->
