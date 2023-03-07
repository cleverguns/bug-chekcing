<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PC Village | Dashboard</title>
  <!-- Header Includes -->
  <?php require_once("headers.php"); ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <?php require_once("navbar.php"); ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-light-primary elevation-1">

      <!-- Brand Logo -->
      <?php require_once("logo.php"); ?>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- SidebarSearch Form -->
        <div class="form-inline mt-2">
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
          <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-header">Administrator</li>
            <li class="nav-item">
              <a href="/admin/dashboard/" class="nav-link bg-gradient-primary active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="users.php" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  Users
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="billings.php" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>
                  Billings
                </p>
              </a>
            </li>
            <li class="nav-header">Market</li>
            <li class="nav-item">
              <a href="vouchers.php" class="nav-link">
                <i class="nav-icon fa fa-gift"></i>
                <p>
                  Vouchers
                </p>
              </a>
            </li>
            <li class="nav-header">Products</li>
            <li class="nav-item">
              <a href="products.php" class="nav-link">
                <i class="nav-icon fa fa-box"></i>
                <p>
                  Products
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="category.php" class="nav-link">
                <i class="nav-icon fas fa-list"></i>
                <p>
                  Category
                </p>
              </a>
            </li>
            <li class="nav-header">Analytics</li>
            <li class="nav-item">
              <a href="order.php" class="nav-link">
                <i class="nav-icon fa fa-shopping-cart"></i>
                <p>
                  Orders
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="payment.php" class="nav-link">
                <i class="nav-icon fa fa-money-bill-alt"></i>
                <p>
                  Payments Record
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="logs.php" class="nav-link">
                <i class="nav-icon fas fa-history"></i>
                <p>
                  Logs
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
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">

            <div class="col-lg-3 col-6">
              <div class="small-box bg-gradient-info">
                <div class="inner">
                  <h3><?= $products->totalProducts(); ?></h3>

                  <p>Total Products</p>
                </div>
                <div class="icon">
                  <i class="fas fa-box"></i>
                </div>
                <a href="products.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <div class="col-lg-3 col-6">
              <div class="small-box bg-gradient-warning">
                <div class="inner">
                  <h3 class="text-white"><?= $user->totalUsers(); ?></h3>

                  <p class="text-white">Total Users</p>
                </div>
                <div class="icon">
                  <i class="fas fa-users"></i>
                </div>
                <a href="users.php" class="small-box-footer" style="color: #fff !important;">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>

            <div class="col-lg-3 col-6">
              <div class="small-box bg-gradient-success">
                <div class="inner">
                  <h3><?= $category->totalCategory(); ?></h3>

                  <p>Total Category</p>
                </div>
                <div class="icon">
                  <i class="fas fa-list-alt"></i>
                </div>
                <a href="category.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>

            <div class="col-lg-3 col-6">
              <div class="small-box bg-gradient-danger">
                <div class="inner">
                  <h3><?= $voucher->totalVouchers(); ?></h3>

                  <p>Total Vouchers</p>
                </div>
                <div class="icon">
                  <i class="fas fa-gift"></i>
                </div>
                <a href="vouchers.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
          </div>
          <!-- /.row -->

          <!-- Main row -->
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header">
                  <h1 class="card-title">
                    Latest Products
                  </h1>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body table-responsive">
                  <table id="table" class="table table-bordered table-striped text-center">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th style="white-space: nowrap;">Photo</th>
                        <th style="white-space: nowrap;">Name</th>
                        <th style="white-space: nowrap;">Prize</th>
                        <th style="white-space: nowrap;">Stock</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $tbl_product = $conn->query("SELECT * FROM tbl_products ORDER BY _id DESC");
                      $counter = 0;
                      foreach ($tbl_product as $row) {
                        echo ('
                          <tr>
                            <td>' . ++$counter . '</td>
                            <td style="white-space: nowrap;">
                            <img src="../../wp-images/products/' . $row['product_photo'] . '" class="text-center border" style="width: 50px; height: 50px;" alt="product-photo">
                          </td>
                            <td style="white-space: nowrap;" class="text-left">' . $row['name'] . '</td>
                            <td style="white-space: nowrap;">' . $row['prize'] . '</td>
                            <td style="white-space: nowrap;">' . $row['stock'] . '</td>
                          </tr>
                        ');
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!-- /.row -->
        </div><!--/. container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    <?php require_once("footer.php") ?>
  </div>
  <!-- ./wrapper -->
  <?php require_once("scripts.php") ?>
</body>

</html>