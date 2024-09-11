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
                        <form action="/EasySend" method="post">
                            @csrf
                            <div class="row g-3">
                                <!-- Sender Information -->
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control @error('sender_name') is-invalid @enderror" id="sender_name" placeholder="Sender Name" name="nama_pengirim">
                                        <label for="sender_name">Nama Pengirim</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control @error('sender_email') is-invalid @enderror" id="sender_email" placeholder="Sender Email" name="email_pengirim">
                                        <label for="sender_email">Email Pengirim</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="tel" class="form-control @error('sender_phone') is-invalid @enderror" id="sender_phone" placeholder="Sender Phone" name="nomor_telpon_pengirim">
                                        <label for="sender_phone">No. Telp Pengirim</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control @error('sender_address') is-invalid @enderror" id="sender_address" placeholder="Sender Address" name="alamat_kirim">
                                        <label for="sender_address">Alamat Kirim</label>
                                    </div>
                                </div>
                        
                                <!-- Receiver Information -->
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control @error('receiver_name') is-invalid @enderror" id="receiver_name" placeholder="Receiver Name" name="nama_penerima">
                                        <label for="receiver_name">Nama Penerima</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="tel" class="form-control @error('receiver_phone') is-invalid @enderror" id="receiver_phone" placeholder="Receiver Phone" name="nomor_telpon_penerima">
                                        <label for="receiver_phone">No. Telp Penerima</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control @error('receiver_address') is-invalid @enderror" id="receiver_address" placeholder="Receiver Address" name="alamat_tujuan">
                                        <label for="receiver_address">Alamat Tujuan</label>
                                    </div>
                                </div>
                        
                                <!-- Item Information -->
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control @error('item_name') is-invalid @enderror" id="item_name" placeholder="Item Name" name="nama_barang">
                                        <label for="item_name">Nama Barang</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-select @error('id_jenis_barang') is-invalid @enderror" id="jenis_barang" name="id_jenis_barang">
                                            <option value="">Pilih Jenis Barang</option>
                                            @foreach($jenisbarang as $jenis)
                                                <option value="{{ $jenis->id }}" {{ old('id_jenis_barang') == $jenis->id ? 'selected' : '' }}>
                                                    {{ $jenis->jenis_barang }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <label for="jenis_barang">Jenis Barang</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="number" class="form-control @error('item_weight') is-invalid @enderror" id="item_weight" placeholder="Item Weight" name="berat_barang">
                                        <label for="item_weight">Berat Barang (gram)</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="fragility-question" class="me-3">Apakah mudah pecah?</label>
                                    <div id="fragility-question">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input @error('fragility') is-invalid @enderror" type="radio" name="mudah_pecah" id="fragile" value="fragile">
                                            <label class="form-check-label" for="fragile">Yes</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input @error('fragility') is-invalid @enderror" type="radio" name="mudah_pecah" id="not_fragile" value="not_fragile">
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