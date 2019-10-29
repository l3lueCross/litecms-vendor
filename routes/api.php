<?php

// API routes  for vendor
Route::prefix('{guard}/vendor')->group(function () {
    Route::get('vendor/form/{element}', 'VendorAPIController@form');
    Route::resource('vendor', 'VendorAPIController');
});


if (Trans::isMultilingual()) {
    Route::group(
        [
            'prefix' => '{trans}',
            'where'  => ['trans' => Trans::keys('|')],
        ],
        function () {
            // Guard routes for vendors
            Route::prefix('{guard}/vendor')->group(function () {
                Route::get('vendor/form/{element}', 'VendorAPIController@form');
                Route::apiResource('vendor', 'VendorAPIController');
            });
            // Public routes for vendors
            Route::get('vendor/Vendor', 'VendorPublicController@getVendor');
        }
    );
}

