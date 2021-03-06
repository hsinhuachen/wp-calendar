<?php
/**
 * View: Photo View Nav Today Button
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe/events-pro/v2/photo/nav/today.php
 *
 * See more documentation about our views templating system.
 *
 * @link {INSERT_ARTCILE_LINK_HERE}
 *
 * @var string $today_url The URL to the today page, if any, or an empty string.
 *
 * @version 5.0.0
 *
 */
?>
<li class="tribe-events-c-nav__list-item tribe-events-c-nav__list-item--today">
	<a
		href="<?php echo esc_url( $today_url ); ?>"
		class="tribe-events-c-nav__today tribe-common-b2"
		data-js="tribe-events-view-link"
	>
		<?php esc_html_e( 'Today', 'tribe-events-calendar-pro' ); ?>
	</a>
</li>
