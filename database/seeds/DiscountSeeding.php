<?php

use Illuminate\Database\Seeder;

class DiscountSeeding extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (env('DB_CONNECTION')=='mysql') {
            \Illuminate\Support\Facades\DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        }
        \Illuminate\Support\Facades\DB::table('discounts')->truncate();
        \Illuminate\Support\Facades\DB::table('discounts')->insert([
            [
                'id' => 1,
                'name' => 'MGG001',
                'description' => 'Giảm 5% giá trị mặt hàng',
                'status'=>1,
                'value'=>5,
                'end_time'=>'2099-11-20',
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(-7)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(-0)->format('Y-m-d H:i:s')
            ],[
                'id' => 2,
                'name' => 'MGG002',
                'description' => 'Giảm 10% giá trị mặt hàng',
                'status'=>1,
                'value'=>10,
                'end_time'=>'2099-11-28',
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(-7)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(-0)->format('Y-m-d H:i:s')
            ],[
                'id' => 3,
                'name' => 'MGG003',
                'description' => 'Giảm 15% giá trị mặt hàng',
                'status'=>1,
                'value'=>15,
                'end_time'=>'2099-11-28',
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(-7)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(-0)->format('Y-m-d H:i:s')
            ]
        ]);
        //\Illuminate\Support\Facades\DB::statement('ALTER SEQUENCE discounts_id_seq RESTART WITH 4');
        if (env('DB_CONNECTION')=='mysql') {
            \Illuminate\Support\Facades\DB::statement('SET FOREIGN_KEY_CHECKS = 1');
        }
    }
}
