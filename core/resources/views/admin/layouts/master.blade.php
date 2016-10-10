<!DOCTYPE html>
<html>

<head>

    @include('genaral.partials._head')

</head>

<body>

@include('genaral.partials._nav')

<div class="container">
    <div class="row">
        <div class="col-sm-3">

            @include('admin.partials._sidebar')

        </div><!--/col-md-4-->

        <div class="col-sm-9">

            @yield('content')

        </div><!--/col-md-8-->
    </div> <!--/*row*/-->
</div><!--/container-->

<footer>

    @include('genaral.partials._footer')

</footer>

@include('genaral.partials._js')

</body>

</html>