<?php
/**
 * Erikoistyökalu Vuokraus Theme Functions
 *
 * @package ToolRental
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Setup theme defaults and register support for various WordPress features.
 */
function toolrental_setup() {
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Let WordPress manage the document title.
	add_theme_support( 'title-tag' );

	// Enable support for Post Thumbnails on posts and pages.
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 600, 450, true );
	add_image_size( 'toolrental-card', 500, 380, true );
	add_image_size( 'toolrental-hero', 800, 600, true );

	// Register navigation menus.
	register_nav_menus(
		array(
			'primary' => esc_html__( 'Päävalikko', 'toolrental' ),
			'footer'  => esc_html__( 'Alapalkin valikko', 'toolrental' ),
		)
	);

	// Switch default core markup for search form, comment form, etc. to output valid HTML5.
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// WooCommerce Theme Support
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'toolrental_setup' );

/**
 * Enqueue scripts and styles.
 */
function toolrental_scripts() {
	// Enqueue Google Fonts (Inter)
	wp_enqueue_style(
		'toolrental-fonts',
		'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap',
		array(),
		null
	);

	// Enqueue main theme stylesheet
	wp_enqueue_style(
		'toolrental-style',
		get_stylesheet_uri(),
		array( 'toolrental-fonts' ),
		wp_get_theme()->get( 'Version' )
	);

	// Enqueue theme javascript
	wp_enqueue_script(
		'toolrental-main',
		get_template_directory_uri() . '/assets/js/main.js',
		array( 'jquery' ),
		wp_get_theme()->get( 'Version' ),
		true
	);

	// Localize script data for AJAX
	wp_localize_script(
		'toolrental-main',
		'toolrentalData',
		array(
			'ajaxUrl' => admin_url( 'admin-ajax.php' ),
			'nonce'   => wp_create_nonce( 'toolrental_nonce' ),
		)
	);
}
add_action( 'wp_enqueue_scripts', 'toolrental_scripts' );

/**
 * AJAX update for cart count in header
 */
function toolrental_cart_count_fragments( $fragments ) {
	if ( function_exists( 'WC' ) && WC()->cart ) {
		$count = WC()->cart->get_cart_contents_count();
		$fragments['span.cart-count'] = '<span class="cart-count">' . esc_html( $count ) . '</span>';
	}
	return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'toolrental_cart_count_fragments' );

/**
 * Change price format to clarify rental daily price
 */
function toolrental_custom_price_format( $price, $product ) {
	if ( is_admin() ) {
		return $price;
	}
	// Append / vrk to price for clearer rental messaging
	return $price . ' <span class="rental-unit">/ vrk</span>';
}
add_filter( 'woocommerce_get_price_html', 'toolrental_custom_price_format', 10, 2 );

/**
 * Helper to get rental product metadata with safe defaults
 */
function toolrental_get_product_meta( $product_id ) {
	$deposit       = get_post_meta( $product_id, '_rental_deposit', true );
	$weekend_price = get_post_meta( $product_id, '_rental_weekend_price', true );
	$badge         = get_post_meta( $product_id, '_rental_badge', true );
	$specs         = get_post_meta( $product_id, '_rental_specs', true );
	$video_url     = get_post_meta( $product_id, '_rental_video_url', true );
	$skill_level   = get_post_meta( $product_id, '_rental_skill_level', true );
	$software      = get_post_meta( $product_id, '_rental_software', true );
	$case_info     = get_post_meta( $product_id, '_rental_case', true );
	$omavastuu     = get_post_meta( $product_id, '_rental_omavastuu', true );
	$package_items = get_post_meta( $product_id, '_rental_package_items', true );
	$specs_table   = get_post_meta( $product_id, '_rental_specs_table', true );

	return array(
		'deposit'       => $deposit ? esc_html( $deposit ) : '100 € (palautetaan vuokrauksen päätyttyä)',
		'weekend_price' => $weekend_price ? esc_html( $weekend_price ) : '',
		'badge'         => $badge ? esc_html( $badge ) : 'Heti saatavilla',
		'specs'         => is_array( $specs ) ? $specs : array(),
		'video_url'     => $video_url ? esc_url( $video_url ) : '',
		'skill_level'   => $skill_level ? esc_html( $skill_level ) : 'Aloittelijaystävällinen (Perehdytys sisältyy)',
		'software'      => $software ? esc_html( $software ) : '',
		'case'          => $case_info ? esc_html( $case_info ) : 'Iskunkestävä Peli-case muotoillulla pehmusteella',
		'omavastuu'     => $omavastuu ? esc_html( $omavastuu ) : 'Enintään 300 € (Täyskattava laitevakuutus)',
		'package_items' => $package_items ? $package_items : '',
		'specs_table'   => $specs_table ? $specs_table : '',
	);
}

/**
 * Register Product Meta Box for Rental details & Video
 */
function toolrental_register_product_metabox() {
	add_meta_box(
		'toolrental_product_meta',
		__( 'Vuokralaitteen lisätiedot, SEO & Video-ohjeet', 'toolrental' ),
		'toolrental_render_product_metabox',
		'product',
		'normal',
		'high'
	);
}
add_action( 'add_meta_boxes', 'toolrental_register_product_metabox' );

/**
 * Render Product Meta Box in WordPress Admin
 */
function toolrental_render_product_metabox( $post ) {
	wp_nonce_field( 'toolrental_save_product_meta', 'toolrental_product_meta_nonce' );

	$video_url     = get_post_meta( $post->ID, '_rental_video_url', true );
	$skill_level   = get_post_meta( $post->ID, '_rental_skill_level', true );
	$software      = get_post_meta( $post->ID, '_rental_software', true );
	$case_info     = get_post_meta( $post->ID, '_rental_case', true );
	$omavastuu     = get_post_meta( $post->ID, '_rental_omavastuu', true );
	$deposit       = get_post_meta( $post->ID, '_rental_deposit', true );
	$badge         = get_post_meta( $post->ID, '_rental_badge', true );
	$package_items = get_post_meta( $post->ID, '_rental_package_items', true );
	$specs_table   = get_post_meta( $post->ID, '_rental_specs_table', true );
	?>
	<div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; padding: 10px 0;">
		<div>
			<p>
				<label for="rental_video_url"><strong><?php esc_html_e( 'Opastus- & käyttöönotto-video (YouTube, Vimeo tai MP4 URL):', 'toolrental' ); ?></strong></label><br>
				<input type="url" id="rental_video_url" name="rental_video_url" value="<?php echo esc_url( $video_url ); ?>" style="width: 100%;" placeholder="https://www.youtube.com/watch?v=...">
				<span class="description"><?php esc_html_e( 'Liitä tähän linkki purku-, kalibrointi- tai sammutusohjevideoon.', 'toolrental' ); ?></span>
			</p>
			<p>
				<label for="rental_skill_level"><strong><?php esc_html_e( 'Vaadittava taitotaso:', 'toolrental' ); ?></strong></label><br>
				<input type="text" id="rental_skill_level" name="rental_skill_level" value="<?php echo esc_attr( $skill_level ); ?>" style="width: 100%;" placeholder="esim. Aloittelijaystävällinen / Vaatii perehdytyksen / Pro">
			</p>
			<p>
				<label for="rental_software"><strong><?php esc_html_e( 'Yhteensopiva ohjelmisto & ajurit:', 'toolrental' ); ?></strong></label><br>
				<input type="text" id="rental_software" name="rental_software" value="<?php echo esc_attr( $software ); ?>" style="width: 100%;" placeholder="esim. Bambu Studio, Cura, LightBurn, DaVinci Resolve">
			</p>
			<p>
				<label for="rental_case"><strong><?php esc_html_e( 'Kuljetuslaukku / Peli-case:', 'toolrental' ); ?></strong></label><br>
				<input type="text" id="rental_case" name="rental_case" value="<?php echo esc_attr( $case_info ); ?>" style="width: 100%;" placeholder="esim. Iskunkestävä Peli Air 1535 -pehmustekotelo">
			</p>
		</div>
		<div>
			<p>
				<label for="rental_omavastuu"><strong><?php esc_html_e( 'Vakuutus ja omavastuuraja:', 'toolrental' ); ?></strong></label><br>
				<input type="text" id="rental_omavastuu" name="rental_omavastuu" value="<?php echo esc_attr( $omavastuu ? $omavastuu : 'Enintään 300 € (Täyskattava laitevakuutus)' ); ?>" style="width: 100%;">
				<span class="description"><?php esc_html_e( 'Maksullinen vastuurajoitus vahinkotapauksessa (poistaa rikkoutumisen pelon).', 'toolrental' ); ?></span>
			</p>
			<p>
				<label for="rental_deposit"><strong><?php esc_html_e( 'Palautettava vakuus (pantti):', 'toolrental' ); ?></strong></label><br>
				<input type="text" id="rental_deposit" name="rental_deposit" value="<?php echo esc_attr( $deposit ); ?>" style="width: 100%;" placeholder="esim. 150 €">
			</p>
			<p>
				<label for="rental_badge"><strong><?php esc_html_e( 'Saatavuusmerkintä / Badge:', 'toolrental' ); ?></strong></label><br>
				<input type="text" id="rental_badge" name="rental_badge" value="<?php echo esc_attr( $badge ); ?>" style="width: 100%;" placeholder="esim. Heti vapaana / Suosittu">
			</p>
		</div>
	</div>

	<p>
		<label for="rental_package_items"><strong><?php esc_html_e( 'Mitä paketti sisältää (yksi varuste per rivi):', 'toolrental' ); ?></strong></label><br>
		<textarea id="rental_package_items" name="rental_package_items" rows="4" style="width: 100%; font-family: monospace;" placeholder="Laitteisto testattuna ja kalibroituna&#10;Iskunkestävä Peli-case kuljetuslaukku&#10;Virta- ja liitäntäkaapelit&#10;Aloitusmateriaali tai puhdistussetti"><?php echo esc_textarea( $package_items ); ?></textarea>
	</p>

	<p>
		<label for="rental_specs_table"><strong><?php esc_html_e( 'Yksityiskohtaiset tekniset tiedot (Ominaisuus: Arvo per rivi):', 'toolrental' ); ?></strong></label><br>
		<textarea id="rental_specs_table" name="rental_specs_table" rows="5" style="width: 100%; font-family: monospace;" placeholder="Tulostusala: 256 x 256 x 256 mm&#10;Tulostusnopeus: 500 mm/s&#10;Suuttimen lämpötila: Max 300°C&#10;Tuetut materiaalit: PLA, PETG, ABS, PC, Hiilikuitu&#10;Liitännät: Wi-Fi, Bambu Bus, Kamera"><?php echo esc_textarea( $specs_table ); ?></textarea>
	</p>
	<?php
}

/**
 * Save Product Meta Box data securely
 */
function toolrental_save_product_metabox( $post_id ) {
	if ( ! isset( $_POST['toolrental_product_meta_nonce'] ) || ! wp_verify_nonce( sanitize_key( $_POST['toolrental_product_meta_nonce'] ), 'toolrental_save_product_meta' ) ) {
		return;
	}

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	if ( isset( $_POST['rental_video_url'] ) ) {
		update_post_meta( $post_id, '_rental_video_url', esc_url_raw( wp_unslash( $_POST['rental_video_url'] ) ) );
	}
	if ( isset( $_POST['rental_skill_level'] ) ) {
		update_post_meta( $post_id, '_rental_skill_level', sanitize_text_field( wp_unslash( $_POST['rental_skill_level'] ) ) );
	}
	if ( isset( $_POST['rental_software'] ) ) {
		update_post_meta( $post_id, '_rental_software', sanitize_text_field( wp_unslash( $_POST['rental_software'] ) ) );
	}
	if ( isset( $_POST['rental_case'] ) ) {
		update_post_meta( $post_id, '_rental_case', sanitize_text_field( wp_unslash( $_POST['rental_case'] ) ) );
	}
	if ( isset( $_POST['rental_omavastuu'] ) ) {
		update_post_meta( $post_id, '_rental_omavastuu', sanitize_text_field( wp_unslash( $_POST['rental_omavastuu'] ) ) );
	}
	if ( isset( $_POST['rental_deposit'] ) ) {
		update_post_meta( $post_id, '_rental_deposit', sanitize_text_field( wp_unslash( $_POST['rental_deposit'] ) ) );
	}
	if ( isset( $_POST['rental_badge'] ) ) {
		update_post_meta( $post_id, '_rental_badge', sanitize_text_field( wp_unslash( $_POST['rental_badge'] ) ) );
	}
	if ( isset( $_POST['rental_package_items'] ) ) {
		update_post_meta( $post_id, '_rental_package_items', sanitize_textarea_field( wp_unslash( $_POST['rental_package_items'] ) ) );
	}
	if ( isset( $_POST['rental_specs_table'] ) ) {
		update_post_meta( $post_id, '_rental_specs_table', sanitize_textarea_field( wp_unslash( $_POST['rental_specs_table'] ) ) );
	}
}
add_action( 'save_post_product', 'toolrental_save_product_metabox' );

/**
 * Ensure WooCommerce wraps content cleanly
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

function toolrental_wrapper_start() {
	echo '<div class="container section"><div class="woocommerce-container">';
}
add_action( 'woocommerce_before_main_content', 'toolrental_wrapper_start', 10 );

function toolrental_wrapper_end() {
	echo '</div></div>';
}
add_action( 'woocommerce_after_main_content', 'toolrental_wrapper_end', 10 );

/**
 * Format video URL into a privacy-respecting responsive embed URL
 */
function toolrental_get_embed_url( $url ) {
	$url = trim( $url );
	if ( empty( $url ) ) {
		return '';
	}

	// YouTube
	if ( preg_match( '/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/ ]{11})/i', $url, $matches ) ) {
		return 'https://www.youtube-nocookie.com/embed/' . $matches[1] . '?rel=0';
	}

	// Vimeo
	if ( preg_match( '/vimeo\.com\/(?:channels\/(?:\w+\/)?|groups\/([^\/]*)\/videos\/|album\/(\d+)\/video\/|video\/|)(\d+)/i', $url, $matches ) ) {
		return 'https://player.vimeo.com/video/' . $matches[3] . '?dnt=1';
	}

	return $url;
}
