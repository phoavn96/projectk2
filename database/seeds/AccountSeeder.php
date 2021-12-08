<?php

use Illuminate\Database\Seeder;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public static $password = '123';

    public function run()

    {
        if (env('DB_CONNECTION') == 'mysql') {
            \Illuminate\Support\Facades\DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        }
        \Illuminate\Support\Facades\DB::table('accounts')->truncate();
        \Illuminate\Support\Facades\DB::table('accounts')->insert([
            [
                'id' => 1,
                'email' => 'hoafat@gmail.com',
                'salt' => 'tyutyu',
                'password' => md5(self::$password . 'tyutyu'),
                'name' => 'hoa',
                'phone' => '0123456789',
                'type'=>1,
                'role' => 1,
                'status' => 1,
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s')
            ], [
                'id' => 2,
                'email' => 'admin@gmail.com',
                'salt' => 'ghjghj',
                'password' => md5(self::$password . 'ghjghj'),
                'name' => 'admin',
                'phone' => '0123456789',
                'role' => 1,
                'type'=>1,
                'status' => 1,
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s')
            ], [
                'id' => 3,
                'email' => 'admin1@gmail.com',
                'salt' => 'nhgghn',
                'password' => md5( self::$password.'nhgghn'),
                'name' => 'hoa',
                'phone' => '0123456789',
                'role' => 1,
                'type'=>2,
                'status' => 1,
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s')
            ], [
                'id' => 4,
                'email' => 'admin2@gmail.com',
                'salt' => 'bnhbnh',
                'password' => md5(self::$password.'bnhbnh'),
                'name' => 'hoa',
                'phone' => '0123456789',
                'role' => 1,
                'type'=>2,
                'status' => 1,
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(-5)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s')
            ], [
                'id' => 5,
                'email' => 'admin3@gmail.com',
                'salt' => 'njknjk',
                'password' => md5(self::$password.'njknjk'),
                'name' => 'hoa',
                'phone' => '0123456789',
                'role' => 1,
                'type'=>3,
                'status' => 1,
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(-5)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s')
            ], [
                'id' => 6,
                'email' => 'phamhoa@gmail.com',
                'salt' => 'zxczxc',
                'password' => md5(self::$password.'zxczxc'),
                'name' => 'Pham hoa',
                'phone' => '0123456789',
                'role' => 0,
                'type'=>3,
                'status' => 1,
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(-5)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s')
            ],[
                'id' => 7,
                'email' => 'hoangtrinh@gmail.com',
                'salt' => 'asdasd',
                'password' => md5(self::$password.'asdasd'),
                'name' => 'Hoang Trinh',
                'phone' => '0123456789',
                'role' => 0,
                'type'=>1,
                'status' => 1,
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(-5)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s')
            ],[
                'id' => 8,
                'email' => 'vanloc@gmail.com',
                'salt' => 'zxczxc',
                'password' => md5(self::$password.'zxczxc'),
                'name' => 'Van Loc',
                'phone' => '0123456789',
                'role' => 0,
                'type'=>1,
                'status' => 1,
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(-5)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s')
            ],[
                'id' => 9,
                'email' => 'congvien@gmail.com',
                'salt' => 'zxczxc',
                'password' => md5(self::$password.'zxczxc'),
                'name' => 'Cong Vien',
                'phone' => '0123456789',
                'role' => 0,
                'type'=>2,
                'status' => 1,
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(-5)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s')
            ],[
                'id' => 10,
                'email' => 'trongphu@gmail.com',
                'salt' => 'zxczxc',
                'password' => md5(self::$password.'zxczxc'),
                'name' => 'Trong Phu',
                'phone' => '0123456789',
                'role' => 0,
                'type'=>3,
                'status' => 1,
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(-5)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s')
            ],[
                'id' => 11,
                'email' => 'sontung@gmail.com',
                'salt' => 'tyu',
                'password' => md5(self::$password.'tyu'),
                'name' => 'Son Tung',
                'phone' => '0123456782',
                'role' => 0,
                'type'=>1,
                'status' => 1,
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(-5)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s')
            ],[
                'id' => 12,
                'email' => 'vanmaihuong@gmail.com',
                'salt' => 'tyu',
                'password' => md5(self::$password.'tyu'),
                'name' => 'Van Mai Huong',
                'phone' => '0123456282',
                'role' => 0,
                'type'=>1,
                'status' => 1,
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(-5)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s')
            ],
            [
                'id' => 13,
                'email' => 'hongson@gmail.com',
                'salt' => 'tyu',
                'password' => md5(self::$password.'tyu'),
                'name' => 'Hong Son',
                'phone' => '0123416282',
                'role' => 0,
                'type'=>1,
                'status' => 1,
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(-5)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s')
            ],[
                'id' => 14,
                'email' => 'vienhp1996@gmail.com',
                'salt' => 'ghjghj',
                'password' => md5(self::$password . 'ghjghj'),
                'name' => 'Mai cong vien',
                'phone' => '0123456784',
                'role' => 0,
                'type'=>1,
                'status' => 1,
                'created_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->addDays(0)->format('Y-m-d H:i:s')
            ]

        ]);
        //\Illuminate\Support\Facades\DB::statement('ALTER SEQUENCE accounts_id_seq RESTART WITH 14');
        if (env('DB_CONNECTION') == 'mysql') {
            \Illuminate\Support\Facades\DB::statement('SET FOREIGN_KEY_CHECKS = 1');
        }
    }


}
