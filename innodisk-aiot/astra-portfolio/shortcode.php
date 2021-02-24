<?php
/**
 * Shortcode Markup
 *
 * @package Astra Portfolio
 * @since 1.0.0
 */
 
$my_current_lang = apply_filters( 'wpml_current_language', NULL );
do_action( 'wpml_switch_language', $my_current_lang);
$style             = isset( $args['data']['grid-style'] ) ? $args['data']['grid-style'] : 'style-1';
$show_portfolio_on = isset( $args['data']['show-portfolio-on'] ) ? $args['data']['show-portfolio-on'] : 'scroll';
?>
<div id="astra-portfolio" class="astra-portfolio-wrap astra-portfolio-<?php echo esc_attr( $style ); ?> astra-portfolio-show-on-<?php echo esc_attr( $show_portfolio_on ); ?>"
	data-other-categories="<?php echo esc_attr( $args['data']['other-categories'] ); ?>"
	data-categories="<?php echo esc_attr( $args['data']['categories'] ); ?>"
	data-tags="<?php echo esc_attr( $args['data']['tags'] ); ?>"
>
<?php
	$args = array(  
        'post_type' => 'astra-portfolio',
        'post_status' => 'publish',
        'posts_per_page' => 3, 
        'orderby' => 'post_date', 
        'order' => 'DESC', 
    );


	$list = new WP_Query( $args ); 
        
    while ( $list->have_posts() ) : $list->the_post(); 
?>
	<div class="site-single new-tab astra-portfolio-col-md-4 page" data-slug="ms-iot-in-action" data-id="2340" data-portfolio-type="page">
		<div class="inner">
			<?php 
				$post_thumbnail_id = get_post_thumbnail_id(get_the_ID());

				if($post_thumbnail_id){
					$featured_img = wp_get_attachment_image_src($post_thumbnail_id,'large');
			?>
			<a target="_blank" class="site-preview" title="<?php echo the_title(); ?>" href="<?php echo the_permalink(); ?>" style="">
				<img class="lazy" alt="" title="<?php echo the_title(); ?>" src="<?php echo $featured_img[0] ?>" style="">
				<noscript>
					<img src="<?php echo $featured_img['url'] ?>" alt="" title="<?php echo the_title(); ?>" />
				</noscript>
				<span class="view-demo-wrap">
					<span class="view-demo"> Quick View </span>
				</span>																
			</a>	
			<?php
				}
			?>		
			<div class="template-meta">
				<div class="item-title"><?php echo the_title(); ?></div>
				<div class="flags">
				<?php
					$flag_str = get_post_meta(get_the_ID(),"astra-site-flag",true);
					$flags = explode(",", $flag_str);
					foreach($flags as $flag){
				?>
					<span class="flag-icon <?php echo $flag ?>"></span>
				<?php
					}
				?>
				</div>
			</div>
		</div> <!-- /inner -->
	</div> <!-- /site-single -->
<?php
    endwhile;
?>
</div>
