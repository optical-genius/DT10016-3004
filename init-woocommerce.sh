#!/usr/bin/env bash
set -e

# Tarkistetaan onko WooCommerce asennettuna wp-content/plugins -hakemistossa.
# Jos puuttuu (esim. uusi clone ilman ladattua liitännäistä), ladataan ja puretaan se automaattisesti.
PLUGIN_DIR="/var/www/html/wp-content/plugins"
WC_FILE="$PLUGIN_DIR/woocommerce/woocommerce.php"

if [ ! -f "$WC_FILE" ]; then
    echo "=========================================================="
    echo " [Auto-Install] WooCommercea ei löytynyt hakemistosta."
    echo " Ladataan virallinen WooCommerce WordPress.org:sta..."
    echo "=========================================================="
    mkdir -p "$PLUGIN_DIR"
    php -r '
        $url = "https://downloads.wordpress.org/plugin/woocommerce.latest-stable.zip";
        $zipFile = "/tmp/woocommerce.zip";
        echo "Ladataan: " . $url . " ...\n";
        $fp = fopen($zipFile, "w+");
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_TIMEOUT, 300);
        curl_setopt($ch, CURLOPT_FILE, $fp);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_exec($ch);
        curl_close($ch);
        fclose($fp);

        echo "Puretaan paketti...\n";
        $zip = new ZipArchive();
        if ($zip->open($zipFile) === TRUE) {
            $zip->extractTo("/var/www/html/wp-content/plugins/");
            $zip->close();
            unlink($zipFile);
            echo "WooCommerce asennettu onnistuneesti!\n";
        } else {
            echo "Virhe purettaessa zip-tiedostoa.\n";
        }
    '
    chown -R www-data:www-data "$PLUGIN_DIR/woocommerce" 2>/dev/null || true
else
    echo "===> WooCommerce on jo asennettuna ($WC_FILE)."
fi

# Suoritetaan virallinen WordPress-kontin entrypoint
exec docker-entrypoint.sh "$@"
