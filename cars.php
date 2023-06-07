<?php
include_once "functions/authentications.php";
include_once "functions/views.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Car Section - Car Rental System</title>
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
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0" style="background: linear-gradient(150deg, #d44545 24%, #000000);">
            <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-car fa-fw"></i></div>
                    <div class="sidebar-brand-text mx-3"><span class="text-center">Car Rental<br>&nbsp;System</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul id="accordionSidebar" class="navbar-nav text-light">
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
                        <h1 class="h3 mb-0 text-gray-800">Car Details</h1><button class="btn btn-danger btn-sm shadow-sm d-none d-sm-inline-block" type="button" data-bs-target="#add" data-bs-toggle="modal"><i class="fas fa-plus text-white-50 fa-sm"></i> Add Car Details</button>
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
                                                            <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="#: activate to sort column descending" style="width: 73px;">#</th>
                                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Car: activate to sort column ascending" style="width: 108px;">Car</th>
                                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Brand/Manufacturer: activate to sort column ascending" style="width: 380px;">Brand/Manufacturer</th>
                                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Color: activate to sort column ascending" style="width: 139px;">Color</th>
                                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Price Rent: activate to sort column ascending" style="width: 218px;">Price Rent</th>
                                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 226px;">Status</th>
                                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label=": activate to sort column ascending" style="width: 160px;"></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                            view_cars();
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
                    <h4 class="modal-title">Create Car</h4><button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="functions/create-car.php" method="POST">
                        <div><label class="form-label">Name</label><input class="form-control" type="text" name="name" placeholder="Car name" required=""></div>
                        <div><label class="form-label">Brand/Manufacturer</label><input class="form-control" type="text" name="brand" placeholder="Car Brand" required=""></div>
                        <div><label class="form-label">Color</label><input class="form-control" type="text" placeholder="Car Color" name="color" required=""></div>
                        <div><label class="form-label">Price</label><input class="form-control" type="number" required="" name="price" placeholder="Car Price"></div>
                        <div><label class="form-label">Status</label><select class="form-select" readonly="" name="status" required="">
                                <optgroup label="Car Availability">
                                    <option value="1" selected="">Available</option>
                                    <option value="0">Not Available</option>
                                </optgroup>
                            </select></div>
                    
                </div>
                <div class="modal-footer">
                <button class="btn btn-light" type="button" data-bs-dismiss="modal">Close</button>
                <button class="btn btn-danger" type="submit">Save</button></div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" role="dialog" tabindex="-1" id="update">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Update Car</h4><button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="functions/update-car.php" method="post">
                        <input type="hidden" name="data_id">
                        <div><label class="form-label">Name</label><input class="form-control" type="text" name="name" placeholder="Car name" required=""></div>
                        <div><label class="form-label">Brand/Manufacturer</label><input class="form-control" type="text" name="brand" placeholder="Car Brand" required=""></div>
                        <div><label class="form-label">Color</label><input class="form-control" type="text" placeholder="Car Color" name="color" required=""></div>
                        <div><label class="form-label">Price</label><input class="form-control" type="number" required="" name="price" placeholder="Car Price"></div>
                        <div><label class="form-label">Status</label><select class="form-select" readonly="" name="status" required="">
                                <option value="0">Not Available</option>
                                <option value="1" selected="">Available</option>
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
                    <p>Are you sure you want to remove this car?</p>
                </div>
                <form action="functions/remove-car.php" method="post">
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
            var name = $(this).data('name');
            var brand = $(this).data('brand');
            var color = $(this).data('color');
            var price = $(this).data('price');
            
            if ($(this).data('status') == 1) {
                var status = "Available";
            } else {
                var status =  "Not Available";
            }

            console.log(id, name, brand, color, price, status);

            $('input[name="data_id"]').each(function() {
                $(this).val(id);
            });
            $('input[name="name"]').each(function() {
                $(this).val(name);
            });
            $('input[name="brand"]').each(function() {
                $(this).val(brand);
            });
            $('input[name="color"]').each(function() {
                $(this).val(color);
            });
            $('input[name="price"]').each(function() {
                $(this).val(price);
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