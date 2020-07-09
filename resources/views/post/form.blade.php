@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="form-group">
    {{ Form::label('name', 'Название') }}</br>
    {{ Form::text('name') }}
</div>
<div class="form-group">
    {{ Form::label('body', 'Содержание') }}</br>
    {{ Form::textarea('body') }}
</div>
