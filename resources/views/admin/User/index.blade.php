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

<div class="content-wrapper">
            <div class="container-fluid py-4">
                <div class="row">
                    <div class="col-12">
                        <div class="card mb-3">
                            <div class="header-area">
                                <h4 class="font-weight-bolder mb-0">Users</h4>
                                <a href="{{url('User/add')}}" class="btn  bg-gradient-primary"> Add Users</a>
                            </div>
                        </div>                       
                      <div class="card mb-4">
                        <div class="card-body px-0 pt-0 pb-2">
                          <div class="table-responsive p-0">
                            <table class="table align-items-center justify-content-center mb-0">
                              <thead>
                                <tr>
                                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">id</th>
                                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">User image</th>
                                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Name</th>
                                  <th class="text-uppercase text-secondary text-xxs font-weight-bolde opacity-7 ps-2">Email</th>
                                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Phone Number</th>
                                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Action</th>
                                </tr>
                              </thead>
                              <tbody>
                              @php
                            $id = 1 
                            @endphp
                          @foreach ($users as $row)   
                                <tr>
                                  <td>
                                  <h6 class="mb-0 text-sm px-3">{{$row->id}}</h6>
                                  </td>
                                  <td>
                                 <img src="{{url('/storage/app/public/User/img/'.$row->image)}}" class="img-fluid" alt="user" style="height: 40px; width:40px;  border-radius: 50%;">
                                  </td>
                                  <td>
                                    <h6 class="mb-0 text-sm">{{$row->user_name}}</h6>
                                  </td>
                                  <td>
                                    <h6 class="mb-0 text-sm">{{$row->email}}</h6>
                                  </td>
                                  <td> 
                                    <h6 class="mb-0 text-sm">{{$row->mobile_number}}</h6>
                                  </td> 
                                   @php $prodID= Crypt::encrypt($row->id); 
                                   @endphp
                                  <td class="d-flex align-items-center">
                                      <a class=" delete-confirm btn btn-sm bg-gradient-danger mb-0 me-2" href="{{url('User/delete/'.$prodID)}}">
                                        <i class=" far fa-trash-alt me-2" aria-hidden="true"></i> Delete
                                      </a>
                                    <a class="btn btn-sm bg-gradient-success mb-0 me-2" href="{{url('User/edit/'.$prodID)}}">
                                        <i class="fa fa-pencil me-2" aria-hidden="true"></i> Edit
                                    </a>
                                    <div class=" form-check form-switch ps-0" >
                                        <input class="active form-check-input ms-auto"        type="checkbox" data-id="{{$row->id}}" 
                                        @php if($row->status == '1'){
                                          echo 'checked';
                                        }
                                        @endphp> 
                                 <label class=" form-check-label text-body ms-3 text-truncate w-80 mb-0" ></label>
                                    </div>
                                  </td>
                                </tr>
                               @endforeach
                              </tbody>
                            </table>
                            <div class="pagination-custom">
                            <?php echo $users->links(); ?>
                           </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
        </div>
<script type="text/javascript">
    $('.form-check-input').on('click', function (event) {
    // event.preventDefault();
      var status = $(this).prop('checked') == true ? 1 : 0;  
        var id = $(this).data('id'); 
    swal({
        title: 'Are you sure change Status',
        text: "You won't be able to revert this!",
        icon: 'warning',
        buttons: ["Cancel", "Yes!"],
    }).
    then(function(value) {
        if (value) {
            $.ajax({ 
              type: "POST", 
              dataType: "json", 
              url:"{{url('user/changeStatus')}}", 
              data:{'status': status, 'id': id,  _token: "{{ csrf_token() }}",}, 
              success: function(data){ 
                console.log(data.success) 
                toastr.options.closeButton = true;
                toastr.options.progressBar = true;
                toastr.options.closeDuration = 100;
                toastr.success(data.success);
              } 
          });
        } 
        else{
             window.location.reload();
        }
    });
});

  
</script>

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

@include('admin/common/footer')