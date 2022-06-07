 <footer class="footer pt-3 pb-3 ">
      <div class="container-fluid">
        <div class="row align-items-center justify-content-lg-between">
          <div class="col-lg-6 mb-lg-0 mb-4">
            <div class="copyright text-center text-sm text-muted text-lg-start">
              Copyright © 2021
              <a href="{{url('Dashboard')}}" class="font-weight-bold" target="_blank">Findirly.</a>
               All rights reserved.
            </div>
          </div>
        </div>
      </div>
    </footer>
  </main>
  <!--   Core JS Files   -->
  <script src="{{url('/public/assets/js/core/popper.min.js')}}"></script>
  <script src="{{url('/public/assets/js/core/bootstrap.min.js')}}"></script>

  <script src="{{url('/public/assets/js/plugins/perfect-scrollbar.min.js')}}"></script>
  <script src="{{url('/public/assets/js/plugins/smooth-scrollbar.min.js')}}"></script>
  <script src="{{url('/public/assets/js/plugins/chartjs.min.js')}}"></script>
  <script>

    var ctx2 = document.getElementById("chart-line").getContext("2d");


    var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);
    gradientStroke1.addColorStop(1, 'rgba(203,12,159,0.2)');
    gradientStroke1.addColorStop(0.2, 'rgba(72,72,176,0.0)');
    gradientStroke1.addColorStop(0, 'rgba(203,12,159,0)'); //purple colors

    var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);

    gradientStroke2.addColorStop(1, 'rgba(20,23,39,0.2)');
    gradientStroke2.addColorStop(0.2, 'rgba(72,72,176,0.0)');
    gradientStroke2.addColorStop(0, 'rgba(20,23,39,0)'); //purple colors

    new Chart(ctx2, {
      type: "line",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
            label: "Mobile apps",
            tension: 0.4,
            borderWidth: 0,
            pointRadius: 0,
            borderColor: "#E165F4",
            borderWidth: 3,
            backgroundColor: gradientStroke1,
            fill: true,
            data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
            maxBarThickness: 6

          },
          {
            label: "Websites",
            tension: 0.4,
            borderWidth: 0,
            pointRadius: 0,
            borderColor: "#5660E9",
            borderWidth: 3,
            backgroundColor: gradientStroke2,
            fill: true,
            data: [30, 90, 40, 140, 290, 290, 340, 230, 400],
            maxBarThickness: 6
          },
        ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#b2b9bf',
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#b2b9bf',
              padding: 20,
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });
  </script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  

<!---Message--->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>

 <script type="text/javascript">
    $('.delete-confirm').on('click', function (event) {
    event.preventDefault();
    const url = $(this).attr('href');
    swal({
        title: 'Are you sure you want to delete this record?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        buttons: ["Cancel", "Yes!"],
    }).
    then(function(value) {
        if (value) {
            window.location.href = url;
        }
    });
});
</script>
<!---EndMessage--->

<script type="text/javascript">
    $('.confirm').on('click', function (event) {
    event.preventDefault();
    const url = $(this).attr('id');
    swal({
        title: 'Are you sure change Status',
        text: "You won't be able to revert this!",
        icon: 'warning',
        buttons: ["Cancel", "Yes!"],
    }).
    then(function(value) {
        if (value) {
          console.log(value);
            window.location.id = "{{url('changeStatus')}}"
        }
    });
});
</script>

<!---toastr message--->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

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
</body>
</html>
   <script>
      function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#imagePreview').css('background-image', 'url('+e.target.result +')');
            $('#imagePreview').hide();
            $('#imagePreview').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
  }
  $("#imageUpload").change(function() {
      readURL(this);
  });
  </script>