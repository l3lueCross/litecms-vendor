    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#vendor" data-toggle="tab">{!! trans('vendor::vendor.tab.name') !!}</a></li>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-primary btn-sm" data-action='UPDATE' data-form='#vendor-vendor-edit'  data-load-to='#vendor-vendor-entry' data-datatable='#vendor-vendor-list'><i class="fa fa-floppy-o"></i> {{ trans('app.save') }}</button>
                <button type="button" class="btn btn-default btn-sm" data-action='CANCEL' data-load-to='#vendor-vendor-entry' data-href='{{guard_url('vendor/vendor')}}/{{$vendor->getRouteKey()}}'><i class="fa fa-times-circle"></i> {{ trans('app.cancel') }}</button>

            </div>
        </ul>
        {!!Form::vertical_open()
        ->id('vendor-vendor-edit')
        ->method('PUT')
        ->enctype('multipart/form-data')
        ->action(guard_url('vendor/vendor/'. $vendor->getRouteKey()))!!}
        <div class="tab-content clearfix">
            <div class="tab-pane active" id="vendor">
                <div class="tab-pan-title">  {{ trans('app.edit') }}  {!! trans('vendor::vendor.name') !!} [{!!$vendor->name!!}] </div>
                @include('vendor::admin.vendor.partial.entry', ['mode' => 'edit'])
            </div>
        </div>
        {!!Form::close()!!}
    </div>