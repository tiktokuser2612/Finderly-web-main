 @include('admin/Profile/index')

 <div class="container-fluid py-4">
            <div class="row justify-content-center">
              <div class="col-12 col-xl-8">
                <div class="content">
                  <div class="card h-100  " id="reset-password" aria-labelledby="reset-password">
                    <div class="card-header pb-0 p-4">
                      <h6 class="mb-0">Reset Password</h6>
                    </div>
                       @if(Session::has('success'))
                    <div class="alert alert-success">
                    {{ Session::get('success') }}
                   @php
                     Session::forget('success');
                    @endphp
                    </div>
                    @endif
                    <div class="card-body p-4">
                      <form role="form" action="{{url('Profile/Password-reset')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <label>Old password</label>
                        <div class="mb-3">
                          <input type="password" name="old_password" class="form-control" placeholder="Old password" aria-label="Password" aria-describedby="password-addon">
                            @if ($errors->has('old_password'))
                    <span class="text-danger">{{ $errors->first('old_password') }}</span>
                @endif
                        </div>
                    <label>New password</label>
                        <div class="mb-3">
                          <input type="password" name="new_password"class="form-control" placeholder="New password" aria-label="Password" aria-describedby="password-addon">
                            @if ($errors->has('new_password'))
                    <span class="text-danger">{{ $errors->first('new_password') }}</span>
                    @endif
                        </div>
                          <label>Confirm password</label>
                        <div class="mb-3">
                          <input type="password" name="confirm_password"class="form-control" placeholder="Comfirm password" aria-label="Password" aria-describedby="password-addon">
                            @if ($errors->has('confirm_password'))
                    <span class="text-danger">{{ $errors->first('confirm_password') }}</span>
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