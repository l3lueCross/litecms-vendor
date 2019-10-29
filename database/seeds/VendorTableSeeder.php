<?php

namespace Litecms\Vendor;

use DB;
use Illuminate\Database\Seeder;

class VendorTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('vendors')->insert([
            
        ]);

        DB::table('permissions')->insert([
            [
                'slug'      => 'vendor.vendor.view',
                'name'      => 'View Vendor',
            ],
            [
                'slug'      => 'vendor.vendor.create',
                'name'      => 'Create Vendor',
            ],
            [
                'slug'      => 'vendor.vendor.edit',
                'name'      => 'Update Vendor',
            ],
            [
                'slug'      => 'vendor.vendor.delete',
                'name'      => 'Delete Vendor',
            ],
            
            
        ]);

        DB::table('menus')->insert([

            [
                'parent_id'   => 1,
                'key'         => null,
                'url'         => 'admin/vendor/vendor',
                'name'        => 'Vendor',
                'description' => null,
                'icon'        => 'fa fa-newspaper-o',
                'target'      => null,
                'order'       => 190,
                'status'      => 1,
            ],

            [
                'parent_id'   => 2,
                'key'         => null,
                'url'         => 'user/vendor/vendor',
                'name'        => 'Vendor',
                'description' => null,
                'icon'        => 'icon-book-open',
                'target'      => null,
                'order'       => 190,
                'status'      => 1,
            ],

            [
                'parent_id'   => 3,
                'key'         => null,
                'url'         => 'vendor',
                'name'        => 'Vendor',
                'description' => null,
                'icon'        => null,
                'target'      => null,
                'order'       => 190,
                'status'      => 1,
            ],

        ]);

        DB::table('settings')->insert([
            // Uncomment  and edit this section for entering value to settings table.
            /*
            [
                'pacakge'   => 'Vendor',
                'module'    => 'Vendor',
                'user_type' => null,
                'user_id'   => null,
                'key'       => 'vendor.vendor.key',
                'name'      => 'Some name',
                'value'     => 'Some value',
                'type'      => 'Default',
                'control'   => 'text',
            ],
            */
        ]);
    }
}
