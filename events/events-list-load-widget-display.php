<?php 
/**
 * This is the template for the output of the events list widget. 
 * All the items are turned on and off through the widget admin.
 * There is currently no default styling, which is highly needed.
 *
 * You can customize this view by putting a replacement file of the same name (events-list-load-widget-display.php) in the events/ directory of your theme.
 *
 * @return string
 */

// Vars set:
// '$event->AllDay',
// '$event->StartDate',
// '$event->EndDate',
// '$event->ShowMapLink',
// '$event->ShowMap',
// '$event->Cost',
// '$event->Phone',

// Don't load directly
if ( !defined('ABSPATH') ) { die('-1'); }

$event = array();
$tribe_ecp = TribeEvents::instance();
reset($tribe_ecp->metaTags); // Move pointer to beginning of array.
foreach($tribe_ecp->metaTags as $tag){
	$var_name = str_replace('_Event','',$tag);
	$event[$var_name] = tribe_get_event_meta( $post->ID, $tag, true );
}

$event = (object) $event; //Easier to work with.

ob_start();
if ( !isset($alt_text) ) { $alt_text = ''; }
post_class($alt_text,$post->ID, 'clearfix');
$class = ob_get_contents();
ob_end_clean();
?>
<li <?php echo $class ?>>

	<div class="when">
		<span class="event-date"><?php echo tribe_get_start_date( $post->ID, false, 'j' ); ?></span>
		<br>
		<span class="event-month"><?php echo tribe_get_start_date( $post->ID, false, 'M' ); ?></span> 
	</div>
	
	<div class="event">
		<h3><a href="<?php the_permalink(); ?>"><?php echo $post->post_title ?></a></h3>
	</div>

</li>

<?php $alt_text = ( empty( $alt_text ) ) ? 'alt' : ''; ?>
