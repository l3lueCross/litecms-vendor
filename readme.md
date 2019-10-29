Lavalite package that provides vendor management facility for the cms.

## Installation

Begin by installing this package through Composer. Edit your project's `composer.json` file to require `litecms/vendor`.

    "litecms/vendor": "dev-master"

Next, update Composer from the Terminal:

    composer update

Once this operation completes execute below cammnds in command line to finalize installation.

    Litecms\Vendor\Providers\VendorServiceProvider::class,

And also add it to alias

    'Vendor'  => Litecms\Vendor\Facades\Vendor::class,

## Publishing files and migraiting database.

**Migration and seeds**

    php artisan migrate
    php artisan db:seed --class=Litecms\\VendorTableSeeder

**Publishing configuration**

    php artisan vendor:publish --provider="Litecms\Vendor\Providers\VendorServiceProvider" --tag="config"

**Publishing language**

    php artisan vendor:publish --provider="Litecms\Vendor\Providers\VendorServiceProvider" --tag="lang"

**Publishing views**

    php artisan vendor:publish --provider="Litecms\Vendor\Providers\VendorServiceProvider" --tag="view"


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