@extends('layouts.app')
@section('content')
    <div class="content px-3">
        @include('flash_message')
        @include('adminlte-templates::common.errors')
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-12">
                        <h3>{{__('names.editAttributeValue')}}</h3>
                    </div>
                </div>
            </div>
            @include('attribute_values.edit_form')
        </div>
    </div>
@endsection
