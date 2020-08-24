<?php
/**
 * Photo View Single Event
 * This file contains one event in the photo view
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/pro/photo/single-event.php
 *
 * @package TribeEventsCalendar
 * @version 4.4.28
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
} ?>

<?php

global $post;

?>

<div class="tribe-events-photo-event-wrap">
	<?php $event_id = get_the_ID(); ?>
	<?php //echo tribe_event_featured_image( null, 'medium' ); ?>
	<?php 
				
		$ev_post_img=ect_get_event_image($event_id,$size='medium');
		$bg_styles="background-image:url('$ev_post_img');background-size:cover;";

		$events_html.='<div class="ect-list-img" style="'.$bg_styles.'">';
		//$events_html.='<a href="'.esc_url( tribe_get_event_link($event_id)).'" alt="'.esc_attr(get_the_title($event_id)).'" rel="bookmark"></a>';
		$events_html.='</div><!-- ect-list-img -->';

		echo $events_html; 
	?>
	<div class="tribe-events-event-details tribe-clearfix">

		<!-- Event Title -->
		<?php do_action( 'tribe_events_before_the_event_title' ); ?>
		<h3 class="tribe-events-list-event-title">
			<!-- <a class="tribe-event-url" href="<?php echo esc_url( tribe_get_event_link() ); ?>" title="<?php the_title() ?>" rel="bookmark"> -->
				<?php the_title(); ?>
			<!-- </a> -->
		</h3>
		<?php do_action( 'tribe_events_after_the_event_title' ); ?>

		<!-- Event Meta -->
		<?php do_action( 'tribe_events_before_the_meta' ); ?>
		<div class="tribe-events-event-meta">
			<div class="tribe-event-schedule-details">
				<?php
					$ev_day=tribe_get_start_date($event_id, false, 'd' );
			        $ev_month=tribe_get_start_date($event_id, false, 'm' );
			        $ev_full_month=tribe_get_start_date($event_id, false, 'F' );
			        $ev_year=tribe_get_start_date($event_id, false, 'Y' );
			        $output='';

			        $ev_end_month=tribe_get_end_date($event_id, false, 'm' );
			        $ev_end_day=tribe_get_end_date($event_id, false, 'd' );

			        echo $ev_year . '/' .$ev_month . "/" . $ev_day . "-" . $ev_end_month . "/" . $ev_end_day;
				?>
			</div>
		</div><!-- .tribe-events-event-meta -->
		<?php do_action( 'tribe_events_after_the_meta' ); ?>

		<!-- Event Content -->
		<?php do_action( 'tribe_events_before_the_content' ); ?>
		<div class="tribe-events-list-photo-description tribe-events-content">
			<?php //echo tribe_events_get_the_excerpt() ?>
			<div class="grid-view-venue">
				<?php if ( tribe_get_flag( $venue_id ) ) : ?>
				<span class="flag-icon <?php echo tribe_get_flag( $venue_id ); ?>"></span> 
				<?php endif; ?>

					<span class="tribe-country-name" style="line-height: 15px; vertical-align: top;"><?php echo tribe_get_country( $venue_id ) . ", " .tribe_get_city( $venue_id ); ?></span>
		
			</div> <!-- /grid-view-venue -->
	
			<div class="ect-event-links">
			<?php
				$event_link = get_post_meta($event_id,"_ecp_custom_2",true);
				$event_email = get_post_meta($event_id,"_ecp_custom_3",true);

				if(!empty($event_link)){
					$event_link_html = '<a href="' . $event_link . '" class="fas fa-link" target="_blank"></a>';
					echo '<span class="event-link">' . $event_link_html . "</span>";
				}

				if(!empty($event_email)){
					$event_email_html = '<a href="mailto:' . $event_email . '" class="far fa-envelope" target="_blank"></a>';
					echo '<span class="event-link">' . $event_email_html . "</span>";
				}
			?>
			</div>


		</div>
		<?php do_action( 'tribe_events_after_the_content' ) ?>

	</div><!-- /.tribe-events-event-details -->

</div><!-- /.tribe-events-photo-event-wrap -->
