<?php

use Illuminate\Database\Seeder;
use App\Models\Cate;
class CateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lap_trinh = new Cate();
        $lap_trinh->name = 'Lập trình';
        $lap_trinh->slug = 'lap-trinh';
        $lap_trinh->save();

        $do_hoa = new Cate();
        $do_hoa->name = 'Đồ họa';
        $do_hoa->slug = 'do-hoa';
        $do_hoa->save();
    }
}
