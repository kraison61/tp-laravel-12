<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\LaborCostSeeder;
use Database\Seeders\LaborCategorySeeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            LaborCategorySeeder::class, // ต้องสร้างหมวดหมู่ก่อน
            LaborCostSeeder::class,     // แล้วค่อยสร้างรายการค่าแรงมาผูกกับ ID
        ]);
    }
}
