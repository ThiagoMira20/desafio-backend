# Use a imagem oficial do PHP
FROM php:8.1-cli

# Instale as dependências do Laravel
RUN apt-get update && \
    apt-get install -y libpq-dev && \
    docker-php-ext-install pdo pdo_pgsql

# Configure o diretório de trabalho
WORKDIR /app

# Copie o código fonte do aplicativo para o contêiner
COPY . .

# Instale as dependências do Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install --no-scripts --no-autoloader

# Execute o script de inicialização do aplicativo
CMD php artisan serve --host=0.0.0.0 --port=8000
