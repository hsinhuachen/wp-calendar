<?php
/**
 * Astra Demo View.
 *
 * @package Astra Portfolio
 */

defined( 'ABSPATH' ) or exit;

?>

<div class="wrap">

	<form id="astra-portfolio-settings" enctype="multipart/form-data" method="post">

		<table class="form-table">
			<tr>
				<th scope="row"><?php _e( 'Page Builder', 'astra-portfolio' ); ?></th>
				<td>
					<fieldset>
						<select name="page-builder">
							<option value=""><?php _e( 'All', 'astra-portfolio' ); ?></option>
							<option value="33" <?php selected( '33', $data['page-builder'] ); ?>><?php esc_html_e( 'Elementor', 'astra-portfolio' ); ?></option>
							<option value="34" <?php selected( '34', $data['page-builder'] ); ?>><?php esc_html_e( 'Beaver Builder', 'astra-portfolio' ); ?></option>
							<option value="41" <?php selected( '41', $data['page-builder'] ); ?>><?php esc_html_e( 'Brizy', 'astra-portfolio' ); ?></option>
							<option value="42" <?php selected( '42', $data['page-builder'] ); ?>><?php esc_html_e( 'Gutenberg', 'astra-portfolio' ); ?></option>
						</select>
						<?php /* translators: %s is the documentation link. */ ?>
						<p class="description"><?php esc_html_e( 'Choose your preferred page builder from the list. Starter sites built with chosen page builder will only be imported. Choose "All" to import available starter sites with different page builders.', 'astra-portfolio' ); ?></p>
					</fieldset>
				</td>
			</tr>
			<tr>
				<th scope="row"><?php _e( 'Import Starter Sites', 'astra-portfolio' ); ?></th>
				<td>
					<fieldset>							
						<?php
						$status = self::test_cron();
						if ( is_wp_error( $status ) ) {
							if ( 'wp_portfolio_cron_error' === $status->get_error_code() ) {
								echo '<p>' . $status->get_error_message() . '</p>';
							} else {
								echo '<p>';
								printf(
									/* translators: 1: Error message text. */
									esc_html__( 'ERROR! There was a problem while testing the cron schedules on your website. The problem is: %s', 'astra-portfolio' ),
									'<br><strong>' . esc_html( $status->get_error_message() ) . '</strong>'
								);
								echo '</p>';
							}
						} else {

							if ( Astra_Portfolio_Page::get_instance()->complete_import_sites() ) {
								$message  = __( 'Sync', 'astra-portfolio' );
								$disabled = '';
							} else {
								$message  = get_option( 'astra-portfolio-batch-process-string', 'Sync' );
								$disabled = 'is-disabled updating-message astra-sites-batch-processing';
							}

							$_nonce = wp_create_nonce( 'astra-portfolio-batch-process' );
							?>
							<a href="<?php echo esc_url( admin_url() . 'edit.php?post_type=astra-portfolio&page=astra-portfolio&_nonce=' . $_nonce ); ?>"  class="button astra-portfolio <?php echo esc_attr( $disabled ); ?>"><?php echo esc_html( $message ); ?></a>
							<?php /* translators: %s is the documentation link. */ ?>
							<p class="description"><?php printf( __( 'Import Astra Starter Sites as portfolio items. <a href="%s" target="_blank">Read how this works</a>.', 'astra-portfolio' ), esc_url( 'https://wpportfolio.net/?p=24600' ) ); ?></p>
						<?php } ?>
					</fieldset>
				</td>
			</tr>
			<tr>
				<th scope="row"><?php _e( 'Shortcode', 'astra-portfolio' ); ?></th>
				<td>
					<fieldset>
						<input type="text" onfocus="this.select();" readonly="readonly" class="regular-text astra-portfolio-shortcode-text" value="[wp_portfolio]" />
						<?php /* translators: %s is the documentation link. */ ?>
						<p class="description"><?php printf( __( 'Paste the shortcode on the page where you need to display portfolio items. See the complete list of shortcode attributes <a href="%s" target="_blank">here</a>.', 'astra-portfolio' ), esc_url( 'https://wpportfolio.net/?p=28498' ) ); ?></p>
					</fieldset>
				</td>
			</tr>
			<tr>
				<th scope="row"><?php _e( 'Display', 'astra-portfolio' ); ?></th>
				<td>
					<fieldset>
						<label>
							<input type="checkbox" name="categories" value="1" <?php checked( $data['categories'], 1 ); ?> /> <?php _e( 'Enable sorting by categories.', 'astra-portfolio' ); ?>
						</label>
					</fieldset>
					<fieldset>
						<label>
							<input type="checkbox" name="other-categories" value="1" <?php checked( $data['other-categories'], 1 ); ?> /> <?php _e( 'Enable sorting by other categories.', 'astra-portfolio' ); ?>
						</label>
					</fieldset>
					<fieldset>
						<label>
							<input type="checkbox" name="show-search" value="1" <?php checked( $data['show-search'], 1 ); ?> /> <?php _e( 'Display sites search box.', 'astra-portfolio' ); ?>
						</label>
					</fieldset>
					<fieldset>
						<label>
							<input type="checkbox" name="responsive-button" value="1" <?php checked( $data['responsive-button'], 1 ); ?> /> <?php _e( 'Display responsive buttons.', 'astra-portfolio' ); ?>
						</label>
					</fieldset>
				</td>
			</tr>
		</table>

		<input type="hidden" name="message" value="saved" />
		<input type="hidden" name="tab_slug" value="general" />
		<?php wp_nonce_field( 'astra-portfolio-importing', 'astra-portfolio-import' ); ?>

		<?php submit_button(); ?>
	</form>
</div>
