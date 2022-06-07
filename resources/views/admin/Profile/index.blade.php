@include('admin/common/header')
@php
 $admin = Auth::guard('admin')->user();
 @endphp

<style>
.avatar-upload {
  position: relative;
  max-width: 205px;
  margin: 20px 0px;
}
.avatar-upload .avatar-edit {
  position: absolute;
  right: 12px;
  z-index: 1;
  top: 10px;
}
.avatar-upload .avatar-edit input {
  display: none;
}
.avatar-upload .avatar-edit input + label {
  display: inline-block;
  width: 34px;
  height: 34px;
  margin-bottom: 0;
  border-radius: 100%;
  background: #FFFFFF;
  border: 1px solid transparent;
  box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
  cursor: pointer;
  font-weight: normal;
  transition: all 0.2s ease-in-out;
}
.avatar-upload .avatar-edit input + label:hover {
  background: #f1f1f1;
  border-color: #d6d6d6;
}
.avatar-upload .avatar-edit input + label:after {
  content:"\f093";
  font-size: 1.4em;
  font-family: "Font Awesome 5 Free";
  font-weight: 900;
  color: rgb(117, 117, 117);
  position: absolute;
  line-height: 1;
  top: 8px;
  left: 4px;
  right: 0px;
  text-align: center;
  margin: auto;
}
.avatar-upload .avatar-preview {
  width: 150px;
  height: 150px;
  position: relative;
  border-radius: 100%;
  border: 6px solid #F8F8F8;
  box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
}
.avatar-upload .avatar-preview > div {
  width: 100%;
  height: 100%;
  border-radius: 100%;
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center;
}
</style>

        <div class="content-wrapper">
          <div class="container-fluid">
            <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url({{url('/public//assets/img/curved-images/curved0.jpg')}}; background-position-y: 50%;">
              <span class="mask bg-gradient-primary opacity-6"></span>
            </div>
            <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
              <div class="row gx-4">    
              <div class="col-auto">
                  <div class="avatar avatar-xl position-relative">
                    <img src="{{url('/storage/app/public/User/img/'.$admin->image)}}" alt="profile_image" class="w-100 border-radius-lg shadow-sm" style="height:60px; width:60px; ">
                  </div>
                </div>
                <div class="col-auto my-auto">
                  <div class="h-100">
                    <h5 class="mb-1">
                    {{$admin->first_name}} {{$admin->last_name}}
                    </h5>
                    <p class="mb-0 font-weight-bold text-sm">
                    {{$admin->email}}
                    </p>
                  </div>
                </div>
                <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                       @php
                      $url = \Route::current()->uri;
                      @endphp
                  <div class="nav-wrapper position-relative end-0">
                    <ul class="nav nav-pills nav-fill p-1 bg-transparent" >
                      <li class="nav-item">
                        <a class="nav-link  {{ ('Profile/Edit-profile' == $url) ? 'active' : ''}} " href="{{url('Profile/Edit-profile')}}" >
                          Edit profile
                        </a>
                      </li>
                   
                      <li class="nav-item">
                        <a class="nav-link  {{ ('Profile/Password-reset' == $url) ? 'active' : ''}}" href="{{url('Profile/Password-reset')}}" >
                          Reset password
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
    
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    
  
    <!--  @if(Session::has('message'))
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
  @endif -->

     <script>
      function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#imagePreview').css('background-image', 'url('+e.target.result +')');
            $('#imagePreview').hide();
            $('#imagePreview').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
  }
  $("#imageUpload").change(function() {
      readURL(this);
  });
</script>