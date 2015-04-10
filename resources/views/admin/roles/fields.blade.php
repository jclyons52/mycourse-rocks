<!--- Name Field --->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('permissions', 'Permissions:') !!}
    {!! Form::select('permissions[]', $permissions, (isset($role) ? $role->permissions->lists('id') : null), ['class' => 'form-control', 'multiple', 'id' => 'role_permissions']) !!}
</div>


<!--- Submit Field --->
<div class="form-group">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
