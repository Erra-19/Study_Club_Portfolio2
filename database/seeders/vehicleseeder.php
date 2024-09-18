<?php

namespace Database\Seeders;

use App\Models\Vehicle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $vehicles = [
            [
                'vehicle_type' => 'car',
                'police_number' => 'B 1234 CD'
            ],
            [
                'vehicle_type' => 'bike',
                'police_number' => 'D 5678 EF'],
            [
                'vehicle_type' => 'car',
                'police_number' => 'L 9012 GH'],
            [
                'vehicle_type' => 'bike',
                'police_number' => 'B 3456 IJ'],
            [
                'vehicle_type' => 'car', 'police_number' => 'F 7890 KL'],
            [
                'vehicle_type' => 'bike',
                'police_number' => 'D 2345 MN'],
            [
                'vehicle_type' => 'car',
                'police_number' => 'R 6789 OP'],
            [
                'vehicle_type' => 'bike',
                'police_number' => 'B 0123 QR'],
            [
                'vehicle_type' => 'car',
                'police_number' => 'J 4567 ST'],
            [
                'vehicle_type' => 'bike',
                'police_number' => 'L 8901 UV'],
        ];        

        foreach ($vehicles as $vehicle) {
            Vehicle::create($vehicle);
        }
    }
}
