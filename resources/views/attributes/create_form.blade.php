{!! Form::open(['route' => 'attributes.store']) !!}
    <div class="card-body">
        <div class="row">
            <div class="form-group col-12">
                {!! Form::label('name', __('table.name').':') !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </div>
        </div>
    </div>
    <div class="card-footer">
        {!! Form::submit(__('buttons.save'), ['class' => 'btn btn-primary']) !!}
        <a href="{{ route('attributes.index') }}" class="btn btn-default">{{__('buttons.cancel')}}</a>
    </div>
{!! Form::close() !!}
