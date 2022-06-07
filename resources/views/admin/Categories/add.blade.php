 @include('admin/common/header')
<div class="content-wrapper">
            <div class="container-fluid py-4">
                <div class="row justify-content-center">
                    <div class="col-12 col-xl-8">
                        <div class="card mb-3">
                            <div class="header-area">
                                <h4 class="font-weight-bolder mb-0">Add category</h4>
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
                            <form role="form " action="{{url('Categories/store')}}" method="post" enctype="multipart/form-data">
                                @csrf     
                        <label>Name</label>
                        <div class="mb-3">
                            <input type="text" name="name" class="form-control" placeholder="Category name" aria-label="Name" value="{{old('name')}}">
                               @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                         @endif  
                        </div>

                        <label>Icon</label>
                        <div class="mb-3">
                            <input class="form-control" name="icon" type="file" id="formFile">
                                 @if ($errors->has('icon'))
                            <span class="text-danger">{{ $errors->first('icon') }}</span>
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

  <script> 
    

@include('admin/common/footer')