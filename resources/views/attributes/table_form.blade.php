{!! Form::open(['route' => ['attributes.destroy', $attribute->id], 'method' => 'delete']) !!}
    <div class='btn-group'>
        <a href="{{ route('attributes.edit', [$attribute->id]) }}"
           class='btn btn-primary btn-xs'>
            <i class="far fa-edit"></i>
        </a>
        {!!
            Form::button('<i class="far fa-trash-alt"></i>',
            ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"])
        !!}
    </div>
{!! Form::close() !!}
