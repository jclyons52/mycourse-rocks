<li><a class="" data-toggle="modal" data-target="#contact" data-original-title>
        Contact
    </a></li>
<div class="modal fade" id="contact" tabindex="-1" role="dialog" aria-labelledby="contactLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="panel-title" id="contactLabel"><span class="glyphicon glyphicon-info-sign"></span> Any questions? Feel free to contact us.</h4>
            </div>
            <form action="{{route('contact')}}" method="post" accept-charset="utf-8">
                <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                <div class="modal-body" style="padding: 5px;">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6" style="padding-bottom: 10px;">
                            <input class="form-control" name="firstname" placeholder="Firstname" type="text" required autofocus />
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6" style="padding-bottom: 10px;">
                            <input class="form-control" name="lastname" placeholder="Lastname" type="text" required />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12" style="padding-bottom: 10px;">
                            <input class="form-control" name="email" placeholder="E-mail" type="text" required />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12" style="padding-bottom: 10px;">
                            <input class="form-control" name="subject" placeholder="Subject" type="text" required />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <textarea style="resize:vertical;" class="form-control" placeholder="Message..." rows="6" name="comment" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="panel-footer" style="margin-bottom:-14px;">
                    <input type="submit" class="btn btn-success" value="Send"/>
                    <!--<span class="glyphicon glyphicon-ok"></span>-->
                    <input type="reset" class="btn btn-danger" value="Clear" />
                    <!--<span class="glyphicon glyphicon-remove"></span>-->
                    <button style="float: right;" type="button" class="btn btn-default btn-close" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>




@section('styles')
    @parent
    <style>
        .modal-body .list-group {margin-bottom: 0;}
        .margin-bottom-none { margin-bottom: 0; }
        .modal-body .radio label,.modal-body .checkbox label { display:block; }
        .modal-footer {margin-top: 0px;}
        @media screen and (max-width: 325px){
            .btn-close {
                margin-top: 5px;
                width: 100%;
            }
            .btn-results {
                margin-top: 5px;
                width: 100%;
            }
            .btn-vote{
                margin-top: 5px;
                width: 100%;
            }

        }
        .modal-footer .btn+.btn {
            margin-left: 0px;
        }
        .progress {
            margin-right: 10px;
        }
    </style>
@endsection
@section('scripts')
    @parent
    <script>
        $(document).ready(function() {
            var panels = $('.vote-results');
            var panelsButton = $('.dropdown-results');
            panels.hide();

            //Click dropdown
            panelsButton.click(function() {
                //get data-for attribute
                var dataFor = $(this).attr('data-for');
                var idFor = $(dataFor);

                //current button
                var currentButton = $(this);
                idFor.slideToggle(400, function() {
                    //Completed slidetoggle
                    if(idFor.is(':visible'))
                    {
                        currentButton.html('Hide Results');
                    }
                    else
                    {
                        currentButton.html('View Results');
                    }
                })
            });
        });
    </script>
@endsection