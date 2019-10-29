<?php

// web routes  for vendor
Route::prefix('{guard}/vendor')->group(function () {
    Route::resource('vendor', 'VendorResourceController');
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
                Route::apiResource('vendor', 'VendorResourceController');
            });
        }
    );
}

