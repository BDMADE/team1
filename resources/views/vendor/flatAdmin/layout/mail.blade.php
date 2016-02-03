<!DOCTYPE html>
<html lang="en">
  <head>
    @include('vendor/flatAdmin/layout/meta')
    @include('vendor/flatAdmin/layout/css')
    

    
  </head>

  <body>

  <section id="container" class="">
      <!--header start-->
       @include('vendor/flatAdmin/layout/header')
      <!--header end-->
      <!--Navigation sidebar start-->
      <aside>
          @include('vendor/flatAdmin/layout/sideNav')
      </aside>
      <!--sidebar end-->
      <!--main content start-->
      <section id="main-content">
    <section class="wrapper">
              
              <!-- page start-->
              
              @yield('content')
              <!-- page end-->
         
      <!--main content end-->

    </section>
      </section>
     
  </section>

    @include('vendor/flatAdmin/layout/js')


  </body>
</html>
