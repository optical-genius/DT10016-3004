<?php
/**
 * The header for our theme
 *
 * @package ToolRental
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site-wrapper">

	<!-- Top Notification Bar -->
	<div class="topbar">
		<div class="container">
			<div>
				<span class="topbar-badge"><?php esc_html_e( 'Noutopiste avoinna', 'toolrental' ); ?></span>
				<span><?php esc_html_e( 'Kalasatama, Helsinki | ma–pe 9–18, la 10–15 | Puh. 010 321 8890', 'toolrental' ); ?></span>
			</div>
			<div class="topbar-links">
				<a href="<?php echo esc_url( home_url( '/vuokrausehdot' ) ); ?>"><?php esc_html_e( 'Vuokrausehdot', 'toolrental' ); ?></a>
				<a href="<?php echo esc_url( home_url( '/tyopaja' ) ); ?>"><?php esc_html_e( 'Perehdytys & Työpaja', 'toolrental' ); ?></a>
				<a href="<?php echo esc_url( home_url( '/yhteystiedot' ) ); ?>"><?php esc_html_e( 'Yhteystiedot', 'toolrental' ); ?></a>
			</div>
		</div>
	</div>

	<!-- Main Navigation Header -->
	<header id="masthead" class="site-header">
		<div class="container">
			<div class="header-inner">
				<!-- Brand / Logo -->
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-brand" rel="home">
					<div class="brand-icon">
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
							<path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"></path>
						</svg>
					</div>
					<div class="brand-text">
						<span class="brand-title"><?php bloginfo( 'name' ); ?></span>
						<span class="brand-subtitle"><?php esc_html_e( 'Erikoistyökalut & High-End Kalusto', 'toolrental' ); ?></span>
					</div>
				</a>

				<!-- Primary Navigation -->
				<nav id="site-navigation" class="primary-nav" aria-label="<?php esc_attr_e( 'Päävalikko', 'toolrental' ); ?>">
					<?php
					if ( has_nav_menu( 'primary' ) ) {
						wp_nav_menu(
							array(
								'theme_location' => 'primary',
								'menu_id'        => 'primary-menu',
								'container'      => false,
								'fallback_cb'    => false,
							)
						);
					} else {
						// Fallback menu items
						echo '<ul>';
						echo '<li><a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html__( 'Etusivu', 'toolrental' ) . '</a></li>';
						echo '<li><a href="' . esc_url( wc_get_page_permalink( 'shop' ) ? wc_get_page_permalink( 'shop' ) : home_url( '/shop' ) ) . '">' . esc_html__( 'Kaikki laitteet', 'toolrental' ) . '</a></li>';
						echo '<li><a href="' . esc_url( home_url( '/vuokrausehdot' ) ) . '">' . esc_html__( 'Vuokrausehdot', 'toolrental' ) . '</a></li>';
						echo '<li><a href="' . esc_url( home_url( '/tyopaja' ) ) . '">' . esc_html__( 'Työpaja & Koulutus', 'toolrental' ) . '</a></li>';
						echo '<li><a href="' . esc_url( home_url( '/yhteystiedot' ) ) . '">' . esc_html__( 'Yhteystiedot', 'toolrental' ) . '</a></li>';
						echo '</ul>';
					}
					?>
				</nav>

				<!-- Header Actions: Cart & Quick Action -->
				<div class="header-actions">
					<?php if ( function_exists( 'WC' ) ) : 
						$cart_count = WC()->cart ? WC()->cart->get_cart_contents_count() : 0;
						$cart_url   = wc_get_cart_url();
					?>
						<a href="<?php echo esc_url( $cart_url ); ?>" class="cart-button" title="<?php esc_attr_e( 'Ostoskori / Vuokrauspyynnöt', 'toolrental' ); ?>">
							<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
								<circle cx="9" cy="21" r="1"></circle>
								<circle cx="20" cy="21" r="1"></circle>
								<path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
							</svg>
							<span><?php esc_html_e( 'Kori', 'toolrental' ); ?></span>
							<span class="cart-count"><?php echo esc_html( $cart_count ); ?></span>
						</a>
					<?php endif; ?>

					<a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ? wc_get_page_permalink( 'shop' ) : home_url( '/shop' ) ); ?>" class="btn-header-cta">
						<?php esc_html_e( 'Selaa kalustoa', 'toolrental' ); ?> &rarr;
					</a>
				</div>
			</div>
		</div>
	</header>

	<main id="primary" class="site-main">
