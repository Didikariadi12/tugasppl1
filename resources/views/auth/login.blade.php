<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login User</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <link rel="stylesheet" href="style.css">

</head>
<body>
    <div class="container"><br>
        <div class="col-md-4 col-md-offset-4" style="margin-top: 20%">
            <h2 class="logindanregister text-center"> <b> FORM LOGIN USER </b></h3>
            <hr>
            @if(session('error'))
            <div class="alert alert-danger">
                <b>{{session('error')}}
            </div>
            @endif
            <form action="{{ route('login-user') }}" method="post">
            @csrf
                <div class="form-group">
                    <label class="logindanregister"><i class=" bi bi-person-fill"></i> Nim</label>
                    <input type="text" name="nim" class="form-control" placeholder="Nim" required="">
                </div>
                <div class="form-group">
                    <label class="logindanregister"><i class="bi bi-lock-fill"></i> Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password" required="">
                </div>
                <button type="submit" class="btn button btn-block">Log In</button>
                <hr>
                <p class="logindanregister text-center">Belum punya akun silahkan? <a href="{{ route('register') }}">Register!</a></p>
            </form>
        </div>
    </div>
</body>
</html>