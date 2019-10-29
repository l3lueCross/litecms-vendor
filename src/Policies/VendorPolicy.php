<?php

namespace Litecms\Vendor\Policies;

use Litepie\User\Contracts\UserPolicy;
use Litecms\Vendor\Models\Vendor;

class VendorPolicy
{

    /**
     * Determine if the given user can view the vendor.
     *
     * @param UserPolicy $user
     * @param Vendor $vendor
     *
     * @return bool
     */
    public function view(UserPolicy $user, Vendor $vendor)
    {
        if ($user->canDo('vendor.vendor.view') && $user->isAdmin()) {
            return true;
        }

        return $vendor->user_id == user_id() && $vendor->user_type == user_type();
    }

    /**
     * Determine if the given user can create a vendor.
     *
     * @param UserPolicy $user
     * @param Vendor $vendor
     *
     * @return bool
     */
    public function create(UserPolicy $user)
    {
        return  $user->canDo('vendor.vendor.create');
    }

    /**
     * Determine if the given user can update the given vendor.
     *
     * @param UserPolicy $user
     * @param Vendor $vendor
     *
     * @return bool
     */
    public function update(UserPolicy $user, Vendor $vendor)
    {
        if ($user->canDo('vendor.vendor.edit') && $user->isAdmin()) {
            return true;
        }

        return $vendor->user_id == user_id() && $vendor->user_type == user_type();
    }

    /**
     * Determine if the given user can delete the given vendor.
     *
     * @param UserPolicy $user
     * @param Vendor $vendor
     *
     * @return bool
     */
    public function destroy(UserPolicy $user, Vendor $vendor)
    {
        return $vendor->user_id == user_id() && $vendor->user_type == user_type();
    }

    /**
     * Determine if the given user can verify the given vendor.
     *
     * @param UserPolicy $user
     * @param Vendor $vendor
     *
     * @return bool
     */
    public function verify(UserPolicy $user, Vendor $vendor)
    {
        if ($user->canDo('vendor.vendor.verify')) {
            return true;
        }

        return false;
    }

    /**
     * Determine if the given user can approve the given vendor.
     *
     * @param UserPolicy $user
     * @param Vendor $vendor
     *
     * @return bool
     */
    public function approve(UserPolicy $user, Vendor $vendor)
    {
        if ($user->canDo('vendor.vendor.approve')) {
            return true;
        }

        return false;
    }

    /**
     * Determine if the user can perform a given action ve.
     *
     * @param [type] $user    [description]
     * @param [type] $ability [description]
     *
     * @return [type] [description]
     */
    public function before($user, $ability)
    {
        if ($user->isSuperuser()) {
            return true;
        }
    }
}
