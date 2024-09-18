<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Receipttemp;
use App\Models\Customer;
use App\Models\Item;
use App\Models\Item_category;
use App\Models\Staff;
use App\Models\Vehicle;

class PickupController extends Controller
{
    // Method to search for orders by receipt number
    public function searchByReceiptNumber(Request $request)
{
    $request->validate([
        'receipt_number' => 'required|numeric',
    ]);

    // Find the receipt by its number
    $receipt = Receipttemp::where('receipt_number', $request->input('receipt_number'))->first();

    if (!$receipt) {
        return redirect()->back()->withErrors(['receipt_number' => 'Receipt number not found.']);
    }

    // Find the associated customer and item
    $customer = Customer::find($receipt->customer_id);
    $item = Item::where('customer_id', $customer->id)->first();

    $data = [
        [
            'sender_name' => $customer->sender_name,
            'sender_email' => $customer->sender_email,
            'sender_phone_number' => $customer->sender_phone_number,
            'address_from' => $customer->address_from,
            'receiver_name' => $customer->receiver_name,
            'receiver_phone_number' => $customer->receiver_phone_number,
            'address_to' => $customer->address_to,
            'item_name' => $item->item_name,
            'item_category' => $item->item_category->category_name,
            'item_weight' => $item->item_weight,
            'fragile' => $item->fragile ? 'Yes' : 'No',
            'status' => $customer->status,
            'customer_id' => $customer->id,
        ]
    ];

    // Fetch couriers and vehicles
    $couriers = Staff::where('staff_job', 'courier')->get();
    $vehicles = Vehicle::all();
    $receipt_number = $receipt->receipt_number;

    return view('pickup', compact('data', 'couriers', 'vehicles', 'receipt_number'));
}


    // Method to show the form for assigning courier and vehicle details
    public function showAssignCourierForm($receipt_number)
    {
        $receipt = Receipttemp::where('receipt_number', $receipt_number)->first();
        
        if (!$receipt) {
            return redirect()->back()->withErrors(['receipt_number' => 'Invalid receipt number.']);
        }

        // Fetch couriers (staff members with the job of courier)
        $couriers = Staff::where('staff_job', 'courier')->get();

        // Fetch vehicles
        $vehicles = Vehicle::all();

        return view('admin.assign_courier', compact('receipt', 'couriers', 'vehicles'));
    }

    // Method to handle courier and vehicle assignment
    public function assignCourier(Request $request, $receipt_number)
{
    $request->validate([
        'courier_id' => 'required|exists:staff,id',
        'vehicle_id' => 'required|exists:vehicles,id',
    ]);

    // Find the receipt
    $receipt = Receipttemp::where('receipt_number', $receipt_number)->first();
    if (!$receipt) {
        return redirect()->back()->withErrors(['receipt_number' => 'Receipt number not found.']);
    }

    // Save courier and vehicle details to the order (create an order log or update a related table)
    $receipt->courier_id = $request->input('courier_id');
    $receipt->vehicle_id = $request->input('vehicle_id');
    $receipt->status = 'Assigned';
    $receipt->save();

    $customer = Customer::find($receipt->customer_id);
    if (!$customer) {
        return redirect()->back()->withErrors(['customer_id' => 'Customer not found.']);
    }

    $customer->status = 'confirmed';
    $customer->save();

    return redirect()->route('admin')->with('success', 'Courier and vehicle assigned successfully!');
}

}