<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>KIM LONG</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('assets/img/favicon.png ')}}" rel="icon">
  <link href="{{asset('assets/img/apple-touch-icon.png ')}}" rel="apple-touch-icon">
  <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <!-- Vendor CSS Files -->
  <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">
  <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
   @include('layout.header')
  @include('layout.sidebar')
  @yield('content')
  <script>
    jQuery(document).ready(function() {
      $('#blah').hide();
        jQuery('#imgInp').change(function() {
          $('#blah').show();
            const file = jQuery(this)[0].files;
            if (file[0]) {
                jQuery('#blah').attr('src', URL.createObjectURL(file[0]));
            }
        });
    });
</script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
  @if (Session::has('message'))
      var type = "{{ Session::get('alert-type', 'info') }}"
      switch (type) {
          case 'info':
              toastr.info(" {{ Session::get('message') }} ");
              break;
          case 'success':
              toastr.success(" {{ Session::get('message') }} ");
              break;
          case 'warning':
              toastr.warning(" {{ Session::get('message') }} ");
              break;
          case 'error':
              toastr.error(" {{ Session::get('message') }} ");
              break;
      }
  @endif
</script>
<script>
    $(document).on('click', '.deleteIcon', function(e) {
           e.preventDefault();
           let id = $(this).attr('id');
           let url = $(this).data('url');
           let csrf ='{{csrf_token()}}';
           Swal.fire({
               title: 'Are you sure?',
               text: "You won't be able to revert this!",
               icon: 'warning',
               showCancelButton: true,
               confirmButtonColor: '#3085d6',
               cancelButtonColor: '#d33',
               confirmButtonText: 'Yes, delete it!'
           }).then((result) => {
               if (result.isConfirmed) {
                   $.ajax({
                       url: url,
                       method: 'delete',
                       data: {
                           id:id,
                           _token: csrf
                       },
                       success: function(res) {
                           Swal.fire(
                               'Deleted!',
                               'Your file has been deleted.',
                               'success'
                           )
                           $('.item-' + id).remove();
                       }
                   });
               }
           });
       });
</script>
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Thông tin liên hệ <strong><span>KIM LONG</span></strong>. HotLine: 0334-123-123.
    </div>
    <div class="credits">
       Email: <a href="https://bootstrapmade.com/">KimLongBooks@gmail.com</a>
    </div>
  </footer>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <!-- Vendor JS Files -->
  <script src="{{asset('assets/vendor/apexcharts/apexcharts.min.js ')}}"></script>
  <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js ')}}"></script>
  <script src="{{asset('assets/vendor/chart.js/chart.min.js ')}}"></script>
  <script src="{{asset('assets/vendor/echarts/echarts.min.js ')}}"></script>
  <script src="{{asset('assets/vendor/quill/quill.min.js ')}}"></script>
  <script src="{{asset('assets/vendor/simple-datatables/simple-datatables.js ')}}"></script>
  <script src="{{asset('assets/vendor/tinymce/tinymce.min.js ')}}"></script>
  {{-- <script src="{{asset(' assets/vendor/php-email-form/validate.js')}}"></script> --}}
  <!-- Template Main JS File -->
  <script src="{{asset('assets/js/main.js ')}}"></script>

</body>
</html>
