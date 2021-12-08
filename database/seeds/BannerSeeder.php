<?php

use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (env('DB_CONNECTION')=='mysql') {
            \Illuminate\Support\Facades\DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        }
        \Illuminate\Support\Facades\DB::table('banners')->truncate();
        \Illuminate\Support\Facades\DB::table('banners')->insert([
            [
                'id' => 1,
                'name' => 'nike',
                'images' => 'http://shopgiayshin.webmienphi.vn/files/slide_home/3.jpg',
                'description'=>"mẫu giày nike mới ra , săn ngay !",
                'status'=>1,
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(-5)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s')
            ], [
                'id' => 2,
                'name' => 'Giảm giá',
                'images' => 'http://shopgiayshin.webmienphi.vn/files/slide_home/1.jpg',
                'description'=>"Săn deal ,Giảm giá lên tới 80% săn ngay !",
                'status'=>1,
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(-5)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s')
            ],[
                'id' => 3,
                'name' => 'Giảm giá mùa xuân ',
                'images' => 'http://shopgiayshin.webmienphi.vn/files/slide_home/2.jpg',
                'description'=>"mua xuân nhận ngay ưu đãi",
                'status'=>1,
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(-5)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s')
            ],[
                'id' => 4,
                'name' => 'Giảm giá mùa xuân 2 ',
                'images' => 'https://image.freepik.com/free-psd/spring-sale-banner-template_23-2148102465.jpg',
                'description'=>"mua xuân nhận ngay ưu đãi",
                'status'=>1,
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(-5)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s')
            ]

        ]);
        //\Illuminate\Support\Facades\DB::statement('ALTER SEQUENCE banners_id_seq RESTART WITH 5');
        if (env('DB_CONNECTION') == 'mysql') {
            \Illuminate\Support\Facades\DB::statement('SET FOREIGN_KEY_CHECKS = 1');
        }
    }
}
