@include('admin/common/header')



  <div class="content-wrapper">
            <div class="container-fluid py-4">
                <div class="row">
                    <div class="col-12">
                        <div class="card mb-3">
                            <div class="header-area">
                                <h4 class="font-weight-bolder mb-0">Specializations</h4>
                                <a href="{{url('Specializations/add')}}" class="btn bg-gradient-primary"> Add Specializations</a>
                            </div>
                        </div>    
                          <div class="card">
                            <div class="card-body specialization-area">
                          @foreach ($specialization as $row) 
                           <div class="list">
                                <button type="button" class="btn btn-lg mb-0 me-2">{{$row->name}}</button>
                                @php $prodID= Crypt::encrypt($row->id); @endphp   
                                <div class="action">
                                <a href="{{url('Specializations/delete/'.$prodID)}}" class=" delete-confirm delete btn"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                    
                                <a href="{{url('Specializations/edit/'.$prodID)}}" class="edit btn"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                            </div>
                            </div>
                               @endforeach    
                            </div>
                        </div>
                    
                    </div>
                  </div>
            </div>
        </div>
@include('admin/common/footer')