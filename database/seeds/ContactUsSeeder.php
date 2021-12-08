<?php

use Illuminate\Database\Seeder;

class ContactUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (env('DB_CONNECTION') == 'mysql') {
            \Illuminate\Support\Facades\DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        }
        \Illuminate\Support\Facades\DB::table('contact_us')->truncate();
        \Illuminate\Support\Facades\DB::table('contact_us')->insert([
            [
                'id' => 1,
                'contactUs_name' => 'Trọng Phú',
                'contactUs_email' => 'trongphu@gmail.com',
                'contactUs_subject' => "Trả sản phẩm",
                'contactUs_message' =>"Liệu tôi có thể trả sản phẩm và lấy lại tiền?",
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s')
            ],[
                'id' => 2,
                'contactUs_name' => 'Phạm hòa',
                'contactUs_email' => 'phamhoa@gmail.com',
                'contactUs_subject' => "Chuyển tiền",
                'contactUs_message' =>"Sao tôi có thể tin tưởng khi chuyển tiền rồi, tôi sẽ nhận được hàng?",
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s')
            ],[
                'id' => 3,
                'contactUs_name' => 'Văn lộc',
                'contactUs_email' => 'vanloc@gmail.com',
                'contactUs_subject' => "Nhận hàng",
                'contactUs_message' =>"Bao lâu tôi nhận được hàng?",
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s')
            ],[
                'id' => 4,
                'contactUs_name' => 'Hoàng Trình',
                'contactUs_email' => 'hoangtrinh@gmail.com',
                'contactUs_subject' => "Chọn size",
                'contactUs_message' =>"Tôi không biết chọn size như thế nào?",
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s')
            ],[
                'id' => 5,
                'contactUs_name' => 'Công Viên',
                'contactUs_email' => 'congvien@gmail.com',
                'contactUs_subject' => "ship hàng",
                'contactUs_message' =>"Tôi ở xa có mua hàng được không? Shop có giao hàng không?",
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s')
            ]


        ]);
        //\Illuminate\Support\Facades\DB::statement('ALTER SEQUENCE contact_us_id_seq RESTART WITH 6');
        if (env('DB_CONNECTION') == 'mysql') {
            \Illuminate\Support\Facades\DB::statement('SET FOREIGN_KEY_CHECKS = 1');
        }
    }
}
