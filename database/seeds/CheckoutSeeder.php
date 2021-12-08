<?php

use Illuminate\Database\Seeder;

class CheckoutSeeder extends Seeder
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
        \Illuminate\Support\Facades\DB::table('checkouts')->truncate();
        \Illuminate\Support\Facades\DB::table('checkouts')->insert([
            [
                'id' => 1,
                'checkout_name' => 'Trọng Phú',
                'account_id' => 10,
                'checkout_address' => 'Quảng Ninh , Cẩm phả',
                'checkout_phone' => '012123415',
                'checkout_email' => 'trongphu@gmail.com',
                'checkout_notes' => "",
                'checkout_status' => 1,
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s')
            ], [
                'id' => 2,
                'checkout_name' => 'Hoàng Trình',
                'account_id' => 7,
                'checkout_address' => 'Nhổn , Hà nội',
                'checkout_phone' => '0123526432',
                'checkout_email' => 'hoangtrinh@gmail.com',
                'checkout_notes' => "",
                'checkout_status' => 1,
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s')
            ],[
                'id' => 3,
                'checkout_name' => 'Công Viên',
                'account_id' => 9,
                'checkout_address' => 'Hồ Tùng mậu , Hà nội',
                'checkout_phone' => '0123145643',
                'checkout_email' => 'congvien@gmail.com',
                'checkout_notes' => "",
                'checkout_status' => 0,
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s')
            ],[
                'id' => 4,
                'checkout_name' => 'Phạm Hòa',
                'account_id' => 6,
                'checkout_address' => 'Phú thọ, Đông xuân',
                'checkout_phone' => '012124642',
                'checkout_email' => 'phamhoa@gmail.com',
                'checkout_notes' => "",
                'checkout_status' => 1,
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s')
            ],[
                'id' => 5,
                'checkout_name' => 'Văn Lộc',
                'account_id' => 8,
                'checkout_address' => 'Hòa Bình',
                'checkout_phone' => '012124573',
                'checkout_email' => 'vanloc@gmail.com',
                'checkout_notes' => "",
                'checkout_status' => 0,
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s')
            ]


        ]);
        //\Illuminate\Support\Facades\DB::statement('ALTER SEQUENCE checkouts_id_seq RESTART WITH 6');
        if (env('DB_CONNECTION') == 'mysql') {
            \Illuminate\Support\Facades\DB::statement('SET FOREIGN_KEY_CHECKS = 1');
        }
    }
}
