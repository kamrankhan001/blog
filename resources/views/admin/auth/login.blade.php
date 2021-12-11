<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <title>Admin | Login</title>
</head>
<body>
    <div class="container">
        <div class="row">
          <div class="col-md-6 offset-md-3">
            <div class="card my-5">
              <form method="POST" class="card-body cardbody-color p-lg-5">
                    @csrf
                    <div class="text-center">
                    <img src="https://cdn.pixabay.com/photo/2016/03/31/19/56/avatar-1295397__340.png" class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3"
                        width="200px" alt="profile">
                    </div>
                    <div class="mb-3">
                    <input type="text" class="form-control" id="Username" aria-describedby="emailHelp" placeholder="Email" name="email">
                    @error('email')
                        <div class="my-1 p-2">
                            <span class="alert-danger">{{$message}}</span>
                        </div>
                    @enderror
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                        @error('password')
                            <div class="my-1 p-2">
                                <span class="alert-danger">{{$message}}</span>
                            </div>
                        @enderror
                    </div>
                    <div class="text-center"><button type="submit" class="btn btn-dark px-5 mb-5 w-100">Login</button></div>
              </form>
            </div>
    
          </div>
        </div>
      </div>
</body>
</html>