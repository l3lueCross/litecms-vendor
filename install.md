# Installation

The instructions below will help you to properly install the generated package to the lavalite project.

## Location

Extract the package contents to the folder 

`/packages/litecms/vendor/`

## Composer

Add the below entries in the `composer.json` file's autoload section and run the command `composer dump-autoload` in terminal.

```json

...
     "autoload": {
         ...

        "classmap": [
            ...
            
            "packages/litecms/vendor/database/seeds",
            
            ...
        ],
        "psr-4": {
            ...
            
            "Litecms\\Vendor\\": "packages/litecms/vendor/src",
            
            ...
        }
    },
...

```

## Config

Add the entries in service provider in `config/app.php`

```php

...
    'providers'       => [
        ...
        
        Litecms\Vendor\Providers\VendorServiceProvider::class,
        
        ...
    ],

    ...

    'alias'             => [
        ...
        
        'Vendor'  => Litecms\Vendor\Facades\Vendor::class,
        
        ...
    ]
...

```

## Migrate

After service provider is set run the commapnd to migrate and seed the database.


    php artisan migrate
    php artisan db:seed --class=Litecms\\VendorTableSeeder

## Publishing


**Publishing configuration**

    php artisan vendor:publish --provider="Litecms\Vendor\Providers\VendorServiceProvider" --tag="config"

**Publishing language**

    php artisan vendor:publish --provider="Litecms\Vendor\Providers\VendorServiceProvider" --tag="lang"

**Publishing views**

    php artisan vendor:publish --provider="Litecms\Vendor\Providers\VendorServiceProvider" --tag="view"


## URLs and APIs


### Web Urls

**Admin**

    http://path-to-route-folder/admin/vendor/{modulename}

**User**

    http://path-to-route-folder/user/vendor/{modulename}

**Public**

    http://path-to-route-folder/vendors


### API endpoints

**List**

    http://path-to-route-folder/api/user/vendor/{modulename}
    METHOD: GET

**Create**

    http://path-to-route-folder/api/user/vendor/{modulename}
    METHOD: POST

**Edit**

    http://path-to-route-folder/api/user/vendor/{modulename}/{id}
    METHOD: PUT

**Delete**

    http://path-to-route-folder/api/user/vendor/{modulename}/{id}
    METHOD: DELETE

**Public List**

    http://path-to-route-folder/api/vendor/{modulename}
    METHOD: GET

**Public Single**

    http://path-to-route-folder/api/vendor/{modulename}/{slug}
    METHOD: GET