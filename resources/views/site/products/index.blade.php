<div class="container">
    <div class="row">
        <h1 class="pull-left"> Courses</h1> <a href="{{route('products.create')}}" class="btn btn-primary pull-right" style="margin-top: 15px">create a course</a>
    </div>
    <hr/>
    <div class="row">
            @foreach($products as $product)
            <div class="col-sm-6 col-md-4">
                @include('site.products.thumbnail')
            </div>

            @endforeach
    </div>
    </div>