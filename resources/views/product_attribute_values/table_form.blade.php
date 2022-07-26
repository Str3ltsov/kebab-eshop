{!! Form::open(['route' => ['destroyAttributeValues', $product->id, $productAttributeValue->id], 'method' => 'delete']) !!}
    <div class="btn-group">
        <a class="btn btn-primary"
           href="{{ route('editAttributeValues', [$product->id, $productAttributeValue->id]) }}">
            <i class="fa-solid fa-edit"></i>
        </a>
        {!! Form::button('<i class="far fa-trash-alt"></i>',
            ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
    </div>
{!! Form::close() !!}
