<?php

namespace Litecms\Vendor\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Litepie\Database\Model;
use Litepie\Database\Traits\Slugger;
use Litepie\Filer\Traits\Filer;
use Litepie\Hashids\Traits\Hashids;
use Litepie\Repository\Traits\PresentableTrait;
use Litepie\Trans\Traits\Translatable;

class Vendor extends Model
{
    use Filer, SoftDeletes, Hashids, Slugger, Translatable, PresentableTrait;

    /**
     * Configuartion for the model.
     *
     * @var array
     */
     protected $config = 'litecms.vendor.vendor.model';


}
