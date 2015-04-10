<!--- Name Field --->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('roles', 'Roles:') !!}
    {!! Form::select('roles[]', $roles, $user->roles->lists('id'), ['class' => 'form-control', 'multiple', 'id' => 'user_roles']) !!}
</div>


<!--- Submit Field --->
<div class="form-group">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>