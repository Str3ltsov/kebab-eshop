{!! Form::model($productAttributeValue, ['route' => ['updateAttributeValues', $product->id, $productAttributeValue->id], 'method' => 'patch']) !!}
    <div class="card-body">
        <div class="row">
            {{ Form::hidden('product_id', $product->id) }}
            {{ Form::hidden('attribute_value_id', $productAttributeValue->id) }}
            <div class="form-group col-sm-6">
                {!! Form::label('extra_price', __('table.extraPrice').':') !!}
                {!! Form::number('extra_price', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group col-sm-6">
                {!! Form::label('available', __('table.available').':') !!}
                {!! Form::number('available', null, ['class' => 'form-control']) !!}
            </div>
        </div>
    </div>
    <div class="card-footer">
        {!! Form::submit(__('buttons.save'), ['class' => 'btn btn-primary']) !!}
        <a href="{{ route('attributeValues', [$product->id]) }}" class="btn btn-default">{{__('buttons.cancel')}}</a>
    </div>
{!! Form::close() !!}
