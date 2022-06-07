<!DOCTYPE html>
<html lang="en">

@php
 $admin = Auth::guard('admin')->user();
 @endphp
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
  <!---my css---->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

</head>

<body class="g-sidenav-show  bg-gray-100">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 " id="sidenav-main">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
       <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="{{url('Dashboard')}}" target="_blank">
          <img src="{{url('/public/assets/img/logo.svg')}}" class="navbar-brand-img h-100" alt="main_logo">
        </a>
      </div>
        @php
            $url = \Route::current()->uri;
          @endphp
      <hr class="horizontal dark mt-0">
      <ul class="navbar-nav">
        <li class="nav-item ">
          <a class="nav-link  {{ ('Dashboard' == $url) ? 'active' : ''}}" href="{{url('Dashboard')}}">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-dashboard cursor-pointer" aria-hidden="true"></i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
          

        </li>
        <li class="nav-item">
          <a class="nav-link {{ ('User' == $url) ? 'active' : ''}}  || {{ ('User/edit/{id}' == $url) ? 'active' : ''}} || {{('User/add' == $url) ? 'active' : ''}}" href="{{url('User')}}">

            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-users cursor-pointer" aria-hidden="true"></i>
            </div>
            <span class="nav-link-text ms-1">Users</span>
          </a>
        </li>
       

        <li class="nav-item">
          <a class="nav-link {{ ('Businesses' == $url) ? 'active' : ''}} || {{('Businesses/edit{id}' == $url) ? 'active' : ''}} || {{('Businesses/add' == $url) ? 'active' : ''}}" href="{{url('Businesses')}}">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-suitcase cursor-pointer" aria-hidden="true"></i>
            </div>
            <span class="nav-link-text ms-1">Businesses</span>
          </a>
        </li>
        <li class="nav-item">
           <a class="nav-link {{ ('Categories' == $url) ? 'active' : ''}}  || {{ ('Categories/edit/{id}' == $url) ? 'active' : ''}} || {{('Categories/add' == $url) ? 'active' : ''}}" href="{{url('Categories')}}">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-bars cursor-pointer" aria-hidden="true"></i>
            </div>
            <span class="nav-link-text ms-1">Categories</span>
          </a>
        </li>
        <li class="nav-item">
       <a class="nav-link {{ ('Specializations' == $url) ? 'active' : ''}} || {{('Specializations/add' == $url) ? 'active' : ''}} || {{ ('Specializations/edit/{id}' == $url) ? 'active' : ''}}" href="{{url('Specializations')}}">

            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-american-sign-language-interpreting cursor-pointer" aria-hidden="true"></i>
            </div>
            <span class="nav-link-text ms-1">Specializations</span>
          </a>
        </li>
        <li class="nav-item">
         <a class="nav-link {{ ('Banners' == $url) ? 'active' : ''}} || {{('Banners/add' == $url) ? 'active' : ''}} || {{ ('Banners/edit/{id}' == $url) ? 'active' : ''}}" href="{{url('Banners')}}">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-sliders cursor-pointer" aria-hidden="true"></i>
            </div>
            <span class="nav-link-text ms-1">Banners</span>
          </a>
        </li>
        <li class="nav-item">
             <a class="nav-link {{ ('Profile/Edit-profile' == $url) ? 'active' : ''}} || {{ ('Profile/Password-reset' == $url) ? 'active' : ''}}" href="{{url('Profile/Edit-profile')}}">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-user cursor-pointer" aria-hidden="true"></i>
            </div>
            <span class="nav-link-text ms-1">Profile</span>
          </a>
        </li>
      </ul>
    </div>
  </aside>
  <main class="main-content mt-1 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-0">
        <nav aria-label="breadcrumb">
          <h3 class="font-weight-bolder mb-0"></h3>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
          </div>
          <ul class="navbar-nav ms-md-auto  justify-content-end">
            
            <li class="nav-item dropdown pe-2 d-flex align-items-center ">
              <a href="javascript:;" class="nav-link text-body  icon-lg profile shadow border-radius-md w-100 bg-white" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="profile-img">
                  <img src="{{url('/storage/app/public/User/img/'.$admin->image)}}" alt="profile" class="img-fluid" style="height:40px; width:40px; border-radius:40px;">
                </div>
              
                <span class="d-sm-inline d-none">{{$admin->first_name}} {{$admin->last_name}}</span>
              </a>
              <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                <li>
                  <a class="dropdown-item border-radius-md" href="{{url('Profile/Edit-profile')}}">
                    <div class="d-flex py-1">
                      <div class="avatar avatar-sm bg-gradient3  me-3 my-auto">
                        <i class="fa fa-user"></i>
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          Profile
                        </h6>
                      </div>
                    </div>
                  </a>
                </li>
                <li>
                  <a class="dropdown-item border-radius-md" href="{{url('admin/logout')}}">
                    <div class="d-flex py-1">
                      <div class="avatar avatar-sm bg-gradient-danger  me-3  my-auto">
                        <i class="fa fa-power-off"></i>
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          Logout
                        </h6>
                      </div>
                    </div>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item dropdown pe-2 d-flex align-items-center ">
              <a href="javascript:;" class="nav-link text-body icon-lg notification shadow border-radius-md bg-white" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-bell cursor-pointer"></i>
              </a>
              <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                <li class="mb-2">
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="my-auto">
                        <img src="{{url('/public/assets/img/team-2.jpg')}}" class="avatar avatar-sm  me-3 ">
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          <span class="font-weight-bold">New message</span> from Laur
                        </h6>
                        <p class="text-xs text-secondary mb-0">
                          <i class="fa fa-clock me-1"></i>
                          13 minutes ago
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
                <li class="mb-2">
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="my-auto">
                        <img src="{{url('/public/assets/img/small-logos/logo-spotify.svg')}}" class="avatar avatar-sm bg-gradient-dark  me-3 ">
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          <span class="font-weight-bold">New album</span> by Travis Scott
                        </h6>
                        <p class="text-xs text-secondary mb-0">
                          <i class="fa fa-clock me-1"></i>
                          1 day
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
                <li>
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="avatar avatar-sm bg-gradient-secondary  me-3  my-auto">
                        <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                          <title>credit-card</title>
                          <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                              <g transform="translate(1716.000000, 291.000000)">
                                <g transform="translate(453.000000, 454.000000)">
                                  <path class="color-background" d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z" opacity="0.593633743"></path>
                                  <path class="color-background" d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z"></path>
                                </g>
                              </g>
                            </g>
                          </g>
                        </svg>
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          Payment successfully completed
                        </h6>
                        <p class="text-xs text-secondary mb-0">
                          <i class="fa fa-clock me-1"></i>
                          2 days
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center shadow border-radius-md bg-white text-body icon-lg">
              <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  
