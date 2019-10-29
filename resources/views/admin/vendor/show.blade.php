    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#details" data-toggle="tab">  {!! trans('vendor::vendor.name') !!}</a></li>
            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-success btn-sm" data-action='NEW' data-load-to='#vendor-vendor-entry' data-href='{{guard_url('vendor/vendor/create')}}'><i class="fa fa-plus-circle"></i> {{ trans('app.new') }}</button>
                @if($vendor->id )
                <button type="button" class="btn btn-primary btn-sm" data-action="EDIT" data-load-to='#vendor-vendor-entry' data-href='{{ guard_url('vendor/vendor') }}/{{$vendor->getRouteKey()}}/edit'><i class="fa fa-pencil-square"></i> {{ trans('app.edit') }}</button>
                <button type="button" class="btn btn-danger btn-sm" data-action="DELETE" data-load-to='#vendor-vendor-entry' data-datatable='#vendor-vendor-list' data-href='{{ guard_url('vendor/vendor') }}/{{$vendor->getRouteKey()}}' >
                <i class="fa fa-times-circle"></i> {{ trans('app.delete') }}
                </button>
                @endif
            </div>
        </ul>
        {!!Form::vertical_open()
        ->id('vendor-vendor-show')
        ->method('POST')
        ->files('true')
        ->action(guard_url('vendor/vendor'))!!}
            <div class="tab-content clearfix disabled">
                <div class="tab-pan-title"> {{ trans('app.view') }}   {!! trans('vendor::vendor.name') !!}  [{!! $vendor->name !!}] </div>
                <div class="tab-pane active" id="details">
                    @include('vendor::admin.vendor.partial.entry', ['mode' => 'show'])
                </div>
            </div>
        {!! Form::close() !!}
    </div>