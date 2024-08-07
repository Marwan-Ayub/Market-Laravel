<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <title>Market</title>
</head>

<body>
    @auth
    <div class="d-flex" id="wrapper">

        <!-- Sidebar -->
        <div class="bg-light border-right" id="sidebar-wrapper">
            <div class="sidebar-heading ml-4"><img src="{{asset('assets/img/shop.png')}}" width="50px"><span
                    class="ml-3">Market</span> </div>
            <div class="list-group  list-group-flush">
                @foreach ($sidebar as $item)
                <a href=" {{Str::lower(str_replace(' ','',$item->name))}} " style="position: relative; left:0px;"
                    class=" btn btn-success m-3 radius-20">

                    <i style="position: absolute; left:0px;" class=" {{$item->icon}} ml-3 "></i>
                    {{$item->name}}
                </a>

                @endforeach
                <form action="logout" method="POST">
                    @csrf
                    <button class=" btn btn-danger w-100  rounded-0 mt-2 mb-2 shadow-none">
                        <i class="ion-log-out" style="position: absolute; left:6px;"></i>
                        Logout</button>
                </form>

            </div>
        </div>


        <!-- Page Content -->
        <div id="page-content-wrapper">

            <nav class="navbar navbar-expand-lg navbar-light bg-light  p-2">
                <button class="btn btn-outline-success radius-20" id="menu-toggle">Toggle Menu</button>

            </nav>

            <div class="container-fluid">
                @endauth

                @yield('content')

                @auth
            </div>


        </div>


    </div>

    @endauth

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script>
        $("#menu-toggle").click(function (e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });

    </script>


</body>

</html>
