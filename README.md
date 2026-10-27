# Vuokrattavat Erikoistyökalut (ToolRental) — WordPress & WooCommerce

An e-commerce and rental platform for specialized high-end tools and equipment tailored for craftsmen, makers, and professionals (3D printers, CO2 laser cutters, cinema cameras, 3D scanners, and thermal cameras).

The project is fully containerized with **Docker Compose**: on the initial startup, it automatically provisions WordPress, the WooCommerce plugin, and a MariaDB database pre-populated with all demo products, categories, legal pages, and configuration settings.

---

## 📋 System Requirements

Before starting, ensure that your system has the following installed:

- [Docker Engine](https://docs.docker.com/engine/install/) (version 20.10 or higher)
- [Docker Compose](https://docs.docker.com/compose/install/) (v2 or higher)
- **Available host ports:**
  - `8080` — WordPress web server
  - `8180` — phpMyAdmin interface

> **Note:** If port `8080` or `8180` is already in use by another service on your machine, change the left-hand host port mapping in `docker-compose.yml` (e.g., `"8085:80"`).

---

## 🚀 Quick Start (Running the Project)

### 1. Clone the repository
```bash
git clone <REPOSITORY_URL>
cd wordpress_woocomerce
```

### 2. Launch the containers
Run the following command from the project root directory:
```bash
docker compose up -d
```

### 3. What happens on initial startup:
1. **MariaDB Database** (`db`):
   - Initializes the persistent volume `db_data`.
   - Automatically imports `dump.sql`, which contains the full schema, demo products, categories, custom rental metadata, and legal compliance pages.
2. **WordPress** (`wordpress`):
   - Executes the `init-woocommerce.sh` entrypoint script.
   - If the WooCommerce plugin is not present in `wp-content/plugins`, it is automatically downloaded from `WordPress.org` and extracted.
3. **phpMyAdmin** (`phpmyadmin`):
   - Launches the web database management GUI on port `8180`.

Please wait **15–30 seconds** after starting for the database to finish importing and for all services to report a healthy status.

---

## 🌐 Service URLs & Credentials

| Service | URL | Username / Role | Password |
| :--- | :--- | :--- | :--- |
| **Storefront (Frontend)** | [http://localhost:8080/](http://localhost:8080/) | — | — |
| **WordPress Admin** | [http://localhost:8080/wp-admin/](http://localhost:8080/wp-admin/) | `admin` | *(password configured during setup)* |
| **phpMyAdmin** | [http://localhost:8180/](http://localhost:8180/) | `root` *(or `wp_user`)* | `root_password` *(or `wp_password`)* |
| **Internal Database** | `db:3306` (MariaDB) | `wp_user` | `wp_password` (DB: `wordpress`) |

---

## 🛑 Stopping & Managing the Project

- **Stop containers (preserve state):**
  ```bash
  docker compose stop
  ```

- **Resume containers:**
  ```bash
  docker compose start
  ```

- **Stop and remove containers:**
  ```bash
  docker compose down
  ```

- **Full database reset to initial state:**
  If you want to wipe the database and re-import the clean `dump.sql` seed data from scratch, delete the volume:
  ```bash
  docker compose down -v
  docker compose up -d
  ```

---

## 📁 Project Structure

```text
├── docker-compose.yml        # Docker service configuration (WordPress, MariaDB, phpMyAdmin)
├── init-woocommerce.sh       # Container entrypoint script ensuring WooCommerce installation
├── dump.sql                  # Seed database dump for local Docker environment (localhost:8080)
├── dump_prod.sql             # Production-ready database dump (pre-configured for production domain)
├── wp-content/
│   ├── plugins/              # WordPress plugins (WooCommerce)
│   ├── uploads/              # Uploaded media assets and product photography
│   └── themes/
│       └── toolrental-theme/ # Custom rental WooCommerce theme
│           ├── assets/       # CSS, JavaScript (main.js), and theme images
│           ├── woocommerce/  # WooCommerce template overrides (single-product.php, etc.)
│           ├── functions.php # Rental custom meta boxes, video embeds, theme setup
│           ├── header.php    # Site header, top notification bar, and navigation
│           ├── footer.php    # Footer with statutory compliance links & Traficom cookie banner
│           └── style.css     # Theme stylesheet (Inter typography, responsive CSS grid)
└── README.md                 # Project documentation
```

---

## 🛠 Custom Theme Features (`toolrental-theme`)

1. **Interactive Product Gallery ([single-product.php](wp-content/themes/toolrental-theme/woocommerce/single-product.php)):**
   - Seamless thumbnail switching on click with smooth fade transitions.
   - Zoom link and badge to inspect high-resolution product photography.
   - Sticky gallery column on desktop viewport alongside the long description column.
2. **Embedded Instructional Videos:**
   - Dedicated admin input field for tutorial video URLs (YouTube, Vimeo, MP4).
   - Embedded with privacy-preserving `youtube-nocookie.com` in a responsive 16:9 aspect ratio.
3. **Rental Pricing & Liability Guarantee:**
   - Automatic calculation of daily rate (24h), weekend package (Fri 16:00 – Mon 10:00), and weekly rental.
   - Prominent damage protection guarantee badge with a fixed deductible cap (300 € omavastuu).
4. **Finnish & EU Legal Compliance:**
   - Full alignment with the Finnish Consumer Protection Act (**Kuluttajansuojalaki 38/1978**) and **KKV** directives (14-day cancellation policy, 48h cancellation rule, 24h defect notification window).
   - **GDPR (EU 2016/679)** compliance and NIST SP 800-88 data wipe commitment for camera/sensor storage media upon return.
   - Cookie consent banner adhering to **Traficom Cybersecurity Center** guidelines.

---

## 🔧 Useful Development Commands

- **Stream WordPress logs in real-time:**
  ```bash
  docker compose logs -f wordpress
  ```

- **Export a fresh dump from the local database:**
  ```bash
  docker exec db mariadb-dump -u root -proot_password wordpress > dump.sql
  ```

- **Run WP-CLI commands inside the container:**
  ```bash
  docker exec -it wordpress wp --allow-root <COMMAND>
  ```
