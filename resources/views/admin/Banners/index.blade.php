 @include('admin/common/header')

 <div class="content-wrapper">
            <div class="container-fluid py-4">
                <div class="row">
                    <div class="col-12">
                        <div class="card mb-3">
                            <div class="header-area">
                                <h4 class="font-weight-bolder mb-0">Banner</h4>
                                <a href="{{url('Banners/add')}}" class="btn  bg-gradient-primary"> Add banner</a>
                            </div>
                        </div>
                      <div class="card mb-4">
                        <div class="card-body px-0 pt-0 pb-2">
                          <div class="table-responsive p-0">
                            <table class="table align-items-center justify-content-center mb-0">
                              <thead>
                                <tr>
                                 <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Id</th>
                                 <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Banner</th>
                                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Action</th>
                                  
                                </tr>
                              </thead>
                              <tbody>
                                @php
                                $id = 1
                                @endphp
                             @foreach ($banner as $row)  
                                <tr>
                                <td>
                                <h6 class="mb-0 text-sm px-3">{{$row->id}}</h6>
                                  </td>
                                  <td>
                                 <div class="banner">
                                 <img src="{{url('/storage/app/public/banner/img/'.$row->banner)}}" class="img-fluid" style="height:300px; width:300px; ">
                                 </div>
                                  </td>
                                   @php $prodID= Crypt::encrypt($row->id); 
                                   @endphp
                                  <td class="d-flex align-items-center">
                                    <a class=" delete-confirm btn btn-sm bg-gradient-danger mb-0 me-2" href="{{url('Banner/delete/'.$prodID)}}">
                                    <i class="far fa-trash-alt me-2" aria-hidden="true"></i> Delete
                                    </a>
                                    <a class="btn btn-sm bg-gradient-success mb-0 me-2" href="{{url('Banners/edit/'.$prodID)}}">
                                    <i class="fa fa-pencil me-2" aria-hidden="true"></i> Edit
                                    </a> 
                                  </td>
                                </tr>
                               @endforeach
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
        </div>

 @include('admin/common/footer')
