<div class="col-sm-6">
    <div class="col-md-12 padding lib-item" data-category="view">
        <div class="lib-panel">
            <div class="row box-shadow">
                <a href="{!! route('products.show', [$product->id]) !!}" role="button">
                    <div class="col-md-6">
                        <img class="lib-img-show" src="{{route('getentry',$product->file->filename )}}" alt="{{$product->name}}">
                    </div>
                    <div class="col-md-6">
                        <div class="lib-row lib-header">
                            {{$product->name}} - Rating: {{$product->rating()}}
                            <div class="lib-header-seperator"></div>
                        </div>
                        <div class="lib-row lib-desc">
                            {{ str_limit($product->description, 35) }}

                        </div>
                    </div>

                </a>
            </div>

        </div>
    </div>
</div>

@section('styles')
    @parent
    <style>

        @media(max-width:767px){
            .lib-img-show{
                height: 30em;
            }
        }
        @media(min-width:768px){
            .lib-img-show{
                height: 15.3em;
            }
        }
        *{
            /*border: dashed red 1px;*/
        }

        .fav-button{
            position: absolute;
            bottom: 0;
        }
        .lib-panel {
            /*margin-bottom: 20Px;*/
        }
        .lib-panel img {
            width: 100%;
            background-color: transparent;
        }

        .lib-panel .row,
        .lib-panel .col-md-6 {
            padding: 0;
            background-color: #FFFFFF;
        }


        .lib-panel .lib-row {
            padding: 0 20px 0 20px;
        }

        .lib-panel .lib-row.lib-header {
            background-color: #FFFFFF;
            font-size: 20px;
            padding: 10px 20px 0 20px;
        }

        .lib-panel .lib-row.lib-header .lib-header-seperator {
            height: 2px;
            width: 26px;
            background-color: #d9d9d9;
            margin: 7px 0 7px 0;
        }

        .lib-panel .lib-row.lib-desc {
            position: relative;
            height: 100%;
            display: block;
            font-size: 13px;
        }
        .lib-panel .lib-row.lib-desc a{
            position: absolute;
            width: 100%;
            bottom: 10px;
            left: 20px;
        }


        .box-shadow {
            -webkit-box-shadow: 0 0 10px 0 rgba(0,0,0,.10);
            box-shadow: 0 0 10px 0 rgba(0,0,0,.10);
        }

        .padding {
            padding-bottom: 20px;
        }
    </style>
@endsection