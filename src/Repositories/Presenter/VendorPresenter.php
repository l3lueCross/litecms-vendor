<?php

namespace Litecms\Vendor\Repositories\Presenter;

use Litepie\Repository\Presenter\FractalPresenter;

class VendorPresenter extends FractalPresenter {

    /**
     * Prepare data to present
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new VendorTransformer();
    }
}