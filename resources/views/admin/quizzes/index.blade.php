@extends('admin.layout')

@section('content')


        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Quizzes</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('quizzes.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($quizzes->isEmpty())
                <div class="well text-center">No Quizzes found.</div>
            @else
                <table class="table">
                    <thead>
                    <th>Lesson_Id</th>
			<th>Question</th>
			<th>Answer</th>
			<th>False_Answer1</th>
			<th>False_Answer2</th>
			<th>False_Answer3</th>
                    <th width="50px">Action</th>
                    </thead>
                    <tbody>
                    @foreach($quizzes as $quiz)
                        <tr>
                            <td>{!! $quiz->lesson_id !!}</td>
					<td>{!! $quiz->question !!}</td>
					<td>{!! $quiz->answer !!}</td>
					<td>{!! $quiz->false_answer1 !!}</td>
					<td>{!! $quiz->false_answer2 !!}</td>
					<td>{!! $quiz->false_answer3 !!}</td>
                            <td>
                                <a href="{!! route('quizzes.edit', [$quiz->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                                <a href="{!! route('quizzes.delete', [$quiz->id]) !!}" onclick="return confirm('Are you sure wants to delete this Quiz?')"><i class="glyphicon glyphicon-remove"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>

@endsection