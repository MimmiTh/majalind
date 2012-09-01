<?php
/**
 * Temats header.
 *
 * Visar allt inom <head>-taggen, samt delar ur <body>-taggen fram till huvudmenyn.
 * 
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />
	<title>
		<?php 
			global $page, $paged;
			wp_title( '|', true, 'right' );
			bloginfo( 'name' );
			$site_description = get_bloginfo( 'description', 'display' );
			if ( $site_description && ( is_home() || is_front_page() ) )
				echo " | $site_description";
			if ( $paged >= 2 || $page >= 2 )
				echo ' | ' . sprintf( __( 'Page %s', 'maja_lind' ), max( $paged, $page ) );
		?>
	</title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
	<![endif]-->

	<!-- Flexslider script-->
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/js/flexslider/flexslider.css" type="text/css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/flexslider/jquery.flexslider.js"></script>

	<script type="text/javascript" charset="utf-8">
	  $(window).load(function() {
		$('.flexslider').flexslider();
	  });
	</script>

	<!-- Dot dot dot script -->
	<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.dotdotdot-1.5.1.js"></script>

	<script>
		$(document).ready(function() {
			$(".home .entry-content").dotdotdot({
				after: "a.read-more"
			});
		});
	</script>

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
	<div id="page" class="hfeed site">
		<?php do_action( 'before' ); ?>
		<header id="masthead" class="site-header clearfix" role="banner">
			<div id="header-hgroup" class="clearfix">
				<div class="site-title"><h1><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1></div>
				<div class="site-description"><h2><?php bloginfo( 'description' ); ?></h2></div>
			</div>
			
			<div id="social-media">
				<a id="facebook" href=""><img alt="Facebook" src="<?php echo get_template_directory_uri(); ?>/images/fb.png"></a>
				<a id="twitter" href=""><img alt="Twitter" src="<?php echo get_template_directory_uri(); ?>/images/twit.png"></a>
			</div>
		</header><!-- #masthead .site-header -->

		<div id="wrapper">
		
		<nav role="navigation" class="site-navigation main-navigation clearfix">
				<h1 class="assistive-text"><?php _e( 'Menu', 'maja_lind' ); ?></h1>
				<div class="assistive-text skip-link">
					<a href="#content" title="<?php esc_attr_e( 'Skip to content', 'maja_lind' ); ?>"><?php _e( 'Skip to content', 'maja_lind' ); ?></a>
				</div>
				<?php wp_nav_menu( array( 'theme_location' => 'primary') ); ?>
		</nav><!-- Main navigation-->
