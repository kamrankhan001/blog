<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('fontawesome/css/all.min.css')}}">
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <title>Personal Blog ! Admin</title>
</head>
<body class="bg-light" style="overflow-x: hidden;">
    <div class="container">
        <div class="py-4 px-2">
            <form action="#" method="POST">
                <div class="row">
                    <div class="col-md-3 col-6">
                        <input type="search" name="search" id="search" placeholder="Search" class="form-control">
                    </div>
                    <div class="col-5">
                        <input type="submit" value="Search" class="btn btn-outline-success">
                    </div>
                </div>
            </form>
        </div>
        @yield('blogs')
        @yield('create')
        @yield('edit')
    </div>

    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('tinymce/tinymce.min.js')}}"></script>
    <script src="{{asset('js/script.js')}}"></script>
</body>
</html>