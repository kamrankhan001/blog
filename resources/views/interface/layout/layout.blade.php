<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Personal Blog</title>
	<link rel="stylesheet" href="{{asset('fontawesome/css/all.min.css')}}">
	<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">


</head>
<body>

    <div class="container my-5">
        <main class="tm-mai">
            
           @yield('blogs')
           @yield('post')
           @yield('visual')
           @yield('travel')
           @yield('web')
           @yield('videoandaudio')
                     
            <footer class="row">
                <hr class="col-12">
                <div class="col-12 tm-color-gray tm-copyright">
                    Copyright 2021 Kamran Khan.
                </div>
            </footer>
        </main>
    </div>
    
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/script.js')}}"></script>
</body>
</html>