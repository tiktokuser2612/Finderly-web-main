@include('admin/common/header')
    
     <nav aria-label="breadcrumb">
        <h2 class="font-weight-bolder mb-0">Dashboard</h2>
      </nav>
    <div class="content-wrapper">
      <div class="container-fluid py-4">
        <div class="row">
          <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
              <div class="card-body pt-6 pb-6">
                <div class="row">
                  <div class="col-8">
                    <div class="numbers">
                      <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Business</p>
                      <h2 class="font-weight-bolder mb-0">
                        {{$business->count()}}
                      </h2>
                    </div>
                  </div> 
                  <div class="col-4 text-end">
                    <div class="icon icon-shape bg-gradient2 shadow text-center border-radius-md">
                   <i class="fa fa-suitcase text-lg opacity-10" aria-hidden="true"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
              <div class="card-body pt-6 pb-6">
                <div class="row">
                  <div class="col-8">
                    <div class="numbers">
                      <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Categories</p>
                      <h2 class="font-weight-bolder mb-0">{{$categorie->count()}}</h2>
                    </div>
                  </div>
                  <div class="col-4 text-end">
                    <div class="icon icon-shape bg-gradient3 shadow text-center border-radius-md">
                     <i class="fa fa-bars text-lg opacity-10" aria-hidden="true"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
              <div class="card-body pt-6 pb-6">
                <div class="row">
                  <div class="col-8">
                    <div class="numbers">
                      <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Users</p>
                      <h2 class="font-weight-bolder mb-0">{{$users->count()}}</h2>
                    </div>
                  </div>
                  <div class="col-4 text-end">
                    <div class="icon icon-shape bg-gradient4 shadow text-center border-radius-md">
                 <i class="fa fa-users text-lg opacity-10" aria-hidden="true"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6">
            <div class="card">
              <div class="card-body pt-6 pb-6">
                <div class="row">
                  <div class="col-8">
                    <div class="numbers">
                      <p class="text-sm mb-0 text-capitalize font-weight-bold">Active Banners</p>
                      <h2 class="font-weight-bolder mb-0">{{$banner->count()}}</h2>
                    </div>
                  </div>
                  <div class="col-4 text-end">
                    <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                      <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row mt-4">
          <div class="col-lg-12">
            <div class="card z-index-2">
              <div class="card-header pb-0">
                <h6>Overview</h6>
                <p class="text-sm">
                  <i class="fa fa-arrow-up text-success"></i>
                  <span class="font-weight-bold">4% more</span> in 2021
                </p>
              </div>
              <div class="card-body p-3">
                <div class="chart">
                  <canvas id="chart-line" class="chart-canvas" height="500"></canvas>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
 @include('admin/common/footer')
