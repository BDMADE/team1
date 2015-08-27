@extends('vendor/flatAdmin/layout/mail')
@section('custom_css')
<!--dynamic table-->
<!--<link href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.9.4/css/demo_page.min.css" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.9.4/css/demo_table.min.css" rel="stylesheet" />
<!--<link href="{{asset('AdminBox/FlatAdmin/assets/dt_bootstrap/dataTable.css')}}" rel="stylesheet" />-->
<link rel="stylesheet" href="http://davidwalsh.name/demo/harvesthq-chosen-12a7a11/chosen/chosen.css" />


@stop

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.9.4/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="{{asset('AdminBox/FlatAdmin/assets/dt_bootstrap/DT_bootstrap.js')}}" type="text/javascript"></script>
<script src="http://davidwalsh.name/demo/harvesthq-chosen-12a7a11/chosen/chosen.jquery.js"></script>
@stop
@section('content')
<!--main content start-->

<!--mail inbox start-->
<div class="mail-box">
    <aside class="sm-side">
        <div class="user-head">
            <a href="javascript:;" class="inbox-avatar">
                <img src="{{asset('AdminBox/flatAdmin/img/mail-avatar.jpg')}}" alt="">
            </a>
            <div class="user-name">
                <h5><a href="#">Jonathan Smith</a></h5>
                <span><a href="#">tanbir2025@gmail.com</a></span>
            </div>

        </div>

        <div class="inbox-body">
            <a class="btn btn-compose" data-toggle="modal" href="#myModal">
                Compose
            </a>
            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Compose</h4>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal" role="form" method="post" action="{{action('MailController@compose')}}">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                                <div class="form-group">
                                    <label  class="col-lg-2 control-label">To</label>
                                    <div class="col-lg-10">
                                        <select class="chosen" name="messageTo[]" multiple="true" style="width:470px;" required="">
                                          @foreach($members as $member)
                                          @if($id!=($member->id))                                          
                                            <option selected="selected" value="{{$member->id}}">{{$member->first_name}}{{'&nbsp;'}}{{$member->last_name}}</option>
                                          @endif
                                        @endforeach
                                    </select>
                                    </div>
                                </div>
                                

                                <div class="form-group">
                                    
                                </div>
                                

                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Subject</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" name="subject" id="inputPassword1" placeholder="" required="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Message</label>
                                    <div class="col-lg-10">
                                        <textarea name="message" id="" class="form-control" cols="30" rows="10" required=""></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">

                                        <input type="submit" class="btn btn-send" value="Send"/>
                                        <a class="btn btn-info" href="#">Draft</a>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        </div>
        <ul class="inbox-nav inbox-divider">
            <li class="active">
                <a href="#"><i class="fa fa-inbox"></i> Inbox <span class="label label-danger pull-right">2</span></a>

            </li>
            <li>
                <a href="#"><i class="fa fa-envelope-o"></i> Sent Mail</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-bookmark-o"></i> Important</a>
            </li>
            <li>
                <a href="#"><i class=" fa fa-external-link"></i> Drafts <span class="label label-info pull-right">30</span></a>
            </li>

        </ul>

    </aside>
    <aside class="lg-side">
        <div class="inbox-head">
            <h3>Message Box</h3>
        </div>
        <div class="inbox-body">
            <table class="table table-inbox table-hover" data-provide="datatable"  data-info="true" data-display-rows="5" data-paginate="true">
                <thead>
                    <tr>

                        <th class="col-md-3"  data-filterable="true">From</th>
                        <th class="col-md-4"  data-filterable="true">Subject</th>
                        <th class="col-md-2"  data-filterable="true">Date</th>
                        <th class="col-md-3"  data-filterable="false">Action</th>



                    </tr>
                </thead>

                <tbody>
                    <tr class="unread">

                        <td class="inbox-small-cells"><a href="#"><i class="fa fa-star"></i></a>&nbsp;&nbsp;&nbsp;Shafiul Hasan </td>
                        <td class="view-message  dont-show">Vector Lab</td>
                        <td class="view-message ">Aug 25 8:30 pm</td>
                        <td class="view-message  text-right">
                            <a href="#" class="btn btn-sm btn-send">Read</a>   
                        </td>
                    </tr>

                    <tr class="">

                        <td class="inbox-small-cells"><a href="#"><i class="fa fa-star"></i></a>&nbsp;&nbsp;&nbsp;Tanbir Hasan </td>
                        <td class="view-message  dont-show">Vector Lab</td>
                        <td class="view-message ">Aug 25 8:30 pm</td>
                        <td class="view-message  text-right">
                            <a href="#" class="btn btn-sm btn-send">Read</a>   
                        </td>
                    </tr>

                    <tr class="">

                        <td class="inbox-small-cells"><a href="#"><i class="fa fa-star"></i></a>&nbsp;&nbsp;&nbsp;Ziaul Hasan </td>
                        <td class="view-message  dont-show">Vector Lab</td>
                        <td class="view-message ">Aug 25 8:30 pm</td>
                        <td class="view-message  text-right">
                            <a href="#" class="btn btn-sm btn-send">Read</a>   
                        </td>
                    </tr>



                </tbody>
            </table>
        </div>
    </aside>
</div>
<!--mail inbox end-->

<!--main content end-->

@stop

@section('custom_js')

<script src="{{asset('AdminBox/FlatAdmin/assets/dt_bootstrap/data.js')}}" type="text/javascript"></script>
<script>
jQuery(document).ready(function () {
    jQuery(".chosen").data("placeholder", "Select Person...").chosen();
});
</script>
@stop