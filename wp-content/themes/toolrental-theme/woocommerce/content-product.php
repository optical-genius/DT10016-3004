<?php
/**
 * The template for displaying product content within loops
 *
 * @package ToolRental
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}

$prod_id = $product->get_id();
$meta    = toolrental_get_product_meta( $prod_id );
$cats    = get_the_terms( $prod_id, 'product_cat' );
$cat_name = ( $cats && ! is_wp_error( $cats ) ) ? $cats[0]->name : 'Erikoistyökalu';
?>
<div <?php wc_product_class( 'rental-card', $product ); ?>>
	<div class="rental-card-thumb">
		<a href="<?php the_permalink(); ?>">
			<?php if ( has_post_thumbnail() ) : ?>
				<?php the_post_thumbnail( 'toolrental-card' ); ?>
			<?php else : ?>
				<div style="width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; background: #e2e8f0; color: #64748b;">
					<svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
				</div>
			<?php endif; ?>
		</a>
		<span class="status-badge"><?php echo esc_html( $meta['badge'] ); ?></span>
		<span class="cat-badge"><?php echo esc_html( $cat_name ); ?></span>
	</div>

	<div class="rental-card-content">
		<h3 class="rental-card-title">
			<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		</h3>
		<div class="rental-card-desc">
			<?php echo esc_html( wp_strip_all_tags( get_the_excerpt() ) ); ?>
		</div>

		<?php if ( ! empty( $meta['specs'] ) ) : ?>
			<div class="rental-specs-mini">
				<?php foreach ( array_slice( $meta['specs'], 0, 2 ) as $spec ) : ?>
					<span class="rental-spec-tag"><?php echo esc_html( $spec ); ?></span>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>

		<div class="rental-card-footer">
			<div class="rental-price-wrap">
				<span class="price-prefix"><?php esc_html_e( 'Vuokrahinta alk.', 'toolrental' ); ?></span>
				<span class="rental-price"><?php echo wp_kses_post( $product->get_price_html() ); ?></span>
			</div>
			<a href="<?php the_permalink(); ?>" class="btn-rent-card">
				<?php esc_html_e( 'Varaa laite', 'toolrental' ); ?>
			</a>
		</div>
	</div>
</div>
