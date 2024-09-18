<x-layout title="Login Staff">
    <x-navbar brand="Logistic"></x-navbar>
    <!-- Contact Start -->
    <div class="container-fluid overflow-hidden py-5 px-lg-0">
        <div class="container contact-page py-5 px-lg-0">
            <div class="row g-5 mx-lg-0">
                <div class="col-md-6 contact-form wow fadeIn" data-wow-delay="0.1s">
                    <h6 class="text-secondary text-uppercase">Please Log In</h6>
                    <h1 class="mb-4">Only For Staff!</h1>
                    <p class="mb-4">If you are a customer, please visit <a href="/EasySend">EasySend</a> for pickup orders.</p>
                    <div class="bg-light p-4">
                        <form action="/login" method="POST">
                            @csrf
                            <div class="row g-3">
                                <!-- Email Input -->
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="email" 
                                            class="form-control @error('email') is-invalid @enderror" 
                                            id="email" 
                                            name="email" 
                                            placeholder="Email"
                                            value="{{ old('email') }}" 
                                            required>
                                        <label for="email">Email</label>
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                        
                                <!-- Password Input -->
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="password" 
                                            class="form-control @error('password') is-invalid @enderror" 
                                            id="password" 
                                            name="password" 
                                            placeholder="Password" 
                                            required>
                                        <label for="password">Password</label>
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                        
                                        <!-- Password Toggle (optional: requires JS to work) -->
                                        <span class="password-toggle" onclick="togglePassword()">
                                            <i class="fas fa-eye" id="toggle-password"></i>
                                        </span>
                                    </div>
                                </div>
                        
                                <!-- Submit Button -->
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit">Login</button>
                                </div>
                            </div>
                        
                            <!-- Display Validation Errors -->
                            @if ($errors->any())
                                <div class="alert alert-danger mt-3">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
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