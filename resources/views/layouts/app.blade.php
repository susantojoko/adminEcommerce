<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Admin | Dashboard</title>

  <link rel="stylesheet" type="text/css" href="{{asset('styles.css')}}">


  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset ('template/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset ('template/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset ('template/dist/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
  @yield('headScript')
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="index3.html" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">Contact</a>
        </li>
      </ul>

    
      <!-- SEARCH FORM -->
      <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
          <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-navbar" type="submit">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form>
      <button type="button" class="btn btn-danger " id="logoutButton">
      <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><style>svg{fill:#ffffff}</style><path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"/></svg>
         Logout
      </button>
    
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
        <img src="{{asset('template/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Admin</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="{{asset('template/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">{{Auth::guard('admin')->user()->name}}</a>
            <a href="#" class="d-block">{{Auth::guard('admin')->user()->email}}</a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item has-treeview">
              <a href="{{ route('dashboard.index') }}" class="nav-link {{ Request::is('dashboard*') || Request::is('/') ? 'active' : '' }}">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
            </li>
            <li class="nav-item has-treeview {{ request()->is('produk*', 'rating*', 'admin/chat*') ? 'menu-open': ''}}">
            <a href="{{ route('products.index') }}" class="nav-link {{ request()->is('produk*', 'rating*', 'admin/chat*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                  Modul Produk
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('products.index') }}" class="nav-link {{ request()->is('produk*') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                    <p>Data Produk</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('ratings.index') }}" class="nav-link {{ request()->is('rating*') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Data Rating</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route ('chat.index') }}" class="nav-link {{ request()->is('chat*') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Chat Produk</p>
                  </a>
                </li>

              </ul>
            </li>
            
            
            <li class="nav-item has-treeview {{ request()->is('transaksi*') ? 'menu-open': ''}}">
              <a href="{{ route('transactions.index') }}" class="nav-link {{ request()->is('transaksi*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                  Transaksi
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
            </li>
            
            <li class="nav-item has-treeview {{ request()->is('kategori*', 'subkategori*') ? 'menu-open': ''}}">
                <a href="{{ route('categories.index') }}" class="nav-link {{ request()->is('kategori*', 'subkategori*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                  Modul Kategori
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>

              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('categories.index') }}" class="nav-link {{ request()->is('kategori*') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                    <p>Data kategori</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('subcategories.index')}}" class="nav-link {{ request()->is('subkategori*') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Data sub kategori</p>
                  </a>
                </li>

              </ul>
            </li>
            
            <li class="nav-item has-treeview {{ request()->is('admin*') ? 'menu-open': ''}}">
             <a href="{{ route('admin.index')}}" class="nav-link {{ request()->is('admin*') && !request()->is('admin/chat*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                  Modul Admin
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
            </li>
           
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->

    <div class="content-wrapper" style="margin: 20px;">
      @yield('content') <!-- Konten halaman khusus akan disisipkan di sini -->
    </div>
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

    <div id="confirmationModal" class="modal9" style="display: none;">
        <div class="modal-content">
            <span class="close" id="closeConfirmationModalBtn">&times;</span>
            <form action="" method="POST" id="deleteForm">
                @csrf
                @method('DELETE')
                <p><span style="color: red;"><i class="fas fa-exclamation-triangle"></i></span> Apakah Anda yakin ingin menghapus item ini?</p>
                <p>{{ session("successdel") }}</p>
                <button type="submit"  id="yesButton">Yes</button>
                <button type="button" id="noButton" onclick="closeConfirmationModal()">No</button> <!-- Tombol untuk menutup modal -->
            </form>
        </div>
</div>
    <!-- Main Footer -->
    <footer class="main-footer">
      <strong>Copyright &copy; 2023 <a href="#">Admin</a>.</strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.0.1
      </div>
    </footer>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->

 <!-- script alert -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if(session('successdel'))
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script type="text/javascript">
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Sukses!',
                text: '{{ session("successdel") }}',
                showConfirmButton: false,
                timer: 1500
            });
        </script>
    @endif
@if(session('successup'))
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script type="text/javascript">
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Sukses!',
                text: '{{ session("successup") }}',
                showConfirmButton: false,
                timer: 1500
            });
        </script>
    @endif
@if(session('successtmb'))
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script type="text/javascript">
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Sukses!',
                text: '{{ session("successtmb") }}',
                showConfirmButton: false,
                timer: 1500
            });
        </script>
    @endif


<script>
  $(document).ready(function() {
    $('#logoutButton').click(function() {
      window.location.href = "{{route('admin.logout')}}";
    });
  });

  </script>

  <!-- jQuery -->
   <script src="{{asset('template/plugins/jquery/jquery.min.js')}}"></script>
  <!-- Bootstrap -->
  <script src="{{asset('template/')}}plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="{{asset('template/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
  <!-- AdminLTE App -->
  <script src="{{asset('template/dist/js/adminlte.js')}}"></script>

  <!-- OPTIONAL SCRIPTS -->
  <script src="{{asset('template/dist/js/demo.js')}}"></script>

  <!-- PAGE PLUGINS -->
  <!-- jQuery Mapael -->
  <script src="{{asset('template/plugins/jquery-mousewheel/jquery.mousewheel.js')}}"></script>
  <script src="{{asset('template/plugins/raphael/raphael.min.js')}}"></script>
  <script src="{{asset('template/plugins/jquery-mapael/jquery.mapael.min.js')}}"></script>
  <script src="{{asset('template/plugins/jquery-mapael/maps/usa_states.min.js')}}"></script>
  <!-- ChartJS -->
  <script src="{{asset('template/plugins/chart.js/Chart.min.js')}}"></script>

  <!-- PAGE SCRIPTS -->
  <script src="{{asset('template/dist/js/pages/dashboard2.js')}}"></script>

  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>

<script>

$(document).ready( function () {
    $('#data-table').DataTable();
});

var confirmationModal = document.getElementById("confirmationModal");
var deleteForm = document.getElementById("deleteForm");
var closeConfirmationModalBtn = document.getElementById("closeConfirmationModalBtn");

function openConfirmationModal(button) {
    var functionDeleteProduct = button.getAttribute('data-route');
    var name = button.getAttribue('data-name')
    deleteForm.action = functionDeleteProduct;
    confirmationModal.style.display = "block";
}


function closeConfirmationModal() {
    confirmationModal.style.display = "none";
}

closeConfirmationModalBtn.onclick = function() {
    closeConfirmationModal();
}

// Sembunyikan modal saat pengguna mengklik di luar modal
window.onclick = function(event) {
    if (event.target == confirmationModal) {
        closeConfirmationModal();
    }
}


function validateForm() {
    var nama_kategori = document.getElementById("nama_kategori").value;
    var image = document.getElementById("image").value;

    if (nama_kategori === "" || image === "") {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Harap isi semua data yang diperlukan.',
        });
        return false;
    }

    return true;
}

</script>

@yield('footScript')
</body>
</html>