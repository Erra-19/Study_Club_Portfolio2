<x-layout title="EasySend Detail">
    <x-navbar brand="Logistic"></x-navbar>
    <!-- Contact Start -->
    <div class="container-fluid overflow-hidden py-5 px-lg-0">
        <div class="container contact-page py-5 px-lg-0">
            <div class="row g-5 mx-lg-0">
                <div class="col-md-6 contact-form wow fadeIn" data-wow-delay="0.1s" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 70%;">                    
                    <h1 class="mb-4">Pickup Order Detail</h1>
                    <h4 style="color: red;">PLEASE TAKE A SCREENSHOT FOR PROOF.</h4>                    
                    <p class="mb-4">Below are the detail of your pickup order.</p>
                    <div class="bg-light p-4">
                        <h3>Nomor Resi: {{ $nomor_resi }}</h3>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nama Pengirim</th>
                                        <th>Email Pengirim</th>
                                        <th>No. Telp Pengirim</th>
                                        <th>Alamat Kirim</th>
                                        <th>Nama Penerima</th>
                                        <th>No. Telp Penerima</th>
                                        <th>Alamat Tujuan</th>
                                        <th>Nama Barang</th>
                                        <th>Jenis Barang</th>
                                        <th>Berat Barang (gram)</th>
                                        <th>Mudah Pecah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $data)
                                    <tr>
                                        <td>{{ $data['nama_pengirim'] }}</td>
                                        <td>{{ $data['email_pengirim'] }}</td>
                                        <td>{{ $data['nomor_telpon_pengirim'] }}</td>
                                        <td>{{ $data['alamat_kirim'] }}</td>
                                        <td>{{ $data['nama_penerima'] }}</td>
                                        <td>{{ $data['nomor_telpon_penerima'] }}</td>
                                        <td>{{ $data['alamat_tujuan'] }}</td>
                                        <td>{{ $data['nama_barang'] }}</td>
                                        <td>{{ $data['jenis_barang'] }}</td>
                                        <td>{{ $data['berat_barang'] }}g</td>
                                        <td>{{ $data['mudah_pecah'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <a href="{{ url('/EasySend/update', $data['id_kustomer']) }}" class="btn btn-primary">Update</a>
                        <form action="/deletemobil2/" method="POST" onsubmit="return confirm('Are you sure you want to delete this record?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
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
</x-layout>