<div class="table table-responsive">
    <table class="table" id="categories">
        <thead>
        <tr>
            <th class="w-50">{{__('table.name')}}</th>
            <th class="w-25">{{__('table.created_at')}}</th>
            <th class="w-25">{{__('table.updated_at')}}</th>
            <th>{{__('table.action')}}</th>
        </tr>
        </thead>
        <tbody>
        @forelse($attributes ?? [] as $attribute)
            <tr>
                <td>{{ $attribute->name ?? '-' }}</td>
                <td>{{ $attribute->created_at ?? '-' }}</td>
                <td>{{ $attribute->updated_at ?? '-' }}</td>
                <td>
                    @include('attributes.table_form')
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6">{{ __('table.emptyAttributes') }}</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>
