<?php
/**
 * The template for displaying the footer
 *
 * @package ToolRental
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
	</main><!-- #primary -->

	<!-- Site Footer -->
	<footer id="colophon" class="site-footer">
		<div class="container">
			<div class="footer-grid">
				<!-- Col 1: Brand / Description & Official Business Details -->
				<div class="footer-brand">
					<h4><?php bloginfo( 'name' ); ?></h4>
					<p><?php esc_html_e( 'Suomen joustavin erikoistyökalujen ja korkeatasoisen kaluston vuokraamo. Tarjoamme käsityöläisille, protoilijoille ja tuotantotiimeille pääsyn markkinoiden parhaisiin laitteisiin ilman mittavia investointeja.', 'toolrental' ); ?></p>
					<div style="font-size: 12.5px; color: #94a3b8; margin-bottom: 16px; line-height: 1.5;">
						<strong>Erikoistyökalu Vuokraus Oy</strong><br>
						<?php esc_html_e( 'Y-tunnus:', 'toolrental' ); ?> <strong>3218890-1</strong> | <?php esc_html_e( 'ALV-rekisteröity', 'toolrental' ); ?><br>
						<?php esc_html_e( 'Kotipaikka: Helsinki, Suomi', 'toolrental' ); ?>
					</div>
					<div class="trust-icons">
						<span class="trust-badge">✓ <?php esc_html_e( 'Kalibroidut laitteet', 'toolrental' ); ?></span>
						<span class="trust-badge">✓ <?php esc_html_e( 'Käyttöönottokoulutus', 'toolrental' ); ?></span>
					</div>
				</div>

				<!-- Col 2: Categories -->
				<div class="footer-col">
					<h5><?php esc_html_e( 'Kalustokategoriat', 'toolrental' ); ?></h5>
					<ul>
						<li><a href="<?php echo esc_url( home_url( '/product-category/3d-tulostimet/' ) ); ?>"><?php esc_html_e( '3D-tulostimet & Skannerit', 'toolrental' ); ?></a></li>
						<li><a href="<?php echo esc_url( home_url( '/product-category/laserleikkurit/' ) ); ?>"><?php esc_html_e( 'Laserleikkurit & Kaivertimet', 'toolrental' ); ?></a></li>
						<li><a href="<?php echo esc_url( home_url( '/product-category/kamerakalusto/' ) ); ?>"><?php esc_html_e( 'High-End Kamerakalusto', 'toolrental' ); ?></a></li>
						<li><a href="<?php echo esc_url( home_url( '/product-category/tarkkuustyokalut/' ) ); ?>"><?php esc_html_e( 'Tarkkuustyökalut & Mittaus', 'toolrental' ); ?></a></li>
						<li><a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ? wc_get_page_permalink( 'shop' ) : home_url( '/shop' ) ); ?>"><?php esc_html_e( 'Kaikki laitteet', 'toolrental' ); ?> &rarr;</a></li>
					</ul>
				</div>

				<!-- Col 3: Rental Terms & Legal Information -->
				<div class="footer-col">
					<h5><?php esc_html_e( 'Vuokrausinfo & Lainsäädäntö', 'toolrental' ); ?></h5>
					<ul>
						<li><a href="<?php echo esc_url( home_url( '/vuokrausehdot/' ) ); ?>"><?php esc_html_e( 'Vuokrausehdot & Sopimus', 'toolrental' ); ?></a></li>
						<li><a href="<?php echo esc_url( home_url( '/peruuttamisoikeus/' ) ); ?>"><?php esc_html_e( 'Peruuttamisoikeus (Kuluttajansuoja)', 'toolrental' ); ?></a></li>
						<li><a href="<?php echo esc_url( home_url( '/tietosuoja/' ) ); ?>"><?php esc_html_e( 'Tietosuojaseloste & GDPR', 'toolrental' ); ?></a></li>
						<li><a href="<?php echo esc_url( home_url( '/tyopaja/' ) ); ?>"><?php esc_html_e( 'Perehdytys & Käyttökoulutus', 'toolrental' ); ?></a></li>
						<li><a href="<?php echo esc_url( home_url( '/#faq' ) ); ?>"><?php esc_html_e( 'Usein kysytyt kysymykset', 'toolrental' ); ?></a></li>
						<li><a href="#cookie-settings" id="trigger-cookie-settings" style="color: #38bdf8; font-size: 13px;">⚙ <?php esc_html_e( 'Evästeasetukset (Traficom)', 'toolrental' ); ?></a></li>
					</ul>
				</div>

				<!-- Col 4: Location & Contact -->
				<div class="footer-col">
					<h5><?php esc_html_e( 'Noutopiste & Yhteystiedot', 'toolrental' ); ?></h5>
					<p style="color: #cbd5e1; font-size: 14px; margin-bottom: 8px;">
						<strong><?php esc_html_e( 'Kalasataman Työpajahubi', 'toolrental' ); ?></strong><br>
						<?php esc_html_e( 'Verkkosaarenkatu 8, 00580 Helsinki', 'toolrental' ); ?><br>
						<?php esc_html_e( 'ma–pe 09:00–18:00 | la 10:00–15:00', 'toolrental' ); ?>
					</p>
					<p style="color: #cbd5e1; font-size: 14px; margin-bottom: 12px;">
						<?php esc_html_e( 'Puh:', 'toolrental' ); ?> <strong>010 321 8890</strong><br>
						<?php esc_html_e( 'Sähköposti:', 'toolrental' ); ?> <a href="mailto:asiakaspalvelu@erikoistyokalut.fi">asiakaspalvelu@erikoistyokalut.fi</a>
					</p>
					<div style="font-size: 12px; color: #94a3b8; border-top: 1px solid rgba(255,255,255,0.08); padding-top: 8px;">
						<?php esc_html_e( 'Reklamaatiot 24h kuluessa luovutuksesta.', 'toolrental' ); ?>
					</div>
				</div>
			</div>

			<!-- Statutory Regulations Reference Row -->
			<div style="border-top: 1px solid rgba(255,255,255,0.08); padding: 18px 0; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 12px; font-size: 12px; color: #64748b;">
				<div>
					<?php esc_html_e( 'Sivuston toiminta noudattaa Suomen ja EU:n lainsäädäntöä:', 'toolrental' ); ?>
				</div>
				<div style="display: flex; gap: 14px; flex-wrap: wrap;">
					<a href="https://www.finlex.fi/fi/lainsaadanto/1978/38" target="_blank" rel="noopener noreferrer" style="color: #94a3b8;">§ <?php esc_html_e( 'Kuluttajansuojalaki (Finlex)', 'toolrental' ); ?></a>
					<a href="https://www.kkv.fi/kuluttaja-asiat/tietoa-ja-ohjeita-yrityksille/verkkokauppiaille/peruuttamisoikeus-ja-peruuttamisaika/" target="_blank" rel="noopener noreferrer" style="color: #94a3b8;">⚖ <?php esc_html_e( 'KKV Peruuttamisoikeus', 'toolrental' ); ?></a>
					<a href="https://eur-lex.europa.eu/FI/legal-content/summary/general-data-protection-regulation-gdpr.html" target="_blank" rel="noopener noreferrer" style="color: #94a3b8;">🛡 <?php esc_html_e( 'GDPR (EUR-Lex)', 'toolrental' ); ?></a>
					<a href="https://kyberturvallisuuskeskus.fi/en/our-activities/regulation-and-supervision/cookies" target="_blank" rel="noopener noreferrer" style="color: #94a3b8;">🍪 <?php esc_html_e( 'Traficom Evästeet', 'toolrental' ); ?></a>
				</div>
			</div>

			<div class="footer-bottom">
				<div>
					&copy; <?php echo esc_html( date( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?>. <?php esc_html_e( 'Kaikki oikeudet pidätetään.', 'toolrental' ); ?>
				</div>
				<div class="trust-icons">
					<span class="trust-badge">MobilePay</span>
					<span class="trust-badge">Verkkopankit</span>
					<span class="trust-badge">Yrityslasku</span>
					<span class="trust-badge">Suojattu SSL / Tupas</span>
				</div>
			</div>
		</div>
	</footer><!-- #colophon -->

	<!-- Traficom Compliant Cookie Banner -->
	<div id="traficom-cookie-banner" class="traficom-cookie-banner" role="dialog" aria-modal="true" aria-label="<?php esc_attr_e( 'Evästeiden hallinta', 'toolrental' ); ?>">
		<div class="cookie-content">
			<div class="cookie-text">
				<h4>
					<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 2a10 10 0 0 0 0 20"/><circle cx="12" cy="12" r="4"/></svg>
					<?php esc_html_e( 'Kunnioitamme yksityisyyttäsi ja Traficomin ohjeistusta', 'toolrental' ); ?>
				</h4>
				<p>
					<?php esc_html_e( 'Käytämme sivustolla vain palvelun toiminnalle (ostoskori, istunnot) välttämättömiä evästeitä sekä anonyymejä tilastollisia evästeitä. Voit valita vain välttämättömät tai hyväksyä kaikki evästeet. Voit muuttaa valintaasi milloin vain.', 'toolrental' ); ?>
					<a href="<?php echo esc_url( home_url( '/tietosuoja/' ) ); ?>" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Lue tietosuojaselosteemme', 'toolrental' ); ?> &rarr;</a>
				</p>
			</div>
			<div class="cookie-btn-group">
				<button type="button" id="btn-cookie-accept-all" class="cookie-btn-primary">
					<?php esc_html_e( 'Hyväksy kaikki', 'toolrental' ); ?>
				</button>
				<button type="button" id="btn-cookie-essential-only" class="cookie-btn-secondary">
					<?php esc_html_e( 'Vain välttämättömät', 'toolrental' ); ?>
				</button>
			</div>
		</div>
	</div>

</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
