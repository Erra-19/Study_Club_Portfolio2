<?php

namespace Database\Seeders;

use App\Models\Shipment_status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class statusseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $shipmentstatus = [
            [
                'status_name' => 'Order Received',
                'status_desc' => 'The order has been received and is being processed by the system',
            ],
            [
                'status_name' => 'Ready for Pickup',
                'status_desc' => 'The order is ready for pickup, and the courier is on the way',
            ],
            [
                'status_name' => 'Being Packed',
                'status_desc' => 'The order is being packed in preparation for shipping',
            ],
            [
                'status_name' => 'Ready to Ship',
                'status_desc' => 'The order has been packed and is ready to be shipped to the destination',
            ],
            [
                'status_name' => 'In Transit',
                'status_desc' => 'The order is on the way',
            ],
            [
                'status_name' => 'Arrived at Sorting Center',
                'status_desc' => 'The order has arrived at the sorting center for processing before heading to the destination',
            ],
            [
                'status_name' => 'En Route to Recipient',
                'status_desc' => 'The order is on the way to the destination address',
            ],
            [
                'status_name' => 'Completed',
                'status_desc' => 'The order has been delivered and confirmed by the recipient',
            ],
            [
                'status_name' => 'Delayed',
                'status_desc' => 'The shipment is experiencing a delay',
            ],
            [
                'status_name' => 'Damaged',
                'status_desc' => 'The item was damaged during shipping',
            ],
            [
                'status_name' => 'Lost',
                'status_desc' => 'The item was not found or lost during shipping',
            ],
            [
                'status_name' => 'Failed',
                'status_desc' => 'The shipment failed',
            ],
            [
                'status_name' => 'Returning to Sender',
                'status_desc' => 'The item is on the way back to the sender',
            ],
        ];        

        foreach ($shipmentstatus as $status) {
            Shipment_status::create($status);
        }
    }
}
