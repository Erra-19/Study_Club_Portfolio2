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
                        <form action="{{ route('EasySendUpdate', $kustomer->id) }}" method="post">
                            @csrf
                            @method('PUT')                            
                            <div class="row g-3">
                                <!-- Sender Information -->
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control @error('nama_pengirim') is-invalid @enderror" id="nama_pengirim" placeholder="Sender Name" name="nama_pengirim" value="{{ $kustomer->nama_pengirim }}">
                                        <label for="nama_pengirim">Nama Pengirim</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control @error('email_pengirim') is-invalid @enderror" id="email_pengirim" placeholder="Sender Email" name="email_pengirim" value="{{ $kustomer->email_pengirim }}">
                                        <label for="email_pengirim">Email Pengirim</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="tel" class="form-control @error('nomor_telpon_pengirim') is-invalid @enderror" id="nomor_telpon_pengirim" placeholder="Sender Phone" name="nomor_telpon_pengirim" value="{{ $kustomer->nomor_telpon_pengirim }}">
                                        <label for="nomor_telpon_pengirim">No. Telp Pengirim</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control @error('alamat_kirim') is-invalid @enderror" id="alamat_kirim" placeholder="Sender Address" name="alamat_kirim" value="{{ $kustomer->alamat_kirim }}">
                                        <label for="alamat_kirim">Alamat Kirim</label>
                                    </div>
                                </div>
                        
                                <!-- Receiver Information -->
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control @error('nama_penerima') is-invalid @enderror" id="nama_penerima" placeholder="Receiver Name" name="nama_penerima" value="{{ $kustomer->nama_penerima }}">
                                        <label for="nama_penerima">Nama Penerima</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="tel" class="form-control @error('nomor_telpon_penerima') is-invalid @enderror" id="nomor_telpon_penerima" placeholder="Receiver Phone" name="nomor_telpon_penerima" value="{{ $kustomer->nomor_telpon_penerima }}">
                                        <label for="nomor_telpon_penerima">No. Telp Penerima</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control @error('alamat_tujuan') is-invalid @enderror" id="alamat_tujuan" placeholder="Receiver Address" name="alamat_tujuan" value="{{ $kustomer->alamat_tujuan }}">
                                        <label for="alamat_tujuan">Alamat Tujuan</label>
                                    </div>
                                </div>
                        
                                <!-- Item Information -->
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control @error('nama_barang') is-invalid @enderror" id="nama_barang" placeholder="Item Name" name="nama_barang" value="{{ $barang->nama_barang }}">
                                        <label for="nama_barang">Nama Barang</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-select @error('id_jenis_barang') is-invalid @enderror" id="id_jenis_barang" name="id_jenis_barang">
                                            <option value="">Pilih Jenis Barang</option>
                                            @foreach($jenisbarang as $jenis)
                                                <option value="{{ $jenis->id }}" {{ $barang->id_jenis_barang == $jenis->id ? 'selected' : '' }}>
                                                    {{ $jenis->jenis_barang }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <label for="id_jenis_barang">Jenis Barang</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="number" class="form-control @error('berat_barang') is-invalid @enderror" id="berat_barang" placeholder="Item Weight" name="berat_barang" value="{{ $barang->berat_barang }}">
                                        <label for="berat_barang">Berat Barang (gram)</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="fragility-question" class="me-3">Apakah mudah pecah?</label>
                                    <div id="fragility-question">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input @error('mudah_pecah') is-invalid @enderror" type="radio" name="mudah_pecah" id="fragile" value="fragile" {{ $barang->mudah_pecah == 'fragile' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="fragile">Yes</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input @error('mudah_pecah') is-invalid @enderror" type="radio" name="mudah_pecah" id="not_fragile" value="not_fragile" {{ $barang->mudah_pecah == 'not_fragile' ? 'checked' : '' }}>
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