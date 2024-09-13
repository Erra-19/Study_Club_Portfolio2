<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Item;
use App\Models\Item_category;
use App\Models\Receipttemp;

class ESUpdatecontroller extends Controller
{
    public function updateform($id)
    {        
        $customer = customer::find($id);
        $item = Item::where('customer_id', $id)->first();
        $item_categories = Item_category::all();
        return view('ESUpdate', ['item' => $item, 'customer'=> $customer, 'item_categories'=>$item_categories]);
    }
    public function update(Request $request, $id)
    {    
        $customer = customer::find($id);
        $item = Item::where('customer_id', $id)->first();

        $request->validate([
            'sender_name' => 'required|string|max:255',
            'sender_email' => 'required|email|max:255',
            'sender_phone_number' => 'required|numeric',
            'address_from' => 'required|string|max:255',
            'receiver_name' => 'required|string|max:255',
            'receiver_phone_number' => 'required|numeric',
            'address_to' => 'required|string|max:255',
            'item_name' => 'required|string|max:255',
            'category_id' => 'required|exists:item_categories,id',
            'item_weight' => 'required|numeric',
            'fragile' => 'required|in:fragile,not_fragile',
        ]);

        $customer->sender_name = $request->input('sender_name');
        $customer->sender_email = $request->input('sender_email');
        $customer->sender_phone_number = $request->input('sender_phone_number');
        $customer->receiver_name = $request->input('receiver_name');
        $customer->receiver_phone_number = $request->input('receiver_phone_number');
        $customer->address_from = $request->input('address_from');
        $customer->address_to = $request->input('address_to');
        $customer->save();

        $item->item_name = $request->input('item_name');
        $item->category_id = $request->input('category_id');
        $item->item_weight = $request->input('item_weight');
        $item->fragile = $request->input('fragile') === 'fragile' ? 1 : 0;
        $item->save();

        return redirect()->route('easysenddetail', ['data' => [
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
                'customer_id' => $customer->id,
            ]
        ]]);
    }
    public function delete($id)
    {
        $customer = Customer::find($id);
        $item = Item::where('customer_id',$id)->first();
        $receipt_number = Receipttemp::where('customer_id', $id)->first();

        if ($customer && $item && $receipt_number) {
            $customer->delete();
            $item->delete();
            $receipt_number->delete();

            return redirect('/EasySend')->with('success', 'Data berhasil dihapus');
            } else {
                return redirect('/EasySend')->with('error', 'Data tidak ditemukan');
        }
    }
}