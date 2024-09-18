<x-layout title="About">
    <x-navbar brand="Logistic"></x-navbar>
    <div class="container-fluid overflow-hidden py-5 px-lg-0">
        <div class="container about py-5 px-lg-0">
            <div class="row g-5 mx-lg-0">
                <div class="col-lg-6 ps-lg-0 wow fadeInLeft" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute img-fluid w-100 h-100" src="img/about.jpg" style="object-fit: cover;" alt="">
                    </div>
                </div>
                <div class="col-lg-6 about-text wow fadeInUp" data-wow-delay="0.3s">
                    <h6 class="text-secondary text-uppercase mb-3">About Us</h6>
                    <h1 class="mb-5">A logistic website made for an assignment for the studyclub HIMSI</h1>
                    <p class="mb-5">A logistic website made for an assignment for the studyclub HIMSI made by Errico Bagus Rahmatullah 3rd semester in Bina Sarana Informatika University</p>
                    <div class="row g-4 mb-5">
                        <h1 class="mb-5">Free pickup!</h1>
                    <p class="mb-5">Get free pickup order for your package from the closest collection point to you by filling this page!</p>                    
                    </div>
                    <a href="/EasySend" class="btn btn-primary py-3 px-5">EasySend</a>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Fact Start -->
    <div class="container-xxl py-5">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-5 wow fadeInUp" data-wow-delay="0.1s">                
                    <h1 class="mb-5">Deliveries</h1>
                    <p class="mb-5">Check your delivery orders here!</p>
                    <div class="d-flex align-items-center">                        
                        <div class="ps-4">                            
                            <div class="col-12 mb-3">
                                <!-- Form Search Bar -->
                                <form action="{{ route('tracking.search') }}" method="POST">
                                    @csrf
                                    <div class="input-group">
                                        <input type="text" name="receipt" id="receipt" class="form-control" placeholder="Enter your tracking number" required>
                                        <button type="submit" class="btn btn-primary">Search</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> 
                <div class="col-lg-6">
                    <div class="row g-4 align-items-center">
                        <div class="col-sm-6">
                            <div class="bg-primary p-4 mb-4 wow fadeIn" data-wow-delay="0.3s">
                                <i class="fa fa-users fa-2x text-white mb-3"></i>
                                <h2 class="text-white mb-2" data-toggle="counter-up">1234</h2>
                                <p class="text-white mb-0">Happy Clients</p>
                            </div>
                            <div class="bg-secondary p-4 wow fadeIn" data-wow-delay="0.5s">
                                <i class="fa fa-ship fa-2x text-white mb-3"></i>
                                <h2 class="text-white mb-2" data-toggle="counter-up">1234</h2>
                                <p class="text-white mb-0">Complete Shipments</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="bg-success p-4 wow fadeIn" data-wow-delay="0.7s">
                                <i class="fa fa-star fa-2x text-white mb-3"></i>
                                <h2 class="text-white mb-2" data-toggle="counter-up">1234</h2>
                                <p class="text-white mb-0">Customer Reviews</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>