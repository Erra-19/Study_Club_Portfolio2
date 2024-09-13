<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Item;
use App\Models\Item_category;
use App\Models\Receipttemp;

class EasySendDetailController extends Controller
{
    public function index(Request $request)
    {
        $data = $request->input('data');
        $receipt_number = $request->input('receipt_number');

        return view('EasySendDetail', compact('data', 'receipt_number'));
    }

    public function update(Request $request, $id)
    {
        return (new ESUpdateController)->update($request, $id);
    }
}