# Laravel Product Catalog (Stage PFE)

This repository is a Laravel application for managing a product catalog used during a PFE/stage. The app stores product metadata in the `products` table and serves product images from a local `public/product_images` folder or (optionally) the `products_images` database table.

## Key files & locations

- `app/Http/Controllers/ProductController.php` — product logic and image-serving endpoint
- `resources/views/products/` — product views and partials
- `public/product_images/` — local image files (the app serves images from here by default)
- `sql/` — SQL fixtures (`products.sql`, `categories.sql`)
- `app/Console/Commands/DownloadProductImages.php` — helper to copy/download images

---

## Requirements

- PHP 8.0+
- Composer
- Node.js + npm / yarn / pnpm (for building assets)
- MySQL (or SQLite for testing)
- Git

## Installation & local setup

1. Clone repository

```bash
git clone <YOUR_REPO_URL> project
cd project
```

2. Install PHP dependencies

```bash
composer install
```

3. Install JS dependencies and build assets (dev)

```bash
npm install
npm run dev
```

4. Environment file

```bash
cp .env.example .env
# Edit .env to set DB credentials and other settings
```

5. Generate the application key

```bash
php artisan key:generate
```

6. Database

- Option A (preferred if migrations exist):

```bash
php artisan migrate --seed
```

- Option B (quick fixtures):

```bash
mysql -u <user> -p <database> < sql/categories.sql
mysql -u <user> -p <database> < sql/products.sql
```

7. Storage link (if using `storage`):

```bash
php artisan storage:link
```

8. Ensure local product images exist

- Place product images in `public/product_images/`. The app now prefers images from this folder or from the `products_images` table if present.

9. Run the app locally

```bash
php artisan serve --host=127.0.0.1 --port=8000
# Visit http://127.0.0.1:8000/products
```

## Image handling notes

- Uploads now store files to `public/product_images`.
- `ProductController::image()` will attempt to:
	1. Read `products_images` DB table (if available) — supports blob `data` or `path` fields.
	2. Serve the local file from `public/product_images`.
	3. (External fallback has been disabled to keep assets local.)

If you want to store images in the DB, add a `products_images` table with columns like `id, product_id, path, data (BLOB), kind`.

## Tests

Run tests with:

```bash
./vendor/bin/phpunit
```

For CI you can run migrations in-memory using SQLite: set `DB_CONNECTION=sqlite` and `DB_DATABASE=:memory:`.

## GitHub: push checklist & recommended workflow

1. Create a repository on GitHub.
2. Add remote and push:

```bash
git add .
git commit -m "Initial import and README"
git branch -M main
git remote add origin git@github.com:<username>/<repo>.git
git push -u origin main
```

3. Do NOT commit `.env`. Ensure `.gitignore` contains `.env` (default in Laravel).
4. Add GitHub repository secrets for production DB and any API keys used by GitHub Actions.

## Included CI (example)

A basic GitHub Actions CI workflow is provided at `.github/workflows/ci.yml`. It:

- Sets up PHP + Composer
- Installs dependencies
- Uses an in-memory SQLite DB to run migrations and tests

Adjust as needed for your environment (MySQL, caching, etc.).

## Security & deployment notes

- Keep `APP_KEY` secret and do not commit `.env`.
- Set proper file permissions for `storage/` and `bootstrap/cache/`.
- Serve the `public/` directory as your web root in production.

## Next steps I can do for you

- Add a LICENSE file (MIT, etc.)
- Commit these changes and push to a GitHub repository
- Create a richer CI workflow with static analysis (PHPStan/Psalm), code style (Pint), and deployment steps

---

If you want, I can commit these README and CI changes and push them to a new GitHub repository for you — tell me the repo name or grant access details (or I can just show the git commands to run locally).
