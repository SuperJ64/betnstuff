<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Betnstuff betting app">
    <meta name="author" content="Michael Baaske">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dataTables.bootstrap4.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sb-admin.min.css') }}" rel="stylesheet">

</head>
<body class="fixed-nav sticky-footer bg-dark">
<div id="app">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
        <a class="navbar-brand" href="index.html">Infiniti Pool</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Games">
                    <a class="nav-link" href="{{ route('home') }}">
                        <i class="fa fa-fw fa-trophy"></i>
                        <span class="nav-link-text">Games</span>
                    </a>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Admin">
                    <a class="nav-link" href="{{ route('admin') }}">
                        <i class="fa fa-fw fa-id-card"></i>
                        <span class="nav-link-text">Admin</span>
                    </a>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Info">
                    <a class="nav-link" href="tables.html">
                        <i class="fa fa-fw fa-user"></i>
                        <span class="nav-link-text">My Info</span>
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav sidenav-toggler">
                <li class="nav-item">
                    <a class="nav-link text-center" id="sidenavToggler">
                        <i class="fa fa-fw fa-angle-left"></i>
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
                        <i class="fa fa-fw fa-sign-out"></i>Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="content-wrapper">
    @yield('content')


        <footer class="sticky-footer">
            <div class="container">
                <div class="text-center">
                    <small>Copyright © Infinibet 2017</small>
                </div>
            </div>
        </footer>
        <!-- Logout Modal-->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="{{ route('logout') }}">Logout</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/popper/popper.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
        <!-- Page level plugin JavaScript-->
        <script src="vendor/datatables/jquery.dataTables.js"></script>
        <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin.min.js"></script>
        <!-- Custom scripts for this page-->
        <script src="js/sb-admin-datatables.min.js"></script>
    </div>
</div>
</body>
</html>
