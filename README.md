SOFTWARE ENGINEER - PHP/LARAVEL (SOHAIL AHMAD)

Setup steps:

1. clone project
2. composer install
3. cp .env.example .env
4. php artisan migrate
5. php artisan db:seed


Code Documentation

1. Project root directory has postman collection (todos-postman-collection.json) object which you can import to your postman for testing APIs.
2. Register API will send email verification link to your provided email. You will have to call email/verify/{id} API for email verification.
3. VerificationController handles email verification logic.
4. BaseController is made by keeping in mind that application can be scaled in the future, and it can contain common logic and functionality.
5. TodoController is a resource controller which handles every type of todos crud requests
6. Every request has a dedicated validation class which extends BaseRequest class which returns validation errors in json
7. user_id checks are automatically being applied through Todo Model events and Global scope. You can find the details by viewing Todo model code.
