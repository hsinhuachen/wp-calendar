<?php
/**
 * Photo View Content
 * The content template for the photo view of events. This template is also used for
 * the response that is returned on photo view ajax requests.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/pro/photo/content.php
 *
 * @package TribeEventsCalendar
 * @version 4.4.28
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
} ?>

<div id="tribe-events-content" class="tribe-events-list tribe-events-photo">
	<?php
		global $wpdb;

		$sql = "SELECT max(cast(meta_value as unsigned)) AS max_date, min(cast(meta_value as unsigned)) AS min_date FROM `{$wpdb->postmeta}` WHERE meta_key='_EventStartDate'";
		$date_results = $wpdb->get_results( $sql );

		// echo "<pre>" . print_r($date_results,true) . "</pre>";
		$start_date = $date_results[0]->max_date;
		$end_date = $date_results[0]->min_date;

		if(get_query_var('eventDate') ) {
		   $getCurYear = get_query_var('eventDate');
		   $getCurYear = substr($getCurYear,0,4);
		}else{
			$getCurYear = $start_date;
		}
	?>
	<div class="yearselect">
		<select onchange="window.location.href=this.value">
			<?php for($curYear=$start_date; $curYear>=$end_date; $curYear--){ ?>
			<option <?php if($getCurYear == $curYear){ echo 'selected'; } ?> value="/event-all/photo/<?php echo $curYear; ?>-01-01"><?php echo $curYear; ?></option>
			<?php } ?>
		</select>
	</div>
	<!-- Notices -->
	<?php tribe_the_notices(); ?>

	<!-- Photo View Header -->
	<?php do_action( 'tribe_events_before_header' ); ?>
	<div id="tribe-events-header" <?php tribe_events_the_header_attributes(); ?>>

		<!-- Header Navigation -->
		<?php do_action( 'tribe_events_before_header_nav' ); ?>
		<?php tribe_get_template_part( 'pro/photo/nav', 'header' ); ?>
		<?php do_action( 'tribe_events_after_header_nav' ); ?>

	</div><!-- #tribe-events-header -->
	<?php do_action( 'tribe_events_after_header' ); ?>

	<!-- Events Loop -->
	<?php if ( have_posts() ) : ?>
		<?php do_action( 'tribe_events_before_loop' ); ?>
		<?php tribe_get_template_part( 'pro/photo/loop' ); ?>
		<?php do_action( 'tribe_events_after_loop' ); ?>
	<?php endif; ?>

	<!-- List Footer -->
	<?php do_action( 'tribe_events_before_footer' ); ?>
	<div id="tribe-events-footer">

		<!-- Footer Navigation -->
		<?php do_action( 'tribe_events_before_footer_nav' ); ?>
		<?php tribe_get_template_part( 'pro/photo/nav', 'footer' ); ?>
		<?php do_action( 'tribe_events_after_footer_nav' ); ?>

	</div><!-- #tribe-events-footer -->
	<?php do_action( 'tribe_events_after_footer' ); ?>

</div><!-- #tribe-events-content -->
