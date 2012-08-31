<?php
/*
Template Name: Publikationer
*/
?>

<?php get_header(); ?>
<div id="main" class="clearfix">
<div id="primary" role="main" class="publications">

<?php $args = array( 'post_type' => 'publications', 'posts_per_page' => 100 );
$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post();
	echo '<div class="publication clearfix">';
	echo '<div class="publications-left">';
	the_post_thumbnail();
	echo '</div>';
	echo '<div class="publications-right">';
	the_title();
	the_content();
	echo '</div>';
	echo '</div>';
endwhile; ?>

</div>
</div>

<?php get_footer(); ?>

