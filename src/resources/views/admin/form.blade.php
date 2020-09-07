<div class="form-group">
    {{ Form::label('label', 'Label') }}
    {{ Form::text('label', old('label', $:resource->label ?? ''), ['class' => 'form-control'.$errors->first('label',' is-invalid')]) }}
    {!! $errors->first('label','<div class="error-bubble"><div>:message</div></div>') !!}
</div>
