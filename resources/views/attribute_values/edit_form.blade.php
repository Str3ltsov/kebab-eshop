{!! Form::model($attributeValue, ['route' => ['attribute_values.update', $attributeValue->id], 'method' => 'patch']) !!}
    <div class="card-body">
        <div class="row">
            <div class="form-group col-sm-6">
                {!! Form::label('value_name', __('table.valueName').':') !!}
                {!! Form::text('value_name', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group col-sm-6">
                {!! Form::label('attribute_id', __('table.attributes').':') !!}
                {!! Form::select('attribute_id', $attributes, null,
                    ['class' => 'form-control custom-select', 'placeholder' => '---', 'name' => 'attribute_id']) !!}
            </div>
        </div>
    </div>
    <div class="card-footer">
        {!! Form::submit(__('buttons.save'), ['class' => 'btn btn-primary']) !!}
        <a href="{{ route('attribute_values.index') }}" class="btn btn-default">{{__('buttons.cancel')}}</a>
    </div>
{!! Form::close() !!}
