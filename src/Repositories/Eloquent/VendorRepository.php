<?php

namespace Litecms\Vendor\Repositories\Eloquent;

use Litecms\Vendor\Interfaces\VendorRepositoryInterface;
use Litepie\Repository\Eloquent\BaseRepository;

class VendorRepository extends BaseRepository implements VendorRepositoryInterface
{


    public function boot()
    {
        $this->fieldSearchable = config('litecms.vendor.vendor.model.search');

    }

    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model()
    {
        return config('litecms.vendor.vendor.model.model');
    }
}
