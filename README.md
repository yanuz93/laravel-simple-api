## About This Project
This project was created and prvided as solution to the engineering test in MileApp.

## Quick Start Guide
- First, you need to clone this repository using https 
    ```
    git clone https://github.com/yanuz93/laravel-simple-api.git
    ```

    or you can use GitHub CLI
    ```
    gh repo clone yanuz93/laravel-simple-api
    ```

- Next, you need to install all dependencies using PHP Composer. If you haven't installed it before, please read and follow the instruction given in their [official page](https://getcomposer.org). Then, install the dependencies using the command below
    ```
    composer install
    ```

- Setup your apps environment and testing environment in .env and .env.testing respectively.
    1. Copy the entire environment from .env.example file
        ```
        cp .env.example .env .env.testing
        ```
    2. Change the environment variables below to match your local and testing database configuration.
        ```
        DB_CONNECTION=mongodb
        DB_HOST=localhost
        DB_PORT=27017
        DB_DATABASE=
        DB_USERNAME=
        DB_PASSWORD=
        ```

- Run your application with [Nginx](https://nginx.com), [Apache](https://apache.org), or any other web server and even using [PHP](https:/php.net) default server using this command.
    ```
    php -S {hostname}:{port} server.php
    ```

- Now, you can access the API in `http://{hostname}:{port}/api`

## API Endpoints
- `GET /package`
    - Request
        params: As this is a very simple API, any params will not be processed by our application
    - Response
        You will see a list of packages or an empty list if you have no packages saved in the database.

- `POST /package`
    - Request
        body: 
        ```json
            "location_id" : ["required"],
            "connote_id" : ["required", "exists:connotes,_id"],
            "organization_id" : ["required", "numeric"],
            "transaction_id" : ["required"],
            "customer_name" : ["required"],
            "customer_code" : ["required", "numeric"],
            "transaction_amount" : ["required", "numeric"],
            "transaction_discount" : ["sometimes", "numeric"],
            "transaction_additional_field" : ["sometimes"],
            "transaction_payment_type" : ["required", "numeric"],
            "transaction_state" : ["required"],
            "transaction_code" : ["required"],
            "transaction_order" : ["required", "numeric"],
            "transaction_cash_amount" : ["required", "numeric"],
            "transaction_cash_change" : ["required", "numeric"],
            "transaction_payment_type_name" : ["required"],
            "destination_data" : ["required"],
            "origin_data" : ["required"],

        ```
        You can read the validation details in [Laravel's Validation Documentaion](https://laravel.com/docs/8.x/validation#available-validation-rules)

    - Response
        - You'll get the recently saved package with 200 response status
        - If you're against the validation rules, an error message  will be shown with 4xx status if the package isn't exists.

- `GET /package/{id}`
    - Request
        params: As this is a very simple API, any params will not be processed by our application
    - Response
        You'll get the package if it is exists in the database with 200 response status or 4xx status if the package isn't exists.

- `PUT /package/{id}`
    - Request
        body: 
        ```json
            "location_id" : ["required"],
            "connote_id" : ["required", "exists:connotes,_id"],
            "organization_id" : ["required", "numeric"],
            "transaction_id" : ["required"],
            "customer_name" : ["required"],
            "customer_code" : ["required", "numeric"],
            "transaction_amount" : ["required", "numeric"],
            "transaction_discount" : ["sometimes", "numeric"],
            "transaction_additional_field" : ["sometimes"],
            "transaction_payment_type" : ["required", "numeric"],
            "transaction_state" : ["required"],
            "transaction_code" : ["required"],
            "transaction_order" : ["required", "numeric"],
            "transaction_cash_amount" : ["required", "numeric"],
            "transaction_cash_change" : ["required", "numeric"],
            "transaction_payment_type_name" : ["required"],
            "destination_data" : ["required"],
            "origin_data" : ["required"],

        ```
        You can read the validation details in [Laravel's Validation Documentaion](https://laravel.com/docs/8.x/validation#available-validation-rules)

    - Response
        - You'll get the recently updated package if it is exists in the database or the recently saved package if it's not existed before with 200 response status
        - If you're against the validation rules, an error message  will be shown with 4xx status if the package isn't exists.

- `PATCH /package/{id}`
    - Request
        body: 
        ```json
            "location_id" : ["sometimes"],
            "connote_id" : ["sometimes", "exists:connotes,_id"],
            "organization_id" : ["sometimes", "numeric"],
            "transaction_id" : ["sometimes"],
            "customer_name" : ["sometimes"],
            "customer_code" : ["sometimes", "numeric"],
            "transaction_amount" : ["sometimes", "numeric"],
            "transaction_discount" : ["sometimes", "numeric"],
            "transaction_additional_field" : ["sometimes"],
            "transaction_payment_type" : ["sometimes", "numeric"],
            "transaction_state" : ["sometimes"],
            "transaction_code" : ["sometimes"],
            "transaction_order" : ["sometimes", "numeric"],
            "transaction_cash_amount" : ["sometimes", "numeric"],
            "transaction_cash_change" : ["sometimes", "numeric"],
            "transaction_payment_type_name" : ["sometimes"],
            "destination_data" : ["sometimes"],
            "origin_data" : ["sometimes"],

        ```
        You can read the validation details in [Laravel's Validation Documentaion](https://laravel.com/docs/8.x/validation#available-validation-rules)

    - Response
        - If you're against the validation rules, an error message will be shown with 4xx status if the package isn't exists.
        - You'll get the recently updated package if it is exists in the database
        - If no packages with the specified ids found, you'll get the failed response with 4xx response status

- `DELETE /package/{id}`
    - Request
        No params or body needed.
    - Response
        - If you're against the validation rules, an error message will be shown with 4xx status if the package isn't exists.
        - If no packages with the specified ids found, you'll get the failed response with 4xx response status
        - You'll get the recently updated package if it is exists in the database

Each request above needs to have "Accept: application/json" header.