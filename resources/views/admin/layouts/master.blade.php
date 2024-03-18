<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'en' ? 'ltr' : 'rtl' }}">

<head>
    <!-- Meta Tags
        ======================-->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="keywords" content="" />
    <meta name="copyright" content="" />

    <!-- Title Name
        ================================-->
    <title>Brandbourne</title>

    <!-- Fave Icons
        ================================-->
    <link rel="shortcut icon" href="{{ asset('public/admin/images/fav-icon.png') }}" />

    <!-- Css Base And Vendor 
        ===================================-->
    <link rel="stylesheet" href="{{ asset('public/admin/vendor/bootstrap/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/admin/vendor/tagsinput/css/tagsinput.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
        integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous" />

    <!-- Site Css
        ====================================-->
    <link rel="stylesheet" href="{{ asset('public/admin/css/style.css?v2') }}" />

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body id="body">
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form class="modal-content text-center" id="delete-form" method="post">
                @csrf
                @method('delete')
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalLabel">Are you sure ?</h5>
                </div>
                <div class=" text-center">
                    <button type="submit" class="custom-btn red-bc" style="margin-right : 5px;">
                        <i class="fa fa-trash"></i> Delete
                    </button>
                    <button type="button" class="custom-btn" data-dismiss="modal">
                        <i class="fa fa-times"></i> Close
                    </button>
                </div>
            </form>
        </div>
    </div>
    @stack('modals')
    @include('admin.layouts.header')
    @include('admin.layouts.sidebar')
    <!-- Main
        ==========================================-->
    <div class="main">
        <!-- Page content
            ==========================================-->
        @yield('content')
        <!--End Page content-->
    </div>
    <!--End Main-->
    <div class="loader">
        <div class="spinner">
            <div class="dot1"></div>
            <div class="dot2"></div>
        </div>
    </div>
    <!-- JS Base And Vendor 
        ==========================================-->
    <script src="{{ asset('public/admin/vendor/jquery/jquery.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="{{ asset('public/admin/vendor/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('public/admin/vendor/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
    <script src="{{ asset('public/admin/vendor/tagsinput/js/tagsinput.js') }}"></script>
    <script src="{{ asset('public/admin/vendor/jquery.countTo.js') }}"></script>
    <script src="{{ asset('public/admin/vendor/tinymce/js/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('public/admin/js/main.js') }}"></script>
    <script src="{{ asset('public/admin/js/admin.js') }}"></script>
    @stack('js')
</body>

</html>
