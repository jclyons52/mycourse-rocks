@extends('app')
@section('content')
<div class="container">
    <h1> {{$product->name}} </h1>
    <hr/>
    <div class="row">
        <div class="col-sm-6">
           @include('partials.carousel', array('files' => $product->files))
        </div>
        <div class="col-sm-6">
            <div class="col-sm-12">
                @include('partials.ratings')
            </div>
        </div>

    </div>
    <br/><br/><br/>
    <div class="row">
        <div class="col-sm-2">
            @if ($product->isFavoritedBy(Auth::user()))
                <a class="btn btn-success btn-block" href="{!! route('favorites.delete', [$product->id]) !!}"><span class="fa fa-minus-circle"></span>Unfavorite {{ $product->name }}</a>
            @else
                {!! Form::open(['route' => 'favorites.store']) !!}
                {!! Form::hidden('productIdToFavorite', $product->id) !!}
                <button type="submit" class="btn btn-success btn-block"><span class="fa fa-plus-circle"></span>Favorite {{ $product->name }}</button>
                {!! Form::close() !!}
            @endif
        </div>
    </div>
    <br/>
    <div class="row">
        <div class="col-sm-12">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Description</h3>
                    </div>
                    <div class="panel-body">

                        {{$product->description}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-8">
            @include('site.lessons.index')
        </div>
    </div>
    <hr>
    <h1>Comments</h1>
    @if(Auth::check())
        @include('site.comments.comment_form')
        @else
        <p>Log in to comment</p>
    @endif

        @foreach($product->comments as $comment)

            @include('site.comments.show')

        @endforeach
</div>
@endsection

@section('scripts')
    <script>
        // Starrr plugin (https://github.com/dobtco/starrr)
        var __slice = [].slice;

        (function($, window) {
            var Starrr;

            Starrr = (function() {
                Starrr.prototype.defaults = {
                    rating: void 0,
                    numStars: 5,
                    change: function(e, value) {}
                };

                function Starrr($el, options) {
                    var i, _, _ref,
                            _this = this;

                    this.options = $.extend({}, this.defaults, options);
                    this.$el = $el;
                    _ref = this.defaults;
                    for (i in _ref) {
                        _ = _ref[i];
                        if (this.$el.data(i) != null) {
                            this.options[i] = this.$el.data(i);
                        }
                    }
                    this.createStars();
                    this.syncRating();
                    this.$el.on('mouseover.starrr', 'i', function(e) {
                        return _this.syncRating(_this.$el.find('i').index(e.currentTarget) + 1);
                    });
                    this.$el.on('mouseout.starrr', function() {
                        return _this.syncRating();
                    });
                    this.$el.on('click.starrr', 'i', function(e) {
                        return _this.setRating(_this.$el.find('i').index(e.currentTarget) + 1);
                    });
                    this.$el.on('starrr:change', this.options.change);
                }

                Starrr.prototype.createStars = function() {
                    var _i, _ref, _results;

                    _results = [];
                    for (_i = 1, _ref = this.options.numStars; 1 <= _ref ? _i <= _ref : _i >= _ref; 1 <= _ref ? _i++ : _i--) {
                        _results.push(this.$el.append("<i class='fa fa-star-o'></i>"));
                    }
                    return _results;
                };

                Starrr.prototype.setRating = function(rating) {
                    if (this.options.rating === rating) {
                        rating = void 0;
                    }
                    this.options.rating = rating;
                    this.syncRating();
                    return this.$el.trigger('starrr:change', rating);
                };

                Starrr.prototype.syncRating = function(rating) {
                    var i, _i, _j, _ref;

                    rating || (rating = this.options.rating);
                    if (rating) {
                        for (i = _i = 0, _ref = rating - 1; 0 <= _ref ? _i <= _ref : _i >= _ref; i = 0 <= _ref ? ++_i : --_i) {
                            this.$el.find('i').eq(i).removeClass('fa-star-o').addClass('fa-star');
                        }
                    }
                    if (rating && rating < 5) {
                        for (i = _j = rating; rating <= 4 ? _j <= 4 : _j >= 4; i = rating <= 4 ? ++_j : --_j) {
                            this.$el.find('i').eq(i).removeClass('fa-star').addClass('fa-star-o');
                        }
                    }
                    if (!rating) {
                        return this.$el.find('i').removeClass('fa-star').addClass('fa-star-o');
                    }
                };

                return Starrr;

            })();
            return $.fn.extend({
                starrr: function() {
                    var args, option;

                    option = arguments[0], args = 2 <= arguments.length ? __slice.call(arguments, 1) : [];
                    return this.each(function() {
                        var data;

                        data = $(this).data('star-rating');
                        if (!data) {
                            $(this).data('star-rating', (data = new Starrr($(this), option)));
                        }
                        if (typeof option === 'string') {
                            return data[option].apply(data, args);
                        }
                    });
                }
            });
        })(window.jQuery, window);

        $(function() {
            return $(".starrr").starrr();
        });

        $( document ).ready(function() {

            $('#stars').on('starrr:change', function(e, value){
                $('#count').val(value);
            });

            $('#stars-existing').on('starrr:change', function(e, value){
                $('#count-existing').html(value);
            });
        });
    </script>
@endsection