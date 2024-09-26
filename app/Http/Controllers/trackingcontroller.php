<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Item;
use App\Models\Item_category;
use App\Models\Receipttemp;

class TrackingController extends Controller
{
    public function index()
    {
        return view('tracking.index');
    }

    public function search(Request $request)
    {
        $receipt = $request->input('receipt');
        $receipt_number = $receipt;
        $receipttemp = Receipttemp::where('receipt_number', $receipt)->first();

        if (!$receipttemp) {
            return redirect()->back()->with('error', 'Receipt number not found');
        }

        $customer = Customer::find($receipttemp->customer_id);

        if (!$customer) {
            return redirect()->back()->with('error', 'Customer not found.');
        }

        $items = Item::where('customer_id', $customer->id)->first();

        if (!$items) {
            return redirect()->back()->with('error', 'Item not found.');
        }

        $item_categories = Item_category::find($items->category_id);

        $data = [
            [            
                'sender_name' => $customer->sender_name,
                'sender_email' => $customer->sender_email,
                'sender_phone_number' => $customer->sender_phone_number,
                'address_from' => $customer->address_from,
                'receiver_name' => $customer->receiver_name,
                'receiver_phone_number' => $customer->receiver_phone_number,
                'address_to' => $customer->address_to,
                'item_name' => $items->item_name,
                'item_category' => $item_categories->category_name,
                'item_weight' => $items->item_weight,
                'fragile' => $items->fragile ? 'Yes' : 'No',
                'status' => $customer->status,
                'customer_id' => $customer->id,
            ]
        ];

        return view('EasySendDetail', ['data' => $data, 'receipt_number' => $receipt_number]);
    }
}