<?php
include_once "functions/authentications.php";
include_once 'functions/views.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Dashboard - Car Rental System</title>
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
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-left-primary h-100 py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col mr-2">
                                            <div class="text-uppercase text-primary text-xs font-weight-bold mb-1"><span>Available Cars</span></div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><span><?php get_cars_count(); ?></span></div>
                                        </div>
                                        <div class="col-auto"><i class="fas fa-car fa-2x text-gray-500"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-left-info h-100 py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col mr-2">
                                            <div class="text-uppercase text-info text-xs font-weight-bold mb-1"><span>Customers</span></div>
                                            <div class="row align-items-center no-gutters">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><span><?php get_customers_count(); ?></span></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto"><i class="fas fa-users fa-2x text-gray-500"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-left-success h-100 py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col mr-2">
                                            <div class="text-uppercase text-success text-xs font-weight-bold mb-1"><span>Transactions</span></div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><span>₱ <?php get_transactions_sales(); ?></span></div>
                                        </div>
                                        <div class="col-auto"><i class="fas fa-money-bill-alt fa-2x text-gray-500"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-left-danger h-100 py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col mr-2">
                                            <div class="text-uppercase text-danger text-xs font-weight-bold mb-1"><span>Completed Rentals</span></div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><span><?php get_transactions_returned(); ?></span></div>
                                        </div>
                                        <div class="col-auto"><i class="fas fa-check-double fa-2x text-gray-500"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="card shadow mb-4">
                                <div class="card-header d-flex flex-row justify-content-between align-items-center py-3">
                                    <h6 class="text-danger m-0 font-weight-bold">New Cars</h6>
                                    <div class="dropdown no-arrow"><a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i></a>
                                        <div class="shadow dropdown-menu dropdown-menu-right animated--fade-in" aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header"><span>Select display:</span></div><a class="dropdown-item" href="#">Available:</a><a class="dropdown-item" href="#">Dirental</a>
                                            <div class="dropdown-divider"></div><a class="dropdown-item" href="#">All Cars</a>
                                        </div>
                                    </div>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <?php
                                     new_cars();    
                                    ?>
                                </ul>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card shadow mb-4">
                                <div class="card-header d-flex flex-row justify-content-between align-items-center py-3">
                                    <h6 class="text-danger m-0 font-weight-bold">New Customers</h6>
                                    <div class="dropdown no-arrow"><a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i></a>
                                        <div class="shadow dropdown-menu dropdown-menu-right animated--fade-in" aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header"><span>Select display:</span></div><a class="dropdown-item" href="#">Men</a><a class="dropdown-item" href="#">Women</a>
                                            <div class="dropdown-divider"></div><a class="dropdown-item" href="#">All</a>
                                        </div>
                                    </div>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <?php
                                        new_customers();
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="card shadow mb-4">
                                <div class="card-header d-flex flex-row justify-content-between align-items-center py-3">
                                    <h6 class="text-danger m-0 font-weight-bold">Recent Transactions</h6>
                                    <div class="dropdown no-arrow"><a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i></a>
                                        <div class="shadow dropdown-menu dropdown-menu-right animated--fade-in" aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header"><span>Select display:</span></div><a class="dropdown-item" href="#">Transaction Completed</a><a class="dropdown-item" href="#">Maturity Transaction</a>
                                            <div class="dropdown-divider"></div><a class="dropdown-item" href="#">All Transactions</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div>
                                                        <table class="table table-hover dataTable no-footer" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                                            <thead>
                                                                <tr role="row">
                                                                    <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Transaction Date: activate to sort column descending" style="width: 87px;">Transaction Date</th>
                                                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Customer: activate to sort column ascending" style="width: 73px;">Customer</th>
                                                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Car: activate to sort column ascending" style="width: 25px;">Car</th>
                                                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Color: activate to sort column ascending" style="width: 41px;">Color</th>
                                                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Rented Date: activate to sort column ascending" style="width: 64px;">Rented Date</th>
                                                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Return Date: activate to sort column ascending" style="width: 64px;">Return Date</th>
                                                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Price Rented: activate to sort column ascending" style="width: 54px;">Price Rented</th>
                                                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Penalty: activate to sort column ascending" style="width: 56px;">Penalty</th>
                                                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 47px;">Status</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                               <?php
                                                                view_all_transactions();
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
                    <h3><a class="nav-link" href="reports.php"><i class="fas fa-print fa-fw"></i><span> Generate Report</span></a></h3><script src="http://localhost/CarRental_CI/assets/js/demo/chart-area-demo.js"></script>
                </div>
            </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © Car Rental System 2023</span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <script src="assets/js/jquery.min.js"></script>
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