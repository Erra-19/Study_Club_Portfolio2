<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Item;
use App\Models\Item_category;
use App\Models\Receipttemp;
use App\Models\Shipment_status;

class EasySendController extends Controller
{
    public function dropdown()
    {
        $item_categories = Item_category::all();
        return view('EasySend', compact('item_categories'));
    }    

    public function form(Request $request)
    {    
        $request->validate([
            'sender_name' => 'required|string|max:255',
            'sender_email' => 'required|email|max:255',
            'sender_phone_number' => 'required|numeric',
            'address_from' => 'required|string|max:255',
            'receiver_name' => 'required|string|max:255',
            'receiver_phone_number' => 'required|numeric',
            'address_to' => 'required|string|max:255',
            'item_name' => 'required|string|max:255',
            'category_id' => 'required|exists:Item_categories,id',
            'item_weight' => 'required|numeric',
            'fragile' => 'required|in:fragile,not_fragile',
        ]);
    
        $customer = Customer::create([
            'sender_name' => $request->input('sender_name'),
            'sender_email' => $request->input('sender_email'),
            'sender_phone_number' => $request->input('sender_phone_number'),
            'receiver_name' => $request->input('receiver_name'),
            'receiver_phone_number' => $request->input('receiver_phone_number'),
            'address_from' => $request->input('address_from'),
            'address_to' => $request->input('address_to'),
            'status' => 'pending',
        ]);

        $item = Item::create([
            'item_name' => $request->input('item_name'),
            'category_id' => $request->input('category_id'),
            'item_weight' => $request->input('item_weight'),
            'fragile' => $request->input('fragile') === 'fragile' ? 1 : 0,
            'customer_id' => $customer->id,
        ]);

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

        $randomNumber = rand(100000, 999999);
    
        $Receipttemp = new Receipttemp();
        $Receipttemp->customer_id = $customer->id;
        $Receipttemp->receipt_number = $randomNumber;
        $Receipttemp->save();

        return redirect()->route('easysenddetail', ['data' => $data, 'receipt_number' => $randomNumber,]);
    }
}