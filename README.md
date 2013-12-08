# Real Estate App

Live url: [http://real-estate-app.gopagoda.com/](http://real-estate-app.gopagoda.com/)

### Installation

This application built in Laravel 4.0 MVC framework.

Create a clone or copy in your localhost.

Install composer. (More details here: [link](http://getcomposer.org/download/))

In your local console step in real-estate-app directory. And run composer install and composer update

    composer install
    composer update
    
Setup your MySQL server. You have to have a database, called: 'real_estate_app'. MySQL script in root folder.

    CREATE DATABASE real_estate_app;

Setup database access in 'app/config/database.php'. Default username and password is root.

    'mysql' => array(
        'driver'    => 'mysql',
        'host'      => isset($_SERVER['DB1_HOST']) ? $_SERVER['DB1_HOST'] : 'localhost',
        'database'  => isset($_SERVER['DB1_NAME']) ? $_SERVER['DB1_NAME'] : 'real_estate_app',
        'username'  => isset($_SERVER['DB1_USER']) ? $_SERVER['DB1_USER'] : 'root',
        'password'  => isset($_SERVER['DB1_PASS']) ? $_SERVER['DB1_PASS'] : 'root',
        'charset'   => 'utf8',
        'collation' => 'utf8_unicode_ci',
        'prefix'    => '',
    ),

Run Laravel migration command. This command create your database.

    php artisan migrate

Run Laravel seed file command. Upload default values in database.

    php artisan db:seed

Run the application

    php artisan serve

Open the application in browser

    http://localhost:8000

For assess management need nodejs, bower and grunt. CoffeeScript and SASS built, but if you want to update need grunt in your local machine.


###Requirements:

1. Property listing website.
    - front end
    - admin back end.
    - PHP and MySQL
2. Index page:
    - Filter search form.
    - List of properties.
    - Filters: county, price, house type
3. Admin page
    - protected with login
    - add/update/delete properties
    - add photograph to property
    - boolean sold or not
4. Database
    - House types: detached, semi-detached, terraced
    - Min. 3 address lines and county (Dublin suburbs and postal codes are not required.)
    - Listing creation date and updated date should be stored and displayed.
    - No requirement to manage admin users. adminuser table: username: ‘admin’, password: ‘letmein’
5. UI
    - bootstrap
    - templating engine
6. Documents:
    - compressed zip file
    - instructions
    - sql setup

### Database Model

                ---------------     ----------------    -----------------
                ¦ HOUSE_TYPES ¦ --> ¦  PROPERTIES  ¦ <--¦  SALES_TYPES  ¦
                ---------------     ----------------    -----------------
                                            ^
                                            ¦
                                    ----------------
                                    ¦    CITIES    ¦
                                    ----------------
                                            ^
                                            ¦
                                    ----------------
                                    ¦    COUNTIES  ¦
                                    ----------------



    properties:

        belongs_to -> city
        belongs_to -> sales_type

        id                  :integer
        title               :string
        details             :text
        price               :integer
        sales_type_id       :integer
        city_id             :integer
        address_1           :string
        address_2           :string
        address_3           :string
        number_of_beds      :integer
        number_of_baths     :integer
        pet_allowed         :boolean
        dishwasher          :boolean
        furnished           :boolean
        created_at          :datetime
        updated_at          :datetime

    counties:

        has_many    -> cities

        id                  :integer
        name                :string

    cities:

        belongs_to  -> county
        has_many    -> properties

        id                  :integer
        name                :string
        county_id:          :integer

    house_types:
        (detached, semi-detached, terraced)

        has_many    -> properties

        id:                 :integer
        name                :string

    sales_types:
        (sale, rent, share)

        has_many    -> properties

        id                  :integer
        name:               :string

    users:
        id                  :integer
        username            :string
        password            :string
        admin               :boolean

### Installation

    composer update
    bower update

### Database management commands

    php artisan migrate:reset
    php artisan migrate
    php artisan db:seed

### Run development environment

    grunt
    php artisan serve

### Deploy on heroku

[Source](http://blog.enge.me/post/a-comprehensive-tutorial-for-deploying-laravel-4-on-heroku)


Add database configuration in /app/config/heroku/database.php
Information from heroku postgres database settings...
    
    <?php
    // database.php
    return array(
        'fetch' => PDO::FETCH_CLASS,
        'default' => 'pgsql',
        'connections' => array(
            'pgsql' => array(
                'driver'   => 'pgsql',
                'host'     => '',
                'port'     => '5432'
                'database' => '',
                'username' => '',
                'password' => '',
                'charset'  => 'utf8',
                'prefix'   => '',
                'schema'   => 'public',
            ),
        'migrations' => 'migrations',
    );
    
    
[![Bitdeli Badge](https://d2weczhvl823v0.cloudfront.net/szines/real-estate-app/trend.png)](https://bitdeli.com/free "Bitdeli Badge")
