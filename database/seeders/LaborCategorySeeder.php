<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LaborCategory;
use Illuminate\Support\Facades\DB;

class LaborCategorySeeder extends Seeder
{
    public function run()
    {
        // ล้างข้อมูลเก่าเพื่อเริ่มใหม่
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        LaborCategory::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $data = [
            '1. งานโครงสร้างวิศวกรรม' => [
                'งานเสาเข็ม',
                'งานแผ่นพื้นสำเร็จรูป',
                'งานเหล็กเสริมคอนกรีต',
                'งานดินและทรายถม',
                'งานคอนกรีตโครงสร้าง'
            ],
            '2. งานสถาปัตยกรรม' => [
                'งานหลังคา',
                'งานฝ้าเพดาน',
                'งานผนังและฉาบปูน',
                'งานปูพื้นและกระเบื้อง',
                'งานทาสี'
            ],
            '3. งานระบบสุขาภิบาลและดับเพลิง' => [
                'งานเดินท่อประปา',
                'งานติดตั้งสุขภัณฑ์',
                'งานระบบระบายน้ำ',
                'งานระบบดับเพลิง'
            ],
            '4. งานระบบไฟฟ้าและสื่อสาร' => [
                'งานสายไฟฟ้า',
                'งานท่อร้อยสาย',
                'งานติดตั้งโคมไฟ',
                'งานระบบตู้ควบคุม'
            ],
            '5. งานระบบปรับอากาศ' => [
                'เครื่องปรับอากาศ',
                'งานท่อลมและท่อหุ้มฉนวน',
                'งานติดตั้ง Diffuser'
            ]
        ];

        foreach ($data as $mainName => $subs) {
            $main = LaborCategory::create(['name' => $mainName]);
            foreach ($subs as $subName) {
                LaborCategory::create([
                    'name' => $subName,
                    'parent_id' => $main->id
                ]);
            }
        }
    }
}