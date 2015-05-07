<div class="container">
    <div class="row">
        <h1 class="pull-left"> Courses</h1> <a href="{{route('products.create')}}" class="btn btn-primary pull-right" style="margin-top: 15px">create a course</a>
    </div>
    <hr/>
    <div class="row">
            @foreach($products as $product)

                @include('site.products.thumbnail')

            @endforeach
    </div>
    </div>