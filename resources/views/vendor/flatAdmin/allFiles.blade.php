@extends('vendor/flatAdmin/layout/main')
@section('custom_css')
<!--dynamic table-->
    <!--<link href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.9.4/css/demo_page.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.9.4/css/demo_table.min.css" rel="stylesheet" />
    <!--<link href="{{asset('AdminBox/FlatAdmin/assets/dt_bootstrap/dataTable.css')}}" rel="stylesheet" />-->
@stop



@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.9.4/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="{{asset('AdminBox/FlatAdmin/assets/dt_bootstrap/DT_bootstrap.js')}}" type="text/javascript"></script>
@stop


@section('breadcumb')
<i class="fa fa-file-o"></i> Files <i class="fa fa-angle-double-right"></i> <label class="label blue">All Files</label>
@stop
@section('content')
     <div class="row">
        <div class="col-md-12">
<section class="panel">
              <header class="panel-heading">
                  Files Table
             <span class="tools pull-right">
                <a href="javascript:;" class="fa fa-chevron-down"></a>
                
             </span>
              </header>
              <div class="panel-body">
              <div class="adv-table">
<table class="table table-responsive table-striped table-bordered" data-provide="datatable"  data-info="true" data-display-rows="100" data-paginate="true" >
    <thead>
    <tr>
       
        <th  class="col-md-3" data-filterable="true">File name</th>
        <th  class="col-md-2" data-filterable="true">Type</th>
        <th  class="col-md-2" data-filterable="true">Author</th>
        <th  class="col-md-3" data-filterable="true">Uploaded at</th>
        <th  class="col-md-2" data-filterable="false">Download</th>
        
        
    </tr>
    </thead>
    <tbody>

        @foreach($files as $file)
    <tr>
        
        <td class="col-md-3">{{$file->file_name}}</td>
        <td class="col-md-2">{{$file->extenstions}}</td>
        <td class="col-md-2">{{$file->members}}</td>
        <td class="col-md-2">{{$file->created_at}}</td>
        <td class="col-md-2">
            
            <a href="#" class="btn btn-block btn-round btn-success"  target="_blank"><i class="fa fa-download fa-2x"></i></a>
            
        </td>
        
        
        
    </tr>
    
      @endforeach
        
         </tbody>
</table>
</div>
     </div>
</section>
        </div>
     </div>

@stop

@section('custom_js')

<script src="{{asset('AdminBox/FlatAdmin/assets/dt_bootstrap/data.js')}}" type="text/javascript"></script>
@stop