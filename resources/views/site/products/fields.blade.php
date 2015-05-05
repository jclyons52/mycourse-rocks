<!--- Name Field --->
<div class="form-group">
    {!! Form::label('name', 'Name:', ['class' => 'col-lg-2 control-label']) !!}
    <div class="col-sm-10">
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!--- Description Field --->
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

{!! Form::hidden('userId', Auth::user()->id) !!}

<!--- Category Field --->
<div class="form-group">
    {!! Form::label('category_id', 'Category:') !!}
    {!! Form::select('category_id', $categories, null, ['class' => 'form-control', 'id' => 'product_category']) !!}
</div>

<!--- Tags Field --->
<div class="form-group">
    {!! Form::label('tags', 'Tags:') !!}
    {!! Form::select('tags[]', $tags, (isset($product) ? $product->tags->lists('id') : null), ['class' => 'form-control', 'multiple', 'id' => 'product_tags']) !!}
</div>

<!--- Tags Field --->
<div class="form-group">
    {!! Form::label('files', 'Files:') !!}
    {!! Form::file('files', (isset($product) ? $product->files->lists('id') : null), ['class' => 'form-control']) !!}
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