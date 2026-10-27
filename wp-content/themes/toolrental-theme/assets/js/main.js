/**
 * Main JavaScript file for Erikoistyökalu Vuokraus theme
 * Strictly adheres to DOM safety rules (no innerHTML).
 */

document.addEventListener('DOMContentLoaded', () => {
	// Smooth scroll for anchor links
	const anchorLinks = document.querySelectorAll('a[href^="#"]');
	anchorLinks.forEach(link => {
		link.addEventListener('click', (e) => {
			const targetId = link.getAttribute('href');
			if (targetId && targetId !== '#') {
				const targetEl = document.querySelector(targetId);
				if (targetEl) {
					e.preventDefault();
					targetEl.scrollIntoView({
						behavior: 'smooth',
						block: 'start'
					});
				}
			}
		});
	});

	// WooCommerce cart update feedback
	if (window.jQuery) {
		jQuery(document.body).on('added_to_cart', (event, fragments, cartHash, button) => {
			const cartBtn = document.querySelector('.cart-button');
			if (cartBtn) {
				cartBtn.style.transform = 'scale(1.1)';
				setTimeout(() => {
					cartBtn.style.transform = 'scale(1)';
				}, 250);
			}
		});
	}

	// Traficom Compliant Cookie Banner Logic
	const cookieBanner = document.getElementById('traficom-cookie-banner');
	const btnAcceptAll = document.getElementById('btn-cookie-accept-all');
	const btnEssential = document.getElementById('btn-cookie-essential-only');
	const triggerSettings = document.getElementById('trigger-cookie-settings');

	if (cookieBanner) {
		const savedConsent = localStorage.getItem('toolrental_cookie_consent');
		if (!savedConsent) {
			cookieBanner.style.display = 'block';
		}

		if (btnAcceptAll) {
			btnAcceptAll.addEventListener('click', () => {
				localStorage.setItem('toolrental_cookie_consent', 'all');
				cookieBanner.style.display = 'none';
			});
		}

		if (btnEssential) {
			btnEssential.addEventListener('click', () => {
				localStorage.setItem('toolrental_cookie_consent', 'essential');
				cookieBanner.style.display = 'none';
			});
		}

		if (triggerSettings) {
			triggerSettings.addEventListener('click', (e) => {
				e.preventDefault();
				cookieBanner.style.display = 'block';
				cookieBanner.scrollIntoView({ behavior: 'smooth' });
			});
		}
	}

	// Product Gallery Thumbnail Switcher
	const mainProductImg = document.getElementById('main-product-image');
	const mainImageLink = document.getElementById('main-image-link');
	const galleryThumbBtns = document.querySelectorAll('.gallery-thumb-btn');

	if (mainProductImg && galleryThumbBtns.length > 0) {
		galleryThumbBtns.forEach(btn => {
			btn.addEventListener('click', (e) => {
				e.preventDefault();
				const largeSrc = btn.getAttribute('data-large-src');
				const fullSrc = btn.getAttribute('data-full-src');
				const altText = btn.getAttribute('data-alt');

				if (!largeSrc || btn.classList.contains('is-active')) {
					return;
				}

				// Update active state on thumbnails
				galleryThumbBtns.forEach(b => {
					b.classList.remove('is-active');
					b.setAttribute('aria-selected', 'false');
				});
				btn.classList.add('is-active');
				btn.setAttribute('aria-selected', 'true');

				// Smooth fade transition on main image
				mainProductImg.classList.add('fade-out');
				setTimeout(() => {
					mainProductImg.src = largeSrc;
					if (altText) {
						mainProductImg.alt = altText;
					}
					if (mainImageLink && fullSrc) {
						mainImageLink.href = fullSrc;
					}
					mainProductImg.classList.remove('fade-out');
				}, 120);
			});
		});
	}
});

