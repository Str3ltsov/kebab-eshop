{!! Form::model($product, ['route' => ['storeAttributeValues', $product->id], 'method' => 'post']) !!}
    <div class="card-body">
        <div class="row">
            {{ Form::hidden('product_id', $product->id) }}
            <div class="form-group col-sm-4">
                {!! Form::label('attribute_value_id', __('table.attributeValues').':') !!}
                {!! Form::select('attribute_value_id', $attributeValues, null,
                    ['class' => 'form-control custom-select',
                        'placeholder' => $attributeValues == null ? __('names.noAttributeValues') : '---',
                        'name' => 'attribute_value_id'])
                !!}
            </div>
            <div class="form-group col-sm-4">
                {!! Form::label('extra_price', __('table.extraPrice').':') !!}
                {!! Form::number('extra_price', null, ['class' => 'form-control', 'min' => '0', 'step' => '0.01']) !!}
            </div>
            <div class="form-group col-sm-4">
                {!! Form::label('available', __('table.available').':') !!}
                {!! Form::number('available', null, ['class' => 'form-control', 'min' => '0', 'max' => '1']) !!}
            </div>
        </div>
    </div>
    <div class="card-footer">
        {!! Form::submit(__('buttons.save'), ['class' => 'btn btn-primary']) !!}
        <a href="{{ route('attributeValues', [$product->id]) }}" class="btn btn-default">{{__('buttons.cancel')}}</a>
    </div>
{!! Form::close() !!}
