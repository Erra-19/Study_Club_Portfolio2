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
                        <a href="{{ url('/EasySend/update', $data['customer_id']) }}" 
                            class="btn btn-danger" 
                            style="margin-left: 40%;" 
                            @if($data['status'] == 'confirmed') disabled @endif>
                            Update
                        </a>                         
                        <form action="{{ route('easysend.delete', $data['customer_id']) }}" 
                            method="POST" 
                            onsubmit="return confirm('Are you sure you want to delete this record?');" 
                            style="margin-left: 60%; margin-top:-3.1%;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"
                            @if($data['status'] == 'confirmed') disabled @endif>
                                Delete
                            </button>
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