@include('admin/Profile/index')

  
 <div class="container-fluid py-4">
            <div class="row justify-content-center">
              <div class="col-12 col-xl-8">
                <div class="content">
                  <div class="card h-100  " id="edit-profile"  aria-labelledby="edit-profile">
                    <div class="card-header pb-0 p-4">
                      <h6 class="mb-0">Personal Info</h6>
                    </div>
                       @if(Session::has('success'))
                    <div class="alert alert-succes s">
                    {{ Session::get('success') }}
                   @php
                     Session::forget('success');
                    @endphp
                    </div>
                    @endif
                    <div class="card-body p-4">
                      <form role="form" action="{{url('Profile/Edit-profile')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="d-flex align-items-center mb-30">
                            <div class="avatar-upload">
                                <div class="avatar-edit">
                                    <input type='file' name="image" id="imageUpload" accept=".png, .jpg, .jpeg"   />
                                    <label for="imageUpload"></label>
                                </div>
                                <div class="avatar-preview">

                                  <div id="imagePreview" style="background-image: url({{url('/storage/app/public/User/img/'.$activeData->image)}});">
                                      </div>

                                   
                                </div>
                            </div>
                        </div>
                        <label>First name</label>
                        <div class="mb-3">
                          <input type="text" name="first_name" class="form-control" placeholder="Alec Thompson" aria-label="Name" value="{{$activeData->first_name}}" >
                              @if ($errors->has('first_name'))
                    <span class="text-danger">{{ $errors->first('first_name') }}</span>
                @endif
                      
                        </div>

                        <label>Last name</label>
                        <div class="mb-3">
                          <input type="text" name="last_name"class="form-control" placeholder="Alec Thompson" aria-label="Name"  value="{{$activeData->last_name}}" >
                             @if ($errors->has('last_name'))
                    <span class="text-danger">{{ $errors->first('last_name') }}</span>
                @endif
                        </div>

                        <label>Email Address</label>
                        <div class="mb-3">
                          <input type="email" name="email" class="form-control" placeholder="alec@gmail.com" aria-label="email" value="{{$activeData->email}}" >
                               @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
                        </div>
                        <div class="text-center">
                          <button  type="submit" class="btn btn-lg bg-gradient-info mt-2 mb-0">Save</button>
                        </div>
                      </form>
                    </div>
                  </div>                 
                </div>
              </div>
            </div>
          </div>
          @include('admin/common/footer')