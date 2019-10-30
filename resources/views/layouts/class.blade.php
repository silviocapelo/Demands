<!DOCTYPE html>
<html lang="en">

<head>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <title>SB Admin - Tables</title>

    <!-- Datatable-->
    <!-- Datatable-->

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">

    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>

    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

    <script src="https://cdn.datatables.net/buttons/1.6.0/js/dataTables.buttons.min.js"></script>

    <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.colVis.min.js"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.0/css/buttons.dataTables.min.css">

    <script src="https://cdn.datatables.net/plug-ins/1.10.20/dataRender/ellipsis.js"></script>

     <!-- Fim Datatable-->
     <!-- Fim Datatable-->


    <link rel="stylesheet" href="{{ asset('css/sb-admin.css') }}">
    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
    <!-- Page level plugin CSS-->
 
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

        .topwhite{
            background-color:white !important;
        }
       
        .dropdown-menu {
            position: absolute;
            top: 115%;
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
<!--Munu Dropdown-->
<!--Munu Dropdown-->
<ul class="navbar-nav  dropuserleft  ml-auto ml-md-8">
<li class="nav-item dropdown  no-arrow  ">
    <a class="nav-link dropdown-toggle   " href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i style="color:white" class="fas fa-user-circle fa-fw"></i>
    </a>
    <div class="dropdown-menu topwhite dropdown-menu-right " aria-labelledby="userDropdown">       
        <a style="color:#0193bc" class="dropdown-item userDropdown " href="{{route('usuario.edit',['id'=>auth()->user()->id]) }}" >Editar perfil</a>
        <a style="color:#0193bc" class="dropdown-item  userDropdown" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
    </div>
</li>

<!---->
<!---->    
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


<script>
    jQuery.fn.dataTable.render.ellipsis = function ( cutoff, wordbreak, escapeHtml ) {
        var esc = function ( t ) {
            return t
                .replace( /&/g, '&amp;' )
                .replace( /</g, '&lt;' )
                .replace( />/g, '&gt;' )
                .replace( /"/g, '&quot;' );
        };
        
        return function ( d, type, row ) {
            // Order, search and type get the original data
            if ( type !== 'display' ) {
                return d;
            }
    
            if ( typeof d !== 'number' && typeof d !== 'string' ) {
                return d;
            }
    
            d = d.toString(); // cast numbers
    
            if ( d.length <= cutoff ) {
                return d;
            }
    
            var shortened = d.substr(0, cutoff-1);

            // Find the last white space character in the string
            if ( wordbreak ) {
                shortened = shortened.replace(/\s([^\s]*)$/, '');
            }
    
            // Protect against uncontrolled HTML input
            if ( escapeHtml ) {
                shortened = esc( shortened );
            }
    
            return '<span class="ellipsis" title="'+esc(d)+'">'+shortened+'&#8230;</span>';
        };
    };


    $(document).ready( function () {
        $('.datatable').DataTable({
            scroller:true,
            scrollX:true,
            stateSave:true,
            "language":{
                "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese-Brasil.json"
            },
            dom: 'Bfrtip',
            buttons: [
                {
                extend:'colvis',
                text:'Colunas'
                }
            ],
            columnDefs: [
                {
                    targets: [1],
                    render: $.fn.dataTable.render.ellipsis( 10 )
                }
            ],
        });
    });
</script>    
        
</body>
</html>
        
        