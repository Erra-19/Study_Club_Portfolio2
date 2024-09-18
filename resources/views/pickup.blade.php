<x-layout title="admin page">
    <x-slot name="excss">
        <link rel="stylesheet" href="\css\sb-admin-2.css">
    </x-slot>
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
                <div class="sidebar-brand-text mx-3">Logistic</div>
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="/admin">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Heading -->
            <div class="sidebar-heading">
                Tools
            </div>
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">                    
                    <span>Shipments</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="/shipping">shipping</a>
                        <a class="collapse-item" href="/pickup-detail">pickup</a>
                    </div>
                </div>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
        </ul>
        <!-- End of Sidebar -->
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - Alerts -->

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Douglas McGee</span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">                                
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    

                    <!-- Content Row -->

                    <div class="row">

                        <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Pickup Request</h6>                                    
                                </div>
                                <!-- Card Body -->
                                <div class="bg-light p-4">
                                    <h3>Receipt Number: {{ $receipt_number }}</h3>
                                    <table class="table table-bordered" style="border: 1px;">
                                        <thead>
                                            <tr>
                                                <th>Sender's Name</th>
                                                <th>Sender's Email</th>
                                                <th>Sender's Phone Number</th>
                                                <th>Shipping Address</th>
                                                <th>Recipient's Name</th>
                                                <th>Recipient's Phone Number</th>
                                                <th>Destination Address</th>
                                                <th>Item Name</th>
                                                <th>Item Type</th>
                                                <th>Item Weight (grams)</th>
                                                <th>Fragile</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>                                
                                        <tbody>
                                        @foreach($data as $data)
                                            <tr>
                                                <td>{{ $data['sender_name'] }}</td>
                                                <td>{{ $data['sender_email'] }}</td>
                                                <td>{{ $data['sender_phone_number'] }}</td>
                                                <td>{{ $data['address_from'] }}</td>
                                                <td>{{ $data['receiver_name'] }}</td>
                                                <td>{{ $data['receiver_phone_number'] }}</td>
                                                <td>{{ $data['address_to'] }}</td>
                                                <td>{{ $data['item_name'] }}</td>
                                                <td>{{ $data['item_category'] }}</td>
                                                <td>{{ $data['item_weight'] }}g</td>
                                                <td>{{ $data['fragile'] }}</td>
                                                <td>{{ $data['status'] }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                
                                    <!-- Confirm Order Button -->
                                    <button id="confirm-order-btn" class="btn btn-danger" style="margin-left: 40%;">Confirm Order</button>
                                </div>
                                
                                <!-- Courier and Vehicle Form (Initially Hidden) -->
                                <div id="courier-vehicle-form" class="bg-light p-4" style="display:none;">
                                    <h3>Assign Courier and Vehicle</h3>
                                    <form action="{{ route('admin.assignCourier', $receipt_number) }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="courier_id">Courier</label>
                                            <select name="courier_id" id="courier_id" class="form-control" required>
                                                @foreach($couriers as $courier)
                                                    <option value="{{ $courier->id }}">{{ $courier->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    
                                        <div class="form-group">
                                            <label for="vehicle_id">Vehicle</label>
                                            <select name="vehicle_id" id="vehicle_id" class="form-control" required>
                                                @foreach($vehicles as $vehicle)
                                                    <option value="{{ $vehicle->id }}">{{ $vehicle->vehicle_type }}, {{ $vehicle->police_number }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    
                                        <button type="submit" class="btn btn-success">Assign Courier</button>
                                    </form>
                                    
                                </div>                        
                    </div>
                </div>
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                
            </div>
        </div>
    </div>
    <script>
        document.getElementById('confirm-order-btn').addEventListener('click', function() {
            document.getElementById('courier-vehicle-form').style.display = 'block';
            this.style.display = 'none'; // Hide the Confirm Order button
        });
    </script>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
</x-layout>