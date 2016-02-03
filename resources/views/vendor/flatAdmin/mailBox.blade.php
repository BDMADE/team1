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
<?php use App\Http\Controllers\HelperController;
use App\Author;
use App\Member;
?>
<!--main content start-->

<!--mail inbox start-->
<div class="mail-box">
    <aside class="sm-side">
        <div class="user-head">
            <a href="javascript:;" class="inbox-avatar">
                <img src="{{asset('AdminBox/flatAdmin/img/mail-avatar.jpg')}}" alt="">
            </a>
            <div class="user-name">
                <h5><a href="#">{{$author->first_name}}{{'&nbsp;'}}{{$author->last_name}}</a></h5>
                <span><a href="#">{{$author->email}}</a></span>
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
                <a href="{{action('MailController@index')}}"><i class="fa fa-inbox"></i> Inbox <span class="label label-danger pull-right">{{$unread}}</span></a>

            </li>
            <li>
                <a href="{{action('MailController@mailSendAll')}}"><i class="fa fa-envelope-o"></i> Sent Mail</a>
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
                        <th class="col-md-5"  data-filterable="true">Subject</th>
                        <th class="col-md-3"  data-filterable="true">Date</th>
                        <th class="col-md-1"  data-filterable="false">Action</th>



                    </tr>
                </thead>

                <tbody>
                    @foreach($inboxes as $inbox)

                    @if($inbox->mail_read)
                    <tr>
                    @else
                    <tr class="unread">

                        @endif
                        <td class="inbox-small-cells"><a href="#">
                                
                                
                                <i class="fa fa-star inbox-started"></i>
                            
                            
                            </a>
                            
                            
                            
                            &nbsp;&nbsp;&nbsp;
                        <?php $message_id=$inbox->message_id;$sender=Author::find($message_id)->mail_author;$fname=Member::find($sender)->first_name;$lname=Member::find($sender)->last_name;?>
                        {{$fname}}
                        
                        </td>
                        <td class="view-message  dont-show">{{$inbox->message->subject}}</td>
                        <td class="view-message ">{{HelperController::convertTimeWithAMPM($inbox->created_at)}}</td>
                        <td class="view-message  text-right">
                            <a data-toggle="modal" href="{{action('MailController@read',$inbox->message->id)}}" class="btn btn-sm btn-send">Read</a>   
                        </td>
                    </tr>
                    
                   
                    
                    

                    @endforeach



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