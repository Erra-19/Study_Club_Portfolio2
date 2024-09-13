<x-layout title="EasySend">
    <x-navbar brand="Logistic"></x-navbar>
    <!-- Contact Start -->
    <div class="container-fluid overflow-hidden py-5 px-lg-0">
        <div class="container contact-page py-5 px-lg-0">
            <div class="row g-5 mx-lg-0">
                <div class="col-md-6 contact-form wow fadeIn" data-wow-delay="0.1s" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 50%;">                    
                    <h1 class="mb-4">Shipping Detail Form</h1>
                    <p class="mb-4">Please provide the details of your shipment below. <br> Make sure to double-check the information before submitting to ensure accurate and timely delivery.</p>
                    <div class="bg-light p-4">
                        <form action="{{ route('EasySendUpdate', $customer->id) }}" method="post">
                            @csrf
                            @method('PUT')                            
                            <div class="row g-3">
                                <!-- Sender Information -->
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control @error('sender_name') is-invalid @enderror" id="sender_name" placeholder="Sender Name" name="sender_name" value="{{ $customer->sender_name }}">
                                        <label for="sender_name">Nama Pengirim</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control @error('sender_email') is-invalid @enderror" id="sender_email" placeholder="Sender Email" name="sender_email" value="{{ $customer->sender_email }}">
                                        <label for="sender_email">Email Pengirim</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="tel" class="form-control @error('sender_phone_number') is-invalid @enderror" id="sender_phone_number" placeholder="Sender Phone" name="sender_phone_number" value="{{ $customer->sender_phone_number }}">
                                        <label for="sender_phone_number">No. Telp Pengirim</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control @error('address_from') is-invalid @enderror" id="address_from" placeholder="Sender Address" name="address_from" value="{{ $customer->address_from }}">
                                        <label for="address_from">Alamat Kirim</label>
                                    </div>
                                </div>
                        
                                <!-- Receiver Information -->
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control @error('receiver_name') is-invalid @enderror" id="receiver_name" placeholder="Receiver Name" name="receiver_name" value="{{ $customer->receiver_name }}">
                                        <label for="receiver_name">Nama Penerima</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="tel" class="form-control @error('receiver_phone_number') is-invalid @enderror" id="receiver_phone_number" placeholder="Receiver Phone" name="receiver_phone_number" value="{{ $customer->receiver_phone_number }}">
                                        <label for="receiver_phone_number">No. Telp Penerima</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control @error('address_to') is-invalid @enderror" id="address_to" placeholder="Receiver Address" name="address_to" value="{{ $customer->address_to }}">
                                        <label for="address_to">Alamat Tujuan</label>
                                    </div>
                                </div>
                        
                                <!-- Item Information -->
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control @error('item_name') is-invalid @enderror" id="item_name" placeholder="Item Name" name="item_name" value="{{ $item->item_name }}">
                                        <label for="item_name">Nama Barang</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-select @error('category_id') is-invalid @enderror" id="jenis_barang" name="category_id">
                                            <option value="">Pilih Jenis Barang</option>
                                            @foreach($item_categories as $category)
                                                <option value="{{ $category->id }}" {{ $item->category_id == $category->id ? 'selected' : '' }}>
                                                    {{ $category->category_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <label for="jenis_barang">Jenis Barang</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="number" class="form-control @error('item_weight') is-invalid @enderror" id="item_weight" placeholder="Item Weight" name="item_weight" value="{{ $item->item_weight }}">
                                        <label for="item_weight">Berat Barang (gram)</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="fragility-question" class="me-3">Apakah mudah pecah?</label>
                                    <div id="fragility-question">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input @error('fragile') is-invalid @enderror" type="radio" name="fragile" id="fragile" value="fragile" {{ $item->fragile == 'fragile' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="fragile">Yes</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input @error('fragile') is-invalid @enderror" type="radio" name="fragile" id="not_fragile" value="not_fragile" {{ $item->fragile == 'not_fragile' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="not_fragile">No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit">Konfirmasi Detail Pengiriman</button>
                                </div>
                            </div>
                        </form>
                    </div>                
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->


    <!-- Footer Start -->
    



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