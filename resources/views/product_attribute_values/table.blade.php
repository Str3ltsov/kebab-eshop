<div class="table table-responsive">
    <table class="table" id="categories">
        <thead>
        <tr>
            <th class="w-25">{{__('table.valueName')}}</th>
            <th class="w-25">{{__('table.extraPrice')}}</th>
            <th class="w-25">{{__('table.available')}}</th>
            <th class="w-25">{{__('table.attributeName')}}</th>
            <th class="w-25">{{__('table.action')}}</th>
        </tr>
        </thead>
        <tbody>
        @forelse($productAttributeValues ?? [] as $productAttributeValue)
            <tr>
                <td>{{ $productAttributeValue->attributeValue->value_name ?? '-' }}</td>
                <td>{{ $productAttributeValue->extra_price ?? '-' }}</td>
                <td>{{ $productAttributeValue->available ?? '-' }}</td>
                <td>{{ $productAttributeValue->attributeValue->attribute->name ?? '-' }}</td>
                <td>
                    @include('product_attribute_values.table_form')
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5">{{ __('names.noProductAttributeValues') }}</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>

