 @include('admin/common/header')
 <style>
    .font-red-mint{
      color:red;
    }
    .myDiv{
      display:none;
        padding:10px;
    }  
    .input-style-1 input, .input-style-1 textarea, .input-style-1 select{
      width: 100%;
      background:rgba(239, 239, 239, 0.5);
      border: 1px solid #e5e5e5;
      border-radius: 4px;
      padding: 16px;
      color: #5d657b;
      resize: none;
      transition: all 0.3s;
    }
    .input-style-1 input:focus, .input-style-1 textarea:focus, .input-style-1 select:focus {
      border-color: #4a6cf7;
      background: #fff;
  }
  .input-style-1 select:focus-visible{
      border-color: #4a6cf7;
      background: #fff;
    }
    .lst
    {
      width:100%;
    }
    .input-group .btn {
        position: relative;
        z-index: 2;
        padding: 15px 20px;
        border-radius: 0px 4px 4px 0px;
    }
    .input-group {
        display: flex;
        flex-wrap: inherit;
        align-items: center;
    }
    .input-style-1 .myfrm {
        padding: 13px;
    }
       label#paid-error {
    color: red;
}
</style>
  <div class="content-wrapper">
            <div class="container-fluid py-4">
                <div class="row justify-content-center">
                    <div class="col-12 col-xl-8">
                        <div class="card mb-3">
                            <div class="header-area">
                                <h4 class="font-weight-bolder mb-0">Add business</h4>
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
                        <form role="form" action="{{url('Businesses/store')}} "method="post" enctype="multipart/form-data">
                         @csrf
                        <label>Business name</label>
                        <div class="mb-3">
                        <input type="text" name="business_name" class="form-control" placeholder="Business name" aria-label="Name" value="{{old('business_name')}}">
                        @if ($errors->has('business_name'))
                        <span class="text-danger">{{ $errors->first('business_name') }}</span>
                         @endif
                        </div>
                      <div class="clone hide"></div>
                      <label>Business image</label>
                       <div class="lst">
                        <div class=" input-style-1 input-group hdtuto control-group lst increment" >
                        <input class="form-control"name="business_image[]" type="file" id="formFile" >
                        <div class="input-group-btn">
                        <button type="button" class=" btn btn-success btn bg-gradient-info m-0 .hdtuto"><i class="fa fa-plus .btn-success" aria-hidden="true"></i>
                        </button>
                        </div>
                        </div> 
                        <div class="hdtuto">
                        </div>
                         </div>

                        <label>Phone Number</label>
                        <div class="mb-3">
                        <input type="Number" name="phone_number" class="form-control" placeholder="Phone number" aria-label="Number" aria-describedby="number-addon" value="{{old('phone_number')}}">
                        @if ($errors->has('phone_number'))
                      <span class="text-danger">{{ $errors->first('phone_number') }}</span>
                         @endif
                        </div>
                    <label>Select category</label>
                        <div class="mb-3">
                       <select class="form-select" aria-label="Default select example" name="category_id" >
                        <option selected disabled> select category</option>
                        @foreach($categories as $row)  
                        <option value="{{$row->id}}">{{$row->name}}</option>
                        @endforeach
                       </select>
                        @if ($errors->has('category_id'))
                        <span class="text-danger">{{ $errors->first('category_id')}}</span>
                         @endif
                        </div>
                     <!----Select Specialization--->
                    <label> Select Specialization</label>
                    <div class="mb-3">
                    <select class="form-select "aria-label="Default select example" name="specialization_id[]" multiple="multiple">
                    <option selected disabled>Select Specialization</option>
                    @foreach($Specialization as $row)  
                    <option value="{{$row->id}}">{{$row->name}}</option>
                    @endforeach
                    </select>
                    @if($errors->has('specialization_id'))
                    <span class="text-danger">{{$errors->first('specialization_id')}}</span>
                    @endif
                    </div>
                    <!----start Location---->
                     <div class="form-group">
                   <label>Search Location</label>
                   <input type="text" name="location"  class="form-control" placeholder="Choose Location">
                   @if($errors->has('location'))
                    <span class="text-danger">{{$errors->first('location')}}</span>
                    @endif
                   </div>
                    <!----end Location---->
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
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
      $(".btn-success").click(function(){ 
          //var lsthmtl = $(".clone").html();
          var lsthmtl = '<div class=" input-style-1 control-group lst input-group" style="margin-top:10px"><input type="file" name="image[]" class="myfrm "><div class="input-group-btn"><button class="btn btn-danger my-2" type="button"><i class="mdi mdi-minus"></i></button></div></div>';
          $(".increment").after('<div class="hdtuto">'+lsthmtl+'</div>');       
      });
      $("body").on("click",".btn-danger",function(){ 
          $(this).parents(".hdtuto").remove();
      });
    });
</script>