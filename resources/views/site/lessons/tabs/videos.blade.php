{{--<vue-videos>--}}
<div class="row">
    <!-- Nav tabs -->
    <ul class="pagination pagination-sm" role="tablist">
        <?php $count = 0; ?>
        @foreach($videos as $index => $link)
            <li role="presentation" class="{{($count == 0 ? 'active' : null )}}">
                <a href="#iframe-link-panel{{$index}}" aria-controls="iframe-link-panel{{$index}}" role="tab" data-toggle="tab">{{$count}}</a>
            </li>
            <?php $count++ ?>
        @endforeach
    </ul>
</div>
<div class="row">
    {{--<div class="col-xs-1">--}}
        {{--<div class="row">--}}
            {{--<i class="glyphicon glyphicon-plus"></i>--}}
        {{--</div>--}}
        {{--<div class="row">--}}
            {{--<div class="range">--}}
                {{--<input--}}
                        {{--v-model="zoom"--}}
                        {{--type="range"--}}
                        {{--name="range"--}}
                        {{--min="1"--}}
                        {{--max="7"--}}
                        {{--v-on:change="changeZoom"--}}
                        {{--orient="vertical">--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="row">--}}
            {{--<i class="glyphicon glyphicon-minus"></i>--}}
        {{--</div>--}}

    {{--</div>--}}

    <div class="col-xs-12">
        <!-- Tab panes -->
        <div class="tab-content">
            <?php $count = 0; ?>
            @foreach($videos as $index => $link)
                <div role="tabpanel" class="tab-pane {{($count == 0 ? 'active' : null )}}" id="iframe-link-panel{{$index}}">
                    <div class="col-sm-12">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="{{$link->iframe}}"></iframe>
                        </div>
                        {{--{!! $link->iframe !!}--}}
                    </div>
                </div>
                <?php $count++ ?>
            @endforeach
        </div>
    </div>
</div>

<nav>
    <ul class="pagination pagination-sm">
    </ul>
</nav>
{{--</vue-videos>--}}
