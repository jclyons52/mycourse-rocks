<!--- Name Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!--- Price Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('price', 'Price:') !!}
    {!! Form::text('price', null, ['class' => 'form-control']) !!}
</div>

<!--- Description Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::text('description', null, ['class' => 'form-control']) !!}
</div>

<!--- Category Field --->
<div class="form-group">
    {!! Form::label('category', 'Category:') !!}
    {!! Form::select('category', $categories, null, ['class' => 'form-control', 'id' => 'product_category']) !!}
</div>

<!--- Tags Field --->
<div class="form-group">
    {!! Form::label('tags', 'Tags:') !!}
    {!! Form::select('tags[]', $tags, (isset($product) ? $product->tags->lists('id') : null), ['class' => 'form-control', 'multiple', 'id' => 'product_tags']) !!}
</div>

<!--- Tags Field --->
<div class="form-group">
    {!! Form::label('files', 'Files:') !!}
    {!! Form::select('files[]', $files, (isset($product) ? $product->files->lists('id') : null), ['class' => 'form-control', 'multiple', 'id' => 'prodecut_files']) !!}
</div>


<!--- Submit Field --->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>

@section('scripts')

    <script type="text/javascript">
        $('#product_tags').select2();
        $('#prodecut_files').select2();
    </script>
@endsection