<!--- Lesson_Id Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('lesson_id', 'Lesson_Id:') !!}
    {!! Form::text('lesson_id', null, ['class' => 'form-control']) !!}
</div>

<!--- Question Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('question', 'Question:') !!}
    {!! Form::text('question', null, ['class' => 'form-control']) !!}
</div>

<!--- Answer Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('answer', 'Answer:') !!}
    {!! Form::text('answer', null, ['class' => 'form-control']) !!}
</div>

<!--- False_Answer1 Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('false_answer1', 'False_Answer1:') !!}
    {!! Form::text('false_answer1', null, ['class' => 'form-control']) !!}
</div>

<!--- False_Answer2 Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('false_answer2', 'False_Answer2:') !!}
    {!! Form::text('false_answer2', null, ['class' => 'form-control']) !!}
</div>

<!--- False_Answer3 Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('false_answer3', 'False_Answer3:') !!}
    {!! Form::text('false_answer3', null, ['class' => 'form-control']) !!}
</div>


<!--- Submit Field --->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
