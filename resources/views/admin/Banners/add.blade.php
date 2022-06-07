  @include('admin/common/header')
  <div class="content-wrapper">
            <div class="container-fluid py-4">
                <div class="row justify-content-center">
                    <div class="col-12 col-xl-8">
                        <div class="card mb-3">
                            <div class="header-area">
                                <h4 class="font-weight-bolder mb-0">Add Banner</h4>
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
                            <form role="form " action="{{url('Banner/store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <label>Banner </label>
                                <div class="mb-3">
                                    <input class="form-control" name="banner" type="file" >
                            @if ($errors->has('banner'))
                          <span class="text-danger">{{ $errors->first('banner') }}</span>
                           @endif
                                </div>
                                <div class="">
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