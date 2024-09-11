<x-layout title="Register New Staff">
    <x-navbar brand="Logistic"></x-navbar>


    <!-- Contact Start -->
    <div class="container-fluid overflow-hidden py-5 px-lg-0">
        <div class="container contact-page py-5 px-lg-0">
            <div class="row g-5 mx-lg-0">
                <div class="col-md-6 contact-form wow fadeIn" data-wow-delay="0.1s">
                    <h6 class="text-secondary text-uppercase">Register New Staff</h6>
                    <h1 class="mb-4">Only For Staff!</h1>
                    <p class="mb-4">If you are a customer, please visit <a href="/EasySend">EasySend</a> for pickup orders.</p>
                    <div class="bg-light p-4">
                        <form action="/register" method="post">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="nama" placeholder="Your Name" name="nama">
                                        <label for="name">Your Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control @error('job') is-invalid @enderror" id="pekerjaan" placeholder="Your Job" name="pekerjaan">
                                        <label for="job">Your Job</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control @error('staff_id') is-invalid @enderror" id="nomor_staff" placeholder="Staff ID" name="nomor_staff">
                                        <label for="staff_id">Staff ID</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="tel" class="form-control @error('phone') is-invalid @enderror" id="nomor_telpon" placeholder="Phone Number" name="nomor_telpon">
                                        <label for="phone">Phone Number</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Your Email" name="email">
                                        <label for="email">Your Email</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" name="password">
                                        <span class="password-toggle">
                                            <i class="fas fa-eye" id="toggle-password"></i>
                                        </span>
                                        <label for="password">Password</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit">Register</button>
                                </div>
                            </div>
                        </form>
                    </div>                
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <script>
        const passwordInput = document.getElementById('password');
        const togglePasswordButton = document.getElementById('toggle-password');
    
        togglePasswordButton.addEventListener('click', function() {
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                togglePasswordButton.classList.add('fa-eye-slash');
                togglePasswordButton.classList.remove('fa-eye');
            } else {
                passwordInput.type = 'password';
                togglePasswordButton.classList.add('fa-eye');
                togglePasswordButton.classList.remove('fa-eye-slash');
            }
        });
    </script>
</x-layout>