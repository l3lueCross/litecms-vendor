<?php

namespace Litecms\Vendor\Repositories\Presenter;

use League\Fractal\TransformerAbstract;
use Hashids;

class VendorTransformer extends TransformerAbstract
{
    public function transform(\Litecms\Vendor\Models\Vendor $vendor)
    {
        return [
            'id'                => $vendor->getRouteKey(),
            'key'               => [
                'public'    => $vendor->getPublicKey(),
                'route'     => $vendor->getRouteKey(),
            ], 
            'name'              => $vendor->name,
            'url'               => [
                'public'    => trans_url('vendor/'.$vendor->getPublicKey()),
                'user'      => guard_url('vendor/vendor/'.$vendor->getRouteKey()),
            ], 
            'status'            => trans('app.'.$vendor->status),
            'created_at'        => format_date($vendor->created_at),
            'updated_at'        => format_date($vendor->updated_at),
        ];
    }
}