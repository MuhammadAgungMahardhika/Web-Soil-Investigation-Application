## What is this App?
<p align="center">Web-Soil-Investigation is an application to easily help civil enginering to save and show the result data of soil investigation.</p>

## Main Template
If you want to check the original template in HTML5 and Bootstrap, [click here](https://github.com/zuramai/mazer) to open template repository.

## Installation
1. Clone this project
    ```bash
    git clone https://github.com/MuhammadAgungMahardhika/Web-Soil-Investigation-Application
    cd Web-Soil-Investigation-Application
    ```
2. Install dependencies
    ```bash
    composer install
    ```
    And javascript dependencies
    ```bash
    yarn install && yarn dev

    #OR

    npm install && npm run dev
    ```

3. Set up Laravel configurations
    ```bash
    copy .env.example .env
    php artisan key:generate
    ```

4. Set your database in .env

5. Migrate database
    ```bash
    php artisan migrate --seed
    ```

6. Serve the application
    ```bash
    php artisan serve
    ```

7. Login credentials

**Email:** user@gmail.com

**Password:** password


