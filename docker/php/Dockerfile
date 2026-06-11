###############################################################################
# Moodle 4.4 – PHP-FPM 8.1 Image
# Installs every required + recommended extension for Moodle 4.4
###############################################################################
FROM php:8.1-fpm

# ── System dependencies ─────────────────────────────────────────────────────
RUN apt-get update && apt-get install -y --no-install-recommends \
    # intl
    libicu-dev \
    # gd
    libfreetype6-dev libjpeg62-turbo-dev libpng-dev libwebp-dev \
    # zip
    libzip-dev unzip \
    # soap
    libxml2-dev \
    # exif – no extra lib needed
    # sodium – bundled with PHP ≥ 7.2, but we install libsodium-dev for the ext
    libsodium-dev \
    # xmlrpc (recommended)
    && rm -rf /var/lib/apt/lists/*

# ── PHP extensions ──────────────────────────────────────────────────────────
# Configure GD with FreeType, JPEG, and WebP support
RUN docker-php-ext-configure gd \
        --with-freetype \
        --with-jpeg \
        --with-webp

RUN docker-php-ext-install -j"$(nproc)" \
    sodium \
    intl \
    gd \
    mysqli \
    zip \
    opcache \
    soap \
    exif

# ── Custom php.ini ──────────────────────────────────────────────────────────
COPY php.ini /usr/local/etc/php/conf.d/99-moodle.ini

# ── Create moodledata directory and set ownership ──────────────────────────
RUN mkdir -p /var/www/moodledata \
    && chown -R www-data:www-data /var/www/moodledata

WORKDIR /var/www/html
