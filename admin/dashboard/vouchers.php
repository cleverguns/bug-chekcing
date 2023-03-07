<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PC Village | Vouchers</title>
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
              <a href="/admin/dashboard/" class="nav-link">
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
              <a href="vouchers.php" class="nav-link bg-gradient-primary active">
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
              <h1 class="m-0">Vouchers</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Vouchers</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Main row -->
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <button class="btn btn-primary" data-toggle="modal" data-target="#add-voucher"><i class="fa fa-plus-circle"></i> - Add Voucher</button>
                </div>
                <div class="card-body table-responsive">
                  <table id="table" class="table table-bordered table-striped text-center">
                    <thead>
                      <tr>
                        <th style="white-space: nowrap;">#</th>
                        <th style="white-space: nowrap;">Vouchers Code</th>
                        <th style="white-space: nowrap;">Amount</th>
                        <th style="white-space: nowrap;">Tools</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $user_query = $conn->query("SELECT * FROM tbl_vouchers");
                      $counter = 0;
                      foreach ($user_query as $row) {
                        echo ('
                        <tr>
                          <td style="white-space: nowrap;">' . ++$counter . '</td>
                          <td style="white-space: nowrap;">' . $row['voucher_code'] . '</td>
                          <td style="white-space: nowrap;">' . $row['amount'] . '</td>
                          <td style="white-space: nowrap;">
                            <button data-name="' . $row['voucher_code'] . '" data-amount="' . $row['amount'] . '" data-id="' . $row['voucher_id'] . '" class="btn btn-success mr-2 btn-edit"><i class="fa fa-edit"></i> - Edit</button>
                            <button data-id="' . $row['voucher_id'] . '" class="btn btn-danger btn-delete"><i class="fa fa-trash-alt"></i> - Delete</button>
                          </td>
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

    <div class="modal fade" id="add-voucher" style="display: none;" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Add New Voucher</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <form class="frm-add" action="../wp-actions/voucher.php" method="post">
            <input type="text" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>" hidden>
            <div class="modal-body">

              <div class="form-group">
                <label for="name">Voucher Name</label>
                <input type="text" class="form-control" name="name" pattern="[A-Z]" required />
              </div>
              <div class="form-group">
                <label for="amount">Amount</label>
                <input type="text" class="form-control" name="amount" required />
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button class="btn btn-danger" data-dismiss="modal">Close</button>
              <button name="add-voucher" class="btn btn-primary" type="submit">Save</button>
            </div>
          </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="edit-voucher" style="display: none;" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Edit Voucher</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <form class="frm-add" action="../wp-actions/voucher.php" method="post">
            <input type="text" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>" hidden>
            <input type="text" name="voucher_id" class="voucher_id" hidden>
            <div class="modal-body">

              <div class="form-group">
                <label for="name">Voucher Name</label>
                <input type="text" class="form-control name" name="name" pattern="[A-Z]" required />
              </div>
              <div class="form-group">
                <label for="amount">Amount</label>
                <input type="text" class="form-control amount" name="amount" required />
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button class="btn btn-danger" data-dismiss="modal">Close</button>
              <button name="update-voucher" class="btn btn-primary" type="submit">Save</button>
            </div>
          </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>

      <!-- Main Footer -->
      <?php require_once("footer.php") ?>
  </div>
  <!-- ./wrapper -->

  <?php require_once("scripts.php") ?>
  <script>
    $(".frm-add").validate({
      rules: {
        amount: {
          required: true,
          number: true,
        }
      },
      errorElement: 'span',
      errorPlacement: function(error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
      },
    });

    $(".frm-edit").validate({
      rules: {
        amount: {
          required: true,
          number: true,
        }
      },
      errorElement: 'span',
      errorPlacement: function(error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
      },
    });

    $(document).on('click', '.btn-delete', function(e) {
      e.preventDefault();
      let id = $(this).data("id");
      let token = "<?= $_SESSION['csrf_token'] ?>";
      Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'Cancel',
      }).then((result) => {
        if (result.isConfirmed) {
          Swal.fire({
            title: 'Success!',
            text: "Successfully Deleted!",
            icon: 'success',
            showConfirmButton: false,
            timer: 1500
          })
          setTimeout(function() {
            window.location.href = `../wp-actions/voucher.php?voucher_id=${id}&_token=${token}`;
          }, 1500);
        }
      })
    });

    $(document).on('click', '.btn-edit', function() {
      let voucher_id = $(this).data("id");
      let name = $(this).data("name");
      let amount = $(this).data("amount");
      $(".voucher_id").val(voucher_id);
      $(".name").val(name);
      $(".amount").val(amount);
      $("#edit-voucher").modal('show');
    });
  </script>
</body>

</html>