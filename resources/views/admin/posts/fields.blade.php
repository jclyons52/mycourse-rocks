
<!--- Title Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!--- Slug Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('slug', 'Slug:') !!}
    {!! Form::text('slug', null, ['class' => 'form-control']) !!}
</div>

<!--- Content Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('content', 'Content:') !!}
    {!! Form::text('content', null, ['class' => 'form-control']) !!}
</div>

<!--- Meta_Title Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('meta_title', 'Meta_Title:') !!}
    {!! Form::text('meta_title', null, ['class' => 'form-control']) !!}
</div>

<!--- Meta_Description Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('meta_description', 'Meta_Description:') !!}
    {!! Form::text('meta_description', null, ['class' => 'form-control']) !!}
</div>

<!--- Meta_Keywords Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('meta_keywords', 'Meta_Keywords:') !!}
    {!! Form::text('meta_keywords', null, ['class' => 'form-control']) !!}
</div>


<!--- Submit Field --->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
