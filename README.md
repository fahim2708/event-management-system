
## Project Setup:

1. php artisan migrate, to publishes all schema to the database <br />

## Run the project

1. php artisan serve  <br />
2. php artisan queue:work , to process the jobs  <br />
3. npm run dev, to run the build process of tailwind.css  <br />
4. Gmail SMTP setup: SMTP configuration add in the .env <br />

## Notes
1. API Testing: The request expects a JSON response. So, when making an API request from postman, ensure that the request headers include Accept: application/json and Content-Type: application/json.