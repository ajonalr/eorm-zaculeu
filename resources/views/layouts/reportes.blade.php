<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!-- Tell the browser to be responsive to screen width -->
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="robots" content="noindex,nofollow">
   <title>{{config('app.name')}}</title>
   <link rel="stylesheet" href="{{asset('plugins/bootstrap/bootstrap.min.css')}}">
   @yield('styles')
</head>

<body>



   <div class="container">
      <div class="row">
         <div class="col">
            @include('partial.alert')
         </div>
      </div>
   </div>

   @yield('content')



   <script src="{{asset('plugins/bootstrap/jquery.min.js')}}"></script>
   <script src="{{asset('plugins/bootstrap/popper.min.js')}}"></script>
   <script src="{{asset('plugins/bootstrap/bootstrap.min.js')}}"></script>

   @yield('scripts')

</body>

</html>