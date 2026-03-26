<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LaborCost;
use App\Models\LaborCategory;
use Illuminate\Support\Facades\DB;

class LaborCostSeeder extends Seeder
{
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        LaborCost::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $getCatId = function ($name) {
            $category = LaborCategory::where('name', $name)->first();
            return $category ? $category->id : null;
        };

        $costs = [
            // โครงสร้าง
            ['category_id' => $getCatId('งานเสาเข็ม'), 'item_name' => 'เสาเข็ม คร. 4" x 4.00 ม.', 'unit' => 'ต้น', 'cost_per_unit' => 95, 'remark' => 'ว 809'],
            ['category_id' => $getCatId('งานเหล็กเสริมคอนกรีต'), 'item_name' => 'ตัด, ดัด และผูก เหล็กเส้นผิวเรียบ', 'unit' => 'ตัน', 'cost_per_unit' => 4900, 'remark' => null],

            // สถาปัตย์
            ['category_id' => $getCatId('งานหลังคา'), 'item_name' => 'กระเบื้องลอนคู่ (ทรงจั่ว)', 'unit' => 'ตร.ม.', 'cost_per_unit' => 46, 'remark' => null],
            ['category_id' => $getCatId('งานผนังและฉาบปูน'), 'item_name' => 'ก่ออิฐมอญครึ่งแผ่น', 'unit' => 'ตร.ม.', 'cost_per_unit' => 125, 'remark' => null],

            // ไฟฟ้า & ปรับอากาศ
            ['category_id' => $getCatId('งานสายไฟฟ้า'), 'item_name' => 'สาย THW 1.5 sq.mm.', 'unit' => 'เมตร', 'cost_per_unit' => 6, 'remark' => null],
            ['category_id' => $getCatId('เครื่องปรับอากาศ'), 'item_name' => 'Wall Type 9,000 BTU', 'unit' => 'ชุด', 'cost_per_unit' => 1538, 'remark' => 'รวมติดตั้ง'],
        ];

        foreach ($costs as $cost) {
            if ($cost['category_id']) {
                LaborCost::create($cost);
            }
        }
    }
}