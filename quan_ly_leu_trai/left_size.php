<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60" href="?option=home">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
     
     
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->

        
          
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
             
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        
        
        
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
         
            <!-- Message Start -->
            
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          
            <!-- Message Start -->
           
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          
            <!-- Message Start -->
            
            <!-- Message End -->
         
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          
          <div class="dropdown-divider"></div>
          
          
          
          <div class="dropdown-divider"></div>
         
           
         
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
          
          
          <div class="dropdown-divider"></div>
          
        </div>
      </li>
      <li class="nav-item">
       
      </li>
      <li class="nav-item">
        
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="?option=home" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8" href="?option=home">
      <span class="brand-text font-weight-light" >Quản Lý Lều Trại</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/thai.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="?option=home" class="d-block">Trần Viết Thái</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="?option=home" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>

          </li>
          <li class="nav-item">
            <a href = "?option=HangLeu" class="nav-link" >
            <i class="nav-icon fas fa-th"></i>
              <p >
                Quản Lý Lều

              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href = "?option=khachhang" class="nav-link" >
              <i class="nav-icon fas fa-th"></i>
              <p >
                Quản Lý Khách Hàng

              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href = "?option=nhanvien" class="nav-link" >
              <i class="nav-icon fas fa-th"></i>
              <p >
                Quản Lý Nhân Viên

              </p>
            </a>
          </li>
       <!--<li class="nav-item">
            <a href = "?option=donhang" class="nav-link" >
              <i class="nav-icon fas fa-th"></i>
              <p >
                Quản Lý Nhân Viên

              </p>
            </a>
          </li>-->
         

          <li class="nav-item">
            <a href = "?option=donhang" class="nav-link" >
              <i class="nav-icon fas fa-th"></i>
              <p >
                Đơn hàng

              </p>
            </a>
          </li>


          <li class="nav-item">
            <a href = "logout.php" class="nav-link" >
              <i class="nav-icon fas fa-th"></i>
              <p >
                Đăng Xuất

              </p>
            </a>
          </li>
           






        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>




  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
  <?php
    if(isset($_GET['option'])){
      switch($_GET['option']){
        case'home':
          include "home.php";
          break;
// sản phẩm
        case'HangLeu':
          include "./HangLeu/danhsach.php";
          break;

          case'addproduct':
            include "HangLeu/addproduct.php";
            break;

            case'updatehangleu':
              include "HangLeu/updatehangleu.php";
              break;
// Khách hàng
        case'khachhang':
          include "./khach_hang/danhsach.php";
          break;

          case'add_customer':
            include "khach_hang/add_customer.php";
            break;
          
            case'Update_cus':
              include "khach_hang/Update_cus.php";
              break;


// nhân viên 
            case'nhanvien':
              include "./nhan_vien/danhsach.php";
              break;

              case'add_staff':
                include "nhan_vien/add_staff.php";
                break;


           case'Update_staff':
              include "nhan_vien/Update_staff.php";
              break;
  // Đơn hàng
          case'donhang':
            include "./donhang/show.php";
            break;
          case'donhang_detail':
            include "donhang/orders_details.php";
            break;
            case'Add_order':
              include "donhang/Add_order.php";
              break;
            case 'Add_cart';
            include "./DonHang/Add_cart.php";
            break;
   // Đăng xuất
   case'LOGOUT':
    include "./LOGOUT/dangxuat.php";
    break;         


  // login 
            case'LOGIN';
            include "./LOGIN/login.php";
            break;

      }
    }
    else{
        include "home.php";
    }
  ?>


</div>
<!-- ./wrapper -->
