<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login Orang Tua Wali</title>

    <!-- icon -->
    <link rel="shortcut icon" href="/asset/production/images/poto.png">
    <!-- Bootstrap -->
    <link href="/asset/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="/asset/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="/asset/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="/asset/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="/asset/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            @if(\Session::has('alert'))
                <div class="alert alert-danger">
                    <div>{{Session::get('alert')}}</div>
                </div>
            @endif
            @if(\Session::has('alert-success'))
                <div class="alert alert-success">
                    <div>{{Session::get('alert-success')}}</div>
                </div>
            @endif
            
            <form action="{{ url('/loginPost4') }}" method="post">
            {{ csrf_field() }}
            <img src="/asset/production/images/logo2.png" width="100" height="100" >
              <br><br>
              <h1>Login Orang Tua Wali</h1>
              
              <div>
                <input type="text" class="form-control" placeholder="Email" required="" name="email" autocomplete="off" autofocus="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="NIM" required="" name="nim" />
              </div>
              <div>
                <button type="submit" class="btn btn-default submit" >Log in</button>
              </div>
                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i><img src="/asset/production/images/poto.png" width="10%" height="10%"></i> E - Academic</h1>
                  <p>©2019 All Rights Reserved</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
