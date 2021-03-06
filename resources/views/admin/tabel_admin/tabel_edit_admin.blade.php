<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Edit Administrator</title>

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
            
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @foreach($tamp as $data)

            <form action="{{ url('updateAdmin/'.$data->kode_admin) }}" method="post">
            {{ csrf_field() }}

              <h1>Edit Account</h1>
              <div class="form-group">
                <input type="text" class="form-control" autocomplete="on" autofocus="" placeholder="Nama Admin" required="" name="nama" value="{{$data->nama_admin}}" />
              </div>

              <div class="form-group">
                <input type="email" class="form-control" autocomplete="on" autofocus="" placeholder="Email" required="" name="email" value="{{$data->email}}"/>
              </div>
              <div class="form-group">
                <input type="password" class="form-control" placeholder="Kata Sandi" required="" autocomplete="on" name="password" value="{{$data->password}}" />
              </div>              
              <div class="form-group">
                <input type="password" class="form-control" placeholder="Konfirmasi Kata Sandi" required="" autocomplete="on" name="confirmation" value="{{$data->password}}" />
              </div>

              <div class="form-group">
                    <button type="submit" class="btn btn-md btn-primary">Submit</button>
                    <button type="reset" class="btn btn-md btn-danger">Reset</button>
                </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="{{url('tabel_admin')}}" class="to_register"> Submit </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i><img src="/asset/production/images/poto.png" width="10%" height="10%"></i> E - Academic</h1>
                  <p>??2019 All Rights Reserved</p>
                </div>
              </div>
            </form>

            @endforeach
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
