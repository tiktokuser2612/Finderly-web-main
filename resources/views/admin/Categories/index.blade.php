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
                                <h4 class="font-weight-bolder mb-0">Categories</h4>
                                <a href="{{url('Categories/add')}}" class="btn  bg-gradient-primary"> Add category</a>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-body px-0 pt-0 pb-2">
                                <div class="table-responsive p-0">
                                    <table class="table align-items-center justify-content-center mb-0">
                                        <thead>
                                            <tr>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Id</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                    Name</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                    icon</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                    Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                         @php
                                         $id = 1
                                         @endphp
                                         @foreach($categorie as $row)   
                                            <tr>
                                                <td>
                                                    <h6 class="mb-0 text-sm px-3">{{$row->id}}</h6>
                                                </td>
                                                <td>
                                                    <h6 class="mb-0 text-sm">{{$row->name}}</h6>
                                                </td>
                                                <td>
                                                <div class="user-img">
                                            <img src="{{url('/storage/app/public/category/img/'.$row->icon)}}"class="img-fluid" >
                                                </div>
                                            </td>
                                            <td class="d-flex align-items-center">
                                            @php $prodID= Crypt::encrypt($row->id); @endphp 
                                        <a class=" delete-confirm btn btn-sm bg-gradient-danger mb-0 me-2" href="{{url('Categories/delete/'.$prodID)}}">
                                        <i class="far fa-trash-alt me-2" aria-hidden="true"></i> Delete
                                        </a>
                                         <a class="btn btn-sm bg-gradient-success mb-0 me-2" href="{{url('Categories/edit/'.$prodID)}}">
                                        <i class="fa fa-pencil me-2" aria-hidden="true"></i> Edit
                                                    </a>
                                       
                                        <div class="form-check form-switch ps-0">
                                        <input class=" active form-check-input ms-auto" type="checkbox" data-id="{{$row->id}}" 
                                          @php if($row->status == '1'){
                                          echo 'checked';
                                        }
                                        @endphp>       
                                   <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0"></label>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                      <div class="pagination-custom">
                            <?php echo $categorie->links(); ?>
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
              url: "{{url('ChangeStatus')}}", 
              data: {'status': status, 'id': id,  _token: "{{ csrf_token() }}",}, 
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
 @include('admin/common/footer')