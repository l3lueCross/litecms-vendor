<?php

namespace Litecms\Vendor\Http\Controllers;

use App\Http\Controllers\ResourceController as BaseController;
use Form;
use Litecms\Vendor\Http\Requests\VendorRequest;
use Litecms\Vendor\Interfaces\VendorRepositoryInterface;
use Litecms\Vendor\Models\Vendor;

/**
 * Resource controller class for vendor.
 */
class VendorResourceController extends BaseController
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
        $view = $this->response->theme->listView();

        if ($this->response->typeIs('json')) {
            $function = camel_case('get-' . $view);
            return $this->repository
                ->setPresenter(\Litecms\Vendor\Repositories\Presenter\VendorPresenter::class)
                ->$function();
        }

        $vendors = $this->repository->paginate();

        return $this->response->setMetaTitle(trans('vendor::vendor.names'))
            ->view('vendor::vendor.index', true)
            ->data(compact('vendors', 'view'))
            ->output();
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

        if ($vendor->exists) {
            $view = 'vendor::vendor.show';
        } else {
            $view = 'vendor::vendor.new';
        }

        return $this->response->setMetaTitle(trans('app.view') . ' ' . trans('vendor::vendor.name'))
            ->data(compact('vendor'))
            ->view($view, true)
            ->output();
    }

    /**
     * Show the form for creating a new vendor.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function create(VendorRequest $request)
    {

        $vendor = $this->repository->newInstance([]);
        return $this->response->setMetaTitle(trans('app.new') . ' ' . trans('vendor::vendor.name')) 
            ->view('vendor::vendor.create', true) 
            ->data(compact('vendor'))
            ->output();
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
            $attributes              = $request->all();
            $attributes['user_id']   = user_id();
            $attributes['user_type'] = user_type();
            $vendor                 = $this->repository->create($attributes);

            return $this->response->message(trans('messages.success.created', ['Module' => trans('vendor::vendor.name')]))
                ->code(204)
                ->status('success')
                ->url(guard_url('vendor/vendor/' . $vendor->getRouteKey()))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('/vendor/vendor'))
                ->redirect();
        }

    }

    /**
     * Show vendor for editing.
     *
     * @param Request $request
     * @param Model   $vendor
     *
     * @return Response
     */
    public function edit(VendorRequest $request, Vendor $vendor)
    {
        return $this->response->setMetaTitle(trans('app.edit') . ' ' . trans('vendor::vendor.name'))
            ->view('vendor::vendor.edit', true)
            ->data(compact('vendor'))
            ->output();
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
            $attributes = $request->all();

            $vendor->update($attributes);
            return $this->response->message(trans('messages.success.updated', ['Module' => trans('vendor::vendor.name')]))
                ->code(204)
                ->status('success')
                ->url(guard_url('vendor/vendor/' . $vendor->getRouteKey()))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('vendor/vendor/' . $vendor->getRouteKey()))
                ->redirect();
        }

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
            return $this->response->message(trans('messages.success.deleted', ['Module' => trans('vendor::vendor.name')]))
                ->code(202)
                ->status('success')
                ->url(guard_url('vendor/vendor/0'))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('vendor/vendor/' . $vendor->getRouteKey()))
                ->redirect();
        }

    }

    /**
     * Remove multiple vendor.
     *
     * @param Model   $vendor
     *
     * @return Response
     */
    public function delete(VendorRequest $request, $type)
    {
        try {
            $ids = hashids_decode($request->input('ids'));

            if ($type == 'purge') {
                $this->repository->purge($ids);
            } else {
                $this->repository->delete($ids);
            }

            return $this->response->message(trans('messages.success.deleted', ['Module' => trans('vendor::vendor.name')]))
                ->status("success")
                ->code(202)
                ->url(guard_url('vendor/vendor'))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->status("error")
                ->code(400)
                ->url(guard_url('/vendor/vendor'))
                ->redirect();
        }

    }

    /**
     * Restore deleted vendors.
     *
     * @param Model   $vendor
     *
     * @return Response
     */
    public function restore(VendorRequest $request)
    {
        try {
            $ids = hashids_decode($request->input('ids'));
            $this->repository->restore($ids);

            return $this->response->message(trans('messages.success.restore', ['Module' => trans('vendor::vendor.name')]))
                ->status("success")
                ->code(202)
                ->url(guard_url('/vendor/vendor'))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->status("error")
                ->code(400)
                ->url(guard_url('/vendor/vendor/'))
                ->redirect();
        }

    }

}
