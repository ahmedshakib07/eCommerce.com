<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ !empty($header_title) ? $header_title : ''}} | Admin - eCommerce </title> <!-- eCommerce.com -->
    <link rel="shortcut icon" href="{{ url('public/assets/dist/img/icons/favicon.ico') }}">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ url('public/assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- IonIcons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('public/assets/dist/css/adminlte.min.css') }}">

    <!-- Text Editor summernote -->
    <link rel="stylesheet" href="{{ url('public/assets/plugins/summernote/summernote-bs4.min.css') }}">

    @yield('style')
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        @include('admin.layouts.header')
        @yield('content')
        @include('admin.layouts.footer')

    </div>


    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{ url('public/assets/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ url('public/assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE -->
    <script src="{{ url('public/assets/dist/js/adminlte.js') }}"></script>

    <!-- OPTIONAL SCRIPTS -->
    <script src="{{ url('public/assets/plugins/chart.js/Chart.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ url('public/assets/dist/js/demo.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <!-- <script src="{{ url('public/assets/dist/js/pages/dashboard3.js') }}"></script> -->

    <!-- Text Editor summernote -->
    <script src="{{ url('public/assets/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script type="text/javascript">
        $('.editor').summernote({
            height: 100
        });
    </script>

    <!-- For Sweet Alert Start -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $('.delete').on('click', function (e) {
            e.preventDefault();
            var self = $(this);
            console.log(self.data('title'));

            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonCouponCode: "#3085d6",
                cancelButtonCouponCode: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: "Deleted!",
                        text: "Record has been deleted.",
                        icon: "success"
                    });
                    location.href = self.attr('href');
                }
            });
        })
    </script>
    <!-- For Sweet Alert End -->
</body>
</html>
