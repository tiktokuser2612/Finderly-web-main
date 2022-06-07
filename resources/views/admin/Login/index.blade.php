<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{url('/public/assets/img/apple-icon.png')}}">
  <link rel="icon" type="image/png" href="{{url('/public/assets/img/favicon.png')}}">
  <title>
    Findirly
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="{{url('/public/assets/css/nucleo-icons.css')}}" rel="stylesheet" />
  <link href="{{url('/public/assets/css/nucleo-svg.css')}}" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="{{url('/public/assets/css/nucleo-svg.css')}}" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="{{url('/public/assets/css/soft-ui-dashboard.css?v=1.0.3')}}" rel="stylesheet" />
<!----my message toastr------>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body class="">
  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-100 bg-gradient-info">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
              <div class="card card-plain">
                <div class="card-header pb-0 text-left bg-transparent">
                  <img src="{{url('/public/assets/img/logo.svg')}}" alt="" width="230" class="mb-3">
                  <h3 class="font-weight-bolder text-gradient text-primary">Welcome back</h3>
                  <p class="mb-0">Enter your email and password to sign in</p>
                </div>
                <div class="card-body">
                  <form role="form" action="{{url('/admin')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <label>Email</label>
                    <div class="mb-3">
                      <input type="email" name="email"class="form-control" placeholder="Email" aria-label="Email" aria-describedby="email-addon">
                       
                    </div>
                    <label>Password</label>
                    <div class="mb-3">
                      <input type="password" name="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="password-addon">
                    </div>
                   
                    <div class="text-center">
                      <button type="submit"class="btn bg-gradient-info w-100 mt-4 mb-0">Login</button> 
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <!--   Core JS Files   -->
  <script src="{{url('/public/assets/js/core/popper.min.js')}}"></script>
  <script src="{{url('/public/assets/js/core/bootstrap.min.js')}}"></script>
  <script src="{{url('/public/assets/js/plugins/perfect-scrollbar.min.js')}}"></script>
  <script src="{{url('/public/assets/js/plugins/smooth-scrollbar.min.js')}}"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->

  <script src="{{url('/public/assets/js/soft-ui-dashboard.min.js?v=1.0.3')}}"></script>

<!---toastr message--->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

  @if(Session::has('message'))
  <script>
    toastr.options.closeButton = true;
    toastr.options.progressBar = true;
    toastr.options.closeDuration = 100;
    toastr.success("{{ session('message') }}");
  </script>
  @endif
  
  @if(Session::has('error'))
  <script>
    toastr.options.closeButton = true;
    toastr.options.progressBar = true;
    toastr.options.closeDuration = 100;
    toastr.error("{{ session('error') }}");
  </script>
  @endif
  
  @if(Session::has('info'))
  <script>
    toastr.options.closeButton = true;
    toastr.options.progressBar = true;
    toastr.options.closeDuration = 100;
    toastr.info("{{ session('info') }}");
  </script>
  @endif
  
  @if(Session::has('warning'))
  <script>
    toastr.options.closeButton = true;
    toastr.options.progressBar = true;
    toastr.options.closeDuration = 100;
    toastr.warning("{{ session('warning') }}");
  </script>
  @endif
</body>
</html>
