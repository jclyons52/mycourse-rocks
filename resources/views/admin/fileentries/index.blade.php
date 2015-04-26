@extends('admin.layout')
@section('content')

    <form action="{{route('addentry', [])}}" method="post" class="dropzone" id="imgUpload" enctype="multipart/form-data">

    </form>


    <h1> Pictures list</h1>
    <div class="row">
        <ul class="thumbnails">
            @foreach($entries as $entry)
                {{$entry->filename}}
                <div class="col-md-2">
                    <div class="thumbnail">
                        <img src="{{route('getentry', $entry->filename)}}" alt="ALT NAME" class="img-responsive" />
                        <div class="caption">
                            <p>{{$entry->original_filename}}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </ul>
    </div>

@endsection

@section('scripts')
    <script>
        var token = '{{ csrf_token() }}';
        Dropzone.options.imgUpload = {

            sending: function(file, xhr, formData) {
                formData.append("_token", token);
            }
        };
    </script>
    @endsection