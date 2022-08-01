@extends('layouts.app')
@section('content')
    <div class="content px-3">
        @include('flash_message')
        @include('adminlte-templates::common.errors')
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col d-flex">
                        <h3>{{__('names.productAttributeValues')}}</h3>
                    </div>
                    <div class="col d-flex justify-content-end align-items-center">
                        <a class="btn btn-primary me-2"
                           href="{{ route('createAttributeValues', [$product->id]) }}">
                            <i class="fa-solid fa-plus"></i>
                            {{__('buttons.addNew')}}
                        </a>
                        <a class="btn btn-secondary"
                           href="{{ route('products.index') }}">
                            {{__('buttons.back')}}
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body p-4">
                <div class="row">
                    @include('product_attribute_values.table')
                </div>
            </div>
        </div>
    </div>
@endsection
