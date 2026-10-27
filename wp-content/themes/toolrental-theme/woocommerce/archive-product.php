<?php
/**
 * The Template for displaying product archives, including the main shop page
 *
 * @package ToolRental
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header( 'shop' );

$current_cat_id = is_product_category() ? get_queried_object_id() : 0;
$term_obj       = is_product_category() ? get_queried_object() : null;
?>

<div class="page-hero">
	<div class="container">
		<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
			<h1 class="page-title"><?php woocommerce_page_title(); ?></h1>
		<?php endif; ?>
		<?php if ( $term_obj && ! empty( $term_obj->description ) ) : ?>
			<p style="color: #cbd5e1; font-size: 16px; margin-top: 6px;"><?php echo esc_html( $term_obj->description ); ?></p>
		<?php else : ?>
			<p><?php esc_html_e( 'Valitse ammattitason erikoistyökalu tai kuvauskalusto. Kaikki hinnat sisältävät ALV:n ja laitekohtaisen perusvarustuksen.', 'toolrental' ); ?></p>
		<?php endif; ?>
	</div>
</div>

<div class="container section">
	<!-- Category Quick Filters Bar -->
	<div style="display: flex; gap: 10px; flex-wrap: wrap; margin-bottom: 36px; align-items: center;">
		<?php
		$all_active = ( 0 === $current_cat_id );
		$all_bg     = $all_active ? 'var(--color-primary)' : '#ffffff';
		$all_color  = $all_active ? '#ffffff' : '#334155';
		$all_border = $all_active ? 'var(--color-primary)' : 'var(--color-border)';
		?>
		<a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>" class="trust-badge" style="background: <?php echo esc_attr( $all_bg ); ?>; color: <?php echo esc_attr( $all_color ); ?>; border: 1px solid <?php echo esc_attr( $all_border ); ?>; padding: 8px 16px; font-weight: 600; text-decoration: none; border-radius: var(--radius-full); transition: all 0.2s ease;">
			<?php esc_html_e( 'Kaikki laitteet', 'toolrental' ); ?>
		</a>
		<?php
		$cats = get_terms( array(
			'taxonomy'   => 'product_cat',
			'hide_empty' => false,
		) );
		if ( ! empty( $cats ) && ! is_wp_error( $cats ) ) :
			foreach ( $cats as $cat ) :
				if ( 'uncategorized' === $cat->slug ) continue;
				$is_active = ( $current_cat_id === $cat->term_id );
				$cat_bg    = $is_active ? 'var(--color-primary)' : '#ffffff';
				$cat_color = $is_active ? '#ffffff' : '#334155';
				$cat_bdr   = $is_active ? 'var(--color-primary)' : 'var(--color-border)';
				?>
				<a href="<?php echo esc_url( get_term_link( $cat ) ); ?>" class="trust-badge" style="background: <?php echo esc_attr( $cat_bg ); ?>; border: 1px solid <?php echo esc_attr( $cat_bdr ); ?>; color: <?php echo esc_attr( $cat_color ); ?>; padding: 8px 16px; font-weight: 600; text-decoration: none; border-radius: var(--radius-full); transition: all 0.2s ease;">
					<?php echo esc_html( $cat->name ); ?> (<?php echo esc_html( $cat->count ); ?>)
				</a>
				<?php
			endforeach;
		endif;
		?>
	</div>

	<?php if ( woocommerce_product_loop() ) : ?>

		<div class="product-grid product-grid-4">
			<?php
			if ( wc_get_loop_prop( 'total' ) ) {
				while ( have_posts() ) {
					the_post();
					wc_get_template_part( 'content', 'product' );
				}
			}
			?>
		</div>

		<div style="margin-top: 40px; text-align: center;">
			<?php woocommerce_pagination(); ?>
		</div>

	<?php else : ?>
		<div style="padding: 60px 0; text-align: center;">
			<h3><?php esc_html_e( 'Ei löytynyt laitteita tästä kategoriasta.', 'toolrental' ); ?></h3>
			<p><a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>"><?php esc_html_e( 'Näytä kaikki vuokralaitteet', 'toolrental' ); ?> &rarr;</a></p>
		</div>
	<?php endif; ?>
</div>

<?php
get_footer( 'shop' );
