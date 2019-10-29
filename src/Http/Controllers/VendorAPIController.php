<?php

namespace Litecms\Vendor\Http\Controllers;

use App\Http\Controllers\APIController as BaseController;
use Litecms\Vendor\Http\Requests\VendorRequest;
use Litecms\Vendor\Interfaces\VendorRepositoryInterface;
use Litecms\Vendor\Models\Vendor;
use Litecms\Vendor\Forms\Vendor as Form;

/**
 * APIController  class for vendor.
 */
class VendorAPIController extends BaseController
{

    /**
     * Initialize vendor resource controller.
     *
     * @param type VendorRepositoryInterface $vendor
     *
     * @return null
     */
    public function __construct(VendorRepositoryInterface $vendor)
    {
        parent::__construct();
        $this->repository = $vendor;
        $this->repository
            ->pushCriteria(\Litepie\Repository\Criteria\RequestCriteria::class)
            ->pushCriteria(\Litecms\Vendor\Repositories\Criteria\VendorResourceCriteria::class);
    }

    /**
     * Display a list of vendor.
     *
     * @return Response
     */
    public function index(VendorRequest $request)
    {
        return $this->repository
            ->setPresenter(\Litecms\Vendor\Repositories\Presenter\VendorPresenter::class)
            ->paginate();
    }

    /**
     * Display vendor.
     *
     * @param Request $request
     * @param Model   $vendor
     *
     * @return Response
     */
    public function show(VendorRequest $request, Vendor $vendor)
    {
        return $vendor->setPresenter(\Litecms\Vendor\Repositories\Presenter\VendorListPresenter::class);
        ;
    }

    /**
     * Create new vendor.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(VendorRequest $request)
    {
        try {
            $data              = $request->all();
            $data['user_id']   = user_id();
            $data['user_type'] = user_type();
            $data              = $this->repository->create($data);
            $message           = trans('messages.success.created', ['Module' => trans('vendor::vendor.name')]);
            $code              = 204;
            $status            = 'success';
            $url               = guard_url('vendor/vendor/' . $vendor->getRouteKey());
        } catch (Exception $e) {
            $message = $e->getMessage();
            $code    = 400;
            $status  = 'error';
            $url     = guard_url('vendor/vendor');
        }
        return compact('data', 'message', 'code', 'status', 'url');
    }

    /**
     * Update the vendor.
     *
     * @param Request $request
     * @param Model   $vendor
     *
     * @return Response
     */
    public function update(VendorRequest $request, Vendor $vendor)
    {
        try {
            $data = $request->all();

            $vendor->update($data);
            $message = trans('messages.success.updated', ['Module' => trans('vendor::vendor.name')]);
            $code    = 204;
            $status  = 'success';
            $url     = guard_url('vendor/vendor/' . $vendor->getRouteKey());
        } catch (Exception $e) {
            $message = $e->getMessage();
            $code    = 400;
            $status  = 'error';
            $url     = guard_url('vendor/vendor/' . $vendor->getRouteKey());
        }
        return compact('data', 'message', 'code', 'status', 'url');
    }

    /**
     * Remove the vendor.
     *
     * @param Model   $vendor
     *
     * @return Response
     */
    public function destroy(VendorRequest $request, Vendor $vendor)
    {
        try {
            $vendor->delete();
            $message = trans('messages.success.deleted', ['Module' => trans('vendor::vendor.name')]);
            $code    = 202;
            $status  = 'success';
            $url     = guard_url('vendor/vendor/0');
        } catch (Exception $e) {
            $message = $e->getMessage();
            $code    = 400;
            $status  = 'error';
            $url     = guard_url('vendor/vendor/' . $vendor->getRouteKey());
        }
        return compact('message', 'code', 'status', 'url');
    }

    /**
     * Return the form elements as json.
     *
     * @param String   $element
     *
     * @return json
     */
    public function form($element = 'fields')
    {
        $form = new Form();
        return $form->form($element, true);
    }

}
