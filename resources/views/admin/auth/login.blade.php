<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>admin_NgocHa</title>

    <link href="admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="admin/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="admin/css/animate.css" rel="stylesheet">
    <link href="admin/css/style.css" rel="stylesheet">
    <link href="admin/css/customize.css" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="loginColumns animated fadeInDown">
        <div class="row">

            {{-- <div class="col-md-6">
                <h2 class="font-bold">Welcome to NgocHa_Shop</h2>
            </div> --}}
            <div class="col-md-6">
                <div class="ibox-content">
                    <form class="m-t" role="form"method="post" action="{{route('auth.login')}}">
                        @csrf
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <div class="form-group">
                            <input 
                                type="text" 
                                name="email"
                                class="form-control" 
                                placeholder="Username" 
                                value="{{old('email')}}"
                                >
                                @if ($errors->has('email'))
                                    <span class="error-message">
                                        *{{$errors->first('email')}}
                                    </span>
                                @endif
                        </div>
                        <div class="form-group">
                            <input 
                                type="password" 
                                name="password"
                                class="form-control" 
                                placeholder="Password" 
                                >
                                @if ($errors->has('password'))
                                    <span class="error-message">
                                        *{{$errors->first('password')}}
                                    </span>
                                @endif
                        </div>
                        <button type="submit" class="btn btn-primary block full-width m-b">Đăng nhập</button>

                        <a href="#">
                            <small>Quên mật khẩu?</small>
                        </a>
                    </form>
                    <p class="m-t">
                        <small>Đăng nhập để quản lý website</small>
                    </p>
                </div>
            </div>
        </div>
    </div>

</body>

</html>