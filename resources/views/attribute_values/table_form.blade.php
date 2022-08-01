{!! Form::open(['route' => ['attribute_values.destroy', $attributeValue->id], 'method' => 'delete']) !!}
    <div class='btn-group'>
        <a href="{{ route('attribute_values.edit', [$attributeValue->id]) }}"
           class='btn btn-primary btn-xs'>
            <i class="far fa-edit"></i>
        </a>
        {!!
            Form::button('<i class="far fa-trash-alt"></i>',
            ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"])
        !!}
    </div>
{!! Form::close() !!}
