<!-- check for flash notifications message -->
@if(Session::has('notice'))
<div class="alert alert-warning fade in">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    {{ Session::get('notice') }}
</div>
@endif


@if(Session::has('delete_notice'))
<div class="alert  alert-danger fade in">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    {{ Session::get('delete_notice') }}
</div>
@endif


@if(Session::has('update_notice'))
<div class="alert  alert-info fade in">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    {{ Session::get('update_notice') }}
</div>
@endif


@if(Session::has('success_notice'))
<div class="alert  alert-success fade in">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    {{ Session::get('success_notice') }}
</div>
@endif


@if(Session::has('error_notice'))
<div class="alert pink fade in">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    {{ Session::get('error_notice') }}
</div>
@endif