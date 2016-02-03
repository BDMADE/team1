@extends('vendor/flatAdmin/layout/main')
@section('custom_css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet" />
<style>.dropzone .dz-message { font-weight: 700;font-size: 25px; }.dropzone .dz-message .note { font-size: 0.8em; font-weight: 200; display: block; margin-top: 1.4rem; }
</style>
@stop

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.js" type="text/javascript"></script>
@stop


@section('breadcumb')
<i class="fa fa-file"></i> Files <i class="fa fa-angle-double-right"></i> <label class="label blue">Add New File</label>
@stop
@section('content')

              <!-- page start-->
              <section class="panel">
                  <header class="panel-heading">
                      Multiple File Upload System
                  </header>
                  <div class="panel-body">
                      
                          <form method="POST" action="{{action('FileController@create')}}" accept-charset="UTF-8" id="createBook" enctype="multipart/form-data">
                             <input type="hidden" name="_token" value="{{ csrf_token() }}"/>                     
                             <div class="dropzone" id="dropzoneFileUpload">
                                <div class="dz-message">
    Drop files here or click to upload.<br />
    <span class="note">(Selected <strong>files</strong> are actually uploaded in your folder)</span>
  </div> 
                             </div>
                              <!--<div class="form-group">
                                <label>Add Book Image</label>
                                <input type="file" name="file_img" class="" id="file_img"/>
                              </div>
<input type="submit" name='save' class="btn btn-success" value="Submit" id="save"/>-->
                      </form>
                  </div>
              </section>
              <!-- page end-->
          
      
@stop

@section('custom_js')
<script type="text/javascript">
            var baseUrl = "{{ url('/') }}";
            var token = "{{ Session::getToken() }}";
            Dropzone.autoDiscover = false;
             var myDropzone = new Dropzone("div#dropzoneFileUpload", {
                 url: baseUrl+"/file/add",
                 paramName: "file",
                 maxFilesize: 200, // MB
                 addRemoveLinks: false,
                                
                 accept: function(file, done) {
                           return done();
                                 },
                 
                  params: {
                    _token: token
                  }
             });
             
             
             
             
             
            /* this.on("removedfile", function(file) {
                alert(file.name);

                $.ajax({
                url: baseUrl+"/file/delete",
                type: "POST",
                data: { 'name': file.name}
                    });


});
       */      
         </script>

@stop