@include('admin/common/header')

   <div class="content-wrapper">
            <div class="container-fluid py-4">
                <div class="row justify-content-center">
                    <div class="col-12 col-xl-8">
                        <div class="card mb-3">
                            <div class="header-area">
                                <h4 class="font-weight-bolder mb-0">Edit User</h4>
                            </div>
                        </div>
                    @if(Session::has('success'))
                    <div class="alert alert-success">
                    {{ Session::get('success') }}
                    @php
                    Session::forget('success');
                    @endphp
                    </div>
                    @endif
                      <div class="card mb-4">
                        <div class="card-body p-4">
                            <form role="form" action="{{url('User/update')}}" method="post" enctype="multipart/form-data">
                                @csrf
                          <input type="hidden" name="id" value="{{$users->id}}">
                        <label>Name</label>
                        <div class="mb-3">
                            <input type="text" name="user_name" class="form-control" placeholder="Alec Thompson" aria-label="Name" value="{{$users->user_name}}">
                              @if ($errors->has('user_name'))
                            <span class="text-danger">{{ $errors->first('user_name') }}</span>
                         @endif
                        </div>
                        <label>Image</label>
                        <div class="mb-3">
                            <input class="form-control" name="image" type="file" id="formFile"  class="img-fluid"> 
                            @if ($errors->has('image'))
                            <span class="text-danger">{{ $errors->first('image') }}</span>
                         @endif
                          <img src="{{url('/storage/app/public/User/img/'.$users->image)}}" class="img-fluid" style="height: 40px; width:40px;  border-radius: 50%;">
                        </div>
                        <label>Email</label>
                        <div class="mb-3">
                          <input type="email" name="email" class="form-control" placeholder="Email address" aria-label="Email" aria-describedby="Email-addon" value="{{$users->email}}">
                            @if ($errors->has('email'))
                         <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                        </div>
                        <label>Phone Number</label>
                        <div class="mb-3">
                          <input type="mobile_number" name="mobile_number"class="form-control" placeholder="Phone number"  aria-label="Number" aria-describedby="number-addon"  value="{{$users->mobile_number}}">
                            @if ($errors->has('mobile_number'))
                            <span class="text-danger">{{ $errors->first('mobile_number') }}</span>
                         @endif
                        </div>
                       <div class="text-center">
                          <button type="submit" class="btn btn-lg bg-gradient-info mt-2 mb-0">Save</button>
                        </div>
                      </form>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
        </div>
@include('admin/common/footer')