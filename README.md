## Installation
Follow these steps to set up the project locally:


1. Clone the repository:
   ```bash
   git clone https://github.com/kanishkamaduranga/Webco-Assesment
   ```
2. Navigate to the project directory:

   ```bash
   cd Webco-Assesment
    ```
3. Install dependencies:
    ```bash
   composer install
    ```
4. Create a .env file and configure your environment variables:
    ```bash
   cp .env.example .env
    ```
5. Generate an application key:
    ```bash 
    php artisan key:generate
   ```
6. Set up the database:
    ```bash
   php artisan db:seed --class=AdminUserSeeder
   php artisan db:seed --class=ProductColorSeeder
   ```
7. Start the development server:
    ```bash
   php artisan serve
    ```
8. Visit the app in your browser:
    ```bash
   http://localhost:8000
   ```
9. Default Admin Credentials:

Email: admin@example.com

Password: password (or the password you set in the AdminUserSeeder).

