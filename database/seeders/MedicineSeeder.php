<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MedicineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('medicines')->insert([
            ['name' => 'Paracetamol', 'manufacturer' => 'ABC Pharma', 'quantity' => 100, 'price' => 10.50, 'expiry_date' => '2025-12-31'],
            ['name' => 'Ibuprofen', 'manufacturer' => 'XYZ Pharmaceuticals', 'quantity' => 50, 'price' => 20.75, 'expiry_date' => '2024-11-30'],
            ['name' => 'Aspirin', 'manufacturer' => 'DEF Labs', 'quantity' => 150, 'price' => 15.00, 'expiry_date' => '2026-05-15'],
            ['name' => 'Amoxicillin', 'manufacturer' => 'GHI Pharma', 'quantity' => 80, 'price' => 30.99, 'expiry_date' => '2025-08-12'],
            ['name' => 'Cough Syrup', 'manufacturer' => 'JKL Medical', 'quantity' => 120, 'price' => 25.00, 'expiry_date' => '2024-06-30'],
            ['name' => 'Loratadine', 'manufacturer' => 'MNO Labs', 'quantity' => 200, 'price' => 18.00, 'expiry_date' => '2027-03-10'],
            ['name' => 'Cetirizine', 'manufacturer' => 'PQR Pharmaceuticals', 'quantity' => 180, 'price' => 22.50, 'expiry_date' => '2025-11-20'],
            ['name' => 'Paroxetine', 'manufacturer' => 'STU Pharma', 'quantity' => 60, 'price' => 60.00, 'expiry_date' => '2024-09-30'],
            ['name' => 'Metformin', 'manufacturer' => 'XYZ Pharmaceuticals', 'quantity' => 150, 'price' => 40.00, 'expiry_date' => '2026-01-15'],
            ['name' => 'Gabapentin', 'manufacturer' => 'ABC Labs', 'quantity' => 90, 'price' => 35.99, 'expiry_date' => '2025-07-10'],
            ['name' => 'Hydrochlorothiazide', 'manufacturer' => 'GHI Labs', 'quantity' => 200, 'price' => 10.99, 'expiry_date' => '2025-04-25'],
            ['name' => 'Simvastatin', 'manufacturer' => 'JKL Pharmaceuticals', 'quantity' => 130, 'price' => 55.50, 'expiry_date' => '2026-02-01'],
            ['name' => 'Amlodipine', 'manufacturer' => 'DEF Labs', 'quantity' => 250, 'price' => 12.75, 'expiry_date' => '2027-07-12'],
            ['name' => 'Fluoxetine', 'manufacturer' => 'MNO Pharmaceuticals', 'quantity' => 110, 'price' => 45.50, 'expiry_date' => '2025-10-01'],
            ['name' => 'Sertraline', 'manufacturer' => 'PQR Pharmaceuticals', 'quantity' => 140, 'price' => 55.00, 'expiry_date' => '2024-08-15'],
            ['name' => 'Clonazepam', 'manufacturer' => 'STU Pharma', 'quantity' => 75, 'price' => 30.00, 'expiry_date' => '2026-04-10'],
            ['name' => 'Omeprazole', 'manufacturer' => 'XYZ Labs', 'quantity' => 200, 'price' => 40.00, 'expiry_date' => '2026-06-30'],
            ['name' => 'Prednisolone', 'manufacturer' => 'ABC Pharmaceuticals', 'quantity' => 95, 'price' => 50.00, 'expiry_date' => '2024-11-10'],
            ['name' => 'Zolpidem', 'manufacturer' => 'MNO Labs', 'quantity' => 120, 'price' => 60.00, 'expiry_date' => '2027-09-15'],
            ['name' => 'Losartan', 'manufacturer' => 'DEF Pharma', 'quantity' => 150, 'price' => 32.00, 'expiry_date' => '2025-06-10'],
            ['name' => 'Diazepam', 'manufacturer' => 'STU Labs', 'quantity' => 50, 'price' => 20.50, 'expiry_date' => '2026-12-31'],
            ['name' => 'Metoprolol', 'manufacturer' => 'JKL Pharmaceuticals', 'quantity' => 170, 'price' => 25.99, 'expiry_date' => '2025-02-15'],
            ['name' => 'Vitamins', 'manufacturer' => 'XYZ Medical', 'quantity' => 300, 'price' => 5.99, 'expiry_date' => '2027-03-20'],
            ['name' => 'Ciprofloxacin', 'manufacturer' => 'PQR Pharmaceuticals', 'quantity' => 80, 'price' => 45.00, 'expiry_date' => '2025-12-10'],
            ['name' => 'Furosemide', 'manufacturer' => 'ABC Labs', 'quantity' => 100, 'price' => 10.00, 'expiry_date' => '2025-04-18'],
            ['name' => 'Tamsulosin', 'manufacturer' => 'XYZ Pharma', 'quantity' => 200, 'price' => 30.75, 'expiry_date' => '2024-12-25'],
            ['name' => 'Bupropion', 'manufacturer' => 'GHI Pharmaceuticals', 'quantity' => 90, 'price' => 40.00, 'expiry_date' => '2025-07-05'],
            ['name' => 'Glyburide', 'manufacturer' => 'MNO Labs', 'quantity' => 60, 'price' => 35.50, 'expiry_date' => '2024-11-05'],
            ['name' => 'Duloxetine', 'manufacturer' => 'JKL Pharma', 'quantity' => 110, 'price' => 50.00, 'expiry_date' => '2026-01-12'],
            ['name' => 'Tramadol', 'manufacturer' => 'DEF Pharmaceuticals', 'quantity' => 140, 'price' => 35.00, 'expiry_date' => '2025-08-08'],
            ['name' => 'Cimetidine', 'manufacturer' => 'STU Labs', 'quantity' => 130, 'price' => 20.00, 'expiry_date' => '2024-09-30'],
            ['name' => 'Fexofenadine', 'manufacturer' => 'PQR Labs', 'quantity' => 180, 'price' => 22.99, 'expiry_date' => '2027-01-15'],
        ]);
    }
}
