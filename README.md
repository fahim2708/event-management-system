
## Project Setup:

1. Download database from database folder (event_ms.sql) or run (php artisan migrate) <br />
2. Import this at Xampp or Laragon  <br />

## Run the project

1. php artisan serve  <br />
2. php artisan queue:work , to process the jobs  <br />
3. npm run dev, to run the build process of tailwind.css  <br />
4. Gmail SMTP setup: SMTP configuration add in the .env, I provided sample configuration attached with email. <br />

## Notes
1. API Testing: The request expects a JSON response. So, when making an API request from postman, ensure that the request headers include Accept: application/json and Content-Type: application/json.