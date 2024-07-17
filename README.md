
## Prerequisites
1. PHP: Make sure you have PHP installed (version 8.1) <br />
2. Composer: The dependency manager for PHP <br />
3. Web Server: A web server like Apache or Nginx <br />


## Project Setup:
1. Clone the Repository: git clone https://github.com/fahim2708/event-management-system <br />
2. Install Composer Dependencies: composer install <br />
3. Copy .env.example to .env <br />
4. Generate Application Key: php artisan key:generate <br />
5. Configure the .env File: Open the .env file and configure your database and other necessary settings <br />
6. Migrate the Database: php artisan migrate <br />
7. Gmail SMTP setup: SMTP configuration add in the .env <br />


## Run the project
1. Serve the Application: php artisan serve <br />
2. Process the jobs: php artisan queue:work <br />
3. Run the build process of Tailwind CSS: npm run dev <br />


## Notes
1. API Testing: The request expects a JSON response. So, when making an API request from postman, ensure that the request headers include Accept: application/json and Content-Type: application/json.