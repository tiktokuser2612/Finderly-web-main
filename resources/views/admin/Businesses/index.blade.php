 @include('admin/common/header')
 <style>
  .pagination-custom .w-5.h-5{
    width: 100px;
  }
  .sm\:hidden{
    display: none
    ;
  }
</style>

<style type="text/css">
  input:checked + .slider {
  background-color: #2196F3;
}
input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}
input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
} 
 </style>

 <div class="content-wrapper">
            <div class="container-fluid py-4">
                <div class="row">
                    <div class="col-12">
                        <div class="card mb-3">
                            <div class="header-area">
                                <h4 class="font-weight-bolder mb-0">Businesses</h4>
                                <a href="{{url('Businesses/add')}}" class="btn  bg-gradient-primary"> Add Business</a>
                              </div>
                        </div>
                      <div class="card mb-4">
                        <div class="card-body px-0 pt-0 pb-2">
                          <div class="table-responsive p-0">
                            <table class="table align-items-center justify-content-center mb-0">
                              <thead>
                                <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Id</th>
                                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Business name</th>
                                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">icon</th>
                                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Phone Number</th>
                                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Action</th>    
                                </tr>
                              </thead>
                              <tbody>
                            @php
                            $id = 1
                            @endphp
                          @foreach ($business as $row)  
                          <tr>
                          <td>
                          <h6 class="mb-0 text-sm px-3">{{$row->id}}</h6>
                          </td>
                          <td>
                          <h6 class="mb-0 text-sm">{{$row->business_name}}</h6>
                          </td>
                          <td>
                          <img src="{{url('storage/app/public/businessImage/img/'.$row->image)}}" class="img-fluid" style="height:40px; width:40px; border-radius:50%;">
                          </td>
                          <td>
                          <h6 class="mb-0 text-sm">{{$row->phone_number}}</h6>
                          </td>
                          @php $prodID = Crypt::encrypt($row->id);
                          @endphp
                          <td class="d-flex align-items-center">
                          <a class="delete-confirm btn btn-sm bg-gradient-danger mb-0 me-2" href="{{url('Business/delete/'.$prodID)}}">
                          <i class="far fa-trash-alt me-2" aria-hidden="true"></i> Delete
                          </a>
                          <a class="btn btn-sm bg-gradient-success mb-0 me-2" href="{{url('Businesses/edit'.$prodID)}}">
                          <i class="fa fa-pencil me-2" aria-hidden="true"></i>Edit
                          </a>
                          </td>     
                          </tr>                       
                          </tr>
                          @endforeach
                          </tbody>
                          </table>
                          <div class="pagination-custom">
                            <?php echo $business->links(); ?>
                           </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
        </div>
   @include('admin/common/footer')