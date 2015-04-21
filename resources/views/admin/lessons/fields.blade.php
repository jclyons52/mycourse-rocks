<!--- Name Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!--- Description Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::text('description', null, ['class' => 'form-control']) !!}
</div>

<!--- Tags Field --->
<div class="form-group">
    {!! Form::label('links', 'Links:') !!}
    {!! Form::select('links[]', $links, (isset($lesson) ? $lesson->links : null), ['class' => 'form-control', 'multiple', 'id' => 'lesson_links']) !!}
</div>

<!--- Tags Field --->
<div class="form-group">
    {!! Form::label('product_id', 'Product:') !!}
    {!! Form::select('product_id', $products , ['class' => 'form-control']) !!}
</div>

<!--- Submit Field --->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>

@section('scripts')

    <script type="text/javascript">
        $('#lesson_links').select2({
            createSearchChoice: function (term, data) {

                if ($(data).filter(function () {
                            return this.text.localeCompare(term) === 0;
                        }).length === 0) {
                    return {id: term, text: term};
                }
            }
        });
    </script>
@endsection