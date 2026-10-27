<?php
/**
 * The Template for displaying all single products
 *
 * @package ToolRental
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header( 'shop' );

while ( have_posts() ) :
	the_post();
	global $product;
	$prod_id   = $product->get_id();
	$meta      = toolrental_get_product_meta( $prod_id );
	$price_num = $product->get_regular_price();
	if ( ! $price_num ) {
		$price_num = $product->get_price();
	}
	$weekend_calc = $price_num ? round( $price_num * 1.8 ) . ' €' : 'Kysy tarjous';
	$week_calc    = $price_num ? round( $price_num * 4.2 ) . ' €' : 'Kysy tarjous';

	// Category check for camera equipment privacy reminder
	$is_camera_cat = has_term( array( 'kamerakalusto', '3d-tulostimet' ), 'product_cat', $prod_id );
	?>

	<div class="page-hero" style="padding: 24px 0;">
		<div class="container">
			<?php woocommerce_breadcrumb(); ?>
		</div>
	</div>

	<div class="container product-single-container">
		<div class="product-single-grid">
			<!-- Left Column: Product Images / Gallery (Sticky) -->
			<div class="product-gallery-box">
				<div class="product-main-image-wrap">
					<?php if ( has_post_thumbnail() ) : 
						$main_img_id  = $product->get_image_id();
						$main_img_url = wp_get_attachment_image_url( $main_img_id, 'large' );
						$full_img_url = wp_get_attachment_image_url( $main_img_id, 'full' );
						$main_alt     = get_post_meta( $main_img_id, '_wp_attachment_image_alt', true );
						if ( empty( $main_alt ) ) {
							$main_alt = get_the_title();
						}
					?>
						<a href="<?php echo esc_url( $full_img_url ); ?>" class="product-main-image-link" id="main-image-link" target="_blank" rel="noopener" title="<?php esc_attr_e( 'Avaa täysikokoinen kuva', 'toolrental' ); ?>">
							<img id="main-product-image" src="<?php echo esc_url( $main_img_url ); ?>" alt="<?php echo esc_attr( $main_alt ); ?>" loading="eager" />
							<span class="gallery-zoom-badge" aria-hidden="true" title="<?php esc_attr_e( 'Suurenna', 'toolrental' ); ?>">
								<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/><line x1="11" y1="8" x2="11" y2="14"/><line x1="8" y1="11" x2="14" y2="11"/></svg>
							</span>
						</a>
					<?php else : ?>
						<div style="text-align: center; color: #94a3b8; padding: 40px;">
							<svg width="80" height="80" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
							<p style="margin-top: 12px;"><?php esc_html_e( 'Tuotekuva', 'toolrental' ); ?></p>
						</div>
					<?php endif; ?>
				</div>

				<?php 
				$gallery_ids = $product->get_gallery_image_ids();
				if ( ! empty( $gallery_ids ) && has_post_thumbnail() ) : 
					$all_image_ids = array_merge( array( $product->get_image_id() ), $gallery_ids );
				?>
					<div class="product-gallery-thumbnails" role="tablist" aria-label="<?php esc_attr_e( 'Tuotekuvagalleria', 'toolrental' ); ?>">
						<?php foreach ( $all_image_ids as $index => $img_id ) : 
							$thumb_url = wp_get_attachment_image_url( $img_id, 'thumbnail' );
							$large_url = wp_get_attachment_image_url( $img_id, 'large' );
							$full_url  = wp_get_attachment_image_url( $img_id, 'full' );
							$alt_text  = get_post_meta( $img_id, '_wp_attachment_image_alt', true );
							if ( empty( $alt_text ) ) {
								$alt_text = get_the_title() . ' - Kuva ' . ( $index + 1 );
							}
							$is_active = ( 0 === $index );
						?>
							<button type="button" 
									class="gallery-thumb-btn<?php echo $is_active ? ' is-active' : ''; ?>" 
									data-large-src="<?php echo esc_url( $large_url ); ?>" 
									data-full-src="<?php echo esc_url( $full_url ); ?>"
									data-alt="<?php echo esc_attr( $alt_text ); ?>"
									aria-selected="<?php echo $is_active ? 'true' : 'false'; ?>"
									aria-label="<?php echo esc_attr( sprintf( __( 'Näytä kuva %d', 'toolrental' ), $index + 1 ) ); ?>">
								<img src="<?php echo esc_url( $thumb_url ); ?>" alt="<?php echo esc_attr( $alt_text ); ?>" loading="lazy" />
							</button>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>
			</div>

			<!-- Right Column: Product Details & Booking -->
			<div class="product-details-box">
				<!-- Top Badges Row -->
				<div class="product-meta-row" style="flex-wrap: wrap; gap: 8px;">
					<span class="status-badge" style="position: static; display: inline-block;">
						<?php echo esc_html( $meta['badge'] ); ?>
					</span>
					<span class="skill-badge">
						<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
						<?php echo esc_html( $meta['skill_level'] ); ?>
					</span>
					<span class="case-badge">
						<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg>
						<?php echo esc_html( $meta['case'] ); ?>
					</span>
				</div>

				<h1><?php the_title(); ?></h1>

				<div class="product-lead-description">
					<?php the_content(); ?>
				</div>

				<!-- Software Compatibility Notice if applicable -->
				<?php if ( ! empty( $meta['software'] ) ) : ?>
					<div class="software-box">
						<div style="font-weight: 700; font-size: 13px; color: var(--color-primary); margin-bottom: 6px; display: flex; align-items: center; gap: 6px;">
							<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
							<?php esc_html_e( 'Yhteensopivat ohjelmistot & tiedostomuodot:', 'toolrental' ); ?>
						</div>
						<div style="font-size: 14px; color: #334155; line-height: 1.5;">
							<?php echo esc_html( $meta['software'] ); ?>
						</div>
					</div>
				<?php endif; ?>

				<!-- Rental Rates Card -->
				<div class="rental-pricing-card">
					<div class="rate-tier">
						<span class="rate-label"><?php esc_html_e( 'Vuorokausi (24 h):', 'toolrental' ); ?></span>
						<span class="rate-value"><?php echo wp_kses_post( $product->get_price_html() ); ?></span>
					</div>
					<div class="rate-tier">
						<span class="rate-label"><?php esc_html_e( 'Viikonloppu (pe klo 16 – ma klo 10):', 'toolrental' ); ?></span>
						<span class="rate-value"><?php echo esc_html( $weekend_calc ); ?></span>
					</div>
					<div class="rate-tier">
						<span class="rate-label"><?php esc_html_e( 'Viikkovuokra (7 vrk):', 'toolrental' ); ?></span>
						<span class="rate-value"><?php echo esc_html( $week_calc ); ?></span>
					</div>
					<div class="rate-tier" style="border-top: 1px solid #cbd5e1; margin-top: 8px; padding-top: 10px;">
						<span class="rate-label" style="font-size: 13px; color: #64748b;"><?php esc_html_e( 'Palautettava vakuus (pantti):', 'toolrental' ); ?></span>
						<span style="font-size: 13px; font-weight: 600; color: #334155;"><?php echo esc_html( $meta['deposit'] ); ?></span>
					</div>
				</div>

				<!-- Booking Form: Quantity and Add to Cart in single row -->
				<div class="booking-form-wrap">
					<?php woocommerce_template_single_add_to_cart(); ?>
				</div>

				<!-- Prominent Insurance & Liability Card (Relieves fear of damage!) -->
				<div class="insurance-guarantee-card">
					<div class="insurance-card-header">
						<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#10b981" stroke-width="2.5"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><polyline points="9 12 11 14 15 10"/></svg>
						<strong><?php esc_html_e( 'Laitevakuutus sisältyy vuokraan – omavastuukatto 300 €', 'toolrental' ); ?></strong>
					</div>
					<p>
						<?php esc_html_e( 'Voit työskennellä levollisin mielin: laitteella on kattava vakuutus äkillisten ja tahattomien laiterikkojen varalta. Vahingon sattuessa asiakkaan enimmäisomavastuu on rajoitettu ', 'toolrental' ); ?>
						<strong><?php echo esc_html( $meta['omavastuu'] ); ?></strong>.
					</p>
					<div style="font-size: 12px; color: #047857; margin-top: 6px;">
						✓ <?php esc_html_e( 'Käyttöönottoperehdytys sisältyy aina hintaan noudon yhteydessä.', 'toolrental' ); ?>
					</div>
				</div>

				<!-- Package Contents List (Mitä paketti sisältää) -->
				<div class="package-included-card">
					<h4>
						<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>
						<?php esc_html_e( 'Mitä vuokrauspaketti sisältää:', 'toolrental' ); ?>
					</h4>
					<ul class="package-items-list">
						<?php
						if ( ! empty( $meta['package_items'] ) ) {
							$items = explode( "\n", str_replace( "\r", "", $meta['package_items'] ) );
							foreach ( $items as $it ) {
								$it = trim( $it );
								if ( ! empty( $it ) ) {
									echo '<li>✓ ' . esc_html( $it ) . '</li>';
								}
							}
						} else {
							echo '<li>✓ ' . esc_html__( 'Laitteisto täysin testattuna ja kalibroituna', 'toolrental' ) . '</li>';
							echo '<li>✓ ' . esc_html( $meta['case'] ) . '</li>';
							echo '<li>✓ ' . esc_html__( 'Tarvittavat virta- ja liitäntäkaapelit', 'toolrental' ) . '</li>';
							echo '<li>✓ ' . esc_html__( 'Suomenkieliset pikaohjeet ja turvallisuusopas', 'toolrental' ) . '</li>';
							echo '<li>✓ ' . esc_html__( 'Puhelintuki aukioloaikoina koko vuokra-ajan', 'toolrental' ) . '</li>';
						}
						?>
					</ul>
				</div>

				<!-- Technical Specifications Table -->
				<div class="technical-specs-card">
					<h4>
						<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="4" y1="21" x2="4" y2="14"/><line x1="4" y1="10" x2="4" y2="3"/><line x1="12" y1="21" x2="12" y2="12"/><line x1="12" y1="8" x2="12" y2="3"/><line x1="20" y1="21" x2="20" y2="16"/><line x1="20" y1="12" x2="20" y2="3"/><line x1="1" y1="14" x2="7" y2="14"/><line x1="9" y1="8" x2="15" y2="8"/><line x1="17" y1="16" x2="23" y2="16"/></svg>
						<?php esc_html_e( 'Tekniset tiedot & suorituskyky:', 'toolrental' ); ?>
					</h4>
					<table class="specs-table">
						<tbody>
							<?php
							if ( ! empty( $meta['specs_table'] ) ) {
								$specs_lines = explode( "\n", str_replace( "\r", "", $meta['specs_table'] ) );
								foreach ( $specs_lines as $sline ) {
									$sline = trim( $sline );
									if ( empty( $sline ) ) continue;
									$parts = explode( ":", $sline, 2 );
									$label = isset( $parts[0] ) ? trim( $parts[0] ) : '';
									$val   = isset( $parts[1] ) ? trim( $parts[1] ) : '';
									if ( $label ) {
										echo '<tr><th>' . esc_html( $label ) . '</th><td>' . esc_html( $val ) . '</td></tr>';
									}
								}
							} elseif ( ! empty( $meta['specs'] ) ) {
								foreach ( $meta['specs'] as $spec_item ) {
									echo '<tr><th>' . esc_html__( 'Ominaisuus', 'toolrental' ) . '</th><td>' . esc_html( $spec_item ) . '</td></tr>';
								}
							} else {
								echo '<tr><th>' . esc_html__( 'Kunto & Huolto', 'toolrental' ) . '</th><td>' . esc_html__( '100% testattu ja kalibroitu ennen luovutusta', 'toolrental' ) . '</td></tr>';
							}
							?>
						</tbody>
					</table>
				</div>

				<!-- Camera/Media Privacy Obligation Reminder if applicable -->
				<?php if ( $is_camera_cat ) : ?>
					<div class="camera-gdpr-notice">
						<div style="font-weight: 700; color: #b45309; display: flex; align-items: center; gap: 8px; margin-bottom: 6px;">
							<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
							<?php esc_html_e( 'GDPR-muistio: Muistikorttien ja tallennustilan tyhjennys', 'toolrental' ); ?>
						</div>
						<p style="font-size: 13px; color: #92400e; margin: 0; line-height: 1.5;">
							<?php esc_html_e( 'Kamerakaluston ja tallentimien vuokraajan on tietosuojalain (GDPR) mukaisesti tyhjennettävä ja formatoitava kaikki muistikortit ja laitteen sisäinen muisti ennen palauttamista. Näin varmistat omien ja kuvattavien henkilöiden materiaalien täyden luottamuksellisuuden.', 'toolrental' ); ?>
						</p>
					</div>
				<?php endif; ?>

			</div><!-- .product-details-box -->
		</div><!-- .product-single-grid -->

		<!-- Full-width Video Instruction Section -->
		<div class="rental-video-section">
			<div class="video-section-header">
				<span class="section-eyebrow" style="color: var(--color-primary);"><?php esc_html_e( 'Käyttöönotto- & purkuohjeet', 'toolrental' ); ?></span>
				<h3>
					<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="23 7 16 12 23 17 23 7"/><rect x="1" y="5" width="15" height="14" rx="2" ry="2"/></svg>
					<?php esc_html_e( 'Käyttöönotto- ja turvallisuusvideo: Pakkauksen purku, peruskalibrointi & sammutus', 'toolrental' ); ?>
				</h3>
				<p>
					<?php esc_html_e( 'Katso lyhyt ohjevideo laitteen turvalliseen käyttöönottoon, oikeaan kuljetuslaukkuun pakkaamiseen ja perussäätöihin.', 'toolrental' ); ?>
				</p>
			</div>

			<div class="rental-video-wrapper">
				<?php if ( ! empty( $meta['video_url'] ) ) : 
					$embed_url = toolrental_get_embed_url( $meta['video_url'] );
					?>
					<div class="video-responsive-wrap">
						<iframe src="<?php echo esc_url( $embed_url ); ?>" title="<?php esc_attr_e( 'Käyttöönotto- ja kalibrointivideo', 'toolrental' ); ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen loading="lazy"></iframe>
					</div>
				<?php else : ?>
					<div class="video-placeholder-card">
						<div class="placeholder-icon">
							<svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><polygon points="5 3 19 12 5 21 5 3"/></svg>
						</div>
						<h4><?php esc_html_e( 'Video-opas valmisteltavana tälle laitteelle', 'toolrental' ); ?></h4>
						<p><?php esc_html_e( 'Noudon yhteydessä saat täyden 10–15 minuutin henkilökohtaisen käyttöönotto- ja turvallisuusopastuksen. Voit myös kysyä tekniseltä tuelta milloin vain vuokra-ajan aikana.', 'toolrental' ); ?></p>
						<span style="display: inline-block; background: #e0f2fe; color: #0369a1; padding: 6px 14px; border-radius: var(--radius-full); font-size: 13px; font-weight: 600;">
							✓ <?php esc_html_e( 'Painettu suomenkielinen pikaohje sisältyy kuljetuslaukkuun', 'toolrental' ); ?>
						</span>
					</div>
				<?php endif; ?>
			</div>
		</div>

		<!-- Legal Pre-Purchase and Cancellation Info Accordion / Box -->
		<div class="rental-legal-info-card">
			<div class="legal-info-grid">
				<div>
					<h5>
						<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>
						<?php esc_html_e( 'Peruuttamisoikeus & Muutokset', 'toolrental' ); ?>
					</h5>
					<p>
						<?php esc_html_e( 'Kuluttajansuojalain mukaan etämyynnissä on 14 vrk peruutusoikeus. Määräaikaisessa laitevuokrauksessa peruuttamisoikeus päättyy laitteen luovutushetkellä, kun palvelun suorittaminen on alkanut ennakkosuostumuksellasi.', 'toolrental' ); ?><br>
						<strong style="color: var(--color-primary);"><?php esc_html_e( 'Peruutukset vähintään 48h ennen noutoa hyvitetään 100%!', 'toolrental' ); ?></strong>
						<a href="<?php echo esc_url( home_url( '/peruuttamisoikeus/' ) ); ?>" style="display: block; margin-top: 4px;"><?php esc_html_e( 'Lue täydet peruutusehdot &rarr;', 'toolrental' ); ?></a>
					</p>
				</div>
				<div>
					<h5>
						<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
						<?php esc_html_e( 'Reklamaatio & Vastaanottotarkastus', 'toolrental' ); ?>
					</h5>
					<p>
						<?php esc_html_e( 'Laitteet luovutetaan aina testattuina. Mikäli havaitset vastaanoton yhteydessä poikkeaman, ilmoitathan siitä asiakaspalveluumme 24 tunnin kuluessa noudosta.', 'toolrental' ); ?><br>
						<span><?php esc_html_e( 'Puh. 010 321 8890 | asiakaspalvelu@erikoistyokalut.fi', 'toolrental' ); ?></span>
						<a href="<?php echo esc_url( home_url( '/vuokrausehdot/' ) ); ?>" style="display: block; margin-top: 4px;"><?php esc_html_e( 'Vuokraussopimusehdot &rarr;', 'toolrental' ); ?></a>
					</p>
				</div>
			</div>
		</div>

	</div><!-- .product-single-container -->

<?php
endwhile;

get_footer( 'shop' );
