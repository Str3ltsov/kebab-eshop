@extends('layouts.app')

@section('content')
    <div class="content px-3">
        @include('flash::message')
        <div class="clearfix"></div>
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-6">
                        <h3>{{__('names.products')}}</h3>
                    </div>
                    <div class="col-6">
                        <a class="btn btn-primary float-end"
                           href="{{ route('products.create') }}">
                            <i class="fa-solid fa-plus"></i>
                            {{__('buttons.addNew')}}
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body p-4">
                @include('products.table')
            </div>
        </div>
    </div>
@endsection

