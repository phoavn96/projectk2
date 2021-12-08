<?php

use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
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
        \Illuminate\Support\Facades\DB::table('orders')->truncate();
        \Illuminate\Support\Facades\DB::table('orders')->insert([
            [
                'id' => 1,
                'shipping_name' => 'Trọng Phú',
                'account_id' => 10,
                'shipping_address'=>"Ngõ 54 , ngách 43 Cẩm phả Quảng Ninh",
                'shipping_phone'=>"0347882743",
                'total_money'=>2220000,
                'shipping_email' => 'trongphu@gmail.com',
                'order_status' => 1,
                'code'=> 'asdasd',
                'reducemoney' =>20,
                'shipping_status'=>1,
                'shipping_notes' =>'',
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(-30)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(-30)->format('Y-m-d H:i:s')
            ],[
                'id' => 2,
                'shipping_name' => 'Văn Lộc',
                'account_id' => 8,
                'shipping_address'=>"Hòa Bình",
                'shipping_phone'=>"0347882234",
                'total_money'=>5120000,
                'shipping_email' => 'vanloc@gmail.com',
                'order_status' => 1,
                'code'=> 'asdasd',
                'reducemoney' =>20,
                'shipping_status'=>1,
                'shipping_notes' =>' ',
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(-25)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(-28)->format('Y-m-d H:i:s')
            ],[
                'id' => 3,
                'shipping_name' => 'Công Viên',
                'account_id' => 9,
                'shipping_address'=>"Thái Bình,đông hoàng ngõ 23 ngách 32",
                'shipping_phone'=>"0347882742",
                'total_money'=>1320000,
                'shipping_email' => 'congvien@gmail.com',
                'order_status' => 1,
                'code'=> 'asdasd',
                'reducemoney' =>20,
                'shipping_status'=>2,
                'shipping_notes' =>'',
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(-20)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(-20)->format('Y-m-d H:i:s')
            ],[
                'id' => 4,
                'shipping_name' => 'Phạm Hòa',
                'account_id' => 6,
                'shipping_address'=>"Hồ tùng mậu ngõ 23 ngách 23 , Hà nội",
                'shipping_phone'=>"0347882742",
                'total_money'=>5320000,
                'shipping_email' => 'phamhoa@gmail.com',
                'order_status' => 1,
                'code'=> 'asdasd',
                'reducemoney' =>20,
                'shipping_status'=>2,
                'shipping_notes' =>'',
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(-15)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(-15)->format('Y-m-d H:i:s')
            ],[
                'id' => 5,
                'shipping_name' => 'Hoàng Trình',
                'account_id' =>  7,
                'shipping_address'=>"Kim mã , ngách 43 ngõ 23,hà nội",
                'shipping_phone'=>"0347882712",
                'total_money'=>10200000,
                'shipping_email' => 'hoangtrinh@gmail.com',
                'order_status' => 1,
                'code'=> 'asdasd',
                'reducemoney' =>20,
                'shipping_status'=> 3,
                'shipping_notes' =>'',
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(-10)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(-10)->format('Y-m-d H:i:s')
            ],[
                'id' => 6,
                'shipping_name' => 'Sơn Tùng',
                'account_id' =>  11,
                'shipping_address'=>"Quận 8 ,Thành Phố HCM",
                'shipping_phone'=>"0347885712",
                'total_money'=>5200000,
                'shipping_email' => 'sontung@gmail.com',
                'order_status' => 1,
                'shipping_status'=> 3,
                'code'=> 'asdasd',
                'reducemoney' =>20,
                'shipping_notes' =>'',
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(-5)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(-5)->format('Y-m-d H:i:s')
            ],[
                'id' => 7,
                'shipping_name' => 'Hồng Sơn',
                'account_id' =>  13,
                'shipping_address'=>"Quảng Nam Quỳnh đô ngõ 23 ngách 12",
                'shipping_phone'=>"0347815712",
                'total_money'=>20200000,
                'code'=> 'asdasd',
                'reducemoney' =>20,
                'shipping_email' => 'hongson@gmail.com',
                'order_status' => 1,
                'shipping_status'=> 4,
                'shipping_notes' =>'',
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(-1)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(-1)->format('Y-m-d H:i:s')
            ],[
                'id' => 8,
                'shipping_name' => 'Văn Mai Hương',
                'account_id' =>  13,
                'shipping_address'=>"Hòn gai , ngõ 23 , ngách 43 , Quảng Ninh",
                'shipping_phone'=>"0347815719",
                'total_money'=>5200000,
                'code'=> 'asdasd',
                'reducemoney' =>20,
                'shipping_email' => 'vanmaihuong@gmail.com',
                'order_status' => 1,
                'shipping_status'=> 4,
                'shipping_notes' =>'',
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s')
            ]


        ]);
        //\Illuminate\Support\Facades\DB::statement('ALTER SEQUENCE orders_id_seq RESTART WITH 9');
        if (env('DB_CONNECTION') == 'mysql') {
            \Illuminate\Support\Facades\DB::statement('SET FOREIGN_KEY_CHECKS = 1');
        }
    }
}
