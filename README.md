# Laravel API with Authentication (Passport)

This Laravel project provides a basic API with user registration, login, and token-based authentication using Laravel Passport.

## Prerequisites

* PHP >= 8.1
* Composer
* MySQL or another supported database
* Node.js and npm (for frontend assets, if applicable)

## Installation

1.  **Clone the repository:**

    ```bash
    git clone <your-repository-url>
    cd <your-project-directory>
    ```

2.  **Php extension modification:**
    ```bash
    php.ini file remove the semicolon before the extension=sodium and restart the server
    extension=sodium
    ```

3.  **Install Composer dependencies:**

    ```bash
    composer install
    ```

4.  **Copy the `.env.example` file to `.env` and configure your database and other environment variables:**

    ```bash
    cp .env.example .env
    ```

    * Modify the following variables in your `.env` file:

        ```
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=your_database_name
        DB_USERNAME=your_database_username
        DB_PASSWORD=your_database_password
        ```

5.  **Generate application key:**

    ```bash
    php artisan key:generate
    ```

6.  **Run database migrations:**

    ```bash
    php artisan migrate
    ```

7.  **Install Passport:**
    ```bash
    php artisan install:api --passport
    ```
    Would you like to use UUIDs for all client IDs? (yes/no) [no]: yes

8. **(Optional) Reset Passport keys:**

    ```bash
    php artisan passport:keys --force
    ```

9.  **(Optional) Install frontend dependencies (if applicable):**

    ```bash
    npm install
    npm run dev
    ```

10. **Start the development server:**

    ```bash
    php artisan serve
    ```
	
11. **(Optional) Configuration Caching:**
    
	```bash
    php artisan config:clear
    php artisan config:cache
    ```


12. **(Optional) Clear Cache and Optimizing Application:**

    ```bash
    php artisan cache:clear
    php artisan route:clear
    php artisan view:clear
    
    composer dump-autoload -o
    ```

## API Endpoints

### User Registration

* **Method:** POST
* **URL:** `/api/register`
* **Parameters:**
    * `name` (string, required)
    * `email` (string, required, unique)
    * `password` (string, required, min 8 characters)
* **Response:** JSON object containing user data and access token.

### User Login

* **Method:** POST
* **URL:** `/api/login`
* **Parameters:**
    * `email` (string, required)
    * `password` (string, required)
* **Response:** JSON object containing user data and access token.

### Get User Information

* **Method:** GET
* **URL:** `/api/user`
* **Headers:** `Authorization: Bearer <your_access_token>`
* **Response:** JSON object containing a user information.
* **Requires:** Authentication.

## Authentication

* API requests requiring authentication must include the access token in the `Authorization` header:

    ```
    Authorization: Bearer <access_token>
    ```

## Testing

* Use tools like Postman or curl to test the API endpoints.

## Notes

* This is a basic setup. You may need to modify it to suit your specific needs.
* Remember to handle API tokens securely.
* Consider adding error handling and validation to your API endpoints.
* Make sure to create a personal access client using `php artisan passport:install` or `php artisan passport:client --personal`.
* If you are having issues with routing, try running `php artisan route:clear` and `php artisan config:clear`.