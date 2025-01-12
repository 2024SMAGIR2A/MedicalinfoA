# Utilise l'image PHP avec Apache
FROM php:8.1.29-apache

# Installe les extensions PHP nécessaires pour Laravel
RUN apt-get update && apt-get install -y \
    libpng-dev libjpeg-dev libfreetype6-dev libzip-dev libxml2-dev && \
    docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install gd zip pdo pdo_mysql bcmath xml

# Installe Composer pour gérer les dépendances PHP
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Ajout d'un fichier php.ini personnalisé
COPY php.ini /usr/local/etc/php/

# Copie les fichiers de votre projet Laravel dans le conteneur
COPY . /var/www/html

# Donne les bonnes permissions sur les dossiers Laravel
RUN chown -R www-data:www-data /var/www/html
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Active les modules Apache nécessaires pour Laravel
RUN a2enmod rewrite

# Expose le port 80 (par défaut pour Apache)
EXPOSE 80

# Définit le répertoire de travail
WORKDIR /var/www/html
