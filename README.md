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

2. Ensure the sqlite database file exists:

   ```bash
   touch database/database.sqlite
   ```

3. Verify the application:

   ```bash
   ./vendor/bin/sail artisan -V
   ```

4. Run basic smoke checks:

   ```bash
   ./vendor/bin/sail artisan migrate
   ./vendor/bin/sail artisan up
   ```

   Or visit `/up` in your browser to confirm the application is healthy.

5. Stop the containers:

   ```bash
   ./vendor/bin/sail down
   ```

## Horizon (Redis queues)

1. Start Sail:

   ```bash
   ./vendor/bin/sail up -d
   ```

2. Run migrations:

   ```bash
   ./vendor/bin/sail artisan migrate
   ```

3. Run Horizon:

   ```bash
   ./vendor/bin/sail artisan horizon
   ```

4. Visit `/horizon` in your browser.
