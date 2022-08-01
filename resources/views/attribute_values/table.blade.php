<div class="table table-responsive">
    <table class="table" id="categories">
        <thead>
        <tr>
            <th class="w-25">{{__('table.valueName')}}</th>
            <th class="w-25">{{__('table.attributeName')}}</th>
            <th class="w-25">{{__('table.created_at')}}</th>
            <th class="w-25">{{__('table.updated_at')}}</th>
            <th>{{__('table.action')}}</th>
        </tr>
        </thead>
        <tbody>
        @forelse($attributeValues ?? [] as $attributeValue)
            <tr>
                <td>{{ $attributeValue->value_name ?? '-' }}</td>
                <td>{{ $attributeValue->attribute->name ?? '-' }}</td>
                <td>{{ $attributeValue->created_at ?? '-' }}</td>
                <td>{{ $attributeValue->updated_at ?? '-' }}</td>
                <td>
                    @include('attribute_values.table_form')
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6">{{ __('table.emptyAttributeValues') }}</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>
