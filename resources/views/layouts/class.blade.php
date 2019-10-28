<!DOCTYPE html>
<html lang="en">

<head>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <title>SB Admin - Tables</title>

    <link rel="stylesheet" href="{{ asset('css/sb-admin.css') }}">
    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
    <!-- Page level plugin CSS-->
    <link rel="stylesheet" href="{{ asset('vendor/datatables/dataTables.bootstrap4.css') }}">
    <!-- Custom styles for this template-->

    
    <style>
        .navbarcolor{
             background-color:#0193bc !important;      
        }
        /* .form-control,.form-validate,.colorlabel{
        border-color: #3c8dbc !important;
        color:#3c8dbc !important;
        } */
        /* .tablecolor{
             color: #3c8dbc !important;
        } */
        .breadcrumb{
            background-color:#2b2e31 !important;
            font-size: 100%;
        }
        .sideba{
            background-color:#030202 !important;
            color: white;
        }
        .span{
            color:#3c8dbc;
        
        }
        .colorlabel{
             label: #3c8dbc !important;
        }

       .dropdown-menu {
            position: absolute;
            top: 100%;
            left: 0;
            z-index: 1000;
            display: none;
            float: left;
            min-width: 10rem;
            padding: 0.0rem 0;
            margin: 0.125rem 0 0;
            font-size: 1rem;
            color:white !important;
            text-align: left;
            list-style: none;
            background-color:#2b2e31;
            background-clip: padding-box;
            border: 1px solid rgba(0, 0, 0, 0.15);
            border-radius: 0.25rem;
        }
    }
    </style>
</head>

<body id="page-top">
    
    <nav class="navbar navbar-expand  navbarcolor static-top">
        
        <a style="color:white" class="navbar-brand mr-1" href="index.html">Sistema Gover</a>
        
        <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
            <i class="fas fa-bars"></i>
        </button>
        
        <!-- Navbar Search -->
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
            <div class="input-group"> 
            </div>
        </form>
        <!-- Navbar -->
        <ul class="navbar-nav  ml-auto ml-md-0">
        <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i style="color:white" class="fas fa-user-circle fa-fw"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    {{-- <a class="dropdown-item" href="#">Settings</a>
                    <a class="dropdown-item" href="#">Activity Log</a> --}}
                    {{-- <div class="dropdown-divider"></div> --}}
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
                </div>
            </li>
            <li class="nav-item dropdown no-arrow mx-1">
                <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{-- <i class="fas fa-bell fa-fw"></i> --}}
                    {{-- <span class="badge badge-danger">9+</span> --}}
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
                    {{-- <a class="dropdown-item" href="#">Action</a> --}}
                    {{-- <a class="dropdown-item" href="#">Another action</a> --}}
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
            <li class="nav-item dropdown no-arrow mx-1">
                <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{-- <i class="fas fa-envelope fa-fw"></i> --}}
                    {{-- <span class="badge badge-danger">7</span> --}}
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
           
        </ul>
        
    </nav>
    
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="sidebar navbar-nav sideba">
            
                   <!-- Breadcrumbs-->
                   <ol class="breadcrumb">
                        <li class="breadcrumb-item crumbcolor">
                            @if(auth()->user()->type == 'admin' )
                            <span>Admin</span>
                            <span style="font-size:50%">{{auth()->user()->name}}</span>
                            @else
                            <span>Usuário</span>
                            <span style="font-size:50%">{{auth()->user()->name}}</span>
                            @endif
                            {{-- <a href="">{{auth()->user()->type}}</ a> --}}
                        </li>
                        <li class="breadcrumb-item active"></li>
                    </ol>
            </li>
            @if(auth()->user()->type == 'admin')
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-fw fa-folder span"></i>
                    <span style="color:#0193bc">Usuário</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                    <h6 class="dropdown-header"></h6>
                <a class="dropdown-item span " href="{{route('usuario.create')}}">Cadastrar</a>
                <a class="dropdown-item span" href="{{route('usuario')}}">Visualizar</a>
                </div>
            </li>
            @endif
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-fw fa-folder span"></i>
                    <span style="color:#0193bc">Demanda</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                    <h6 class="dropdown-header"></h6>
                <a class="dropdown-item span" href="{{route('cadastro.create')}}">Cadastrar</a>
                <a class="dropdown-item span" href="{{route('cadastro')}}">Visualizar</a>
                </div>
            </li>
                </ul>
                <div id="content-wrapper">
                    <div class="container-fluid">
                 
                    
                        @yield('content')  
                        
        
        <!-- Sticky Footer -->
        <footer class="sticky-footer">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span></span>
                </div>
            </div>
        </footer>
    </div>
    <!-- /.content-wrapper -->
</div>
<!-- /#wrapper -->
<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>
<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tem certeza que deseja fazer logout?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body"></div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="/logout">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- telefone mask-->
<script src="{{asset('js/jsmask/jquery.js')}}"></script>
<script src="{{asset('js/jsmask/jquery.mask.js')}}"></script>
<!-- Bootstrap core JavaScript-->
<script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- Core plugin JavaScript-->
<script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>
<!-- Page level plugin JavaScript-->
<script src="{{asset('vendor/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('vendor/datatables/dataTables.bootstrap4.js')}}"></script>
<!-- Custom scripts for all pages-->
<script src="{{asset('js/sb-admin.min.js')}}"></script>
<!-- Demo scripts for this page-->
<script src="{{asset('js/demo/datatables-demo.js')}}"></script>

<script src="https://cdn.datatables.net/plug-ins/1.10.20/dataRender/ellipsis.js"></script>
</body>




</html>

