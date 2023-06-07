<?php
include_once "functions/authentications.php";
include_once 'functions/views.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Customers - Car Rental System</title>
    <meta name="description" content="CRS - Car Rental System">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/dataTables.bootstrap4-1.css">
    <link rel="stylesheet" href="assets/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="assets/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Basic-icons.css">
    <link rel="stylesheet" href="assets/css/sb-admin-2.css">
    <link rel="stylesheet" href="assets/css/sb-admin-2.min.css">
    <link rel="stylesheet" href="assets/css/sweetalert.css">
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0" style="background: linear-gradient(150deg, #dc4939 24%, #000000);">
            <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-car fa-fw"></i></div>
                    <div class="sidebar-brand-text mx-3"><span class="text-center">Car Rental<br>&nbsp;System</span></div>
                </a>
                <hr class="sidebar-divider my-0"><ul id="accordionSidebar" class="navbar-nav text-light">
  <hr class="sidebar-divider my-0">

  <li class="nav-item active">
    <a class="nav-link" href="dashboard.php">
      <i class="fas fa-fw fa-home"></i>
      <span>Dashboard</span></a>
  </li>

  <hr class="sidebar-divider">

  <div class="sidebar-heading">Transaction</div>

  <li class="nav-item">
    <a class="nav-link" href="transactions.php">
      <i class="fas fa-fw fa-cog"></i>
      <span>Rentals</span>
    </a>
  </li>

  <hr class="sidebar-divider">

  <div class="sidebar-heading">Data Master</div>

  <li class="nav-item">
    <a class="nav-link" href="cars.php">
      <i class="fas fa-fw fa-car"></i>
      <span> Car Section</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="customers.php">
      <i class="fas fa-fw fa-users"></i>
      <span>Customer Section</span></a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="functions/user-logout.php">
      <i class="fas fa-fw fa-users"></i>
      <span>Logout</span></a>
  </li>

  <hr class="sidebar-divider d-none d-md-block">
</ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle me-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <ul class="navbar-nav flex-nowrap ms-auto">
                            <li class="nav-item dropdown d-sm-none no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><i class="fas fa-search"></i></a>
                                <div class="dropdown-menu dropdown-menu-end p-3 animated--grow-in" aria-labelledby="searchDropdown">
                                    <form class="me-auto navbar-search w-100">
                                        <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Search for ...">
                                            <div class="input-group-append"><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
                                        </div>
                                    </form>
                                </div>
                            </li>
                            <li class="nav-item dropdown no-arrow">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><span class="d-none d-lg-inline me-2 text-gray-600 small">Administrator</span><i class="fas fa-user-tie fa-fw" style="font-size: 26px;color: var(--bs-red);"></i></a>
                                    <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in"><a class="dropdown-item" href="#"><i class="fas fa-user fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Profile</a><a class="dropdown-item" href="#"><i class="fas fa-cogs fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Settings</a><a class="dropdown-item" href="#"><i class="fas fa-list fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Activity log</a>
                                        <div class="dropdown-divider"></div><a class="dropdown-item" href="#"><i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="container-fluid">
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Customer Details</h1><button class="btn btn-danger btn-sm shadow-sm d-none d-sm-inline-block" data-bs-target="#add" data-bs-toggle="modal" type="button"><i class="fas fa-plus text-white-50 fa-sm"></i> Add Customers</button>
                    </div>
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div>
                                                <table class="table table-hover table-bordered dataTable no-footer" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                                    <thead>
                                                        <tr role="row">
                                                            <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="#: activate to sort column descending" style="width: 79.9062px;">#</th>
                                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Fullname: activate to sort column ascending" style="width: 218.844px;">Fullname</th>
                                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Gender: activate to sort column ascending" style="width: 184.453px;">Gender</th>
                                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Contact | Email: activate to sort column ascending" style="width: 430.719px;">Contact | Email</th>
                                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Address: activate to sort column ascending" style="width: 253.781px;">Address</th>
                                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label=": activate to sort column ascending" style="width: 173.297px;"></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php 
                                                        view_customers();
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © Car Rental System 2023</span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <div class="modal fade" role="dialog" tabindex="-1" id="add">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Create Customer</h4><button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="functions/create-customer.php" method="post">
                        <div><label class="form-label">Customer Fullname</label><input class="form-control" type="text" name="fullname" require ></div>
                        <div><label class="form-label">Customer Address</label><input class="form-control" type="text" name="address" require ></div>
                        <div><label class="form-label">Customer Email</label><input class="form-control" type="email" name="email" require ></div>
                        <div><label class="form-label">Customer Phone</label><input class="form-control" type="tel" name="phone" required="" maxlength="11" minlength="11" pattern="[0-9]+""></div>
                        <div><label class="form-label">Sex</label><select class="form-select" name="sex">
                                <optgroup label="Sex">
                                    <option value="Male" selected="">Male</option>
                                    <option value="Female">Female</option>
                                </optgroup>
                            </select></div>
                    
                </div>
                <div class="modal-footer"><button class="btn btn-light" type="button" data-bs-dismiss="modal">Close</button><button class="btn btn-danger" type="submit">Save</button></div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" role="dialog" tabindex="-1" id="update">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Update Customer</h4><button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                <form action="functions/update-customer.php" method="post"> 
                        <input type="hidden" name="data_id">
                        <div><label class="form-label">Customer Fullname</label><input class="form-control" type="text" name="fullname" require ></div>
                        <div><label class="form-label">Customer Address</label><input class="form-control" type="text" name="address" require ></div>
                        <div><label class="form-label">Customer Email</label><input class="form-control" type="email" name="email" require ></div>
                        <div><label class="form-label">Customer Phone</label><input class="form-control" type="tel" name="phone" required="" maxlength="11" minlength="11" pattern="[0-9]+""></div>
                        <div><label class="form-label">Sex</label><select class="form-select" name="sex">
                                <optgroup label="Sex">
                                    <option value="Male" selected="">Male</option>
                                    <option value="Female">Female</option>
                                </optgroup>
                            </select></div>
                    
                    </div>
                <div class="modal-footer"><button class="btn btn-light" type="button" data-bs-dismiss="modal">Close</button><button class="btn btn-danger" type="submit">Save</button></div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" role="dialog" tabindex="-1" id="remove">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Remove</h4><button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to remove this customer?</p>
                </div>
                <form action="functions/remove-customer.php" method="post">
                <input type="hidden" name="data_id">
                <div class="modal-footer"><button class="btn btn-light" type="button" data-bs-dismiss="modal">Close</button><button class="btn btn-danger" type="submit">Remove</button></div>
                </form>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/sweetalert.min.js"></script>
    <script>
        const url = window.location.href;

        if (url.indexOf("#success") > -1) {
        swal("Success", "CRS - Car Rental System", "success");
        }

        if (url.indexOf("#error") > -1) {
        swal("Error", "CRS - Car Rental System", "error");
        }

        $('button[data-bs-target="#update"]').on('click', function() {
            var id = $(this).data('id');
            var fullname = $(this).data('fullname');
            var address = $(this).data('address');
            var email = $(this).data('email');
            var phone = $(this).data('phone');
            var sex = $(this).data('sex');
            

            console.log(id, fullname, address, email, phone, sex);

            $('input[name="data_id"]').each(function() {
                $(this).val(id);
            });
            $('input[name="fullname"]').each(function() {
                $(this).val(fullname);
            });
            $('input[name="address"]').each(function() {
                $(this).val(address);
            });
            $('input[name="email"]').each(function() {
                $(this).val(email);
            });
            $('input[name="phone"]').each(function() {
                $(this).val(phone);
            });
            $('input[name="sex"]').each(function() {
                $(this).val(sex);
            });
            
        });


        $('button[data-bs-target="#remove"]').on('click', function() {
            var id = $(this).data('id');
            console.log(id);
            $('input[name="data_id"]').each(function() {
                $(this).val(id);
            });
        });

    </script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/datatables-demo.js"></script>
    <script src="assets/js/dataTables.bootstrap4.js"></script>
    <script src="assets/js/dataTables.bootstrap4.min.js"></script>
    <script src="assets/js/jquery.dataTables.min-1.js"></script>
    <script src="assets/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/jquery.easing.compatibility.js"></script>
    <script src="assets/js/jquery.easing.js"></script>
    <script src="assets/js/jquery.easing.min.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>