# README

## Project Setup

This README provides detailed instructions to get the project up and running after cloning it from the Git repository. Follow these steps carefully to ensure the environment is correctly configured.

### Prerequisites

Before starting, make sure you have the following installed:

- **PHP** (>=8.1 recommended)a
- **Composer** (Dependency Manager for PHP)
- **Symfony CLI** (optional but recommended)
- **MySQL** (or any database supported by Doctrine)
- **Node.js and npm** (for frontend assets, if applicable)

### Steps to Run the Project

#### 1. Clone the Repository

```bash
git clone <repository-url>
cd <project-folder>
```

#### 2. Install Dependencies

Run the following command to install PHP dependencies:

```bash
composer install
```

If the project uses frontend assets, install JavaScript dependencies:

```bash
npm install
```

#### 3. Configure Environment Variables

Copy the `.env` file to `.env.local` and update the database and other environment configurations as needed:

```bash
cp .env .env.local
```

Update the `DATABASE_URL` in `.env.local` with your database connection details. For example:

```
DATABASE_URL="mysql://username:password@127.0.0.1:3306/database_name"
```

#### 4. Set Up the Database

Run the following commands to create the database and apply migrations:

```bash
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
```

If the project has data fixtures:

```bash
php bin/console doctrine:fixtures:load
```

#### 5. Build Frontend Assets (if applicable)

If the project has frontend dependencies, build the assets:

```bash
npm run build
```

#### 6. Start the Server

Start the Symfony server:

```bash
symfony server:start
```

Alternatively, use the built-in PHP server:

```bash
php -S 127.0.0.1:8000 -t public
```

Access the project in your browser at [http://127.0.0.1:8000](http://127.0.0.1:8000).

### Testing

To run tests (if applicable):

```bash
php bin/phpunit
```

### Troubleshooting

1. **Missing PHP Extensions**: Ensure required PHP extensions (e.g., pdo\_mysql) are installed.
2. **Permission Issues**: Verify the `var/` and `public/` directories have appropriate write permissions.
3. **Cache Issues**: Clear the cache if you encounter errors:
   ```bash
   php bin/console cache:clear
   ```
4. **Database Errors**: Ensure the database credentials are correct and the service is running.

### Useful Commands

- **Clear Cache**:
  ```bash
  php bin/console cache:clear
  ```
- **Update Database Schema**:
  ```bash
  php bin/console doctrine:schema:update --force
  ```
- **Run Migrations**:
  ```bash
  php bin/console doctrine:migrations:migrate
  ```
- **List Routes**:
  ```bash
  php bin/console debug:router
  ```

### Additional Notes

- Ensure that `.env.local` is not committed to version control as it contains sensitive data.
- For production, additional configuration may be required, such as setting up a web server (e.g., Apache or Nginx).

If you encounter any issues, refer to the Symfony documentation or contact the project maintainer.

