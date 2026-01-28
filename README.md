# Horizon Demo

## Local setup

1. Install dependencies:

   ```bash
   composer install
   ```

2. Copy the environment file:

   ```bash
   cp .env.example .env
   ```

3. Generate the application key:

   ```bash
   php artisan key:generate
   ```

## Sail (Docker)

1. Start the containers:

   ```bash
   ./vendor/bin/sail up -d
   ```

2. Verify the application:

   ```bash
   ./vendor/bin/sail artisan -V
   ```

3. Stop the containers:

   ```bash
   ./vendor/bin/sail down
   ```

Redis is installed via Sail for future queue and cache usage, but it is not wired into the application yet.
