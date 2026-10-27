<?php
/**
 * The template for displaying the front page
 *
 * @package ToolRental
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<!-- Hero Section -->
<section class="hero-section">
	<div class="container">
		<div class="hero-grid">
			<div class="hero-content">
				<div class="hero-tag">
					<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
						<polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
					</svg>
					<span><?php esc_html_e( 'Erikoiskaluston Vuokraamo Helsinki & Toimitus Koko Suomeen', 'toolrental' ); ?></span>
				</div>
				<h1 class="hero-title">
					<?php esc_html_e( 'Vuokraa ammattitason', 'toolrental' ); ?> <span><?php esc_html_e( 'erikoistyökalut & kalusto', 'toolrental' ); ?></span> <?php esc_html_e( 'projektiisi', 'toolrental' ); ?>
				</h1>
				<p class="hero-lead">
					<?php esc_html_e( 'Pääsy teollisuustason 3D-tulostimiin, laserleikkureihin, cinema-kameroihin ja mittalaitteisiin ilman kalliita hankintakustannuksia. Täysi kalibrointi ja käyttöopastus sisältyy jokaiseen vuokraukseen.', 'toolrental' ); ?>
				</p>
				<div class="hero-buttons">
					<a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ? wc_get_page_permalink( 'shop' ) : home_url( '/shop' ) ); ?>" class="btn-hero-primary">
						<span><?php esc_html_e( 'Tutustu kalustoon', 'toolrental' ); ?></span>
						<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
							<line x1="5" y1="12" x2="19" y2="12"></line>
							<polyline points="12 5 19 12 12 19"></polyline>
						</svg>
					</a>
					<a href="#how-it-works" class="btn-hero-secondary">
						<span><?php esc_html_e( 'Miten vuokraus toimii?', 'toolrental' ); ?></span>
					</a>
				</div>
				<div class="hero-features">
					<div class="hero-feature-item">
						<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
							<path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
							<polyline points="22 4 12 14.01 9 11.01"></polyline>
						</svg>
						<span><?php esc_html_e( '100% Huollettu & Kalibroitu', 'toolrental' ); ?></span>
					</div>
					<div class="hero-feature-item">
						<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
							<path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
						</svg>
						<span><?php esc_html_e( 'Kattava laitevakuutus', 'toolrental' ); ?></span>
					</div>
					<div class="hero-feature-item">
						<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
							<circle cx="12" cy="12" r="10"></circle>
							<polyline points="12 6 12 12 16 14"></polyline>
						</svg>
						<span><?php esc_html_e( 'Joustavat vuorokausi- & viikkovuokrat', 'toolrental' ); ?></span>
					</div>
				</div>
			</div>

			<!-- Hero Right Highlight Card -->
			<div class="hero-card-preview">
				<span class="hero-card-badge"><?php esc_html_e( 'Suosituin vuokralaite', 'toolrental' ); ?></span>
				<div class="hero-card-image">
					<div style="text-align: center; color: #94a3b8; padding: 20px;">
						<svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="#38bdf8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" style="margin: 0 auto 12px;">
							<rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect>
							<line x1="8" y1="21" x2="16" y2="21"></line>
							<line x1="12" y1="17" x2="12" y2="21"></line>
						</svg>
						<strong style="color: #ffffff; font-size: 16px; display: block;"><?php esc_html_e( 'Bambu Lab X1-Carbon Combo', 'toolrental' ); ?></strong>
						<span style="font-size: 13px; color: #38bdf8;"><?php esc_html_e( '4-värinen nopea 3D-tulostin AMS-yksiköllä', 'toolrental' ); ?></span>
					</div>
				</div>
				<div class="hero-card-specs">
					<div class="spec-pill">
						<span><?php esc_html_e( 'Tulostusnopeus', 'toolrental' ); ?></span>
						<strong>500 mm/s</strong>
					</div>
					<div class="spec-pill">
						<span><?php esc_html_e( 'Materiaalit', 'toolrental' ); ?></span>
						<strong>PLA, PETG, ABS, Hiilikuitu</strong>
					</div>
				</div>
				<div style="display: flex; justify-content: space-between; align-items: center; margin-top: 16px; border-top: 1px solid rgba(255,255,255,0.08); padding-top: 14px;">
					<div>
						<span style="font-size: 12px; color: #94a3b8; display: block;"><?php esc_html_e( 'Vuorokausihinta', 'toolrental' ); ?></span>
						<strong style="font-size: 22px; color: #ffffff;">45 € <span style="font-size: 13px; color: #94a3b8; font-weight: normal;">/ vrk</span></strong>
					</div>
					<a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ? wc_get_page_permalink( 'shop' ) : home_url( '/shop' ) ); ?>" class="btn-hero-primary" style="padding: 10px 20px; font-size: 14px;">
						<?php esc_html_e( 'Varaa laite', 'toolrental' ); ?>
					</a>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Category Selector Section -->
<section class="section">
	<div class="container">
		<div class="section-header">
			<span class="section-eyebrow"><?php esc_html_e( 'Kalustoryhmät', 'toolrental' ); ?></span>
			<h2 class="section-title"><?php esc_html_e( 'Valitse laitteet tarpeesi mukaan', 'toolrental' ); ?></h2>
			<p class="section-desc"><?php esc_html_e( 'Kaikki työkalut toimitetaan suojalaukuissa tarvittavine tarvikkeineen ja ohjeistuksineen.', 'toolrental' ); ?></p>
		</div>

		<div class="category-grid">
			<!-- Cat 1 -->
			<a href="<?php echo esc_url( home_url( '/product-category/3d-tulostimet/' ) ); ?>" class="category-card">
				<div class="category-card-icon">
					<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
						<path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
						<polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
						<line x1="12" y1="22.08" x2="12" y2="12"></line>
					</svg>
				</div>
				<h3><?php esc_html_e( '3D-tulostimet & Skannerit', 'toolrental' ); ?></h3>
				<p><?php esc_html_e( 'FDM- ja tarkkuus-SLA-hartsitulostimet sekä teollisuustason käsi-3D-skannerit nopeaan prototyyppaukseen.', 'toolrental' ); ?></p>
				<span class="category-card-link"><?php esc_html_e( 'Selaa 3D-laitteita', 'toolrental' ); ?> &rarr;</span>
			</a>

			<!-- Cat 2 -->
			<a href="<?php echo esc_url( home_url( '/product-category/laserleikkurit/' ) ); ?>" class="category-card">
				<div class="category-card-icon">
					<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
						<circle cx="12" cy="12" r="3"></circle>
						<line x1="12" y1="2" x2="12" y2="6"></line>
						<line x1="12" y1="18" x2="12" y2="22"></line>
						<line x1="4.93" y1="4.93" x2="7.76" y2="7.76"></line>
						<line x1="16.24" y1="16.24" x2="19.07" y2="19.07"></line>
						<line x1="2" y1="12" x2="6" y2="12"></line>
						<line x1="18" y1="12" x2="22" y2="12"></line>
						<line x1="4.93" y1="19.07" x2="7.76" y2="16.24"></line>
						<line x1="16.24" y1="7.76" x2="19.07" y2="4.93"></line>
					</svg>
				</div>
				<h3><?php esc_html_e( 'Laserleikkurit & Kaivertimet', 'toolrental' ); ?></h3>
				<p><?php esc_html_e( 'CO2- ja diodilasereilla leikkaat ja kaiverrat puuta, akryylia, nahkaa, vaneria ja metallipintoja tarkasti.', 'toolrental' ); ?></p>
				<span class="category-card-link"><?php esc_html_e( 'Selaa laserleikkureita', 'toolrental' ); ?> &rarr;</span>
			</a>

			<!-- Cat 3 -->
			<a href="<?php echo esc_url( home_url( '/product-category/kamerakalusto/' ) ); ?>" class="category-card">
				<div class="category-card-icon">
					<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
						<path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path>
						<circle cx="12" cy="13" r="4"></circle>
					</svg>
				</div>
				<h3><?php esc_html_e( 'High-End Kamerakalusto', 'toolrental' ); ?></h3>
				<p><?php esc_html_e( 'Cinema-kamerat (Sony FX6, RED, DJI Ronin 4D), anamorfiset linssit, gimbals ja studio-valaisimet.', 'toolrental' ); ?></p>
				<span class="category-card-link"><?php esc_html_e( 'Selaa kuvauskalustoa', 'toolrental' ); ?> &rarr;</span>
			</a>

			<!-- Cat 4 -->
			<a href="<?php echo esc_url( home_url( '/product-category/tarkkuustyokalut/' ) ); ?>" class="category-card">
				<div class="category-card-icon">
					<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
						<path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"></path>
					</svg>
				</div>
				<h3><?php esc_html_e( 'Tarkkuustyökalut & Elektroniikka', 'toolrental' ); ?></h3>
				<p><?php esc_html_e( 'Fluke-lämpökamerat, oskilloskoopit, pintaliitos-juotosasemat ja CNC-jyrsimet vaativaan hienomekaniikkaan.', 'toolrental' ); ?></p>
				<span class="category-card-link"><?php esc_html_e( 'Selaa mittalaitteita', 'toolrental' ); ?> &rarr;</span>
			</a>
		</div>
	</div>
</section>

<!-- Featured Equipment Products Grid -->
<section class="section" style="background: #ffffff; border-top: 1px solid var(--color-border); border-bottom: 1px solid var(--color-border);">
	<div class="container">
		<div style="display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 40px; flex-wrap: wrap; gap: 16px;">
			<div>
				<span class="section-eyebrow"><?php esc_html_e( 'Vuokrattava Kalusto', 'toolrental' ); ?></span>
				<h2 class="section-title" style="margin-bottom: 0;"><?php esc_html_e( 'Suosituimmat laitteet heti vapaana', 'toolrental' ); ?></h2>
			</div>
			<a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ? wc_get_page_permalink( 'shop' ) : home_url( '/shop' ) ); ?>" class="btn-rent-card" style="padding: 10px 20px;">
				<?php esc_html_e( 'Katso kaikki laitteet', 'toolrental' ); ?> &rarr;
			</a>
		</div>

		<div class="product-grid">
			<?php
			$args = array(
				'post_type'      => 'product',
				'posts_per_page' => 8,
				'orderby'        => 'menu_order title',
				'order'          => 'ASC',
			);
			$loop = new WP_Query( $args );

			if ( $loop->have_posts() ) :
				while ( $loop->have_posts() ) : $loop->the_post();
					global $product;
					$prod_id = get_the_ID();
					$meta    = toolrental_get_product_meta( $prod_id );
					$cats    = get_the_terms( $prod_id, 'product_cat' );
					$cat_name = ( $cats && ! is_wp_error( $cats ) ) ? $cats[0]->name : 'Erikoistyökalu';
					?>
					<div class="rental-card">
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
									<?php esc_html_e( 'Varaa', 'toolrental' ); ?>
								</a>
							</div>
						</div>
					</div>
					<?php
				endwhile;
				wp_reset_postdata();
			else :
				echo '<p>' . esc_html__( 'Ei laitteita vielä lisättynä.', 'toolrental' ) . '</p>';
			endif;
			?>
		</div>
	</div>
</section>

<!-- How Rental Works (3 Steps) -->
<section id="how-it-works" class="section section-dark">
	<div class="container">
		<div class="section-header">
			<span class="section-eyebrow" style="color: #38bdf8;"><?php esc_html_e( 'Helppo vuokrausprosessi', 'toolrental' ); ?></span>
			<h2 class="section-title"><?php esc_html_e( 'Miten erikoistyökalujen vuokraus toimii?', 'toolrental' ); ?></h2>
			<p class="section-desc"><?php esc_html_e( 'Ei monimutkaisia sopimuksia tai piilokuluja. Voit vuokrata laitteen päiväksi, viikonlopuksi tai pidemmäksi ajaksi.', 'toolrental' ); ?></p>
		</div>

		<div class="steps-grid">
			<!-- Step 1 -->
			<div class="step-card">
				<div class="step-number">1</div>
				<h3><?php esc_html_e( 'Valitse laite & ajankohta', 'toolrental' ); ?></h3>
				<p><?php esc_html_e( 'Selaa valikoimaamme ja valitse projektiisi sopiva kone tai kamera. Valitse haluamasi vuorokaudet ja tee varaus verkossa.', 'toolrental' ); ?></p>
			</div>

			<!-- Step 2 -->
			<div class="step-card">
				<div class="step-number">2</div>
				<h3><?php esc_html_e( 'Nouda tai vastaanota toimitus', 'toolrental' ); ?></h3>
				<p><?php esc_html_e( 'Nouda laite noutopisteestämme Kalasatamasta tai valitse kuriiritoimitus. Noudon yhteydessä käymme läpi 10 min pikaopastuksen laitteen turvalliseen käyttöön.', 'toolrental' ); ?></p>
			</div>

			<!-- Step 3 -->
			<div class="step-card">
				<div class="step-number">3</div>
				<h3><?php esc_html_e( 'Toteuta projekti & palauta', 'toolrental' ); ?></h3>
				<p><?php esc_html_e( 'Toteuta huipputason printit, leikkaukset tai kuvaukset. Palauta laite puhdistettuna varusteineen vuokra-ajan päättyessä ja pantti vapautuu heti.', 'toolrental' ); ?></p>
			</div>
		</div>
	</div>
</section>

<!-- Workshop Hub & Value Props -->
<section class="section">
	<div class="container">
		<div class="workshop-banner">
			<div class="workshop-content">
				<span class="section-eyebrow" style="color: #38bdf8;"><?php esc_html_e( 'Pääkaupunkiseudun modernein hubi', 'toolrental' ); ?></span>
				<h3><?php esc_html_e( 'Tarvitsetko työtilaa tai perehdytystä?', 'toolrental' ); ?></h3>
				<p>
					<?php esc_html_e( 'Etkö halua viedä isoa laserleikkuria tai hartsitulostinta kotiin? Voit tulla tekemään projektisi paikan päälle Kalasataman työpajatiloihimme ammattitaitoisten ohjaajiemme opastuksella.', 'toolrental' ); ?>
				</p>
				<ul class="workshop-features-list">
					<li>
						<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
						<span><?php esc_html_e( 'Savunpoisto ja teollisuusilmanvaihto', 'toolrental' ); ?></span>
					</li>
					<li>
						<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
						<span><?php esc_html_e( 'Valmis materiaalivarasto (vanerit, filamentit)', 'toolrental' ); ?></span>
					</li>
					<li>
						<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
						<span><?php esc_html_e( 'CAD/CAM- ja tiedostonvalmistustuki', 'toolrental' ); ?></span>
					</li>
					<li>
						<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
						<span><?php esc_html_e( 'Omat turvavarusteet saatavilla', 'toolrental' ); ?></span>
					</li>
				</ul>
				<a href="<?php echo esc_url( home_url( '/tyopaja' ) ); ?>" class="btn-hero-primary">
					<?php esc_html_e( 'Lue lisää työpajastamme & varaa aika', 'toolrental' ); ?> &rarr;
				</a>
			</div>
			<div style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); border-radius: var(--radius-lg); padding: 32px; text-align: center;">
				<div style="font-size: 48px; font-weight: 800; color: #38bdf8; line-height: 1; margin-bottom: 8px;">100%</div>
				<p style="color: #cbd5e1; font-size: 15px; margin-bottom: 24px;"><?php esc_html_e( 'Kaikki laitteet testataan ja puhdistetaan ennen jokaista luovutusta.', 'toolrental' ); ?></p>
				<div style="padding-top: 16px; border-top: 1px solid rgba(255,255,255,0.1); font-size: 13px; color: #94a3b8;">
					<?php esc_html_e( 'Kysy yrityksen pitkäaikaisvuokrausta tai kalustopakettia:', 'toolrental' ); ?><br>
					<strong style="color: #ffffff;">yritysmyynti@erikoistyokalut.fi</strong>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- FAQ Section -->
<section id="faq" class="section" style="background: #f8fafc;">
	<div class="container">
		<div class="section-header">
			<span class="section-eyebrow"><?php esc_html_e( 'Tietoa vuokrauksesta', 'toolrental' ); ?></span>
			<h2 class="section-title"><?php esc_html_e( 'Usein kysytyt kysymykset', 'toolrental' ); ?></h2>
			<p class="section-desc"><?php esc_html_e( 'Kaikki mitä sinun tarvitsee tietää erikoistyökalujen ja kuvauskaluston vuokrauksesta.', 'toolrental' ); ?></p>
		</div>

		<div class="faq-grid">
			<div class="faq-item">
				<h4>
					<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"></circle><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>
					<?php esc_html_e( 'Kuka voi vuokrata laitteita?', 'toolrental' ); ?>
				</h4>
				<p><?php esc_html_e( 'Sekä yksityishenkilöt, käsityöläiset että yritykset voivat vuokrata laitteita. Vuokraajalta edellytetään vähintään 18 vuoden ikää, suomalaista henkilötunnusta ja voimassa olevaa henkilöllisyystodistusta (passi, henkilökortti tai ajokortti) noudon yhteydessä.', 'toolrental' ); ?></p>
			</div>

			<div class="faq-item">
				<h4>
					<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"></circle><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>
					<?php esc_html_e( 'Miten vakuusmaksu (pantti) toimii?', 'toolrental' ); ?>
				</h4>
				<p><?php esc_html_e( 'Korkea-arvoisista laitteista peritään varauksen yhteydessä pantti (yleensä 100–300 € laitteen arvosta riippuen). Pantti palautetaan automaattisesti takaisin maksukortillesi heti, kun laite on palautettu ja tarkastettu ehjänä.', 'toolrental' ); ?></p>
			</div>

			<div class="faq-item">
				<h4>
					<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"></circle><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>
					<?php esc_html_e( 'Entä jos en ole aiemmin käyttänyt laserleikkuria tai 3D-tulostinta?', 'toolrental' ); ?>
				</h4>
				<p><?php esc_html_e( 'Ei hätää! Jokaiseen vuokraukseen sisältyy laitteen nopea 10–15 min käyttöönotto-opastus noudon yhteydessä. Lisäksi toimitamme laitteen mukana selkeät suomenkieliset pikaohjeet ja suositellut ohjelmistoasetukset.', 'toolrental' ); ?></p>
			</div>

			<div class="faq-item">
				<h4>
					<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"></circle><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>
					<?php esc_html_e( 'Mitä jos laite vikaantuu käytön aikana?', 'toolrental' ); ?>
				</h4>
				<p><?php esc_html_e( 'Kaikki laitteemme ovat täysvakuutettuja normaalin käytön aiheuttamien vahinkojen ja laiterikkojen varalta. Tekninen puhelintukemme auttaa ongelmatilanteissa päivittäin klo 09–18, ja vaihdamme laitteen tarvittaessa varaosaan tai korvaavaan malliin.', 'toolrental' ); ?></p>
			</div>
		</div>
	</div>
</section>

<?php
get_footer();
